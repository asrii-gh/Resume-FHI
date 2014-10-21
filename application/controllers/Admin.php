<?php

class Admin extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->library(array('Template', 'form_validation'));
		$this->load->helper('url');
        $this->load->model('AdminModel','',TRUE);
        $this->load->model('ApplicantModel','',TRUE);
        $this->load->model('EmployerModel','',TRUE);
	}

    public function load_template($title){

        $this->template->write('title', $title);
        $this->template->add_css('resources/css/applicant-registration/style-4.css', TRUE);
        $this->template->add_css('resources/css/template_admin/style.css', TRUE);
        $this->template->add_css('resources/css/template_admin/applicant/style.css', TRUE);
        $this->template->add_css('resources/css/template_admin/admin_login.css', TRUE);
        $this->template->add_css('resources/css/template_admin/employer/style.css', TRUE);

        $this->template->add_js('resources/js/content_hover.js', TRUE);
        $this->template->add_js('resources/js/applicant.js', TRUE);
        $this->template->add_js('resources/js/jobpost.js', TRUE);
    }

	public function index() {

        $this->template->set_template('admin');
        $this->load_template('Admin Login');

        if ($this->session->userdata('login_state') == FALSE) {
            $this->template->write_view('main_content', 'admin/admin_login');
        } else {
            redirect('admin/admin_index', 'refresh');
        }

        $this->template->render();
	}

	public function admin_index() {
        $this->template->set_template('admin');
        $this->load_template('Admin');

        if ($this->session->userdata('login_state') == FALSE) {
          redirect('admin/index'); 
        } else {
            $this->template->write_view('main_content', 'admin/index');
        }
        
        $this->template->render();
	}

	public function verify_login() {

        $this->template->set_template('admin');
        $this->load_template('Admin Login');

        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');

        $this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>');

        if($this->form_validation->run() == FALSE) {
            $this->template->write_view('main_content', 'admin/admin_login');
        } else {
            redirect('admin/admin_index', 'refresh');
        }

        $this->template->render();
    }

    /** Applicant Functions/Methods Start **/

    function applicant_registration() {

        $this->template->set_template('admin');
        $this->load_template('Applicant Registration');

        $this->template->write_view('main_content', 'admin/applicant/applicant_registration');
        $this->template->render();
    }

    function applicant_validation() {
        $this->template->set_template('admin');
        $this->load_template('Applicant Registration');

        // VALIDATION
        $this->form_validation->set_rules('firstname', 'First name', 'trim|callback_required|callback_alpha_space');
        $this->form_validation->set_rules('lastname', 'Last name', 'trim|callback_required|callback_alpha_space');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[applicant.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|callback_required|min_length[6]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'trim|callback_required|callback_check_confirmpassword');
        $this->form_validation->set_rules('birthdate', 'Birth date', 'callback_required');
        $this->form_validation->set_rules('height', 'Height', 'trim|callback_required');
        $this->form_validation->set_rules('weight', 'Weight', 'trim|callback_required');
        $this->form_validation->set_rules('visa_type', 'Visa type', 'trim|callback_required');
        $this->form_validation->set_rules('country', 'Country', 'callback_required');
        $this->form_validation->set_rules('mobile', 'Mobile number', 'trim|callback_required|callback_number');
        $this->form_validation->set_rules('qq', 'QQ number', 'trim|callback_required|callback_number');
        $this->form_validation->set_rules('skype', 'Skype ID', 'trim|callback_required');
        $this->form_validation->set_rules('preferred-industry', 'Preferred Industry', 'callback_required');
        $this->form_validation->set_rules('position', 'Position', 'trim|callback_required|callback_alpha_space');
        $this->form_validation->set_rules('expected-salary', 'Expected Salary', 'trim|callback_required');
        $this->form_validation->set_rules('image', 'Upload photo', 'callback_check_upload_image');

        $this->form_validation->set_error_delimiters('<p style="padding-top:1px; margin-bottom:0px; color:#ff6666;">', '</p>'); 

        if ($this->form_validation->run() == FALSE) {
            $this->template->write_view('main_content', 'admin/applicant/applicant_registration');
        } else {

            $name = $this->input->post('lastname') . $this->input->post('firstname');

            $path1 = realpath(APPPATH . '../resources/images/applicants') . "/" . $name . "_" . now() . "/";

            if(!is_dir($path1)) { //create the folder if it's not already exists
            
                mkdir($path1,0755,TRUE);
            }

            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $path1,
                'overwrite' => TRUE,
                'file_name' => 'image1'
            );

            $newpath = $name . "_" . now() . "/" . 'image1.jpg';

            $this->load->library('upload', $config);
            
            $this->upload->do_upload('image');

            //Personal Info
            $data['lastname'] = $this->input->post('lastname');
            $data['firstname'] = $this->input->post('firstname');
            $data['genderRadio'] = $this->input->post('genderRadio');
            $data['birthdate'] = $this->input->post('birthdate');
            $data['height'] = $this->input->post('height');
            $data['weight'] = $this->input->post('weight');
            $data['visa_type'] = $this->input->post('visa_type');
            $data['country'] = $this->input->post('country');
            $data['city'] = $this->input->post('city');
            $data['phone'] = $this->input->post('phone');
            $data['mobile'] = $this->input->post('mobile');
            $data['qq'] = $this->input->post('qq');
            $data['skype'] = $this->input->post('skype');
            $data['email'] = $this->input->post('email');

            //Additional Info
            $data['preferred_industry'] = $this->input->post('preferred_industry');
            $data['position_title'] = $this->input->post('position_title');
            $data['expected_salary'] = $this->input->post('expected_salary');
            $data['username'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $data['picture_path'] = $newpath;
            $data['created_at'] = $this->input->post('created_at');

            $result = $this->ApplicantModel->insert_personal_info($data);

            if($result == 0){
                //  Auto login after registration complete

                $result = $this->ApplicantModel->check_credentials($this->input->post('email'),$this->input->post('password'));
                $app_id = $result['app_id'];
                $user_type_id = $result['user_type_id'];
                
                if($result) {

                    $loggeduser = array(
                        'login_state' => TRUE,
                        'app_id' => $app_id,
                        'user_type_id' => $user_type_id
                    );
                    
                    $id = $app_id . md5(mt_rand());

                    $this->session->set_userdata($loggeduser);
                    $this->session->set_flashdata('success_msg', 'Successfully created new applicant account.');
                    redirect('admin/applicant_profile/' . $id, 'refresh');
                    $this->session->unset_userdata($data);
                }

            }else{
                redirect('admin/applicant_registration', 'refresh');
            }

        }

        $this->template->render();
    }

    function test() {
        $this->template->set_template('admin');
        $this->load_template('Applicant List');

        $this->template->write_view('main_content', 'test');
        $this->template->render();
    }

    function applicant_list() {

        $this->template->add_css('//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css', TRUE);

        $this->template->set_template('admin');
        $this->load_template('Applicant List');

        $data['result'] = $this->ApplicantModel->select("SELECT * FROM applicant");

        $this->template->write_view('main_content', 'admin/applicant/applicant_list', $data);
        $this->template->render();
    }

    function applicant_profile($app_id) {

        $this->template->set_template('admin');
        $this->load_template('Applicant Profile');

        $split_id = substr($app_id, 0, -32);

        if (($this->ApplicantModel->select("SELECT * FROM applicant_education WHERE app_id = '" . $split_id . "' ") == null) && ($this->ApplicantModel->select("SELECT * FROM applicant_work WHERE app_id = '" . $split_id . "' ") == null)) {

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
                    'result' => $this->ApplicantModel->select("SELECT * FROM applicant WHERE app_id = '" . $split_id . "' "),
                    'educ_result' => $educ_result,
                    'work_result' => $work_result
                );

            } else if (($this->ApplicantModel->select("SELECT * FROM applicant_education WHERE app_id = '" . $split_id . "' ") != null) && ($this->ApplicantModel->select("SELECT * FROM applicant_work WHERE app_id = '" . $split_id . "' ") == null)) {
                
                // Retrieval of data for Education table
                $educ_result = $this->ApplicantModel->select("SELECT * FROM `applicant_education` WHERE `app_id` = '" . $split_id . "' ORDER BY `educ_id` DESC ");
                
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
                    'result' => $this->ApplicantModel->select("SELECT * FROM applicant WHERE app_id = '" . $split_id . "' "),
                    'educ_result' => $educ_result,
                    'work_result' => $work_result
                );

            } else if (($this->ApplicantModel->select("SELECT * FROM applicant_education WHERE app_id = '" . $split_id . "' ") == null) && ($this->ApplicantModel->select("SELECT * FROM applicant_work WHERE app_id = '" . $split_id . "' ") != null)) {

                // Retrieval of data for Work table
                $work_result = $this->ApplicantModel->select("SELECT * FROM `applicant_work` WHERE `app_id` = '" . $split_id . "' ORDER BY `work_id` DESC ");

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
                    'result' => $this->ApplicantModel->select("SELECT * FROM applicant WHERE app_id = '" . $split_id . "' "),
                    'educ_result' => $educ_result,
                    'work_result' => $work_result
                );

            } else {

                // Retrieval of data for Education table
                $educ_result = $this->ApplicantModel->select("SELECT * FROM `applicant_education` WHERE `app_id` = '" . $split_id . "' ORDER BY `educ_id` DESC ");

                // Retrieval of data for Work table
                $work_result = $this->ApplicantModel->select("SELECT * FROM `applicant_work` WHERE `app_id` = '" . $split_id . "' ORDER BY `work_id` DESC ");

                $data = array(
                    'result' => $this->ApplicantModel->select("SELECT * FROM applicant WHERE app_id = '" . $split_id . "' "),
                    'educ_result' => $educ_result,
                    'work_result' =>$work_result
                );

            }

        $this->template->write_view('main_content', 'admin/applicant/applicant_profile', $data);
        $this->template->render();
    }

    function edit_personal() {

        $this->load_template('Profile');

        if($this->input->post('country') == "Philippines"){
            $city = $this->input->post('city');
        }else{
            $city = "";
        }

        $app_id = $this->input->post('app_id');
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

        $result = $this->ApplicantModel->update_personal_info($app_id, $data);

        $id = $app_id . md5(mt_rand());

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Personal Information successfully updated.');
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        } else {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        }

        $this->template->render();

    }

    function edit_personal_status() {

        $this->load_template('Profile'); 

        $app_id = $this->input->post('app_id');
        $data['lastname'] = $this->input->post('lastname');
        $data['firstname'] = $this->input->post('firstname');
        $data['position_title'] = $this->input->post('position_title');
        $data['expected_salary'] = $this->input->post('expected_salary');
        $data['status'] = $this->input->post('status');

        $result = $this->ApplicantModel->update_personal_status($app_id, $data);

        $id = $app_id . md5(mt_rand());

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Personal Info Status successfully updated.');
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        } else {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
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

        $id = $app_id . md5(mt_rand());

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Educational Background successfully updated.');
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        } else {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
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

        $id = $app_id . md5(mt_rand());

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Work Experience successfully updated.');
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        } else {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
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

        $id = $data['app_id'] . md5(mt_rand());

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Successfully added new educational background.');
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        } else {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
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

        $id = $data['app_id'] . md5(mt_rand());

        if ($result == 0) {
            $this->session->set_flashdata('success_msg', 'Successfully added new work experience.');
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        } else {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        }
        
        $this->template->render();
    }

    function delete_education() {

        $this->load_template('Profile');

        $educ_id = $this->input->post('educ_id');

        $result = $this->ApplicantModel->delete_education_info($educ_id);

        $id = $this->input->post('app_id') . md5(mt_rand());

        if ($result == 0) {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        } else {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        }

        $this->template->render();
    }

    function delete_work() {

        $this->load_template('Profile');

        $work_id = $this->input->post('work_id');

        $result = $this->ApplicantModel->delete_work_info($work_id);

        $id = $this->input->post('app_id') . md5(mt_rand());

        if ($result == 0) {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        } else {
            redirect('admin/applicant_profile/' . $id . '', 'refresh');
        }

        $this->template->render();
    }

    /** Applicant Functions/Methods End **/


    /** Employer Function/Methods Start **/

    function employer_registration() {
        $this->template->set_template('admin');
        $this->load_template('Employer Registration');

        $this->template->write_view('main_content', 'admin/employer/employer_registration');
        $this->template->render();
    }

    function employer_validation(){

        $this->template->set_template('admin');
        $this->load_template('Employer Registration');

        $this->form_validation->set_rules('company_name', 'Company name', 'callback_required|trim');
        $this->form_validation->set_rules('industry', 'Industry', 'callback_required|trim');
        $this->form_validation->set_rules('country', 'Country', 'callback_required|trim|callback_alpha_space');
        $this->form_validation->set_rules('city', 'City', 'callback_required|trim|callback_alpha_space');
        $this->form_validation->set_rules('phone', 'Phone', 'callback_required|trim|callback_number');
        $this->form_validation->set_rules('mobile', 'Mobile', 'callback_required|trim|callback_number');
        $this->form_validation->set_rules('email', 'E-mail', 'callback_required|trim|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'callback_required|trim');
        $this->form_validation->set_rules('password', 'Password', 'callback_required|trim|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Password confirmation', 'callback_required|callback_check_confirmpassword'); 
        
        $this->form_validation->set_rules('picture_logo', 'Company logo', 'callback_check_upload');

        // CHANGE THE COLOR OF THE VALIDATION MESSAGE
        $this->form_validation->set_error_delimiters('<p style="padding-top:1px; margin-bottom:0px; color:#ff6666;">', '</p>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->write_view('main_content', 'admin/employer/employer_registration');
        }  else {   

            $company_name = $this->input->post('company_name');

            $path1 = realpath(APPPATH . '../resources/images/employer') . "/" . $company_name . "_" . now() . "/";

            if(!is_dir($path1)) //create the folder if it's not already exists
            {
                mkdir($path1,0755,TRUE);
            }

            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $path1,
                'overwrite' => TRUE,
                'file_name' => 'picture_logo'
            );

            $newpath = $company_name . "_" . now() . "/" . 'picture_logo.jpg';

            $this->load->library('upload', $config);
                
            $this->upload->do_upload('picture_logo');

            $data['company_name'] = $this->input->post('company_name');
            $data['industry'] = $this->input->post('industry');
            $data['country'] = $this->input->post('country');
            $data['city'] = $this->input->post('city');
            $data['phone'] = $this->input->post('phone');
            $data['mobile'] = $this->input->post('mobile');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['picture_logo'] = $newpath;

            $result = $this->EmployerModel->insert($data, 'active');

            if($result == 0){
                //  Auto login after registration complete

                $result = $this->EmployerModel->check_credentials($this->input->post('username'), $this->input->post('password'));
                $emp_id = $result['emp_id'];
                $user_type_id = $result['user_type_id'];

                if($result) {

                    $loggeduser = array(
                        'login_state' => TRUE,
                        'emp_id' => $emp_id,
                        'user_type_id' => $user_type_id
                    );
                    
                    $id = $emp_id . md5(mt_rand());

                    $this->session->set_userdata($loggeduser);
                    $this->session->set_flashdata('msg', 'Successfully created new employer account.');
                    redirect('admin/employer_profile/' . $id, 'refresh');
                    $this->session->unset_userdata($data);
                }

            }else{
                redirect('admin/employer_registration', 'refresh');
            }
   
        }

        $this->template->render();
    }

    function employer_list() {

        $this->template->set_template('admin');
        $this->load_template('Employer List');

        $data['result'] = $this->EmployerModel->select();

        $this->template->write_view('main_content', 'admin/employer/employer_list', $data);
        $this->template->render();
    }

    function employer_change_status($emp_id, $status) {

        $this->template->set_template('admin');
        $this->load_template('Employer List');
        
        if ($status == 'active') {
            $data['status'] = "active";
        } else {
            $data['status'] = "inactive";
        }

        $result = $this->AdminModel->update_employer_status($emp_id, $data);

        if ($result == 0) {
            $this->session->set_flashdata('msg', 'Employer status successfully updated.');
            redirect('admin/employer_list', 'refresh');
        } else {
            $this->session->set_flashdata('msg', 'Unable to update employer status.');
            redirect('admin/employer_list', 'refresh');
        }

        $this->template->render();
        
    }

    function employer_profile($emp_id) {

        $this->template->set_template('admin');
        $this->load_template('Employer List');

        $split_id = substr($emp_id, 0, -32);

        $data = array(
            'information' => $this->EmployerModel->select_one($split_id),
            'jobpost' => $this->EmployerModel->employer_profile($split_id)
        );

        $this->template->write_view('main_content', 'admin/employer/employer_profile', $data);
        $this->template->render();
    }

    /** Employer Function/Methods End **/


    /** Jobs Posted Function/Methods Start **/

    function jobs_list() {

        $this->template->set_template('admin');
        $this->load_template('Jobs Posted List');

        $data['jobpost'] = $this->EmployerModel->all_job_posts();

        $this->template->write_view('main_content', 'admin/jobs/jobs_posted_list', $data);
        $this->template->render();

    }

    function job_information($job_id) {

        $this->template->set_template('admin');
        $this->load_template('Job Information');

        $split_id = substr($job_id, 0, -32);

        $data['jobpost'] = $this->EmployerModel->specific_post($split_id);
        $data['information'] = $this->EmployerModel->select_one($data['jobpost']['emp_id']);

        $this->template->write_view('main_content', 'admin/jobs/job_view', $data);
        $this->template->render();

    }

    function job_new_post($job_id) {

        $this->template->set_template('admin');
        $this->load_template('Job Information');

        $split_id = substr($job_id, 0, -32);

        $data = array(
            'benefits' => $this->EmployerModel->benefits_list(),
            'emp_id' => $split_id
        );

        $this->template->write_view('main_content', 'admin/jobs/job_new_post', $data);
        $this->template->render();
    }

    function job_update_form($job_id){

        $this->template->set_template('admin');
        $this->load_template('Update Job');

        $split_id = substr($job_id, 0, -32);

        $data['jobpost'] = $this->EmployerModel->specific_post($split_id);
        $data['information'] = $this->EmployerModel->select_one($data['jobpost']['emp_id']);
        $data['benefits'] = $this->EmployerModel->benefits_list();
        $data['industries'] = $this->AdminModel->select_job_industry();

        $this->template->write_view('main_content', 'admin/jobs/job_update', $data);
        $this->template->render();
    }

    function job_add_update($id, $type){

        $this->template->set_template('admin');
        $this->load_template('Update Job');

        $benefits = implode(", ", $this->input->post('benefits_chk'));
        $random = md5(mt_rand());
        
        $data['position'] = $this->input->post('position');
        $data['industry'] = $this->input->post('industry');
        $data['job_description'] = $this->input->post('job_description');
        $data['min_salary'] = $this->input->post('range_min');
        $data['max_salary'] = $this->input->post('range_max');
        $data['position_level'] = $this->input->post('position_level');
        $data['company_location'] = $this->input->post('company_location');
        $data['benefits'] = $benefits; 

        if ($type == "update") {

            $result = $this->AdminModel->update_job_post($data, $id);

            if($result == 0){
                $this->session->set_flashdata('msg', 'Job Post successfully updated.');
                redirect('admin/job_information/'. $id . $random, 'refresh');
            }else{
                redirect('admin/job_information', 'refresh');
            }

        } else {

            $result = $this->AdminModel->add_job_post($data, $id);

            if($result == 0){
                $this->session->set_flashdata('msg', 'Successfully added new job post.');
                redirect('admin/employer_profile/'. $id . $random, 'refresh');
            }else{
                redirect('admin/job_new_post', 'refresh');
            }
        }

        $this->template->render();
    }

    /** Jobs Posted Function/Methods End **/




