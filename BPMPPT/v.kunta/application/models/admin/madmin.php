<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MAdmin extends CI_Model{
    
    function gantiPassword($data){
        $this->db->where('ID',$data['ID']);
        $query = $this->db->get('_user_data');
        if($query->num_rows() > 0){
            $row = $query->row_array();
            if($row['password'] == $data['oldPassword']){
                $this->db->where('ID',$data['ID']);
                $this->db->update('_user_data',array('password' => $data['password']));
                return "<div class='alert alert-success'>Sukses: Password berhasil di ubah</div>";
            }else{
                return "<div class='alert alert-danger'>Error: Password lama salah</div>";
            }
        }
    }
    
    function getProfile($data){
        $this->db->where('ID',$data);
        $query = $this->db->get('_user_data');
        return $query->result_array();
    }
            
    function updateProfile($data){
        $this->db->where('ID !=',$data['ID']);
        $this->db->where('email',$data['email']);
        $query = $this->db->get('_user_data');
        if($query->num_rows()>0){
            return "<div class='alert alert-danger'>Error: email sudah digunakan</div>";
        }else{
            $this->db->where('ID',$data['ID']);
            $query = $this->db->update('_user_data',$data);
            return "<div class='alert alert-success'>Sukses: data berhasil disimpan</div>";
        }
    }
    
}
