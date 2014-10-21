<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


    function __construct() {

        parent::__construct();
        $this->load->library(array('Template', 'form_validation', 'Session'));
        $this->load->model(array('ApplicantModel'));
        $this->load->helper('url');
    }

    public function load_template($title){

        $this->template->write('title', $title);
        $this->template->write('description', '');
        $this->template->write('keywords', '');
        $this->template->add_css('resources/css/login/style.css', TRUE);
        $this->template->add_css('resources/css/applicant-registration/style-4.css', TRUE);
        $this->template->add_js('resources/js/content_hover.js', TRUE);
        $this->template->add_js('resources/js/applicant.js', TRUE);
    }

    public function index(){

        $this->load_template('Login');

        if ($this->session->userdata('login_state') == FALSE) {
            $this->template->write_view('main_content', 'home_page/login');
        } else {
            redirect('login/login_index', 'refresh');
        }

        $this->template->render();
    }

    public function login_index() {

        if ($this->session->userdata('login_state') == FALSE) {
            redirect('login/');
        } else {
            $app_id = $this->session->userdata('app_id');

            $this->load_template('Profile');

            if (($this->ApplicantModel->select("SELECT * FROM applicant_education WHERE app_id = '" . $app_id . "' ") == null) && ($this->ApplicantModel->select("SELECT * FROM applicant_work WHERE app_id = '" . $app_id . "' ") == null)) {

                //No data for educational background
                $educ_result = array(
                    0 => array(
                        'educ_id' => "",
                        'educational_attainment' => "",
                        'field_industry' => "",
                        'major' => "",
                        'year_graduated' => "",
                        'school_name' => "",
                        'school_location' => "",
                ));
                    
                // No data for work experience
               $work_result = array(
                    0 => array(
                        'work_id' => "",
                        'position_title' => "",
                        'years_of_experience' => "",
                        'work_description' => "",
                        'salary' => "",
                        'company_name' => "",
                        'company_address' => "",
                        'work_industry' => ""
                ));

                $data = array(
                    'result' => $this->ApplicantModel->select("SELECT * FROM applicant WHERE app_id = '" . $app_id . "' "),
                    'educ_result' => $educ_result,
                    'work_result' => $work_result
                );

            } else if (($this->ApplicantModel->select("SELECT * FROM applicant_education WHERE app_id = '" . $app_id . "' ") != null) && ($this->ApplicantModel->select("SELECT * FROM applicant_work WHERE app_id = '" . $app_id . "' ") == null)) {
                
                // Retrieval of data for Education table
                $educ_result = $this->ApplicantModel->select("SELECT * FROM `applicant_education` WHERE `app_id` = '" . $app_id . "' ORDER BY `educ_id` DESC ");
                
                // No data for work experience
                $work_result = array(
                    0 => array(
                        'work_id' => "",
                        'position_title' => "",
                        'years_of_experience' => "",
                        'work_description' => "",
                        'salary' => "",
                        'company_name' => "",
                        'company_address' => "",
                        'work_industry' => ""
                ));

                $data = array(
                    'result' => $this->ApplicantModel->select("SELECT * FROM applicant WHERE app_id = '" . $app_id . "' "),
                    'educ_result' => $educ_result,
                    'work_result' => $work_result
                );

            } else if (($this->ApplicantModel->select("SELECT * FROM applicant_education WHERE app_id = '" . $app_id . "' ") == null) && ($this->ApplicantModel->select("SELECT * FROM applicant_work WHERE app_id = '" . $app_id . "' ") != null)) {

                // Retrieval of data for Work table
                $work_result = $this->ApplicantModel->select("SELECT * FROM `applicant_work` WHERE `app_id` = '" . $app_id . "' ORDER BY `work_id` DESC ");

                //No data for educational background
                $educ_result = array(
                    0 => array(
                        'educ_id' => "",
                        'educational_attainment' => "",
                        'field_industry' => "",
                        'major' => "",
                        'year_graduated' => "",
                        'school_name' => "",
                        'school_location' => "",
                ));

                $data = array(
                    'result' => $this->ApplicantModel->select("SELECT * FROM applicant WHERE app_id = '" . $app_id . "' "),
                    'educ_result' => $educ_result,
                    'work_result' => $work_result
                );

            } else {

                // Retrieval of data for Education table
                $educ_result = $this->ApplicantModel->select("SELECT * FROM `applicant_education` WHERE `app_id` = '" . $app_id . "' ORDER BY `educ_id` DESC ");

                // Retrieval of data for Work table
                $work_result = $this->ApplicantModel->select("SELECT * FROM `applicant_work` WHERE `app_id` = '" . $app_id . "' ORDER BY `work_id` DESC ");

                $data = array(
                    'result' => $this->ApplicantModel->select("SELECT * FROM applicant WHERE app_id = '" . $app_id . "' "),
                    'educ_result' => $educ_result,
                    'work_result' =>$work_result
                );

            }
            
            $this->template->write_view('main_content', 'applicant/applicant_home', $data);
            $this->template->render();
        }

    }

    function verify_login() {

        $this->load_template('Login');

        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');

        // CHANGE THE COLOR OF THE VALIDATION MESSAGE
        $this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>'); 

        if ($this->form_validation->run() == FALSE){
            $this->template->write_view('main_content', 'home_page/login'); 
        } else {
            redirect('login/login_index', 'refresh');
        }

        $this->template->render();

    }

    function edit_personal() {

        $this->load_template('Profile');

        if($this->input->post('country') == "Philippines"){
            $city = $this->input->post('city');
        }else{
            $city = "";
        }

        $id = $this->input->post('app_id');
        $data['email'] = $this->input->post('email');
        $data['gender'] = $this->input->post('gender');
        $data['birthdate'] = $this->input->post('birthdate');
        // $data['age'] = $this->input->post('age');
        $data['height'] = $this->input->post('height');
        $data['weight'] = $this->input->post('weight');
        $data['mobile'] = $this->input->post('mobile');
        $data['phone'] = $this->input->post('phone');
        $data['qq'] = $this->input->post('qq');
        $data['skype'] = $this->input->post('skype');
        $data['age'] = $this->input->post('age');
        $data['country'] = $this->input->post('country');
        $data['city'] = $city;
        $data['visa_type'] = $this->input->post('visa_type');

        $result = $this->ApplicantModel->update_personal_info($id, $data);

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Personal Information successfully updated.');
            redirect('login/login_index', 'refresh');
        } else {
            redirect('login/login_index', 'refresh');
        }

        $this->template->render();

    }

    function edit_personal_status() {

        $this->load_template('Profile');

        $id = $this->input->post('app_id');
        $data['lastname'] = $this->input->post('lastname');
        $data['firstname'] = $this->input->post('firstname');
        $data['position_title'] = $this->input->post('position_title');
        $data['expected_salary'] = $this->input->post('expected_salary');
        $data['status'] = $this->input->post('status');

        $result = $this->ApplicantModel->update_personal_status($id, $data);

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Personal Info Status successfully updated.');
            redirect('login/login_index', 'refresh');
        } else {
            redirect('login/login_index', 'refresh');
        }

        $this->template->render();

    }

    function edit_education() {

        $this->load_template('Profile');
        
        if($this->input->post('field_of_industry') == "Others"){
            $field_of_industry = $this->input->post('other_field_of_industry');
        }else{
            $field_of_industry = $this->input->post('field_of_industry');
        }

        $app_id = $this->input->post('app_id');
        $educ_id = $this->input->post('educ_id');
        $data['school_name'] = $this->input->post('school_name');
        $data['field_of_industry'] = $field_of_industry;
        $data['educational_attainment'] = $this->input->post('educ_level');
        $data['major'] = $this->input->post('major');
        $data['year_graduated'] = $this->input->post('year_graduated');
        $data['school_location'] = $this->input->post('school_location');

        $result = $this->ApplicantModel->update_education_info($app_id, $educ_id, $data);

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Educational Background successfully updated.');
            redirect('login/login_index', 'refresh');
        } else {
            redirect('login/login_index', 'refresh');
        }
        
        $this->template->render();
    }

    function edit_work() {

        $this->load_template('Profile');

        $app_id = $this->input->post('app_id');
        $work_id = $this->input->post('work_id');
        $data['company_name'] = $this->input->post('company_name');
        $data['company_address'] = $this->input->post('company_address');
        $data['position_title'] = $this->input->post('position_title');
        $data['years_of_experience'] = $this->input->post('years_of_experience');
        $data['work_industry'] = $this->input->post('work_industry');
        $data['salary'] = $this->input->post('salary');
        $data['work_description'] = $this->input->post('work_description');

        $result = $this->ApplicantModel->update_work_info($app_id, $work_id, $data);

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Work Experience successfully updated.');
            redirect('login/login_index', 'refresh');
        } else {
            redirect('login/login_index', 'refresh');
        }
        
        $this->template->render();
    }

    function add_education() {

        $this->load_template('Profile');

        if($this->input->post('field_of_industry1') == "Others"){
            $field_of_industry = $this->input->post('other_field_industry1');
        }else{
            $field_of_industry = $this->input->post('field_of_industry1');
        }

        $data['app_id'] = $this->input->post('app_id');
        $data['school_name'] = $this->input->post('school_name');
        $data['field_industry'] = $field_of_industry;
        $data['educ_level'] = $this->input->post('educ_level');
        $data['major'] = $this->input->post('major');
        $data['year_graduated'] = $this->input->post('year_graduated');
        $data['school_country'] = $this->input->post('school_country');

        $result = $this->ApplicantModel->insert_educ_info($data);

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Successfully added new educational background.');
            redirect('login/login_index', 'refresh');
        } else {
            redirect('login/login_index', 'refresh');
        }
        
        $this->template->render();
    }

    function add_work() {

        $this->load_template('Profile');

        if($this->input->post('work_industry') == "Others"){
            $work_industry = $this->input->post('other_work_industry');
        }else{
            $work_industry = $this->input->post('work_industry');
        }

        $data['app_id'] = $this->input->post('app_id');
        $data['company_name'] = $this->input->post('company_name');
        $data['company_address'] = $this->input->post('company_address');
        $data['position_title'] = $this->input->post('position_title');
        $data['years_of_experience'] = $this->input->post('years_of_experience');
        $data['work_industry'] = $work_industry;
        $data['salary'] = $this->input->post('salary');
        $data['work_description'] = $this->input->post('work_description');

        $result = $this->ApplicantModel->insert_work_info($data);

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Successfully added new work experience.');
            redirect('login/login_index', 'refresh');
        } else {
            redirect('login/login_index', 'refresh');
        }
        
        $this->template->render();
    }

    function delete_education() {

        $this->load_template('Profile');

        $educ_id = $this->input->post('educ_id');

        $result = $this->ApplicantModel->delete_education_info($educ_id);

        if ($result == 0) {
            redirect('login/login_index', 'refresh');
        } else {
            redirect('login/login_index', 'refresh');
        }

        $this->template->render();
    }

    function delete_work() {

        $this->load_template('Profile');

        $work_id = $this->input->post('work_id');

        $result = $this->ApplicantModel->delete_work_info($work_id);

        if ($result == 0) {
            redirect('login/login_index', 'refresh');
        } else {
            redirect('login/login_index', 'refresh');
        }

        $this->template->render();
    }


// ============================================== Callbacks ==============================================

    function check_database($password) {
        
        $email = $this->input->post('email');
       
        $result = $this->ApplicantModel->check_credentials($email, $password);
        $app_id = $result[0]['app_id'];
        $user_type_id = $result[0]['user_type_id'];

        if($result) {
            $loggeduser = array(
                'login_state' => TRUE,
                'app_id' => $app_id,
                'user_type_id' => $user_type_id
            );
            $this->session->set_userdata($loggeduser);
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password.');
            return FALSE;
        }
    }

    function required($string){

        if ($string == "" || $string == null) {
            $this->form_validation->set_message('required', '%s is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function number($string){
        if (! preg_match("/^([0-9])+$/i", $string)) {
            $this->form_validation->set_message('number', '%s may only contain numbers.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login/login_index', 'refresh');
    }


}