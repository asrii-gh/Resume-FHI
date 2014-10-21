<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employer extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('Template', 'form_validation', 'session'));
        $this->load->model(array('EmployerModel'));
        $this->load->helper('url');
    }

    /**
     * @description:    Loads the default template
     * @param:          string     Sets the title of the page. 
     * @author:         Rhai
    */

    public function load_template($title){

        $this->template->write('title', $title);
        $this->template->write('description', '');
        $this->template->write('keywords', '');
        $this->template->add_css('resources/css/login/style.css', TRUE);
        $this->template->add_css('resources/css/employer/style.css', TRUE); 
        $this->template->add_css('resources/css/applicant-registration/style-4.css', TRUE);
    }

    /**
     * @description:    Display the initial page for the employer.`
     * @author:         Rodge/Rhai
    */

    public function index(){

        if ($this->session->userdata('login_state') == TRUE) {
            redirect('employer/employer_dashboard', 'refresh');
        } else {
            $this->load_template('Employer Login');
            $this->template->write_view('main_content', 'employer/employer_login_view');
        }  

        $this->template->render();
    }

    /**
     * @description:    Displays the employer registration form.
     * @author:         Rhai
    */

    function registration(){

        if ($this->session->userdata('login_state') == TRUE) {
            redirect('employer/employer_dashboard', 'refresh');
        } else {
            $this->load_template('Employer Login');
            $this->template->write_view('main_content', 'employer/registration');
        }
        

        $this->template->render();
    }

    /**
     * @description:    Hold's employer id stored in a session.
     * @author:         Rodge
    */

    function page_session(){
        if($this->session->userdata('login_state') == FALSE){
            redirect('employer', 'refresh');
        }else{
            $employer_id = $this->session->userdata('employer_id');

            $data['information'] = $this->EmployerModel->get_industry_data($employer_id);
            $data['employer_id'] = $employer_id ;
            return $data;
        }
    }

    /**
     * @description:    Validates employer login credentials.
     * @author:         Rodge
    */

    public function employer_login_validation(){

        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|callback_db_validation');

        
        if($this->form_validation->run() == FALSE ){
            $this->index();
        }else{
            redirect('employer/employer_dashboard', 'refresh');
        }
    }

    /**
     * @description:    Serves as callback function for password.
     * @param:          string      Retrieves employer password.
     * @author:         Rodge
    */

    function db_validation($password) {

        $email = $this->input->post('email');
       
        $result = $this->EmployerModel->check_credentials($email, $password);
        $emp_id = $result['emp_id'];
        $user_type_id = $result['user_type_id'];

        if($result) {
            $loggeduser = array(
                'login_state' => TRUE,
                'emp_id' => $emp_id,
                'user_type_id' => $user_type_id
            );
            $this->session->set_userdata($loggeduser);
            return TRUE;
        } else {
            $this->form_validation->set_message('db_validation', 'Invalid username or password.');
            return FALSE;
        }
    }

    /**
     * @description:    Validates employer informations.
     * @author:         Rodge/Rhai
    */

    public function employer_validation(){
        // RELOAD TEMPLATE
        $this->load_template('employer');

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

        if ($this->form_validation->run() == FALSE) {
            $this->template->write_view('main_content', 'employer/employer_view');
        } else {   
            // Image Upload to a folder
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

            $result = $this->EmployerModel->insert($data, 'inactive');

            if($result == 0){
                //  Auto login after registration complete

                $result = $this->EmployerModel->check_credentials($this->session->userdata('username'), $this->session->userdata('password'));
                $emp_id = $result[0]['emp_id'];
                $user_type_id = $result[0]['user_type_id'];

                $loggeduser = array(
                    'login_state' => TRUE,
                    'emp_id' => $emp_id,
                    'user_type_id' => $user_type_id
                );

                $this->session->set_userdata($loggeduser);
                redirect('employer', 'refresh');
                $this->session->unset_userdata($data);

            }else{
                redirect('employer', 'refresh');
            }
            
        }

        $this->template->render();
    }

    /**
     * @description:    Serves as initial page for the employer after login.
     * @author:         Rodge
    */

    public function employer_dashboard(){

        $data = $this->page_session(); // Session

        $this->load_template('Employer');

        $data['information'];
        $emp_id = $data['employer_id'];
        $data['result'] = $this->EmployerModel->employer_profile($emp_id);
        $this->template->write_view('main_content', 'employer/employer_home_view', $data);

        $this->template->render();
    }

    /**
     * @description:    Sorts the employer job posts by date and industry.
     * @param:          string      Gets the value of the sorted type from the employer dashboard dropdown list.
     * @author:         Rhai/Rodge
    */

    public function industry_sorter($value) {

        $data = $this->page_session(); // Session
        $this->load_template('Employer Dashboard');
        $this->template->add_css('resources/css/employer/style.css', TRUE); 

        $employer_id = $data['employer_id'];
        
        switch ($value) {

            case 'Date':
                $data['result'] = $this->EmployerModel->sort_date($employer_id);
                $this->template->write_view('main_content', 'employer/employer_home_view', $data);
                break;

            case 'Industry':
                $data['result'] = $this->EmployerModel->sort_industry($employer_id);
                $this->template->write_view('main_content', 'employer/employer_home_view', $data);
                break;
            
            default:
                redirect('employer/employer_profile', 'refresh');
                break;
        }

        $this->template->render();
    }

    /**
     * @description:    Retrieves employer job posts.
     * @param:          integer     Gets the specific employer job post by job id.
     * @author:         Rodge
    */

    public function view_employer_job($job_id){

        $data = $this->page_session(); // Session

        $this->load_template('View Job Post');
        $this->template->add_css('resources/css/employer/style.css', TRUE);        

        $data['rows'] = $this->EmployerModel->specific_post($job_id);

        $this->template->write_view('main_content', 'employer/job_view', $data);
        $this->template->render();
    }

    /**
     * @description:    post_job_view controller
     * @param:          Renders the initial view for the employers job posting.
     * @author:         Rodge
     */
    public function post_job(){
    
        $data = $this->page_session(); // Session

        $this->load_template('Post Job');

        $data['rows'] = $this->EmployerModel->benefits_list();
        
        $this->template->write_view('main_content', 'employer/post_job_view', $data);
        $this->template->render();
    }

    /**
     * @description:    Callback function for post_vob_validation() function.
     * @param:          It checks if the minimum salaray range is higher than the maximum salary range.
     * @author:         Rodge
    */
    public function post_job_validation(){

        $data = $this->page_session(); // Session

        $this->load_template('Post Job');

        //Validation start here!
        $this->form_validation->set_rules('position', 'Position', 'required|trim|encode_php_tags');
        $this->form_validation->set_rules('industry', 'Industry', 'required|trim');
        $this->form_validation->set_rules('job_description', 'Job Description', 'required|trim|encode_php_tags');
        $this->form_validation->set_rules('range_min', 'Minimun Range', 'required|callback_range|trim|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('range_max', 'Maximum Range', 'required|trim|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('position_level', 'Position Level', 'required|trim');
        $this->form_validation->set_rules('company_location', 'Company Location', 'required|trim|encode_php_tags');
        $this->form_validation->set_rules('benefits_chk[]', 'Benefits', 'required');
        $this->form_validation->set_rules('benefits_others', 'Others', 'trim|encode_php_tags');


        $employer_id = $data['employer_id'];

        $this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>');

        if($this->form_validation->run() == FALSE){

            $this->post_job();
        }else{

            $benefits_others = $_POST['benefits_others'];

            if($benefits_others == NULL){
                $benefits = implode(", ", $_POST['benefits_chk']);
            }else{
                $benefits = implode(", ", $_POST['benefits_chk']).", ".$benefits_others;
            }
            

            $data['position'] = $_POST['position'];
            $data['employer_id'] = $employer_id;
            $data['industry'] = $_POST['industry'];
            $data['job_description'] = $_POST['job_description'];
            $data['min_salary'] = $_POST['range_min'];
            $data['max_salary'] = $_POST['range_max'];
            $data['position_level'] = $_POST['position_level'];
            $data['company_location'] = $_POST['company_location'];
            $data['benefits'] = $benefits;
            $data['date_uploaded'] = date('Y-m-d H:i:s');
            $data['date_updated'] = date('Y-m-d H:i:s');  

            $result = $this->EmployerModel->post_job($data);
            redirect('employer/view_employer_job/' . $result['job_id'], 'refresh');

        }

        $this->template->render();
    }

    /**
     * @description:    Retrives specific employer job post for updates.
     * @param:          integer     Gets the specific employer job id.
     * @author:         Rodge
    */

    public function update_job($job_id){

        $data = $this->page_session(); // Session

        $this->load_template('Update Posted Job');

        $data['row'] = $this->EmployerModel->specific_post($job_id);
        $data['benefits'] = $this->EmployerModel->benefits_list();
        // print_r($data); exit();

        $this->template->write_view('main_content', 'employer/update_job_view', $data);
        $this->template->render();
    }

    /**
     * @description:    Validates updated employer job post.
     * @param:          integer        Gets the specific job id of the employer job post.
     * @author:         Rodge
    */

    public function update_job_validation($job_id){

        $data = $this->page_session(); // Session

        $this->load_template('Update Job');

        //Validation start here!
        $this->form_validation->set_rules('position', 'Position', 'required|trim|encode_php_tags');
        $this->form_validation->set_rules('industry', 'Industry', 'required|trim');
        $this->form_validation->set_rules('job_description', 'Job Description', 'required|trim|encode_php_tags');
        $this->form_validation->set_rules('range_min', 'Minimun Range', 'required|callback_range|trim|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('range_max', 'Maximum Range', 'required|trim|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('position_level', 'Position Level', 'required|trim');
        $this->form_validation->set_rules('company_location', 'Company Location', 'required|trim|encode_php_tags');
        $this->form_validation->set_rules('benefits_chk[]', 'Benefits', 'required');
        $this->form_validation->set_rules('benefits_others', 'Others', 'trim|encode_php_tags');

        $this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>');

        if($this->form_validation->run() == FALSE){
            $this->post_job();
        }else{
            $employer_id = $data['employer_id']; 
            $benefits = implode(", ", $_POST['benefits_chk']).", ".$_POST['benefits_others'];

            $data['job_id'] = $job_id;
            $data['position'] = $_POST['position'];
            $data['employer_id'] = $employer_id;
            $data['industry'] = $_POST['industry'];
            $data['job_description'] = $_POST['job_description'];
            $data['min_salary'] = $_POST['range_min'];
            $data['max_salary'] = $_POST['range_max'];
            $data['position_level'] = $_POST['position_level'];
            $data['company_location'] = $_POST['company_location'];
            $data['benefits'] = $benefits;
            $data['date_uploaded'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');  

            $result = $this->EmployerModel->update_job($data, $job_id);
            redirect('employer/view_employer_job/' . $job_id, 'refresh');

        }

        $this->template->render();
    }

    /**
     * @description:    Destroy/Unset session per user.
     * @author:         Rodge
    */

    public function logout() {
        $this->session->sess_destroy();
        redirect('employer', 'refresh');
    }

    /** 
     * List of Callback Functions
    **/

    /**
     * @description:    Serves as callback function for form validation.
     * @param:          string      Sets specific fields in the registration to be required.
     * @author:         Rhai
    */

    function required($string){

        if ($string == "" || $string == null) {
            $this->form_validation->set_message('required', '%s is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * @description:    Serves as callback function for form validation.
     * @param:          string      Checks the upload file field in registration page if null or not.
     * @author:         Rhai
    */

    function check_upload($string){

        if (empty($_FILES['picture_logo']['name'])) {
            $this->form_validation->set_message('check_upload', '%s is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * @description:    Serves as callback function for form validation.
     * @param:          string      Checks the confirmation field in the registration if matches the password field.
     * @author:         Rhai
    */

    function check_confirmpassword($confirmpassword){
        $password = $this->input->post('password');

        if ($password != $confirmpassword) {
            $this->form_validation->set_message('check_confirmpassword', 'Password mismatch.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * @description:    Serves as callback function for form validation.
     * @param:          string      Sets specific fields in the registration page to only allow alphabet with spaces.
     * @author:         Rhai
    */

    function alpha_space($str_in){
        if (! preg_match("/^([a-z_ ])+$/i", $str_in)) {
            $this->form_validation->set_message('alpha_space', '%s may only contain letters.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * @description:   Serves as callback function for form validation.
     * @param:         string      Sets specific fields in the registration page to only allow integers.
     * @author:        Rhai
    */

    function number($string){
        if (! preg_match("/^([0-9])+$/i", $string)) {
            $this->form_validation->set_message('number', '%s may only contain numbers.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * @description:    Callback function for post_vob_validation() function.
     * @param:          It checks if the minimum salaray range is higher than the maximum salary range.
     * @author:         Rodge
    */

    function range($min_range){

        $data = $this->page_session(); // Session

        $max_range = $_POST['range_max']; 
        if($min_range >= $max_range){
            $this->form_validation->set_message('range', 'Minimum salary range is higher than the Maximum salary range.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}