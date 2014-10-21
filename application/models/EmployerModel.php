<?php

class EmployerModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    /**
     * @description:    Retrieves the data depending on the query.
     * @author:         Rhai
    */

 	public function select() {
        $this->db = $this->load->database('default', TRUE);

        $query = $this->db->query("SELECT * FROM employer");

        return $query->result_array();
    }

    /**
     * @description:    Retrieves specific data.
     * @author:         Rhai
    */

    public function select_one($emp_id) {
        $this->db = $this->load->database('default', TRUE);

        $query = $this->db->query("SELECT * FROM employer WHERE emp_id = '" . $emp_id . "' ");

        return $query->row_array();
    }

    /**
     * @description:    Inserts new applicant information.
     * @param:          array      Retrieves data from the applicant view page
     * @author:         Rhai
    */

    public function insert($data, $status){
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
            'status' => $status,
            'user_type_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

            // md5($data_code)
        );

        $insert = $this->db->insert('employer', $data);

        if($insert > 0) {
        	return 0;
        }else{
        	return 1;
        }

    }

    /**
     * @description:    Selects all the industry data from the database.
     * @param:          integer     employer's id to display the industry information and job posts.
     * @author:         Rodge   
    */

    public function get_industry_data($employer_id){
        $this->db = $this->load->database('default', TRUE);

        $query = $this->db->query("SELECT * FROM employer WHERE emp_id = '".$employer_id."' ");

        return $query->row_array();
    }

    /**
     * @description:    Checks all the entered username and password of the user if it is existing.
     * @param:          string      Get's the username.
     * @param:          string      Get's the password.
     * @author:         Rhai
    */

    public function check_credentials($username, $password) {
        $this->db->select('*');
        $this->db->from('employer');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->row_array() ;
        } else {
            return FALSE;
        }
    }

    /**
     * @description:    Retrieves all the list of benefits data.
     * @author:         Rodge
    */

    public function benefits_list(){
        $this->db = $this->load->database('default', TRUE);

        $query = $this->db->query("SELECT benefits_list 
            FROM benefits_list_tbl 
            ORDER BY benefits_id ASC");

        return $query->result_array();
    }

    /**
     * @description:    Insert job post
     * @param:          Insert data from the industrys post_job_view page and insert it to the postjob_tbl table.
     * Author:          Rodge
    */

    public function post_job($data){
        $this->db = $this->load->database('default', TRUE);
        $data = array(
            'emp_id' => $data['employer_id'],
            'position' => $data['position'],
            'industry_id' => $data['industry'],
            'job_description' => $data['job_description'],
            'min_salary' => $data['min_salary'],
            'max_salary' => $data['max_salary'],
            'benefits' => $data['benefits'],
            'position_level' => $data['position_level'],
            'company_location' => $data['company_location'],
            'date_uploaded' => $data['date_uploaded'],
            'updated_at' => $data['date_updated']
            
        );

        $insert = $this->db->insert('postjob_tbl', $data);

        $query = $this->db->query("SELECT job_id FROM postjob_tbl ORDER BY job_id DESC LIMIT 1");
        return $query->row_array();
    }

    /**
     * @description:    Update specific job list of an industry.
     * @param:          array       Retrieves data from the industry page
     * @param:          integer     Retrieve data from the industry session id
     * @author:         Rodge
    */

    public function update_job($data, $job_id){
        $this->db = $this->load->database('default', TRUE);

        $data = array(

            'position' => $data['position'],
            'industry_id' => $data['industry'],
            'job_description' => $data['job_description'],
            'min_salary' => $data['min_salary'],
            'max_salary' => $data['max_salary'],
            'position_level' => $data['position_level'],
            'company_location' => $data['company_location'],
            'benefits' => $data['benefits'],
            'updated_at' => $data['updated_at']
        );
        $this->db->where('job_id', $job_id);
        $update = $this->db->update('postjob_tbl', $data);
    }

    /** 
     * @description:    Post all/Selected job post by the industry
     * @param:          It serves as a common model for employer.php model and Home.php controller that renders different job post.
     * @author:         Rodge/Rhai
    */
    public function employer_profile($employer_id){
        $query = $this->db->query("SELECT * 
            FROM postjob_tbl 
            AS tb1 
            INNER JOIN industry_tbl 
            AS tb2 
            ON tb1.industry_id = tb2.id 
            WHERE tb1.emp_id = '"  . $employer_id . "' 
            LIMIT 10 ");

        return $query->result_array();
    }

    /** 
     * @description:    Retrieve all the the latest job post.
     * @author:         Rodge/Rhai
    */

    public function all_job_posts() {

        $query = $this->db->query("SELECT * 
            FROM postjob_tbl 
            AS tb1 
            INNER JOIN industry_tbl 
            AS tb2 
            ON tb1.industry_id = tb2.id 
            INNER JOIN employer 
            AS tb3 
            ON tb1.emp_id = tb3.emp_id
            ORDER BY tb1.job_id ASC");

        return $query->result_array();
    }

    /** 
     * @description:      Retrieves specific post of the industry.
     * @author:           integer       Retrieves data from the industry session id.
     * @param :           Rodge
    */

    public function specific_post($job_id){
        $this->db = $this->load->database('default', TRUE);

        $query = $this->db->query("SELECT 
            tbl1.*, tbl2.*
            from postjob_tbl AS tbl1 
            INNER JOIN industry_tbl AS tbl2 
            ON tbl1.industry_id=tbl2.id WHERE job_id = '" . $job_id . "'");

        return $query->row_array();
    }

    /**
     * @description:    Sort posted job by date.
     * @param:          integer       Retrieves data from the industry session id.
     * @author:         Rhai/Rodge
    */

    public function sort_date($employer_id) {
        $query = $this->db->query("SELECT * 
            FROM postjob_tbl 
            AS tb1 
            INNER JOIN industry_tbl 
            AS tb2 
            ON tb1.industry_id = tb2.id 
            WHERE tb1.emp_id = '"  . $employer_id . "' 
            ORDER BY tb1.date_uploaded DESC ");

        return $query->result_array();
    }

    /**
     * @description:    Sort posted job by date.
     * @param:          integer       Retrieves data from the industry session id.
     * @author:         Rhai/Rodge
    */

    public function sort_industry($employer_id) {

        $query = $this->db->query("SELECT * 
            FROM postjob_tbl 
            AS tb1 
            INNER JOIN industry_tbl 
            AS tb2 
            ON tb1.industry_id = tb2.id 
            WHERE tb1.emp_id = '"  . $employer_id . "' 
            ORDER BY industry ASC ");

        return $query->result_array();
    }
}