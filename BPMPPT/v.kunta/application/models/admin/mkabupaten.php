<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MKabupaten extends CI_Model {

    function get_all($idprov) {
        $this->db->where('id_provinsi', $idprov);
        $sql = $this->db->get('ref_kabupaten');
        return $sql->result_array();
    }
    
    function get($id) {
        $this->db->select('k.*,p.nama_provinsi');
        $this->db->where('id_kabupaten', $id);
        $this->db->join('ref_provinsi p','p.id_provinsi = k.id_provinsi');
        $sql = $this->db->get('ref_kabupaten k');

        return $sql->row_array();
    }
    
    function add($data){
        $in['id_provinsi'] = $data['id_provinsi'];
        $in['nama_kabupaten'] = $data['nama_kabupaten'];
        $in['fullname'] = $data['fullname'];
        $in['lat'] = $data['lat'];
        $in['lon'] = $data['lon'];

        return $this->db->insert('ref_kabupaten', $in);
    }
    
    function update($id, $data) {
        $in['id_provinsi'] = $data['id_provinsi'];
        $in['nama_kabupaten'] = $data['nama_kabupaten'];
        $in['fullname'] = $data['fullname'];
        $in['lat'] = $data['lat'];
        $in['lon'] = $data['lon'];
        
        $this->db->where('id_kabupaten', $id);
        return $this->db->update('ref_kabupaten', $in);
    }
    
    function delete($id){
        $this->db->where('id_kabupaten', $id);
        return $this->db->delete('ref_kabupaten');
    }
}