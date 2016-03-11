<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MUser extends CI_Model{
    
    function getUser(){
        /*$this->db->select('username. GROUP_CONCAT(roleName) as role');
        $this->db->from('_user_data');
        $this->db->join('_user_roles','userID = _user_data.ID','inner');
        $this->db->join('_role_data','_role_data.ID = roleID','inner');
        $this->db->group_by("roleName"); 
        $query = $this->db->get();*/
        $query = "select _user_data.ID,name,username, group_concat(roleName) as role 
                    from _user_data
                    left join _user_roles on userID = _user_data.ID
                    left join _role_data on roleID = _role_data.ID
                    where is_superadmin = 0
                    group by username";
        $result = $this->db->query($query);
        return $result->result_array();
    }
    
    function insertUser($data){
        $this->db->where('username',$data['username']);
        $query = $this->db->get('_user_data');
        if($query->num_rows() > 0){
            return false;
        }else{
            $this->db->set($data);
            $this->db->insert('_user_data');
            return true;
        }
    }
    
    function getUserDetail($id){
        $this->db->where('_user_data.ID',$id);        
        $query = $this->db->get('_user_data');
        
        return $query->result_array();
    }
    
    function getUserRole($id){
        $this->db->where('_user_data.ID',$id);
        $this->db->join('_user_roles','_user_roles.userID = _user_data.ID');
        $this->db->join('_role_data','_role_data.ID = _user_roles.roleID');
        $query = $this->db->get('_user_data');
        
        $usr = $query->result_array();
        $ugr = array();
        $ugr['rolename'] = '';
        
        $i = 0;
        foreach($usr as $u){
            $ugr['id'] = $u['id'];
            $ugr['rolename'] .= (($i==0)?'':', ').$u['rolename'];
            $i++;
        }
        
        return $ugr;
    }
    
    function userUpdate($id,$data){
        $this->db->where('ID',$id);
        $this->db->update('_user_data',$data);
    }
            
    function deleteUser($id){
        $this->db->where('ID',$id);
        $this->db->delete('_user_data');
    }
    
    function deleteUserRoles($id){
        $this->db->where('userID',$id);
        $this->db->delete('_user_roles');
    }
    
    function gantiPassword($data){
        $this->db->where('ID',$data['ID']);
        $query = $this->db->get('_user_data');
        if($query->num_rows() > 0){
            $row = $query->row_array();
            if($row['password'] == $data['oldPassword']){
                $this->db->where('ID',$data['ID']);
                $this->db->update('_user_data',array('password' => $data['password']));
                return "<strong>saved!</strong>  password berhasil di ubah";
            }else{
                return "<strong>warning!</strong>  password lama salah";
            }
        }
    }
    
}



