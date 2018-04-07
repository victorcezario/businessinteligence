<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel extends CI_Controller {

    /**
     * @desc : load list modal and helpers
     */
    function __Construct(){
        parent::__Construct();
        //$this->load->model('mExcel');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('download');
        $this->load->library('PHPReport');

    }

    /**
     *  @desc : This function is used to get data from database
     *  And export data into excel sheet
     *  @param : void
     *  @return : void
     */
    public function index(){
        // get data from databse
        $data = 'SELECT NOME, IDADE FROM BI_VIEW_PESSOAS';

        $template = 'Myexcel.xlsx';
        //set absolute path to directory with template files
        $templateDir = '';

        //set config for report
        $config = array(
            'template' => $template,
            'templateDir' => $templateDir
        );


        //load template
        $R = new PHPReport($config);
        var_dump($R);
        $R->load(array(
                'id' => 'student',
                'repeat' => TRUE,
                'data' => $data
            )
        );

        // define output directoy
        $output_file_dir = "/tmp/";

        $output_file_excel = $output_file_dir  . "Myexcel.xlsx";
        //download excel sheet with data in /tmp folder
        $result = $R->render('excel', $output_file_excel);
    }
}