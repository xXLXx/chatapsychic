<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Domain_Management extends CI_Controller {

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
        $t['domain_users'] = $this->domains->getUsers();

        $this->load->view('vadmin/header');
        $this->load->view('vadmin/domains/main', $t);
        $this->load->view('vadmin/footer');
    }

    function designs()
    {
        $this->load->helper('string');
        $t["designs"] = $this->domains->getAllDesigns();
        $t["themes"] = $this->domains->getAllThemes();
        $t["moods"] = $this->domains->getAllMoods();$this->load->view('vadmin/header');
        $this->load->view('vadmin/domains/designs', $t);
        $this->load->view('vadmin/footer');
    }

    function domains()
    {
        $this->load->helper('string');
        $t["domains"] = $this->domains->getAllDomains();
        $this->load->view('vadmin/header');
        $this->load->view('vadmin/domains/domains', $t);
        $this->load->view('vadmin/footer');
    }

    function themes()
    {
        $this->load->helper('string');
        $t["themes"] = $this->domains->getAllThemes();
        $this->load->view('vadmin/header');
        $this->load->view('vadmin/domains/themes', $t);
        $this->load->view('vadmin/footer');
    }

    function moods()
    {
        $this->load->helper('string');
        $t["moods"] = $this->domains->getAllMoods();
        $this->load->view('vadmin/header');
        $this->load->view('vadmin/domains/moods', $t);
        $this->load->view('vadmin/footer');
    }

    function save()
    {
        $id = $this->input->post('id');
        $data["name"] = $this->input->post('name');
        $data["url"] = $this->input->post('url');
        $data["descriptions"] = $this->input->post('desc');

        if ($id)
        {
            $this->db->where("id", $id);
            $this->db->update('domains', $data);
        }
        else
        {
            $this->db->insert('domains', $data);
        }

        echo json_encode(["success" => TRUE]);
        exit;
    }

    function delete()
    {
        $id = $this->input->get("id");
        $this->db->where("id", $id);
        $this->db->delete('domains');

        redirect("/vadmin/domain_management/domains");
    }

    function save_theme()
    {
        $id = $this->input->post('id');
        $data["name"] = $this->input->post('name');
        $data["descriptions"] = $this->input->post('desc');

        if ($id)
        {
            $this->db->where("id", $id);
            $this->db->update('design_themes', $data);
        }
        else
        {
            $this->db->insert('design_themes', $data);
        }

        echo json_encode(["success" => TRUE]);
        exit;
    }

    function delete_theme()
    {
        $id = $this->input->get("id");
        $this->db->where("id", $id);
        $this->db->delete('design_themes');

        redirect("/vadmin/domain_management/themes");
    }

    function save_mood()
    {
        $id = $this->input->post('id');
        $data["name"] = $this->input->post('name');
        $data["descriptions"] = $this->input->post('desc');

        if ($id)
        {
            $this->db->where("id", $id);
            $this->db->update('design_moods', $data);
        }
        else
        {
            $this->db->insert('design_moods', $data);
        }

        echo json_encode(["success" => TRUE]);
        exit;
    }

    function delete_moods()
    {
        $id = $this->input->get("id");
        $this->db->where("id", $id);
        $this->db->delete('design_moods');

        redirect("/vadmin/domain_management/moods");
    }

    function upload()
    {
        $directory = FCPATH . 'uploads/';
        $this->load->library('uploader');
        $data = $this->uploader->upload($directory);

        $this->domains->save_design($data);

        echo json_encode(["id" => $data["id"], "session_id" => $data["session_id"], "filename" => $data["filename"]]);
        exit;
    }

    function finish_upload()
    {
        $ids = $this->input->post("ids");
        $themes = $this->input->post("themes");
        $moods = $this->input->post("moods");

        foreach ($ids as $id)
        {
            $data["themes"] = json_encode($themes);
            $data["moods"] = json_encode($moods);

            $this->db->where("id", $id);
            $this->db->update("designs", $data);
        }


        echo json_encode(["success" => TRUE]);
        exit;
    }

    function delete_design()
    {
        $id = $this->input->get("id");
        $this->db->where("id", $id);
        $this->db->delete("designs");

        redirect("vadmin/domain_management/designs");
    }

}
