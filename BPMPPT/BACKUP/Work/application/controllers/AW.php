<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AW extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('pemohon');
        
    }
    
    public function index()
    {
        
        $this->load->view('Bootstrap_Template/admin');

    }
    
    public function pemohon()
    {   
        $alldata = $this->pemohon->dtpemohon();
        $data['Judul'] = "List Pemohon";
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















