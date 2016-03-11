<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Auth extends Core_Model {
    
    var $su = null;

    public function login() {
        
        $rules = array(
            array('field' => 'usr', 'label' => 'Username', 'rules' => 'required'),
            array('field' => 'pwd', 'label' => 'Password', 'rules' => 'required'),
        );

        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;
            return false;
        }
        
        $set = array(
            'username' => $this->input->post('usr', true),
            'password' => md5($this->input->post('pwd', true))
        );

        $result = $this->db->get_where('_user_data', $set, 1);
        if ($result->num_rows() > 0) {

            // save last login session
            $rst = $result->row();
            $session = base64_encode(serialize(array(
                'id'        => $rst->id,
                'lastlog'   => $rst->lastlog,
                'fullname'  => $rst->name,
                'su'        => $rst->is_superadmin 
            )));
            
            $this->su = ($rst->is_superadmin==1)?true:false;
            $this->session->set_userdata('auth',$session);

            // update db session
            $this->db->where('id', $rst->ID);

            $this->db->update('_user_data', array(
                'lastlog' => date('c'),
            ));

            // redirect to dashboard
            return true;
        } else {        
            $this->umsg = 'Username/Password yang anda inputkan tidak sesuai';
            return false;
        }
    }

}
