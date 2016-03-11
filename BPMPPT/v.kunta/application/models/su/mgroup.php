<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MGroup extends CI_Model{
    function getGroup(){
        //$this->db->select('roleName, count');
        //$this->db->join('_user_role','_user_role.roleID = _role_data.ID','inner');
        $query = "select ID,roleName, (
                    select count(userID) from _user_roles
                    where roleID = _role_data.ID
                    ) as jml
                    from _role_data";
        $result = $this->db->query($query);
        return $result->result_array();
    }
    
    function insertGroup($data){
        $this->db->where('roleName',$data['roleName']);
        $query = $this->db->get('_role_data');
        if ($query->num_rows > 0){
            return false;
        }else{
            $this->db->insert('_role_data',$data);
            return true;
        }
    }
    
    function deleteGroup($id){
        $this->db->where('ID',$id);
        $this->db->delete('_role_data');
    }
            
    function getRoleEdit($id){
        //$this->db->select('roleName');
        $this->db->where('ID',$id);
        $query = $this->db->get('_role_data');
        return $query->result_array();
    }
    
    function getUser(){
        $this->db->select('ID,username');
        $this->db->where('is_superadmin', 0);
        $query = $this->db->get('_user_data');
        return $query->result_array();
    }
    
    function getUserRole($id){
        $this->db->select('*');
        $this->db->where('roleID',$id);
        $this->db->from('_user_data');
        $this->db->join('_user_roles','userID=ID','inner');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function roleUpdate($id,$n){
        $data['roleName']=$n;
        $this->db->where('ID',$id);
        $this->db->update('_role_data',$data);
    }
    
    function insertUserRole($data){
        $this->db->where($data);
        $query = $this->db->get('_user_roles');
        if($query->num_rows() == 0){
            $this->db->insert('_user_roles',$data);
            return true;
        }else{
            return false;
        } 
    }
    
    function deleteUserRole($data){
        $this->db->where($data);
        $this->db->delete('_user_roles');
    }
}

