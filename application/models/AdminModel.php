<?php

class AdminModel extends CI_Model {

	function __construct() {
        parent::__construct();
        $this->load->database();
    }

	function check_credentials($username, $password) {
	    $this->db->select('*');
	    $this->db->from('admin');
	    $this->db->where('username', $username);
	    $this->db->where('password', MD5($password));
	    $this->db->limit(1);
	    $query = $this->db->get();
	    if($query->num_rows() == 1) {
	    	return $query->result_array();
	    } else {
	    	return FALSE;
	    }
	}

	function update_employer_status($emp_id, $data) {
		$this->db = $this->load->database('default', TRUE);

		$data = array(
            'status' => $data['status'],
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('emp_id', $emp_id);
        $update = $this->db->update('employer', $data);

        if($update > 0) {
            return 0;
        }else{
            return 1;
        }
	}

	function select_job_industry() {
		$this->db = $this->load->database('default', TRUE);

		$query = $this->db->query("SELECT industry 
			FROM industry_tbl");

		return $query->result_array();
	}

    function add_job_post($data, $emp_id) {
        $this->db = $this->load->database('default', TRUE);

        $data = array(
            'emp_id' => $emp_id,
            'position' => $data['position'],
            'industry_id' => $data['industry'],
            'job_description' => $data['job_description'],
            'min_salary' => $data['min_salary'],
            'max_salary' => $data['max_salary'],
            'position_level' => $data['position_level'],
            'company_location' => $data['company_location'],
            'benefits' => $data['benefits'],
            'date_uploaded' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $insert = $this->db->insert('postjob_tbl', $data);

        if($insert > 0) {
            return 0;
        } else {
            return 1;
        }
    }

	function update_job_post($data, $job_id){
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
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('job_id', $job_id);
        $update = $this->db->update('postjob_tbl', $data);

        if($update > 0) {
            return 0;
        } else {
            return 1;
        }
    }

}