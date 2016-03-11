<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pemohon extends CI_Model {
    
    public function __construct() 
    {
        parent:: __construct();
        
    }    
    public function dtpemohon()
    {   
        return $this->db->get('pemohon')->result_object();     
    }
    
    public function createtable($datatable)
    {
        $this->load->library('table');
        $template = array (
            'table_open' => '<table class="table table-bordered">',

        );
        $this->table->set_template($template);
        $this->table->set_heading('No','ID Pemohon', 'Status', 'Deskripsi', 'Aksi');

        $no = 0;
        foreach ($datatable as $row) 
        {
        	$this->table->add_row(
        			++$no,
        			$row->id_pemohon,
        			$row->status,
        			$row->Deskripsi,
        			anchor('index.php/pemohonan/create/'.$row->id_pemohon, 'Mengaju Permohonan', array('class'=> 'btn btn-success')) 
        			/* Jika ingin mengaktif tombol hapus
        			. ' ' . anchor('aw/hapus/'.$row->id_pemohon, 'Hapus', array('class'=> 'btn btn-danger')) 
        			*/
        		);
        }

        return $this->table->generate();
         
    }
}















