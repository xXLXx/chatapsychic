<?php

class main extends CI_Controller {

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

    function set_status($status)
    {
        if ($status == "break")
        {
            $is_manual = true;
        }
        else
        {
            $is_manual = false;
        }
        $this->reader->set_status($status, $is_manual);
        redirect("/my_account");
    }

    function index()
    {
        $this->load->view('header');
        $this->load->view('my_account/header');        
        $page = $this->input->get('p');
        $numProductsPerPage = 10;
        
        $t["nav"] = $this->load->view("my_account/nav", ["steps" => 1], true);

        if ($this->member->data['member_type'] === 'affiliate' || $this->member->data['member_type'] === 'both')
        {
            $results_arr = $this->domains->getProductsByPage($numProductsPerPage, $page);
            $t['current_page'] = $results_arr['current_page'];
            $t['designs'] = $results_arr['query_results'];
            $t['total_pages'] = $results_arr['total_pages'];
            $t['results_arr'] = $results_arr;
            $t['domains'] = $this->domains->getAllDomains();
            $t['selected'] = $this->domains->getSelectedDomain();
            $t['has_requested'] = ($t['selected'] > 0) ? TRUE : FALSE;
            $gallery = $this->load->view('my_account/product_gallery', $t, true);
        }

        $t["gallery"] = $gallery;
        $this->load->view('my_account/main_client', $t);
        $this->load->view('my_account/footer');
        $this->load->view('footer');
    }

    function client_list()
    {
        $array['clients'] = $this->reader->get_clients();
        $this->load->view('header');
        $this->load->view('my_account/header');
        $this->load->view('my_account/client_list', $array);
        $this->load->view('my_account/footer');
        $this->load->view('footer');
    }

    function nrr($chat_id = null)
    {
        $this->load->model("chatmodel");
        if (!$chat_id)
        {
            $array['chat'] = null;
        }
        else
        {
            $this->chatmodel->setSession($chat_id);
            $array['chat'] = $this->chatmodel->object;
        }


        $array['readers'] = $this->member->get_used_readers();

        $this->load->view('header');
        $this->load->view('my_account/header');
        $this->load->view('my_account/nrr_form', $array);
        $this->load->view('my_account/footer');
        $this->load->view('footer');
    }

    function nrr_submit()
    {
        $this->form_validation->set_rules('reader', 'reader', 'required|trim');
        $this->form_validation->set_rules('type', 'Type', 'trim');
        $this->form_validation->set_rules('chat', 'Chat', 'trim');
        $this->form_validation->set_rules('slow_timeback', 'slow time back', 'trim');

        $this->form_validation->set_rules('disconnect', 'disconnect', 'trim');
        $this->form_validation->set_rules('disconnect_timeback', 'disconnect time back', 'trim');

        $this->form_validation->set_rules('unhappy', 'Unhappy', 'trim');
        $this->form_validation->set_rules('unhappy_timeback', 'unhappy time back', 'trim');
        $this->form_validation->set_rules('suggest', 'Suggestions', 'trim');

        if (!$this->form_validation->run())
        {
            $this->nrr();
        }
        else
        {
            $insert['reader_id'] = set_value('reader');
            $insert['member_id'] = $this->member->data['id'];

            $insert['chat_id'] = set_value('chat');

            $insert['type'] = set_value('type');

            $insert['slow_timeback'] = set_value('slow_timeback');

            $insert['disconnect'] = set_value('disconnect');
            $insert['disconnect_timeback'] = set_value('disconnect_timeback');

            $insert['unhappy'] = set_value('unhappy');
            $insert['unhappy_timeback'] = set_value('unhappy_timeback');

            $insert['suggest'] = set_value('suggest');

            $insert['date'] = date('Y-m-d G:i:s');

            $this->db->insert("nrr", $insert);

            $this->session->set_flashdata("response", "NRR form submitted.");

            redirect("/my_account");
        }
    }

    function nrr_chat_session($reader_id = null)
    {
        $chats = $this->member->get_chats($reader_id);

        echo json_encode($chats);
    }

    function check_email_price($string = null)
    {

        if ($this->input->post('available_for_email') == '1')
        {

            if ($string)
            {

                return true;
            }
            else
            {

                $this->form_validation->set_message('check_email_price', 'Please enter a cost per email');
                return false;
            }
        }
        else
        {

            return true;
        }
    }

    function testimonials()
    {
        $array['testis'] = $this->reader->get_testimonials();
        $this->load->view('header');
        $this->load->view('my_account/header');
        $this->load->view('my_account/testis_list', $array);
        $this->load->view('my_account/footer');
        $this->load->view('footer');
    }

    function testimonial_toggle($tid)
    {
        $testi = $this->reader->get_testimonials($tid);

        if ($testi['reader_approved'] == '1')
        {
            $update['reader_approved'] = 0;
        }
        else
        {
            $update['reader_approved'] = 1;
        }

        $this->db->where("id", $tid);
        $this->db->update("testimonials", $update);


        redirect("/my_account/main/testimonials");
    }

