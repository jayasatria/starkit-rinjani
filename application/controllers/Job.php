<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

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
        // Mengambil data pekerjaan berdasarkan id

        if (($_FILES['upload_file']['name']) != "") {
            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {

                $arr_file = explode('.', $_FILES['upload_file']['name']);
                $extension = end($arr_file);
                if ('csv' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }
                $pekerjaan = $this->db->get_where('pekerjaan', ['id' => $id])->row_array();
                // $nama_file = str_replace(" ", "_", $pekerjaan['nama_pekerjaan']) . "_" . $id;
                $nama_file = "pekerjaan_" . $id;
                $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                $sql = "CREATE TABLE IF NOT EXISTS $nama_file (
                id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
                pekerjaan_id int NOT NULL,
                FOREIGN KEY (pekerjaan_id) REFERENCES pekerjaan (id),
                pekerjaan_utama varchar(255) NOT NULL,
                uraian_pekerjaan varchar(255) NOT NULL,
                durasi int NOT NULL,
                bobot decimal (5,2) NOT NULL,
                hari_1 decimal (5,2),
                hari_2 decimal (5,2),
                hari_3 decimal (5,2),
                hari_4 decimal (5,2),
                hari_5 decimal (5,2),
                hari_6 decimal (5,2),
                hari_7 decimal (5,2),
                hari_8 decimal (5,2),
                hari_9 decimal (5,2),
                hari_10 decimal (5,2),
                hari_11 decimal (5,2),
                hari_12 decimal (5,2),
                hari_13 decimal (5,2),
                hari_14 decimal (5,2),
                hari_15 decimal (5,2),
                hari_16 decimal (5,2),
                hari_17 decimal (5,2),
                hari_18 decimal (5,2),
                hari_19 decimal (5,2),
                hari_20 decimal (5,2),
                hari_21 decimal (5,2),
                hari_22 decimal (5,2),
                hari_23 decimal (5,2),
                hari_24 decimal (5,2),
                hari_25 decimal (5,2),
                hari_26 decimal (5,2),
                hari_27 decimal (5,2),
                hari_28 decimal (5,2),
                hari_29 decimal (5,2),
                hari_30 decimal (5,2),
                hari_31 decimal (5,2),
                hari_32 decimal (5,2),
                hari_33 decimal (5,2),
                hari_34 decimal (5,2),
                hari_35 decimal (5,2),
                hari_36 decimal (5,2),
                hari_37 decimal (5,2),
                hari_38 decimal (5,2),
                hari_39 decimal (5,2),
                hari_40 decimal (5,2),
                hari_41 decimal (5,2),
                hari_42 decimal (5,2),
                hari_43 decimal (5,2),
                hari_44 decimal (5,2),
                hari_45 decimal (5,2),
                hari_46 decimal (5,2),
                hari_47 decimal (5,2),
                hari_48 decimal (5,2),
                hari_49 decimal (5,2),
                hari_50 decimal (5,2),
                hari_51 decimal (5,2),
                hari_52 decimal (5,2),
                hari_53 decimal (5,2),
                hari_54 decimal (5,2),
                hari_55 decimal (5,2),
                hari_56 decimal (5,2),
                hari_57 decimal (5,2),
                hari_58 decimal (5,2),
                hari_59 decimal (5,2),
                hari_60 decimal (5,2),
                hari_61 decimal (5,2),
                hari_62 decimal (5,2),
                hari_63 decimal (5,2),
                hari_64 decimal (5,2),
                hari_65 decimal (5,2),
                hari_66 decimal (5,2),
                hari_67 decimal (5,2),
                hari_68 decimal (5,2),
                hari_69 decimal (5,2),
                hari_70 decimal (5,2),
                hari_71 decimal (5,2),
                hari_72 decimal (5,2),
                hari_73 decimal (5,2),
                hari_74 decimal (5,2),
                hari_75 decimal (5,2),
                hari_76 decimal (5,2),
                hari_77 decimal (5,2),
                hari_78 decimal (5,2),
                hari_79 decimal (5,2),
                hari_80 decimal (5,2),
                hari_81 decimal (5,2),
                hari_82 decimal (5,2),
                hari_83 decimal (5,2),
                hari_84 decimal (5,2),
                hari_85 decimal (5,2),
                hari_86 decimal (5,2),
                hari_87 decimal (5,2),
                hari_88 decimal (5,2),
                hari_89 decimal (5,2),
                hari_90 decimal (5,2)

            )";

                $this->db->query($sql);
                for ($i = 1; $i < count($sheetData); $i++) {
                    $pekerjaan_utama = $sheetData[$i]['0'];
                    $uraian_pekerjaan = $sheetData[$i]['1'];
                    $durasi = $sheetData[$i]['2'];
                    $bobot = $sheetData[$i]['3'];
                    $hari_1 = $sheetData[$i]['4'];
                    $hari_2 = $sheetData[$i]['5'];
                    $hari_3 = $sheetData[$i]['6'];
                    $hari_4 = $sheetData[$i]['7'];
                    $hari_5 = $sheetData[$i]['8'];
                    $hari_6 = $sheetData[$i]['9'];
                    $hari_7 = $sheetData[$i]['10'];
                    $hari_8 = $sheetData[$i]['11'];
                    $hari_9 = $sheetData[$i]['12'];
                    $hari_10 = $sheetData[$i]['13'];
                    $hari_11 = $sheetData[$i]['14'];
                    $hari_12 = $sheetData[$i]['15'];
                    $hari_13 = $sheetData[$i]['16'];
                    $hari_14 = $sheetData[$i]['17'];
                    $hari_15 = $sheetData[$i]['18'];
                    $hari_16 = $sheetData[$i]['19'];
                    $hari_17 = $sheetData[$i]['20'];
                    $hari_18 = $sheetData[$i]['21'];
                    $hari_19 = $sheetData[$i]['22'];
                    $hari_20 = $sheetData[$i]['23'];
                    $hari_21 = $sheetData[$i]['24'];
                    $hari_22 = $sheetData[$i]['25'];
                    $hari_23 = $sheetData[$i]['26'];
                    $hari_24 = $sheetData[$i]['27'];
                    $hari_25 = $sheetData[$i]['28'];
                    $hari_26 = $sheetData[$i]['29'];
                    $hari_27 = $sheetData[$i]['30'];
                    $hari_28 = $sheetData[$i]['31'];
                    $hari_29 = $sheetData[$i]['32'];
                    $hari_30 = $sheetData[$i]['33'];
                    $hari_31 = $sheetData[$i]['34'];
                    $hari_32 = $sheetData[$i]['35'];
                    $hari_33 = $sheetData[$i]['36'];
                    $hari_34 = $sheetData[$i]['37'];
                    $hari_35 = $sheetData[$i]['38'];
                    $hari_36 = $sheetData[$i]['39'];
                    $hari_37 = $sheetData[$i]['40'];
                    $hari_38 = $sheetData[$i]['41'];
                    $hari_39 = $sheetData[$i]['42'];
                    $hari_40 = $sheetData[$i]['43'];
                    $hari_41 = $sheetData[$i]['44'];
                    $hari_42 = $sheetData[$i]['45'];
                    $hari_43 = $sheetData[$i]['46'];
                    $hari_44 = $sheetData[$i]['47'];
                    $hari_45 = $sheetData[$i]['48'];
                    $hari_46 = $sheetData[$i]['49'];
                    $hari_47 = $sheetData[$i]['50'];
                    $hari_48 = $sheetData[$i]['51'];
                    $hari_49 = $sheetData[$i]['52'];
                    $hari_50 = $sheetData[$i]['53'];
                    $hari_51 = $sheetData[$i]['54'];
                    $hari_52 = $sheetData[$i]['55'];
                    $hari_53 = $sheetData[$i]['56'];
                    $hari_54 = $sheetData[$i]['57'];
                    $hari_55 = $sheetData[$i]['58'];
                    $hari_56 = $sheetData[$i]['59'];
                    $hari_57 = $sheetData[$i]['60'];
                    $hari_58 = $sheetData[$i]['61'];
                    $hari_59 = $sheetData[$i]['62'];
                    $hari_60 = $sheetData[$i]['63'];
                    $hari_61 = $sheetData[$i]['64'];
                    $hari_62 = $sheetData[$i]['65'];
                    $hari_63 = $sheetData[$i]['66'];
                    $hari_64 = $sheetData[$i]['67'];
                    $hari_65 = $sheetData[$i]['68'];
                    $hari_66 = $sheetData[$i]['69'];
                    $hari_67 = $sheetData[$i]['70'];
                    $hari_68 = $sheetData[$i]['71'];
                    $hari_69 = $sheetData[$i]['72'];
                    $hari_70 = $sheetData[$i]['73'];
                    $hari_71 = $sheetData[$i]['74'];
                    $hari_72 = $sheetData[$i]['75'];
                    $hari_73 = $sheetData[$i]['76'];
                    $hari_74 = $sheetData[$i]['77'];
                    $hari_75 = $sheetData[$i]['78'];
                    $hari_76 = $sheetData[$i]['79'];
                    $hari_77 = $sheetData[$i]['80'];
                    $hari_78 = $sheetData[$i]['81'];
                    $hari_79 = $sheetData[$i]['82'];
                    $hari_80 = $sheetData[$i]['83'];
                    $hari_81 = $sheetData[$i]['84'];
                    $hari_82 = $sheetData[$i]['85'];
                    $hari_83 = $sheetData[$i]['86'];
                    $hari_84 = $sheetData[$i]['87'];
                    $hari_85 = $sheetData[$i]['88'];
                    $hari_86 = $sheetData[$i]['89'];
                    $hari_87 = $sheetData[$i]['90'];
                    $hari_88 = $sheetData[$i]['91'];
                    $hari_89 = $sheetData[$i]['92'];
                    $hari_90 = $sheetData[$i]['93'];

                    $data = [
                        'pekerjaan_id' => $id,
                        'pekerjaan_utama' => $pekerjaan_utama,
                        'uraian_pekerjaan' => $uraian_pekerjaan,
                        'durasi' => $durasi,
                        'bobot' => $bobot,
                        'hari_1' => $hari_1,
                        'hari_2' => $hari_2,
                        'hari_3' => $hari_3,
                        'hari_4' => $hari_4,
                        'hari_5' => $hari_5,
                        'hari_6' => $hari_6,
                        'hari_7' => $hari_7,
                        'hari_8' => $hari_8,
                        'hari_9' => $hari_9,
                        'hari_10' => $hari_10,
                        'hari_11' => $hari_11,
                        'hari_12' => $hari_12,
                        'hari_13' => $hari_13,
                        'hari_14' => $hari_14,
                        'hari_15' => $hari_15,
                        'hari_16' => $hari_16,
                        'hari_17' => $hari_17,
                        'hari_18' => $hari_18,
                        'hari_19' => $hari_19,
                        'hari_20' => $hari_20,
                        'hari_21' => $hari_21,
                        'hari_22' => $hari_22,
                        'hari_23' => $hari_23,
                        'hari_24' => $hari_24,
                        'hari_25' => $hari_25,
                        'hari_26' => $hari_26,
                        'hari_27' => $hari_27,
                        'hari_28' => $hari_28,
                        'hari_29' => $hari_29,
                        'hari_30' => $hari_30,
                        'hari_31' => $hari_31,
                        'hari_32' => $hari_32,
                        'hari_33' => $hari_33,
                        'hari_34' => $hari_34,
                        'hari_35' => $hari_35,
                        'hari_36' => $hari_36,
                        'hari_37' => $hari_37,
                        'hari_38' => $hari_38,
                        'hari_39' => $hari_39,
                        'hari_40' => $hari_40,
                        'hari_41' => $hari_41,
                        'hari_42' => $hari_42,
                        'hari_43' => $hari_43,
                        'hari_44' => $hari_44,
                        'hari_45' => $hari_45,
                        'hari_46' => $hari_46,
                        'hari_47' => $hari_47,
                        'hari_48' => $hari_48,
                        'hari_49' => $hari_49,
                        'hari_50' => $hari_50,
                        'hari_51' => $hari_51,
                        'hari_52' => $hari_52,
                        'hari_53' => $hari_53,
                        'hari_54' => $hari_54,
                        'hari_55' => $hari_55,
                        'hari_56' => $hari_56,
                        'hari_57' => $hari_57,
                        'hari_58' => $hari_58,
                        'hari_59' => $hari_59,
                        'hari_60' => $hari_60,
                        'hari_61' => $hari_61,
                        'hari_62' => $hari_62,
                        'hari_63' => $hari_63,
                        'hari_64' => $hari_64,
                        'hari_65' => $hari_65,
                        'hari_66' => $hari_66,
                        'hari_67' => $hari_67,
                        'hari_68' => $hari_68,
                        'hari_69' => $hari_69,
                        'hari_70' => $hari_70,
                        'hari_71' => $hari_71,
                        'hari_72' => $hari_72,
                        'hari_73' => $hari_73,
                        'hari_74' => $hari_74,
                        'hari_75' => $hari_75,
                        'hari_76' => $hari_76,
                        'hari_77' => $hari_77,
                        'hari_78' => $hari_78,
                        'hari_79' => $hari_79,
                        'hari_80' => $hari_80,
                        'hari_81' => $hari_81,
                        'hari_82' => $hari_82,
                        'hari_83' => $hari_83,
                        'hari_84' => $hari_84,
                        'hari_85' => $hari_85,
                        'hari_86' => $hari_86,
                        'hari_87' => $hari_87,
                        'hari_88' => $hari_88,
                        'hari_89' => $hari_89,
                        'hari_90' => $hari_90
                    ];
                    $this->db->update('pekerjaan', ['table_ready' => 1]);
                    $this->db->insert($nama_file, $data);
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            List Pekerjaan sudah dibuat !!!
            </div>');
            redirect('job');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            List gagal dibuat !!! File kosong
            </div>');
            redirect('job/desk/' . $id);
        }
    }
}//end controller