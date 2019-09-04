<?php

class domains extends CI_Model {

    function getUsers()
    {
        $query = $this->db->query
                ("
                    SELECT
                            members.*,
                            members.id as member_id,                            
                            CASE WHEN profile_image IS NULL 
                                    THEN '/media/images/no_profile_image.jpg'
                                    ELSE CONCAT('/media/assets/', profile_image)
                            END AS 'profile'
                    FROM
                            members                           
                    WHERE
                            members.member_type = 'affiliate'
					
			");

        $all_results = $query->result_array();

        $i = 0;
        foreach ($all_results as $result)
        {
            $sql = "
                SELECT 
                        domains.url, 
                        domains.name, 
                        domains.descriptions,
                        designs.filename
                FROM domains
                LEFT JOIN domain_requests AS req ON req.domain_id = domains.id
                LEFT JOIN designs ON designs.id = req.design_id
                WHERE req.requested_by = " . $result["id"];
            $query = $this->db->query($sql);
            $res = $query->row_array();

            $all_results[$i]["domain_request"] = $res;
            $i++;
        }

        return $all_results;
    }

    function getAllDomains()
    {
        $query = $this->db->query("SELECT * FROM domains");
        $all_results = $query->result_array();
        return $all_results;
    }

    function getAllThemes($ids = '')
    {
        $sql = "SELECT * FROM design_themes";
        if (trim($ids) !== '')
        {
            $sql .= " where id in($ids)";
        }

        $query = $this->db->query($sql);
        $all_results = $query->result_array();
        return $all_results;
    }

    function getAllMoods($ids = '')
    {
        $sql = "SELECT * FROM design_moods";
        if (trim($ids) !== '')
        {
            $sql .= " where id in($ids)";
        }

        $query = $this->db->query($sql);
        $all_results = $query->result_array();
        return $all_results;
    }

    function getAllDesigns()
    {
        $query = $this->db->query("SELECT * FROM designs");
        $results = $query->result_array();

        $tmp = [];
        foreach ($results as $result)
        {
            $theme_ids = json_decode($result["themes"], true);
            if (is_array($theme_ids))
            {
                $themes = $this->getAllThemes(implode(",", $theme_ids));
                $t = [];
                foreach ($themes as $theme)
                {
                    $t[] = $theme["name"];
                }
                $result["themes"] = implode(",", $t);
            }

            $mood_ids = json_decode($result["moods"], true);
            if (is_array($mood_ids))
            {
                $moods = $this->getAllMoods(implode(",", $mood_ids));
                $t = [];
                foreach ($moods as $mood)
                {
                    $t[] = $mood["name"];
                }
                $result["moods"] = implode(",", $t);
            }

            $tmp[] = $result;
        }

        return $tmp;
    }

    function request_design($design_id, $domain_id, $affiliate_id, $timestamp)
    {
        $data["is_available"] = 0;
        $data["requested_by"] = $affiliate_id;
        $data["request_date"] = $timestamp;
        $this->db->where("id", $design_id);
        $this->db->update("designs", $data);

        $sql = "
                    INSERT INTO domain_requests 
                    SET domain_id = '" . $domain_id . "',
                        design_id = '" . $design_id . "',
                        requested_by = '" . $affiliate_id . "',
                        request_date = NOW()
                    ON DUPLICATE KEY 
                    UPDATE design_id = '" . $design_id . "',
                        requested_by = '" . $affiliate_id . "',
                        request_date = NOW();
            ";
        return $this->db->query($sql);
    }

    function cancel_request($design_id, $domain_id, $affiliate_id, $timestamp)
    {
        $data["is_available"] = 1;
        $data["cancelled_by"] = $affiliate_id;
        $data["cancel_date"] = $timestamp;
        $this->db->where("id", $design_id);
        $this->db->update("designs", $data);

        $this->db->where("design_id", $design_id);
        $this->db->where("domain_id", $domain_id);
        $this->db->where("requested_by", $affiliate_id);
        return $this->db->delete("domain_requests");
    }

    function getSelectedDomain()
    {
        $affiliate_id = $this->member->data["id"];
        $sql = "SELECT domains.id as domain_id
                FROM domain_requests 
                LEFT JOIN domains ON domains.id = domain_requests.domain_id
                WHERE requested_by=" . $affiliate_id;
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result['domain_id'];
    }

    function getProductsByPage($numProductsPerPage, $currPage)
    {
        $totalRowsQuery = $this->db->query
                ("
                    SELECT COUNT(*) AS count
                    FROM designs
        ");

        $temp_arr = $totalRowsQuery->result_array();
        $totalRows = $temp_arr[0]['count'];
        $totalPages = ceil($totalRows / $numProductsPerPage);

        // set trappings for $currPage
        if ($currPage === NULL || ctype_alpha($currPage) || $currPage < 1)
        {
            $currPage = 1;
        }
        elseif ($currPage > $totalPages)
        {
            $currPage = $totalPages;
        }

        $offset = $numProductsPerPage * ($currPage - 1);

        $query = $this->db->query
                ("
                    SELECT
                            designs.*,
                            CASE WHEN filename IS NULL
                                    THEN '/media/images/no_profile_image.jpg'
                                    ELSE CONCAT('/uploads/', filename)
                            END AS 'thumb_pic'
                    FROM
                            designs
					LIMIT {$numProductsPerPage} OFFSET {$offset}
        ");

        return ['query_results' => $query->result_array(), 'total_pages' => $totalPages, 'current_page' => $currPage];
    }

    function save_design(&$data)
    {
        $id = $data['params']['id'];
        if ($id > 0)
        {
            // update here
        }

        $this->load->helper('string');
        $session_id = random_string('alnum', 16);

        $insert = array("filename" => $data['filename'], "session_id" => $session_id);

        if ($this->db->insert('designs', $insert))
        {
            $data['id'] = $this->db->insert_id();
            $data['session_id'] = $session_id;
            return true;
        }
    }

}
