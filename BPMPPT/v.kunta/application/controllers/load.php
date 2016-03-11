<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/admcontroller.php' );

class Load extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->output->enable_profiler(false);
    }
    
    function load_kab(){
        $this->load->model('admin/mkabupaten');
        
        $post = $this->input->post();
        $data['kab'] = $this->mkabupaten->get_all($post['prov']);   
        $data['post'] = $post;
        
        $this->load->view('ajax/load_kab', $data);
    }
    
    function load_skab(){
        $this->load->model('admin/mkabupaten');
        
        $post = $this->input->post();
        $data['kab'] = $this->mkabupaten->get_all($post['prov']);   
        $data['post'] = $post;
        
        $this->load->view('ajax/load_skab', $data);
    }
    
    function load_kec(){
        $this->load->model('admin/mkecamatan');
        
        $post = $this->input->post();
        $data['kec'] = $this->mkecamatan->get_all($post['prov'], $post['kab']); 
        $data['post'] = $post;
        
        $this->load->view('ajax/load_kec', $data);
    }
    
    function load_skec(){
        $this->load->model('admin/mkecamatan');
        
        $post = $this->input->post();
        $data['kec'] = $this->mkecamatan->get_all($post['prov'], $post['kab']); 
        $data['post'] = $post;
        
        $this->load->view('ajax/load_skec', $data);
    }
    
}