    function edit_profile()
    {

        $getCategories = $this->db->query("SELECT * FROM categories ORDER BY title ");
        $t['categories'] = $getCategories->result_array();

        if (!empty($_POST['categories']))
        {
            $registeredCategories = $_POST['categories'];
        }
        else
        {

            $getRegisteredCategories = $this->db->query("SELECT * FROM profile_categories WHERE profile_id = {$this->member->data['id']} ");
            $registeredCategories = array();

            foreach ($getRegisteredCategories->result_array() as $c)
            {
                $registeredCategories[] = $c['category_id'];
            }
        }

        $t['registered_categories'] = $registeredCategories;

        $this->load->view('header');
        $this->load->view('my_account/header');
        $this->load->view('my_account/edit_profile', $t);
        $this->load->view('my_account/footer');
        $this->load->view('footer');
    }

    function checkEmailEnabled($val = null)
    {

        if ($this->input->post('enable_email') == '1')
        {

            if (!trim($val))
            {

                $this->form_validation->set_message('checkEmailEnabled', "Please answer the total number of days to answer a question via email.");
                return false;
            }
            else
            {

                return true;
            }
        }
        else
        {

            return true;
        }
    }

    function save_profile()
    {
        $this->form_validation->set_rules('paypal_email', 'Paypal Email', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Re-Type Password', 'trim|matches[password]');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('dob_month', 'Month of Birth', 'required|trim');
        $this->form_validation->set_rules('dob_day', 'Day of Birth', 'required|trim');
        $this->form_validation->set_rules('dob_year', 'Year of Birth', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('biography', 'Biography', 'required|trim');
        $this->form_validation->set_rules('area_of_expertise', 'Area of Expertise', 'required|trim');
        $this->form_validation->set_rules('categories[]', "Categories", "required");

        $this->form_validation->set_rules('enable_email', 'Experience', 'trim');
        $this->form_validation->set_rules('email_total_days', 'Experience', 'trim|callback_checkEmailEnabled');

        if (!$this->form_validation->run())
        {

            $this->edit_profile();
        }
        else
        {

            // Insert member - profile_subcategories
            //

                $dob = set_value('dob_year') . "-" . set_value('dob_month') . "-" . set_value('dob_day');

            // Profle Image
            $mem_update = array();

            if (trim($_FILES['profile_image']['tmp_name']))
            {

                //--- Set unlimited memory for the GD pocess
                ini_set('memory_limit', '-1');

                // Configure the image uploading
                $config['upload_path'] = "./media/assets/";
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = time();

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('profile_image'))
                {
                    $this->session->set_flashdata('error', "Error uploading profile image: " . $this->upload->display_errors());
                }
                else
                {

                    $file = $this->upload->data();
                    $mem_update['profile_image'] = $file['file_name'];

                    //--- Fit the new image
                    $config['protocol'] = 'gd2';
                    $config['source_image'] = $file['full_path'];
                    $config['width'] = 200;
                    $config['height'] = 200;

                    $this->load->library('image_lib', $config);

                    if (!$this->image_lib->fit())
                    {

                        die("Image FIT error: " . $this->upload->display_errors());
                    }
                    else
                    {

                        // Remove old profile image here
                        $old_profile_path = trim("./media/assets/{$this->member->data['profile_image']}");

                        if (!empty($this->member->data['profile_image']))
                        {
                            if (file_exists($old_profile_path))
                            {
                                unlink($old_profile_path);
                            }
                        }
                    }
                }
            }

            // Create record
            //$insert['username'] = set_value('username');
            if (set_value('password'))
                $mem_update['password'] = md5(set_value('password'));
            $mem_update['first_name'] = set_value('first_name');
            $mem_update['last_name'] = set_value('last_name');
            $mem_update['gender'] = set_value('gender');
            $mem_update['dob'] = $dob;
            $mem_update['country'] = set_value('country');
            $mem_update['paypal_email'] = set_value('paypal_email');

            $this->db->where('id', $this->member->data['id']);
            $this->db->update('members', $mem_update);


            $update['id'] = $this->member->data['id'];
            $update['title'] = set_value('title');

            $update['biography'] = set_value('biography');
            $update['area_of_expertise'] = set_value('area_of_expertise');

            $update['enable_email'] = set_value('enable_email');
            $update['email_total_days'] = set_value('email_total_days');

            // Check to see if profile exists
            // If does NOT exist, add a new one

            if ($this->member->data['profile_id'])
            {

                $this->db->where('id', $this->member->data['profile_id']);
                $this->db->update('profiles', $update);
            }
            else
            {

                $this->db->insert('profiles', $update);
                $this->member->data['profile_id'] = $this->db->insert_id();
            }

            // Delete ALL current subcategories before adding new ones so we dont' create duplicates
            $this->db->where('profile_id', $this->member->data['profile_id']);
            $this->db->delete('profile_categories');

            // Insert subcategories
            foreach ($this->input->post('categories') as $category_id)
            {

                if (trim($category_id) && is_numeric($category_id))
                {

                    $insert = array();
                    $insert['profile_id'] = $this->member->data['profile_id'];
                    $insert['category_id'] = $category_id;

                    $this->db->insert('profile_categories', $insert);
                }
            }

            $this->load->model("messages_model");
            $this->messages_model->sendAdminMessage($this->member->data['id'], "Profile Edited", "Profile #" . $this->member->data['id'] . " updated.");


            // Redirect with success
            $this->session->set_flashdata('response', "Your expert profile has been saved!");

            redirect("/my_account");
        }
    }

}
