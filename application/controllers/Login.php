<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
	}
	
	public function index()
	{
        if($this->input->post('signin')){
            if($this->input->post('username') == 'absen' && $this->input->post('password') == 'sttsuntukjesus'){
                $this->session->set_userdata('login', true);
                $this->session->set_userdata('type', 'absen');
                redirect("Absensi");
            }else if($this->input->post('username') == 'admin' && $this->input->post('password') == 'sttsuntukjesus'){
                $this->session->set_userdata('login', true);
                $this->session->set_userdata('type', 'admin');
                redirect("Admin");
            }else
                redirect("Login");
        }else{
            $this->load->view('Login/login');
        }        
	}
}
