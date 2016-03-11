<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPermission extends CI_Model{
    function getPermission(){
        $query = $this->db->get('_perm_data');
        return $query->result_array();
    }
    
    function insertPermission($data){
        $this->db->where('permKey',$data['permKey']);
        $query = $this->db->get('_perm_data');
        if($query->num_rows() > 0){
            return false;
        }else{
            $this->db->insert('_perm_data',$data);
            return true;
        }        
    }
    
    function getPermissionDetail($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('_perm_data');
        return $query->result_array();
    }
    
    function updatePermission($data,$id){
        $this->db->where('ID',$id);
        $this->db->update('_perm_data',$data);
        return true;     
    }
    
    function deletePermission($id){
        $this->db->where('ID',$id);
        $this->db->delete('_perm_data');
    }
}
?>
