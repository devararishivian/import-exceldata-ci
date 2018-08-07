<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class C_import extends CI_Controller {

    public function __construct(){

        parent::__construct();
            $this->load->model('m_import'); //load import model            
    }        

    public function index()
    {
        $this->load->view('v_import'); //load index view 
        
    }

    // import function
    public function import(){
        
        //file type
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['file']['name']); //get file
            $extension = end($arr_file); //get file extension

            // select spreadsheet reader depends on file extension
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else if ('xlsx'){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }

            //'Data' Table
            $dataList = array();
            $dataListArray = array();

            $reader->setReadDataOnly(true);

            //Get filename
            $objPHPExcel = $reader->load($_FILES['file']['tmp_name']);
            
            //Get sheet by name
            $worksheet = $objPHPExcel->getSheetByName('City');

            /*
            * Get sheet by index
            * Get the second sheet in the workbook
            * Note that sheets are indexed from 0
            */ 
            // $spreadsheet->getSheet(1);

            /*
            * Get current active sheet
            */ 
            //$spreadsheet->getActiveSheet();

            $highestRow = $worksheet->getHighestRow(); // e.g. 12
            $highestColumn = $worksheet->getHighestColumn(); // e.g M'

            $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 7
            //Ignoring first row (As it contains column name)
            for ($row = 2; $row <= $highestRow; ++$row) {
                //A row selected
                for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                    // values till $cityList['1'] till $cityList['last_column_no'] 
                    $dataList[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue(); 
                    } 
                    array_push ($dataListArray, $dataList);
                    //next row, from top
            }
            
            if($this->m_import->import($dataListArray) == TRUE){
                // what to do if import successfull
                redirect('/');
			} else {
                // what to do if import failed
				redirect('notok');
			}

        }
    }

}

/* End of file Import.php */
