<?php

class ClientModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

 	public function select() {
        $this->db = $this->load->database('default', TRUE);

        $query = $this->db->query("SELECT * FROM clients");

        return $query->result_array();
    }

    public function insert($data){
        $this->db = $this->load->database('default', TRUE);

        $data = array(
            'company_name' => $data['company_name'],
            'industry' => $data['industry'],
            'country' => $data['country'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => md5($data['password']),
            'picture_logo' => $data['picture_logo'],
            'user_type_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

            // md5($data_code)
        );

        $insert = $this->db->insert('client', $data);

        if($insert > 0) {
        	return 0;
        }else{
        	return 1;
        }

    }

    //Description:  Insert job post
    //Function:     Insert data from the employers post_job_view page and insert it to the postjob_tbl table.
    //Author:       Rodge
    public function post_job($data){
        $this->db = $this->load->database('default', TRUE);
        $data = array(
            'employer_id' => $data['employer_id'],
            'position' => $data['position'],
            'category' => $data['category'],
            'job_description' => $data['job_description'],
            'min_salary' => $data['min_salary'],
            'max_salary' => $data['max_salary'],
            'benefits' => $data['benefits'],
            'work_experience' => $data['work_experience'],
            'work_location' => $data['work_location'],
            'date_uploaded' => $data['date_uploaded'],
            'date_updated' => $data['date_updated']
            
        );

        $insert = $this->db->insert('postjob_tbl', $data);

        if($insert > 0) {
            return 0;
        }else{
            return 1;
        }
    }

    //Description:  Post all/Selected job post by the employer
    //Function:     It serves as a common model for Client.php model and Home.php controller that renders different job post.
    //Author:       Rodge
    public function previous_job_post($category, $limit){
        $this->db = $this->load->database('default', TRUE);

        if ($limit != null) {
            $limit = "LIMIT " . $limit;
        } else {
            $limit = "";
        }

        if ($category != null) {
            $category = "where category = '" . $category . "'";
        } else {
            $category = "";
        }


        $query = $this->db->query("SELECT * from postjob_tbl AS tb1 INNER JOIN category_tbl AS tb2 ON tb1.category=tb2.id $category ORDER BY tb1.id DESC $limit ");

        return $query->result_array();
    }
}