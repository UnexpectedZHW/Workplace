<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent:: __construct();
        
        if ($this->session->userdata('auth')) {            
            $session = json_decode(json_encode(unserialize(base64_decode($this->session->userdata('auth')))));
            if($session->su==1)
                Redirect('su/dashboard');
            else Redirect('admin');
        }
    }

    public function index() {
        $post = $this->input->post();
        $data['post'] = $post;
        $data['error'] = null;
        
        if ($post) {
            $this->load->model('auth');
            if ($this->auth->login()){
                
                if($this->auth->su)
                    Redirect('su/dashboard');
                else Redirect('admin');
                                
            }else
                $data['error'] = $this->auth->get_msg();
        }
        $this->load->view('admin/admin-login', $data);
    }
   
    
}
