<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdmController extends CI_Controller {
    
    var $sess = array();
    var $menu = array();

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('auth')) {
            redirect('login', 'refresh');
        } else {
            $session = json_decode(json_encode(unserialize(base64_decode($this->session->userdata('auth')))));
            $this->sess = $session;
            
            $this->load->model('su/mRolePerms');
            $this->menu = $this->mRolePerms->getAdminMenu($session->id);

            if ($session->su == 1)
                Redirect('su/dashboard', 'refresh');

            // ACL Validation
            $config = array('userID' => $this->sess->id);
            $this->load->library('acl', $config);

            $access = $this->uri->segment(2) . '_' . $this->uri->segment(3);
            if (!$this->acl->hasPermission($access) && $this->uri->segment(3)!='')            
                Redirect('admin/forbid');
            
                        
        }
    }
}    