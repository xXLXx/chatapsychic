<?php

class affiliates extends CI_Model {

    function getAll()
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
        return $all_results;
    }
    
    function getAllProducts()
    {
        $query = $this->db->query
                ("
                    SELECT
                            banners.*,
                            CASE WHEN thumb_pic IS NULL 
                                    THEN '/media/images/no_profile_image.jpg'
                                    ELSE CONCAT('/media/uploads/products/', thumb_pic)
                            END AS 'thumb_pic'
                    FROM
                            banners
					
			");


        $all_results = $query->result_array();
        return $all_results;
    }

    function request_to_promote($product_id, $is_available, $affiliate_id, $timestamp){
        $query = $this->db->query
                ("
                    UPDATE banners
                    SET
                      is_available = " . $is_available . ",
                      requested_by = " . $affiliate_id . ",
                      request_date = '" . $timestamp . "'
                    WHERE id = " . $product_id . "
                ");
        return $query;
    }

    function getProductsByPage($numProductsPerPage, $currPage){
        $totalRowsQuery = $this->db->query
        ("
                    SELECT COUNT(*) AS total_products
                    FROM banners
        ");

        $temp_arr = $totalRowsQuery->result_array();
        $totalRows = $temp_arr[0]['total_products'];
        $totalPages = ceil($totalRows/$numProductsPerPage);

        // set trappings for $currPage
        if($currPage === NULL || ctype_alpha($currPage) || $currPage < 1){
            $currPage = 1;
        }elseif($currPage > $totalPages){
            $currPage = $totalPages;
        }

        $offset = $numProductsPerPage * ($currPage - 1);

        $query = $this->db->query
        ("
                    SELECT
                            banners.*,
                            CASE WHEN thumb_pic IS NULL
                                    THEN '/media/images/no_profile_image.jpg'
                                    ELSE CONCAT('/media/uploads/products/', thumb_pic)
                            END AS 'thumb_pic'
                    FROM
                            banners
					LIMIT {$numProductsPerPage} OFFSET {$offset}
        ");

        return ['query_results' => $query->result_array(), 'total_pages' => $totalPages, 'current_page' => $currPage];
    }


    function save_attachments(&$data)
    {
        $product_id = $data['params']['product_id'];
        if ($product_id > 0)
        {
            // update here
        }

        $session_id = $data['params']['session_id'];
        $this->load->library('session');
        $this->session->set_userdata(array("session_id" => $session_id));
        
        $insert = array("image_url" => $data['filename'], "sessionid" => $session_id);
        
        if ($this->db->insert('banners', $insert))
        {
            $data['product_id'] = $this->db->insert_id();
            return true;
        }
    }
}
