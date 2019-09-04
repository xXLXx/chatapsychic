<?php

class contact extends CI_Controller {

    function __construct()
    {
        parent :: __construct();
        $this->load->helper('captcha');
        $this->settings = $this->system_vars->get_settings();
    }

    function index()
    {
        $t["error"] = $this->session->flashdata('error');

        $this->load->view('header');
        $this->load->view('pages/contact', $t);
        $this->load->view('footer');
    }

    function submit()
    {

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('comments', 'Comments', 'trim|required');
        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required|trim');

        if (!$this->form_validation->run())
        {
            $this->session->set_flashdata('error', validation_errors());
            $this->index();
        }
        else
        {
            $params = array();
            $params['name'] = set_value('name');
            $params['phone'] = set_value('phone');
            $params['email'] = set_value('email');
            $params['username'] = set_value('username');
            $params['subject'] = set_value('subject');
            $params['comments'] = set_value('comments');            
            
            $this->system_vars->omail($this->settings['admin_email'], 'contact-inquiry', $params);
            redirect('/success');
        }
    }

    function check_captcha($string = null)
    {

        if ($string)
        {

            $random_captcha = $this->session->userdata('captcha');

            if ($string == $random_captcha)
            {

                return true;
            }
            else
            {

                $this->form_validation->set_message('check_captcha', "The security code you entered is invalid");
                return false;
            }
        }
        else
        {

            return true;
        }
    }

}
