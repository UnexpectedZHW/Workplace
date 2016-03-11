<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MProvinsi extends CI_Model {

    function get_all() {
        $sql = $this->db->get('ref_provinsi');
        return $sql->result_array();
    }
    
    function add($data){
        $in['nama_provinsi'] = $data['nama_provinsi'];
        $in['fullname'] = $data['fullname'];
        $in['lat'] = $data['lat'];
        $in['lon'] = $data['lon'];

        return $this->db->insert('ref_provinsi', $in);
    }
    
    function update($id, $data) {
        $in['nama_provinsi'] = $data['nama_provinsi'];
        $in['fullname'] = $data['fullname'];
        $in['lat'] = $data['lat'];
        $in['lon'] = $data['lon'];
        
        $this->db->where('id_provinsi', $id);
        return $this->db->update('ref_provinsi', $in);
    }
    
    function get($id) {
        $this->db->where('id_provinsi', $id);
        $sql = $this->db->get('ref_provinsi');

        return $sql->row_array();
    }
    
    function delete($id){
        $this->db->where('id_provinsi', $id);
        return $this->db->delete('ref_provinsi');
    }
    
    // force commit..
    
}
