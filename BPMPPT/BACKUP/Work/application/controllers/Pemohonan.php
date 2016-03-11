<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pemohonan extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('pemohon');
        
    }
    
    public function index()
    {
        
        $this->load->view('Bootstrap_Template/admin');

    }
    
    public function create($id_pemohon)
    {   
        $alldata = $this->pemohon->dtpemohon();
        $data['Judul'] = "ID Pemohon : ";
        $data['id_pemohon'] = $id_pemohon;
        if ($alldata)
        {
           $tabel = $this->pemohon->createtable($alldata);
           $data['tabel'] = $tabel;
        }
        else
        {
            echo "<h1> Belum Ada Data </h1>";
        }
        $data['pmhn']   = 'pmhn';
        $this->load->view('Bootstrap_Template/blank', $data);
    }
}















