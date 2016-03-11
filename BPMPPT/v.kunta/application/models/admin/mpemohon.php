<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPemohon extends CI_Model{
    
    function add($data){
        
        $in['nik'] = trim($data['nik']);
        $in['nama_pemohon'] = strtoupper($data['nama_pemohon']);
        $in['tipe_identitas'] = strtoupper($data['tipe_identitas']);
        $in['no_identitas'] = trim($data['no_identitas']);
        $in['masaberlaku_identitas'] = $data['masaberlaku_identitas'];
        $in['kewarganegaraan'] = strtoupper($data['kewarganegaraan']);
        $in['alamat'] = strtoupper($data['alamat']);
        $in['ref_provinsi_id'] = $data['ref_provinsi_id'];
        $in['ref_kecamatan_id'] = $data['ref_kecamatan_id'];
        $in['no_telp'] = trim($data['no_telp']);
        $in['no_hp'] = trim($data['no_hp']);
        $in['email'] = trim($data['email']);
        
        return $this->db->insert('tbl_pemohon', $in);
    }
    
    function update($nik, $data){
        $in['nama_pemohon'] = strtoupper($data['nama_pemohon']);
        $in['tipe_identitas'] = strtoupper($data['tipe_identitas']);
        $in['no_identitas'] = trim($data['no_identitas']);
        $in['masaberlaku_identitas'] = $data['masaberlaku_identitas'];
        $in['kewarganegaraan'] = strtoupper($data['kewarganegaraan']);
        $in['alamat'] = strtoupper($data['alamat']);
        $in['ref_provinsi_id'] = $data['ref_provinsi_id'];
        $in['ref_kecamatan_id'] = $data['ref_kecamatan_id'];
        $in['no_telp'] = trim($data['no_telp']);
        $in['no_hp'] = trim($data['no_hp']);
        $in['email'] = trim($data['email']);
        
        $this->db->where('nik', trim($nik));
        return $this->db->update('tbl_pemohon', $in);
    }
    
    function is_exist($nik){
        $this->db->where('nik', trim($nik));
        $row = $this->db->get("tbl_pemohon");
        if($row->num_rows()>0)
            return true;
        else return false;
    }
}
