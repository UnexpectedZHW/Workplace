<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MKecamatan extends CI_Model {
    
    function get_all($idprov, $idkab) {
        $this->db->select('k.*,p.nama_provinsi,b.nama_kabupaten');
        $this->db->where('k.id_kabupaten', $idkab);
        $this->db->where('k.id_provinsi', $idprov);
        $this->db->join('ref_kabupaten b','b.id_kabupaten = k.id_kabupaten');
        $this->db->join('ref_provinsi p','p.id_provinsi = k.id_provinsi');
        $sql = $this->db->get('ref_kecamatan k');

        return $sql->result_array();
    }
    
    function get($id) {
        $this->db->select('k.*,p.nama_provinsi,b.nama_kabupaten');
        $this->db->where('k.id_kecamatan', $id);
        $this->db->join('ref_kabupaten b','b.id_kabupaten = k.id_kabupaten');
        $this->db->join('ref_provinsi p','p.id_provinsi = k.id_provinsi');
        $sql = $this->db->get('ref_kecamatan k');

        return $sql->row_array();
    }
    
    function add($data){
        $in['id_provinsi'] = $data['id_provinsi'];
        $in['id_kabupaten'] = $data['id_kabupaten'];
        $in['nama_kecamatan'] = $data['nama_kecamatan'];
        $in['fullname'] = $data['fullname'];
        $in['lat'] = $data['lat'];
        $in['lon'] = $data['lon'];

        return $this->db->insert('ref_kecamatan', $in);
    }
    
    function update($id, $data) {
        $in['nama_kecamatan'] = $data['nama_kecamatan'];
        $in['fullname'] = $data['fullname'];
        $in['lat'] = $data['lat'];
        $in['lon'] = $data['lon'];
        
        $this->db->where('id_kecamatan', $id);
        return $this->db->update('ref_kecamatan', $in);
    }
    
    function delete($id){
        $this->db->where('id_kecamatan', $id);
        return $this->db->delete('ref_kecamatan');
    }
}

