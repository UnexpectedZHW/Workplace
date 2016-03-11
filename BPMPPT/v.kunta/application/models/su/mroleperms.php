<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mRolePerms extends CI_Model{
    
    function getAdminMenu($userID){
        $sql = "SELECT DISTINCT SUBSTRING_INDEX(permKey,'_',1) AS url, 
            SUBSTRING_INDEX(permName,' ',1) AS menu FROM _role_perms a
            JOIN _perm_data b ON a.permID = b.ID
            JOIN _user_roles c ON a.roleID = c.roleID
            WHERE userID = ".$userID;
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    
    function getAccessGroup($roleID){
                
        $out = array();
        
        $sql = "SELECT DISTINCT SUBSTRING_INDEX(permName,' ',1) AS menu FROM _perm_data a
            LEFT JOIN _role_perms b ON b.permID = a.ID
            LEFT JOIN _user_roles c ON b.roleID = c.roleID";
        $result = $this->db->query($sql);
        $menu = $result->result_array();
                
        $i = 0;
        foreach($menu as $m){
            $out[$i]['main'] = $m['menu'];                        
            $s = "SELECT a.ID, `value` AS access,SUBSTRING_INDEX(permName,' ',-1) AS menu 
                FROM _perm_data a
                LEFT JOIN _role_perms b ON a.id = b.permID AND roleID = ".$roleID."
                WHERE permName LIKE '".$m['menu']."%' 
                ORDER BY permKey";
            $rst = $this->db->query($s);
            $submenu = $rst->result_array();
            
            $j = 0;
            foreach($submenu as $sub){
                $out[$i]['sub'][$j]['ID'] = $sub['ID'];
                $out[$i]['sub'][$j]['access'] = $sub['access'];
                $out[$i]['sub'][$j]['submenu'] = $sub['menu'];
                $j++;
            }
            $i++; 
            
        }
        
        return $out;
                
    }
    
    function addRolePerms($data){
        /*$this->db->where($data);
        $query = $this->db->get('_role_perms');
        $cek = $query->num_rows()>0 ? false : true;
        if($cek){
           $this->db->insert('_role_perms',$data); 
        }*/
        $this->db->insert('_role_perms',$data); 
    }
    
    function deleteRolePerms($id){
        $this->db->where('roleID',$id);
        $this->db->delete('_role_perms');
    }
}    
