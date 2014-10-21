<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('Template'));
        $this->load->library('form_validation');
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
        $this->template->add_css('resources/css/home/style.css', TRUE);
    }

     public function index(){ 

        $this->load_template("Home");

        $data['result'] = $this->EmployerModel->all_job_posts();

        $this->template->write_view('main_content', 'home_page/home', $data);
        $this->template->render();
    }

}