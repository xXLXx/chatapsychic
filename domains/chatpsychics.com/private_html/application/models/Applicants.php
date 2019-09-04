<?php

class applicants extends CI_Model {

    function getAll()
    {
        $query = $this->db->query
                ("
                    SELECT
                            member_applicants.*,
                            members.*,
                            members.id as member_id,                            
                            CASE WHEN profile_image IS NULL 
                                    THEN '/media/images/no_profile_image.jpg'
                                    ELSE CONCAT('/media/assets/', profile_image)
                            END AS 'profile'
                    FROM
                            members
                    JOIN member_applicants ON member_applicants.member_id = members.id
                    WHERE
                            members.member_type = 'reader'
					
			");


        $all_results = $query->result_array();
        return $all_results;
    }

    function getInfo($member_id)
    {
        $query = $this->db->query
                ("
                    SELECT 
                            members.*,
                            member_applicants.*
                    FROM members
                    LEFT JOIN member_applicants ON member_applicants.member_id = members.id
                    WHERE members.id = " . $member_id . "
                ");
        $result = $query->row_array();
        return $result;
    }

    function getAutoRejectSettings()
    {
        $query = $this->db->get("auto_reject_settings");
        $results = $query->result_array();

        $arr = [];
        foreach ($results as $row):
            if (in_array($row["key"], ["grammar_rate", "dates_required", "expertise_required"]))
            {
                $arr[$row["key"]] = json_decode($row["value"]);
            }
            else
            {
                $arr[$row["key"]] = $row["value"];
            }
        endforeach;

        return $arr;
    }

    function setAutoReject($settings)
    {
        $this->db->where("application_status", "pending");
        $query = $this->db->get("member_applicants");

        $member_applicants = $query->result_array();

        foreach ($member_applicants as $applicant)
        {
            $res = $this->validateSettings($settings, $applicant);
            if ($res["reject"])
            {
                $this->db->where("member_id", $applicant["member_id"]);
                $this->db->update("member_applicants", ["application_status" => "rejected", "reject_reasons" => $res["reasons"]]);
            }
        }
    }

    function validateSettings($settings, $applicant)
    {
        if ($settings["isp_required"] === "true" && trim($applicant["isp"]) === "")
        {
            return ["reject" => true, "reasons" => "No ISP Provided"];
        }

        if (trim($settings["min_pc_age"]) !== "" && $applicant["pc_age"] > (int) $settings["min_pc_age"])
        {
            return ["reject" => true, "reasons" => "Age of computer reached maximum"];
        }

        if (trim($settings["os_required"]) !== "" && strtolower($applicant["os"]) !== strtolower($settings["os_required"]))
        {
            return ["reject" => true, "reasons" => "Operating System does not meet the requirements"];
        }

        if ($settings["en_required"] === "true" && strtolower($applicant["en_fluent"]) !== "y")
        {
            return ["reject" => true, "reasons" => "Is not fluent in English"];
        }

        if (count($settings["grammar_rate"]) > 0 && !in_array($applicant['grammar_rate'], $settings["grammar_rate"]))
        {
            return ["reject" => true, "reasons" => "Grammar does not meet required ratings"];
        }

        if ($settings["type_skills_required"] === "true" && strtolower($applicant["typing_skills"]) !== "y")
        {
            return ["reject" => true, "reasons" => "Not able to type at least 60 words per minute accurately"];
        }

        if ($settings["commit_required"] === "true" && strtolower($applicant["is_committed"]) !== "y")
        {
            return ["reject" => true, "reasons" => "Not able to commit to a minimum of 15 hours per week"];
        }

        if (count($settings["dates_required"]) > 0 && array_diff($settings["dates_required"], json_decode($applicant["date_availability"])))
        {
            return ["reject" => true, "reasons" => "Not available to work on specific dates set by the system"];
        }

        if (trim($settings["languages"]) !== "" && strpos($settings["languages"], $applicant["spoken_languages"]) === false)
        {
            return ["reject" => true, "reasons" => "Does not have other languages"];
        }

        if (count($settings["expertise_required"]) > 0 && !array_intersect(json_decode($applicant["areas_of_expertise"]), $settings["expertise_required"]))
        {
            return ["reject" => true, "reasons" => "Does not meet areas of expertise"];
        }

        if ($settings["prev_read_required"] === "true" && strtolower($applicant["has_prev_readings"]) !== "y")
        {
            return ["reject" => true, "reasons" => "Does not have Email Readings previously"];
        }

        if (trim($settings["min_years"]) !== "" && $applicant["no_of_years"] < (int) $settings["min_years"])
        {
            return ["reject" => true, "reasons" => "Does not meet minimum years of reading experience"];
        }

        return ["reject" => false, "reasons" => ""];
    }

    function checkSettings($applicant)
    {
        $settings = $this->getAutoRejectSettings();
        
        $res = $this->validateSettings($settings, $applicant);
        if ($res["reject"])
        {
            $this->db->where("member_id", $applicant["member_id"]);
            $this->db->update("member_applicants", ["application_status" => "rejected", "reject_reasons" => $res["reasons"]]);
            return ["application_status" => "rejected", "reject_reasons" => $res["reasons"]];
        }
        
        return false;
    }

}
