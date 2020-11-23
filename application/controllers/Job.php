<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Job extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Job Description';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('user_name', $user['email']);
        $data['pekerjaan'] = $this->db->get('pekerjaan')->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('worker/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function desk($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Job Description';
        $data['pekerjaan'] = $this->db->get_where('pekerjaan', ['id' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('worker/desk', $data);
        $this->load->view('template/footer', $data);
    }
    public function insert_desk($id)
    {
        // $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
        //     $arr_file = explode('.', $_FILES['upload_file']['name']);
        //     $extension = end($arr_file);
        //     if ('csv' == $extension) {
        //         $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        //     } else {
        //         $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        //     }

        //     $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        //     $sheetData = $spreadsheet->getActiveSheet()->toArray();
        //     echo "<pre>";
        //     print_r($sheetData);
        // }


        $inputFileType = 'Xlsx';
        $inputFileName = '../starkit-rinjani/assets/job_desk/job_desk.Xlsx';
        /**  Create a new Reader of the type defined in $inputFileType  **/
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        /**  Advise the Reader that we only want to load cell data  **/
        $reader->setReadDataOnly(true);
        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($inputFileName);
        echo "<pre>";
        print_r($spreadsheet);
    }
}//end controller