<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MBangunan extends CI_Model {

    function get_all() {
        $sql = $this->db->get('ref_bangunan');
        return $sql->result_array();
    }
    
    function add($data){
        $in['taman'] = $data['taman'];
        $in['parkir'] = $data['parkir'];
        $in['lebar_jalan'] = $data['lebar_jalan'];
        $in['lahan_kurang_parkir'] = $data['lahan_kurang_parkir'];
        $in['pkl'] = $data['pkl'];
        $in['halaman_keras'] = $data['halaman_keras'];
        $in['halaman_tidak_keras'] = $data['halaman_tidak_keras'];
        $in['pagar'] = $data['pagar'];
        $in['drainase'] = $data['drainase'];
        $in['pos_jaga'] = $data['pos_jaga'];
        $in['gerbang'] = $data['gerbang'];
        $in['peresapan_air_hujan'] = $data['peresapan_air_hujan'];
        $in['peresapan_air_kotor'] = $data['peresapan_air_kotor'];
        $in['septic_tank'] = $data['septic_tank'];
        $in['water_torn'] = $data['water_torn'];
        $in['tanggul'] = $data['tanggul'];
        $in['turap'] = $data['turap'];
        $in['kolam_renang'] = $data['kolam_renang'];
        $in['bak_bawah_tanah'] = $data['bak_bawah_tanah'];
        $in['menara'] = $data['menara'];
        $in['cerobong_asap'] = $data['cerobong_asap'];
        $in['appar'] = $data['appar'];
        
        return $this->db->insert('ref_bangunan', $in);
    }
    
    function update($id, $data) {
        $in['taman'] = $data['taman'];
        $in['parkir'] = $data['parkir'];
        $in['lebar_jalan'] = $data['lebar_jalan'];
        $in['lahan_kurang_parkir'] = $data['lahan_kurang_parkir'];
        $in['pkl'] = $data['pkl'];
        $in['halaman_keras'] = $data['halaman_keras'];
        $in['halaman_tidak_keras'] = $data['halaman_tidak_keras'];
        $in['pagar'] = $data['pagar'];
        $in['drainase'] = $data['drainase'];
        $in['pos_jaga'] = $data['pos_jaga'];
        $in['gerbang'] = $data['gerbang'];
        $in['peresapan_air_hujan'] = $data['peresapan_air_hujan'];
        $in['peresapan_air_kotor'] = $data['peresapan_air_kotor'];
        $in['septic_tank'] = $data['septic_tank'];
        $in['water_torn'] = $data['water_torn'];
        $in['tanggul'] = $data['tanggul'];
        $in['turap'] = $data['turap'];
        $in['kolam_renang'] = $data['kolam_renang'];
        $in['bak_bawah_tanah'] = $data['bak_bawah_tanah'];
        $in['menara'] = $data['menara'];
        $in['cerobong_asap'] = $data['cerobong_asap'];
        $in['appar'] = $data['appar'];
        
        $this->db->where('id_bangunan', $id);
        return $this->db->update('ref_bangunan', $in);
    }
    
    function get($id) {
        $this->db->where('id_bangunan', $id);
        $sql = $this->db->get('ref_bangunan');

        return $sql->row_array();
    }
    
    function delete($id){
        $this->db->where('id_bangunan', $id);
        return $this->db->delete('ref_bangunan');
    }
    
    // force commit..
    
}
