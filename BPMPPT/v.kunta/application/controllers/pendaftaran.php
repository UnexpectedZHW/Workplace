<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/admcontroller.php' );

class Pendaftaran extends AdmController {

    var $config = array(
        array('field' => 'nik', 'label' => 'NIK', 'rules' => 'required'),
        array('field' => 'nama_pemohon', 'label' => 'Nama Pemohon', 'rules' => 'required'),
        array('field' => 'tipe_identitas', 'label' => 'Tipe Identitas', 'rules' => 'required'),
        array('field' => 'no_identitas', 'label' => 'No Identitas', 'rules' => 'required'),
        array('field' => 'masaberlaku_identitas', 'label' => 'Masa Berlaku Identitas', 'rules' => 'required'),
        array('field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'),
        array('field' => 'no_telp', 'label' => 'No Identitas', 'rules' => 'numeric'),
        array('field' => 'no_hp', 'label' => 'No HP', 'rules' => 'required')
    );

    function __construct() {
        parent:: __construct();
        $this->output->enable_profiler(false);
    }

    function pemohon($mode) {
        $this->load->model('admin/mprovinsi');
        $this->load->model('admin/mpemohon');
        
        if ($mode == 'add') {            

            $post = $this->input->post();
            if ($post) {
                $this->form_validation->set_rules($this->config);
                if ($this->form_validation->run() === FALSE) {
                    $data['msg'] = validation_errors('', '<br />');
                    $data['sts'] = 0;
                } else {
                    if ($this->mpemohon->add($post)) {
                        $data['msg'] = 'Tambah data pemohon berhasil';
                        $data['sts'] = 1;
                    } else {
                        $data['msg'] = 'Tambah data pemohon gagal(error sistem)';
                        $data['sts'] = 0;
                    }
                }
            }

            $data['post'] = $post;
            $data['prov'] = $this->mprovinsi->get_all();
            $data['content'] = 'pendaftaran-pemohon';
        } elseif ($mode == 'import') {

            $post = $this->input->post();
            if ($post['up']) {
                $config['upload_path'] = './tmp/';
                $config['allowed_types'] = 'xls|xlsx';
                $config['max_size'] = '10240';
                $this->load->library('upload', $config);

                if ($post['ref_kecamatan_id'] == '0' || $post['ref_kabupaten_id'] == '0' || $post['ref_provinsi_id'] == '0') {
                    $data['msg'] = 'Anda harus memilih Provinsi, Kabupaten dan Kecamatan';
                    $data['sts'] = false;
                } else if (!$this->upload->do_upload('fxls')) {
                    $data['msg'] = $this->upload->display_errors();
                    $data['sts'] = false;
                } else {
                    $upload_data = $this->upload->data();

                    $this->load->library("excel");
                    $xls = $this->excel->reader('./tmp/' . $upload_data['file_name'], $upload_data['file_ext']);

                    $e = 0;
                    $es = "pada ";
                    $s = 0;
                    for ($i = 8; $i <= count($xls); $i++) {
                        if ($xls[$i]['A'] != '' && $xls[$i]['B'] != '' && $xls[$i]['C'] != '' 
                            && $xls[$i]['D'] != '' && $xls[$i]['G'] != '' && $xls[$i]['I'] != '') {
                            
                            $in['nik'] = $xls[$i]['A'];
                            $in['nama_pemohon'] = $xls[$i]['B'];
                            $in['tipe_identitas'] = $xls[$i]['C'];
                            $in['no_identitas'] = $xls[$i]['D'];
                            $in['masaberlaku_identitas'] = $xls[$i]['E'];
                            $in['kewarganegaraan'] = $xls[$i]['F'];
                            $in['alamat'] = $xls[$i]['G'];
                            $in['no_telp'] = $xls[$i]['H'];
                            $in['no_hp'] = $xls[$i]['I'];
                            $in['email'] = $xls[$i]['J'];
                            $in['ref_provinsi_id'] = $post['ref_provinsi_id'];
                            $in['ref_kecamatan_id'] = $post['ref_kecamatan_id'];
                            
                            if($this->mpemohon->is_exist($xls[$i]['A'])){
                                $this->mpemohon->update($xls[$i]['A'],$in);
                            }else{
                                $this->mpemohon->add($in);
                            }
                            $s++;    
                            
                        }else{
                            $e++;
                            $es .= "baris ".$i.", "; 
                        }
                    }
                    
                    $jml = count($xls)-7;
                    $data['msg'] = "File berhasil diupload, dengan jumlah total data $jml, 
                        berhasil $s dan gagal $e $es";
                    $data['sts'] = true;
                    unlink('./tmp/' . $upload_data['file_name']);
                }
            }

            $data['prov'] = $this->mprovinsi->get_all();
            $data['content'] = 'pendaftaran-pemohon-xls';
        }

        $this->load->view('admin/admin-mainpage', $data);
    }

}