/*
=======================================================================================================
============================================== Callbacks ==============================================
=======================================================================================================
*/
    function check_database($password) {  

        $username = $this->input->post('username');
        
        $result = $this->AdminModel->check_credentials($username, $password);
        $id = $result[0]['id'];
        $user_type_id = $result[0]['user_type_id'];
        $firstname = $result[0]['firstname'];
        $lastname = $result[0]['lastname'];

        if($result) {
            $loggeduser = array(
                'login_state' => TRUE,
                'id' => $id,
                'user_type_id'  => $user_type_id,
                'firstname' => $firstname,
                'lastname' => $lastname
            );
            $this->session->set_userdata($loggeduser);
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password.');
            return FALSE;
        }
    }

    function check_upload($string){

        if (empty($_FILES['picture_logo']['name'])) {
            $this->form_validation->set_message('check_upload', '%s is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_upload_image($string){

        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_message('check_upload_image', '%s is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_confirmpassword($confirmpassword){
        $password = $this->input->post('password');

        if ($password != $confirmpassword) {
            $this->form_validation->set_message('check_confirmpassword', 'Password mismatch.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function status($id, $stat) {

        if ($this->session->userdata('login_state') == FALSE) {
          redirect('admin/');
        }
        $query = $this->ApplicantModel->saveStatus($id, $stat);
        if($query == 0) {
            redirect('admin/admin_index', 'refresh');
        } else {
            redirect('admin/admin_index', 'refresh');
        }
    }

    function required($string){

        if ($string == "" || $string == null) {
            $this->form_validation->set_message('required', '%s is required');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function alpha_space($str_in){
        if (! preg_match("/^([a-z_ ])+$/i", $str_in)) {
            $this->form_validation->set_message('alpha_space', '%s may only contain letters.');
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

    function logout() {
        $this->session->sess_destroy();
        redirect('admin/admin_index', 'refresh');
    }

}