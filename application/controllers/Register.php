<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {


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
        $this->template->add_js('resources/js/applicant.js', TRUE);
    }

    public function index(){

        if($this->session->userdata('login_state') == TRUE) {    
            $this->load_template('Profile');
            redirect('login/login_index', 'refresh');
        } else {
            $this->load_template('Register');
            $this->template->add_css('resources/css/applicant-registration/style-1.css', TRUE);
            $this->template->write_view('main_content', 'applicant/applicant_register');
        }

        $this->template->render();
    }

    public function profile(){
        // RELOAD TEMPLATE
        $this->load_template('Register'); 
        $this->template->add_css('resources/css/applicant-registration/style-1.css', TRUE);
        $this->template->add_css('resources/css/applicant-registration/style-2.css', TRUE);

        // VALIDATION
        $this->form_validation->set_rules('fullname', 'Name', 'trim|callback_required|callback_alpha_space');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[applicant.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'trim|required|callback_check_confirmpassword');

        // CHANGE THE COLOR OF THE VALIDATION MESSAGE
        $this->form_validation->set_error_delimiters('<p style="padding-top:1px; margin-bottom:0px; color:#ff6666;">', '</p>');      

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->write_view('main_content', 'applicant/applicant_register');
        }
        else
        {   
            $explodename = explode(" ", $this->input->post('fullname'));
            $count = count($explodename);
            if ($count == 1) {
                $lastname = "";
                $firstname = $this->input->post('fullname');
            } else {
                $firstname = implode(" ", (array_slice($explodename, 0, $count - 1)));
                $lastname = end($explodename);
            }

            $details = array(
                'lastname' => $lastname,
                'firstname' => $firstname,
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

        $this->session->set_userdata($details);
            $this->template->write_view('main_content', 'applicant/applicant_register2');
        }
            $this->template->render();
            
    }

    public function profile2() {
        $this->load_template('Register');
        $this->template->add_css('resources/css/applicant-registration/style-2.css', TRUE);
        $this->template->add_css('resources/css/applicant-registration/style-3.css', TRUE);

        // Note: city and gender not included in the validation
        $this->form_validation->set_rules('birthdate', 'Birth date', 'callback_required');
        $this->form_validation->set_rules('age', 'age', 'required');
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

        // CHANGE THE COLOR OF THE VALIDATION MESSAGE
        $this->form_validation->set_error_delimiters('<p style="padding-top:1px; margin-bottom:0px; color:#ff6666;">', '</p>'); 

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->write_view('main_content', 'applicant/applicant_register2');
        }
        else
        {   
            // Passing of data to session for temp storage

            if($this->input->post('visa_type') == "Others"){
                $visa = $this->input->post('visa_others');
            }else{
                $visa = $this->input->post('visa_type');
            }
            if($this->input->post('country') == "Philippines"){
                $city = $this->input->post('city');
            }else{
                $city = "";
            }

            $details = array(
                'birthdate' => $this->input->post('birthdate'),
                // 'age' => $this->input->post('age'),
                'genderRadio' => $this->input->post('genderRadio'),
                'height' => $this->input->post('height'),
                'weight' => $this->input->post('weight'),
                'visa_type' => $visa,
                'country' => $this->input->post('country'),
                'city' => $city,
                'phone' => $this->input->post('phone'),
                'mobile' => $this->input->post('mobile'),
                'qq' => $this->input->post('qq'),
                'skype' => $this->input->post('skype'),
                'preferred_industry' => $this->input->post('preferred-industry'),
                'position_title' => $this->input->post('position'),
                'expected_salary' => $this->input->post('expected-salary')
            );

            $this->session->set_userdata($details); 
            
            $this->template->write_view('main_content', 'applicant/applicant_register3_photo');  
        }
            $this->template->render();
    }

    public function profile3() {
        $this->load_template('Register');
        $this->template->add_css('resources/css/applicant-registration/style-1.css', TRUE);
        $this->template->add_css('resources/css/applicant-registration/style-2.css', TRUE);
        $this->template->add_css('resources/css/applicant-registration/style-3.css', TRUE);

        $this->form_validation->set_rules('image1', 'Upload photo', 'callback_check_upload');

        $this->form_validation->set_error_delimiters('<p style="padding-top:1px; margin-bottom:0px; color:#ff6666;">', '</p>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->write_view('main_content', 'applicant/applicant_register3_photo');
        } else {

            $name = $this->session->userdata('lastname') . $this->session->userdata('firstname');

            // Storing the image of applicants to temp file to view the image
            $path1 = realpath(APPPATH . '../resources/images/applicants') . "/" . $name . "_" . now() . "/";

            if(!is_dir($path1)) //create the folder if it's not already exists
            {
                mkdir($path1,0755,TRUE);
            }

            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $path1,
                'overwrite' => TRUE,
                'file_name' => 'image1'
            );

            $newpath = $name . "_" . now() . "/" . 'image1.jpg';

            $details = array(
                'picture_path' => $newpath
            );

            $this->session->set_userdata($details);

            $this->load->library('upload', $config);
            $this->upload->do_upload('image1');

            $this->template->write_view('main_content', 'applicant/applicant_preview');
        }

        $this->template->render();
    }

    public function skip() {
        $this->load_template('Register');
        $this->template->add_css('resources/css/applicant-registration/style-1.css', TRUE);

        $name = $this->session->userdata('lastname') . $this->session->userdata('firstname');
        $path1 = realpath(APPPATH . '../resources/images/applicants') . "/" . $name . "_" . now() . "/";

        if(!is_dir($path1)) //create the folder if it's not already exists
        {
            mkdir($path1,0755,TRUE);
        }

        $details = array(
            'picture_path' => null
        );

        $this->session->set_userdata($details);

        $this->template->write_view('main_content', 'applicant/applicant_preview');
        $this->template->render();
    }

    public function login() {
        $this->load_template('Login');

        $this->template->add_css('resources/css/login/style.css', TRUE);

        //Saving the data from the session to database

        //Personal Info
        $data['lastname'] = $this->session->userdata('lastname');
        $data['firstname'] = $this->session->userdata('firstname');
        $data['genderRadio'] = $this->session->userdata('genderRadio');
        $data['birthdate'] = $this->session->userdata('birthdate');
        // $data['age'] = $this->session->userdata('age');
        $data['height'] = $this->session->userdata('height');
        $data['weight'] = $this->session->userdata('weight');
        $data['visa_type'] = $this->session->userdata('visa_type');
        $data['country'] = $this->session->userdata('country');
        $data['city'] = $this->session->userdata('city');
        $data['phone'] = $this->session->userdata('phone');
        $data['mobile'] = $this->session->userdata('mobile');
        $data['qq'] = $this->session->userdata('qq');
        $data['skype'] = $this->session->userdata('skype');
        $data['email'] = $this->session->userdata('email');

        //Additional Info
        $data['preferred_industry'] = $this->session->userdata('preferred_industry');
        $data['position_title'] = $this->session->userdata('position_title');
        $data['expected_salary'] = $this->session->userdata('expected_salary');
        $data['username'] = $this->session->userdata('email');
        $data['password'] = $this->session->userdata('password');
        $data['picture_path'] = $this->session->userdata('picture_path');
        $data['created_at'] = $this->session->userdata('created_at');

        $result = $this->ApplicantModel->insert_personal_info($data);

        if($result == 0){
            //  Auto login after registration complete

            $result = $this->ApplicantModel->check_credentials($this->session->userdata('email'), $this->session->userdata('password'));
            $app_id = $result['app_id'];
            $user_type_id = $result['user_type_id'];
            
            if($result) {

                $loggeduser = array(
                    'login_state' => TRUE,
                    'app_id' => $app_id,
                    'user_type_id' => $user_type_id
                );
                
                $this->session->set_userdata($loggeduser);
                redirect('login/login_index', 'refresh');
                $this->session->unset_userdata($data);
            }

        }else{
            redirect('register/login', 'refresh');
        }

        $this->template->render();

    }

    // Callbacks

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

    function check_confirmpassword($confirmpassword){
        $password = $this->input->post('password');

        if ($password != $confirmpassword) {
            $this->form_validation->set_message('check_confirmpassword', 'Password mismatch.');
            return FALSE;
        } else {
            return TRUE;
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

    function check_upload($string){

        if (empty($_FILES['image1']['name'])) {
            $this->form_validation->set_message('check_upload', '%s is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function upload($file_name){
        $path = realpath(APPPATH . '../resources/images/applicants');

        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $path,
            'max_size' => 2000,
            'overwrite' => TRUE,
            'file_name' => $file_name
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload($file_name);
    }

}