<?php

class products extends CI_Controller {

    function __construct()
    {

        parent :: __construct();

        $this->settings = $this->system_vars->get_settings();

        if (!$this->session->userdata('member_logged'))
        {
            $this->session->set_flashdata('error', "You must login before you can gain access to secured areas");
            redirect('/register/login');
            exit;
        }
    }

    function request_design(){
        $domain_id = $this->input->post('domain_id');
        $design_id = $this->input->post('design_id');
        $response = $this->domains->request_design($design_id, $domain_id, $this->member->data['id'], strftime('%Y-%m-%d %H:%M:%S', time()));
        echo json_encode(['is_saved' => $response, 'request' => 'request_design']);
        exit;
    }

    function cancel_request(){
        $domain_id = $this->input->post('domain_id');
        $design_id = $this->input->post('design_id');
        $response = $this->domains->cancel_request($design_id, $domain_id, $this->member->data['id'], strftime('%Y-%m-%d %H:%M:%S', time()));
        echo json_encode(['is_saved' => $response, 'request' => 'cancel_request']);
        exit;
    }
}
