<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Affiliate_Management extends CI_Controller {

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
        $t['affiliates'] = $this->affiliates->getAll();
        
        $this->load->view('vadmin/header');
        $this->load->view('vadmin/affiliates/main', $t);
        $this->load->view('vadmin/footer');
    }
    
    function banners()
    {
        $this->load->helper('string');
        $t["products"] = $this->affiliates->getAllProducts();
        $this->load->view('vadmin/header');
        $this->load->view('vadmin/affiliates/banners', $t);
        $this->load->view('vadmin/footer');
    }
    
    function product_groups()
    {
        $this->load->helper('string');
        $t["products"] = $this->affiliates->getAllProducts();
        $this->load->view('vadmin/header');
        $this->load->view('vadmin/affiliates/products', $t);
        $this->load->view('vadmin/footer');
    }
    
    function upload()
    {
        $directory = FCPATH . 'uploads/';
        $this->load->library('uploader');
        $data = $this->uploader->upload($directory);

        $this->affiliates->save_attachments($data);

        //$file = $this->_get_formatted_file($data['attachment_id'], $data['filename'], "");
        //$file['loan_id'] = $data['params']['loan_id'];
        //$file['id'] = $data["attachment_id"];

        echo json_encode(["product_id"=>$data["product_id"]]);
        exit;
    }

}
