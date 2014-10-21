<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ClientController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('Template', 'form_validation'));
        $this->load->model(array('ClientModel'));
        // $this->load->helper('form','url');
    }

    public function loadTemplate($title){
        $this->template->add_css('resources/css/home.css', TRUE);
        $this->template->add_css('resources/css/home01.css', TRUE);
        $this->template->add_css('resources/css/home02.css', TRUE);
        $this->template->add_js('resources/js/template.js', TRUE);

        $this->template->write('title', $title);
        $this->template->write('description', '');
        $this->template->write('keywords', '');
    }

    public function index(){
        $this->loadTemplate('ClientController');
        $this->template->write_view('main_content', 'client/client_view');
        $this->template->render();
    }

    public function client_validation(){
        // RELOAD TEMPLATE
        //$this->loadTemplate('Register');

        // VALIDATION
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim');
        $this->form_validation->set_rules('industry', 'Industry', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required'); 
        $this->form_validation->set_rules('picture_logo', 'Picture Logo', 'trim');

        // CHANGE THE COLOR OF THE VALIDATION MESSAGE
        $this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>');    


        // Image Upload to a folder
        $config['upload_path'] = './resources/client/client_img/';
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        //$this->load->library('image_lib', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('client/client_view', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            //$this->load->view('upload_success', $data);
            $this->succes();
        }



        //STORE DATA FOR LATER USE
        $data['company_name'] = $_POST['company_name'];
        $data['industry'] = $_POST['industry'];
        $data['country'] = $_POST['country'];
        $data['city'] = $_POST['city'];
        $data['phone'] = $_POST['phone'];
        $data['mobile'] = $_POST['mobile'];
        $data['email'] = $_POST['email'];
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        //$data['picture_logo'] = $_FILES['picture_logo'];
        $date = new DateTime();
        // echo "<br/>". $date->format('Y-m-d H');
        // exit();
        $data['created_at'] = $date->format('Y-m-d H');
        $data['updated_at'] = $date->format('Y-m-d H'); //date_default_timezone_get()

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->write_view('main_content', 'client/client_view');
        }
        else
        {   
            $result = $this->ClientModel->insert($data); 

            if($result == 0) {
                $data['result'] = 0;
            }else{
                $data['result'] = 1;
            } 
            
             $this->template->write_view('main_content', 'home_page/home', $data); 
            //$this->succes(); 
        }
            $this->template->render();
            //$this->succes();
    }
    public function succes(){
        $this->load->view('client/succes_view');
    }


}