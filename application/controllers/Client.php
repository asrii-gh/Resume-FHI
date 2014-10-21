<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('Template', 'form_validation', 'Session'));
        $this->load->model(array('ClientModel'));
        $this->load->helper('url');
    }

    public function loadTemplate($title){

        $this->template->write('title', $title);
        $this->template->write('description', '');
        $this->template->write('keywords', '');
    }

    public function index(){
        $this->template->add_css('resources/css/client/style.css', TRUE);
        $data['msg']=NULL;

        if ($this->session->userdata('login_state') == TRUE) {
            $this->loadTemplate('Profile');
            redirect('login/loginIndex', 'refresh');
        } else {
            $this->loadTemplate('Employer Registration');
            $this->template->write_view('main_content', 'client/client_view');
        }

        $this->template->render();
    }

    public function client_validation(){
        // RELOAD TEMPLATE
        $this->loadTemplate('Client');

        $this->template->add_css('resources/css/client/style.css', TRUE);

        // VALIDATION
        $this->form_validation->set_rules('company_name', 'Company Name', 'callback_required|trim');
        $this->form_validation->set_rules('industry', 'Industry', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim|callback_alpha_space');
        $this->form_validation->set_rules('city', 'City', 'required|trim|callback_alpha_space');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|callback_number');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim|callback_number');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|callback_check_confirmpassword'); 
        $this->form_validation->set_rules('picture_logo', 'Picture logo', 'callback_check_upload');

        // CHANGE THE COLOR OF THE VALIDATION MESSAGE
        $this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>');

        if ($this->form_validation->run() == FALSE)
        {
            // echo "string";exit();
            $this->template->write_view('main_content', 'client/client_view');
        }
        else
        {   
            // Image Upload to a folder
            $company_name = $this->input->post('company_name');

            $path1 = realpath(APPPATH . '../resources/images/client') . "/" . $company_name . "_" . now() . "/";

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

            $data['company_name'] = $_POST['company_name'];
            $data['industry'] = $_POST['industry'];
            $data['country'] = $_POST['country'];
            $data['city'] = $_POST['city'];
            $data['phone'] = $_POST['phone'];
            $data['mobile'] = $_POST['mobile'];
            $data['email'] = $_POST['email'];
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
            $data['picture_logo'] = $newpath;

            $result = $this->ClientModel->insert($data);

            if($result == 0){
                $this->session->set_flashdata('success_msg', 'Registration complete. You can now login.');
                redirect('register/login', 'refresh');
            }else{
                redirect('client/client_view', 'refresh');
            }
            
        }

        $this->template->render();
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

        if (empty($_FILES['picture_logo']['name'])) {
            $this->form_validation->set_message('check_upload', '%s is required.');
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


    //Description:  post_job_view controller
    //Function:     Renders the initial view for the employers job posting.
    //Author:       Rodge
    public function post_job(){
        $this->loadTemplate('Post Job');
        $this->template->add_css('resources/css/client/style.css', TRUE);        
        
        $data['rows'] = $this->ClientModel->previous_job_post(null, 3); // Parameters: (Sorted Category, Limit Display)

        $this->template->write_view('main_content', 'client/post_job_view', $data);

        $this->template->render();
    }

    //Description:  Callback function for post_vob_validation() function.
    //Function:     It checks if the minimum salaray range is higher than the maximum salary range.
    //Author:       Rodge
    public function post_job_validation(){
        $this->loadTemplate('Post Job');
        $this->template->add_css('resources/css/client/style.css', TRUE); 

        //Validation start here!
        $this->form_validation->set_rules('position', 'Position', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('job_description', 'Job Description', 'required|trim');
        $this->form_validation->set_rules('range_min', 'Minimun Range', 'required|callback_range|trim');
        $this->form_validation->set_rules('range_max', 'Maximum Range', 'required|trim');

        $this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>');

        if($this->form_validation->run() == FALSE){
            $this->post_job();
        }else{
            $id=3;
            $benefits = implode(",", $_POST['life_insurance_chk']);

            $data['position'] = $_POST['position'];
            $data['employer_id'] = $id;
            $data['category'] = $_POST['category'];
            $data['job_description'] = $_POST['job_description'];
            $data['min_salary'] = $_POST['range_min'];
            $data['max_salary'] = $_POST['range_max'];
            $data['work_experience'] = $_POST['work_experience'];
            $data['work_location'] = $_POST['work_location'];
            $data['benefits'] = $benefits;
            $data['date_uploaded'] = date('Y-m-d H:i:s');
            $data['date_updated'] = date('Y-m-d H:i:s');  

            $result = $this->ClientModel->post_job($data);

            if($result == 0){
                redirect('client', 'refresh');
            }else{
                redirect('client/post_job', 'refresh');
            }
        }

        $this->template->render();
    }
    //Description:  Callback function for post_vob_validation() function.
    //Function:     It checks if the minimum salaray range is higher than the maximum salary range.
    //Author:       Rodge
    function range($min_range){
        $max_range = $_POST['range_max']; 
        if($min_range >= $max_range){
            $this->form_validation->set_message('range', 'Minimum salary range is higher than the Maximum salary range.');
            return FALSE;
        }else{
            return TRUE;
        }
    }


}