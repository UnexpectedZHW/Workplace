<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

require_once APPPATH . "/third_party/PHPExcel.php";
require_once APPPATH . "/third_party/PHPExcel/IOFactory.php";

Class Excel extends PHPExcel {

    public function __construct() { 
        parent::__construct();         
    }

    function reader($filename = NULL, $type = '.xls') {
        
        $objReader = null;
        
        if($type == '.xls')
            $objReader = new PHPExcel_Reader_Excel5();
        else if($type == '.xlsx')
            $objReader = new PHPExcel_Reader_Excel2007();

        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($filename);

        $rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();

        $sheet = $objPHPExcel->getActiveSheet();

        $array_data = array();
        foreach ($rowIterator as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $rowIndex = $row->getRowIndex();

            foreach ($cellIterator as $cell) {
                $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();                
            }
        }
        return $array_data;
    }

}

?>