<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Applicant_Management extends CI_Controller {

    function __construct()
    {

        parent::__construct();

        if (!$this->session->userdata('admin_is_logged'))
        {
            redirect('/vadmin/login');
            exit;
        }

        $this->error = null;
        $this->response = null;
        $this->open_nav = false;
        $this->admin = $this->session->userdata('admin_is_logged');
    }

    function index()
    {
        $t['settings'] = $this->applicants->getAutoRejectSettings(); 
        //$this->applicants->setAutoReject($t['settings']);
        $t['applicants'] = $this->applicants->getAll();
        
        $t['areas_of_expertise'] = [
            "Love / Romance / Relationship Advice",
            "Career / Finance / Money Advice",
            "Tarot Cart Readings",
            "Animal Communication",
            "Any Holistic Therapies",
            "Angels / Guides",
            "Channeling / Mediumship",
            "Dream Interpretation",
            "Past Life Analysis",
            "Numerology",
            "Astrology / Horoscopes"
        ];

        $t['dates'] = [
            "mon" => "Monday",
            "tue" => "Tuesday",
            "wed" => "Wednesday",
            "thu" => "Thursday",
            "fri" => "Friday",
            "sat" => "Saturday",
            "sun" => "Sunday"
        ];

        $t['grammar_rates'] = [
            1 => "1 (Low)",
            2 => "2 (Ok)",
            3 => "3 (Good)",
            4 => "4 (Great)",
            5 => "5 (Excellent)"
        ];

        $this->load->view('vadmin/header');
        $this->load->view('vadmin/applicants/main', $t);
        $this->load->view('vadmin/footer');
    }

    function save_settings()
    {
        $data = [
            "isp_required" => $this->input->post("isp_required"),
            "min_pc_age" => $this->input->post("min_pc_age"),
            "os_required" => $this->input->post("os_required"),
            "en_required" => $this->input->post("en_required"),
            "grammar_rate" => json_encode($this->input->post("grammar_rate")),
            "type_skills_required" => $this->input->post("type_skills_required"),
            "commit_required" => $this->input->post("commit_required"),
            "dates_required" => json_encode($this->input->post("dates_required")),
            "languages" => $this->input->post("languages"),
            "expertise_required" => json_encode($this->input->post("expertise_required")),
            "prev_read_required" => $this->input->post("prev_read_required"),
            "min_years" => $this->input->post("min_years")
        ];

        foreach ($data as $key => $value):
            $this->db->where("key", $key);
            $this->db->update("auto_reject_settings", ["value" => $value]);
        endforeach;
        
        echo json_encode(["success" => TRUE]);
        exit;
    }

    function view_qualifications()
    {
        $member_id = $this->input->get("id");

        $data = $this->applicants->getInfo($member_id);
        $this->load->view('vadmin/applicants/details', $data);
    }

    function reject_applicant()
    {
        $member_id = $this->input->post("id");
        $reasons = $this->input->post("reasons");

        $this->db->where('member_id', $member_id);
        $this->db->update('member_applicants', ["application_status" => "rejected", "reject_reasons" => $reasons, "rejected_by" => $this->admin['id']]);
        
        $this->db->select("first_name, email");
        $this->db->where("id", $member_id);
        $query = $this->db->get("members");
        $row = $query->row();
        
        // Send applicant an email the reason why they got rejected
        $insert['first_name'] = $row->first_name;
        $insert['reasons'] = $reasons;

        $this->system_vars->omail($row->email, 'reject_applicant', $insert);

        echo json_encode(["success" => TRUE]);
        exit;
    }

    function hire_applicant()
    {
        $member_id = $this->input->post("id");

        $this->db->where('member_id', $member_id);
        $this->db->update('member_applicants', ["application_status" => "hired", "hired_by" => $this->admin['id']]);
        
        $this->db->select("first_name, email");
        $this->db->where("id", $member_id);
        $query = $this->db->get("members");
        $row = $query->row();
        
        // Send applicant an email the reason why they got rejected
        $insert['first_name'] = $row->first_name;        

        $this->system_vars->omail($row->email, 'hire_applicant', $insert);

        echo json_encode(["success" => TRUE]);
        exit;
    }

    function view_reasons()
    {
        $member_id = $this->input->post("id");
        $this->db->select("reject_reasons, rejected_by");
        $this->db->where("member_id", $member_id);
        $query = $this->db->get("member_applicants");
        echo $query->row()->reject_reasons;
        exit;
    }

    public function new_payment()
    {
        if ($this->input->post("paypal") == "Pay with paypal")
        {
            // Set paypal variables
            $m = $this->member->get_member_data($this->input->post('readerid'));
            $t['item'] = "Paypal payment";
            $t['item_number'] = null;
            $t['custom'] = $this->input->post('readerid') . "*" . "payment";
            $t['return_url'] = site_url("vadmin/reader_management");
            $t['cancel_url'] = site_url("vadmin/reader_management/paypal_cancel");
            $t['notify_url'] = site_url("paypal_ipn/deposit");
            $t['amount'] = $this->input->post('amount');
            $t['email'] = $m['paypal_email'];
            // Load paypal module
            $this->load->view('vadmin/paypal', $t);
        }
        else
        {
            $readerid = $this->input->post('readerid');
            $region = $this->input->post('region');
            $amount = $this->input->post('amount');
            $notes = $this->input->post('notes');

            $this->member->data['id'] = $readerid;
            $this->member_funds->insert_transaction('payment', $amount, $region, $notes);

            redirect("/vadmin/reader_management");
        }
    }

    public function paypal_cancal()
    {
        $this->session->set_flashdata('error', "Your PayPal payment has been canceled. ");

        $redirect = $this->session->userdata('redirect');
        if ($redirect)
        {
            redirect($redirect);
            exit;
        }

        redirect("/my_account");
    }

    public function download_transactions()
    {

        set_time_limit(0);
        ini_set('memory_limit', '-1');

        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=reader_transactions.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        $readerid = $this->input->post('readerid');
        $from = date("Y-m-d H:i:s", strtotime($this->input->post('from')));
        $to = date("Y-m-d H:i:s", strtotime($this->input->post('to')));
        $region = $this->input->post('region');
        $service = $this->input->post('service');

        $get = $this->db->query("
            SELECT
                members.id as reader_id,
                members.username as reader,
                profile_balance.datetime,
                profile_balance.tier,
                profile_balance.type,
                profile_balance.region,
                profile_balance.amount,
                profile_balance.commission as payment

            FROM profile_balance
            LEFT JOIN members ON members.id = profile_balance.reader_id
            WHERE
                " . ($readerid ? "reader_id = {$readerid} AND " : "") . "
                (datetime BETWEEN '{$from}' AND '{$to}') AND
                " . ($region ? "region = '{$region}' AND " : "") . "
                " . ($service ? "type = '" . ($service == 'chat' ? "reading" : "email") . "' AND " : "") . "
                profile_balance.id IS NOT NULL

        ");

        echo $this->array2csv($get->result_array());
    }

    public function array2csv(array &$array)
    {
        if (count($array) == 0)
        {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys(reset($array)));
        foreach ($array as $row)
        {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }

    public function new_reader()
    {

        $memberid = $this->input->post('memberid');
        $legacy = $this->input->post('legacy');

        $insert = array();
        $insert['id'] = $memberid;
        $insert['active'] = 1;
        if ($legacy)
        {
            $insert['legacy_member'] = 1;
        }

        $this->db->insert('profiles', $insert);

        redirect("/vadmin/reader_management");
    }

    public function toggleFeatured($readerId = null)
    {

        $this->reader->init($readerId);
        $reader = $this->reader->data;

        $update = array();
        $update['featured'] = ($reader['featured'] ? 0 : 1);

        $this->db->where('id', $readerId);
        $this->db->update('profiles', $update);

        redirect("/vadmin/reader_management");
    }

}
