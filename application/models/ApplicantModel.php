<?php

class ApplicantModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

 	public function select($sql_query) {
        $this->db = $this->load->database('default', TRUE);

        $query = $this->db->query($sql_query);

        return $query->result_array();
    }

    public function insert_personal_info($data){
        $this->db = $this->load->database('default', TRUE);

        $data = array(
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'gender' => $data['genderRadio'],
            'birthdate' => $data['birthdate'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'visa_type' => $data['visa_type'],
            'location' => $data['country'],
            'hometown' => $data['city'],
            'phone' => $data['phone'],
            'mobile' => $data['mobile'],
            'qq' => $data['qq'],
            'skype' => $data['skype'],
            'email' => $data['email'],

            'language' => '',
            'english_level' => '',
            'type_of_interview' => '',
            'interview_hours' => '',
            'preferred_industry' => $data['preferred_industry'],
            'position_title' => $data['position_title'],
            'expected_salary' => $data['expected_salary'],
            'username' => $data['username'],
            'password' => md5($data['password']),
            'status_updateat' => '',
            'status' => '3',
            'picture_path' => $data['picture_path'],
            'remember_token' => '',
            'user_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        );

        $insert = $this->db->insert('applicant', $data);

        if($insert > 0) {
        	return 0;
        }else{
        	return 1;
        }

    }

    public function insert_educ_info($data){
        $this->db = $this->load->database('default', TRUE);

        $data = array(
            'app_id' => $data['app_id'],
            'educational_attainment' => $data['educ_level'],
            'field_of_industry' => $data['field_industry'],
            'major' => $data['major'],
            'year_graduated' => $data['year_graduated'],
            'school_name' => $data['school_name'],
            'school_location' => $data['school_country'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $insert = $this->db->insert('applicant_education', $data);

        if($insert > 0) {
            return 0;
        }else{
            return 1;
        }

    }

    public function insert_work_info($data){
        $this->db = $this->load->database('default', TRUE);

        $data = array(
            'app_id' =>  $data['app_id'],
            'company_name' => $data['company_name'],
            'company_address' => $data['company_address'],
            'position_title' => $data['position_title'],
            'years_of_experience' => $data['years_of_experience'],
            'work_industry' => $data['work_industry'],
            'salary' => $data['salary'],
            'work_description' => $data['work_description'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $insert = $this->db->insert('applicant_work', $data);

        if($insert > 0) {
            return 0;
        }else{
            return 1;
        }

    }

    public function update_personal_info($id, $data) {
        $this->db = $this->load->database('default', TRUE);

        $data = array(
            'email' => $data['email'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'visa_type' => $data['visa_type'],
            'location' => $data['country'],
            'hometown' => $data['city'],
            'phone' => $data['phone'],
            'mobile' => $data['mobile'],
            'qq' => $data['qq'],
            'skype' => $data['skype'],
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('app_id', $id);
        $update = $this->db->update('applicant', $data);

        if($update > 0) {
            return 0;
        }else{
            return 1;
        }
    }

    public function update_personal_status($id, $data) {
        $this->db = $this->load->database('default', TRUE);

        $data = array(
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'position_title' => $data['position_title'],
            'expected_salary' => $data['expected_salary'],
            'status' => $data['status'],
            'status_updateat' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('app_id', $id);
        $update = $this->db->update('applicant', $data);

        if($update > 0) {
            return 0;
        }else{
            return 1;
        }
    }

    public function update_education_info($app_id, $educ_id, $data) {
        $this->db = $this->load->database('default', TRUE);

        $data = array(
            'educational_attainment' => $data['educational_attainment'],
            'field_of_industry' => $data['field_of_industry'],
            'major' => $data['major'],
            'year_graduated' => $data['year_graduated'],
            'school_name' => $data['school_name'],
            'school_location' => $data['school_location'],
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('app_id', $app_id);
        $this->db->where('educ_id', $educ_id);
        $update = $this->db->update('applicant_education', $data);

        if($update > 0) {
            return 0;
        }else{
            return 1;
        }
    }

    public function update_work_info($app_id, $work_id, $data) {
        $this->db = $this->load->database('default', TRUE);

        $data = array(
            'company_name' => $data['company_name'],
            'company_address' => $data['company_address'],
            'position_title' => $data['position_title'],
            'years_of_experience' => $data['years_of_experience'],
            'work_industry' => $data['work_industry'],
            'salary' => $data['salary'],
            'work_description' => $data['work_description'],
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('app_id', $app_id);
        $this->db->where('work_id', $work_id);
        $update = $this->db->update('applicant_work', $data);

        if($update > 0) {
            return 0;
        }else{
            return 1;
        }
    }

    public function delete_education_info($educ_id) {
        $this->db = $this->load->database('default', TRUE);

        $this->db->where('educ_id', $educ_id);
        $delete = $this->db->delete('applicant_education'); 

        if($delete > 0) {
            return 0;
        }else{
            return 1;
        }
    }

    public function delete_work_info($work_id) {
        $this->db = $this->load->database('default', TRUE);

        $this->db->where('work_id', $work_id);
        $delete = $this->db->delete('applicant_work'); 

        if($delete > 0) {
            return 0;
        }else{
            return 1;
        }
    }

    public function check_credentials($username, $password) {
        $this->db->select('app_id, username, password, user_type_id');
        $this->db->from('applicant');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

}	