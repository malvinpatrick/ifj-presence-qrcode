<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        date_default_timezone_set("Asia/Jakarta");

        $this->load->model('modelAbsensi', 'Absensi');
        $this->load->model('modelMahasiswa', 'Mahasiswa');

        if($this->session->userdata('login') != true or $this->session->userdata('type') != 'absen')
            redirect("Login");
	}
	
	public function index()
	{
       $this->masuk();
    }

    /**
     * UNTUK MENG-LOAD HALAMAN ABSEN MASUK DAN KELUAR
     * BY : PATRICK
     */
    public function masuk()
    {
        $this->load->view("Absensi/header"); 
        $this->load->view("Absensi/masuk"); 
    }

    public function keluar()
    {
        $this->load->view("Absensi/header"); 
        $this->load->view("Absensi/keluar"); 
    }

    public function registrasi()
    {
        $this->load->view('Absensi/header');
        $this->load->view('Absensi/registrasi');
    }

    /**
     * INSERT DATA NRP (ABSEN MASUK DAN KELUAR)
     * BY : PATRICK
     */
    public function insertMasuk()
    {
        $nrp = $this->input->post('nrp');        
        $temp = $this->db->from('mahasiswa')->where('NRP', $nrp)->count_all_results();

        //CEK AVAIBLE NRP
        if($temp > 0){

            //CEK SUDAH MASUK / BLM
            $temp2 = $this->db->from('kehadiran')
                            ->where('NRP', $nrp)
                            ->where("Tanggal = STR_TO_DATE('".date('d-m-Y')."','%d-%m-%Y')")
                            ->count_all_results();
            
            if($temp2 == 0){
                $nama = $this->Mahasiswa->getNamaByNrp($nrp);
                $data = array(
                    'NRP' => $nrp,
                    'Jam_Keluar' => null
                );
                $this->db->set('Tanggal', "STR_TO_DATE('".date('d-m-Y')."','%d-%m-%Y')", false);
                $this->db->set('Jam_Masuk', "STR_TO_DATE('".date('H-i-s')."','%H-%i-%s')", false);
                $this->db->insert('kehadiran', $data);

                $parse['status'] = true;   
                $parse['message'] = "$nama berhasil absen, God bless you";
            }else{
                $parse['status'] = false;
                $parse['message'] = "$nama sudah absen masuk";
            }
           
        }else{
            $parse['status'] = false;
            $parse['message'] = "NRP tidak valid / belum terdaftar";
        }
            
        header('Content-Type: application/json');
        echo json_encode($parse);
    }

    public function insertKeluar()
    {
        $nrp = $this->input->post('nrp');
        $temp = $this->db->from('kehadiran')
                        ->where('NRP', $nrp)
                        ->where("Tanggal = STR_TO_DATE('".date('d-m-Y')."','%d-%m-%Y')")
                        ->count_all_results();

        //CEK APAKAH SUDAH ABSEN MASUK / BLM
        if($temp > 0){
            $nama = $this->Mahasiswa->getNamaByNrp($nrp);
            //CEK APAKAH KEDOBELAN ABSEN KELUAR
            $temp2 = $this->db->select('Jam_Keluar as jam_keluar')
                            ->from('kehadiran')
                            ->where("NRP", $nrp)
                            ->where("Tanggal = STR_TO_DATE('".date('d-m-Y')."','%d-%m-%Y')")
                            ->get()->row()->jam_keluar;
            if($temp2 == null){
                $this->db->set('Jam_Keluar', "STR_TO_DATE('".date('H-i-s')."','%H-%i-%s')", false);
                $this->db->where('NRP', $this->input->post('nrp'));
                $this->db->update('kehadiran', null);

                $parse['status'] = true;   
                $parse['message'] = "$nama berhasil absen, God bless you";
            }else{
                $parse['status'] = false;
                $parse['message'] = "$nama sudah absen keluar";
            }
        }else{
            $parse['status'] = false;
            $parse['message'] = "NRP tidak valid / belum absen masuk";
        }
            
        header('Content-Type: application/json');
        echo json_encode($parse);   
    }

    /**
     * INSERT REGISTRASI
     */
    public function insertRegis()
    {
        if($this->input->post('nrp')){
            //CEK NRP
            $nrp = $this->input->post('nrp');      
            $nama = ucwords($this->input->post('nama'));  
            $temp = $this->db->from('mahasiswa')->where('NRP', $nrp)->count_all_results();
            $message = null;
            if($temp == 0 && strlen($nrp) == 9){
                $tanggal = $this->input->post('tanggal');
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
                $data = array(
                    'NRP' => $this->input->post('nrp'),
                    'Nama' => $nama,
                    'Jurusan' => $this->input->post('jurusan'),
                    'JK' => $this->input->post('jk')
                );
                $this->db->set('TTL', "STR_TO_DATE('"."$tanggal-$bulan-$tahun"."','%d-%m-%Y')", false);
                $this->db->insert('mahasiswa', $data);

                $parse['status'] = true;  
                $message = "$nama berhasil terdaftar╥";
            }else{
                $message = "NRP sudah terdaftar / format NRP salah";
                $parse['status'] = false;  
            }            
        }
        else{
            $parse['status'] = false;
        }
        $parse['message'] = $message == null ? 'ERROR!!' : $message;
        header('Content-Type: application/json');
        echo json_encode($parse);
    }

    /**
     * FETCH DATA TO DATATABLE ABSEN MASUK DAN KELUAR
     * BY : PATRICK
     */
    public function fetchAbsensiMasuk()
    {
        $parse = $this->Absensi->fetchMasuk();
        header('Content-Type: application/json');
        echo json_encode($parse);
    }

    public function fetchAbsensiKeluar()
    {
        $parse = $this->Absensi->fetchKeluar();
        header('Content-Type: application/json');
        echo json_encode($parse);
    }

    /**
     * LOGOUT
     * BY : PATRICK
     */
    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('type');
        redirect("Login");
    }

    /**
     * UNTUK MENGECEK DAN REDIRECT KONFIRMASI SAAT
     * HENDAK BERPINDAH HALAMAN DARI ABSEN MASUK DAN MAUPUN KE ABSEN KELUAR
     * BY : PATRICK
     */
    public function konfirmasiMasuk()
    {
        if($this->input->post('password') == 'sttsuntukjesus')
            redirect("Absensi/masuk");
        else
            redirect("Absensi/keluar");
    }

    public function konfirmasiKeluar()
    {
        if($this->input->post('password') == 'sttsuntukjesus')
            redirect("Absensi/keluar");
        else
            redirect("Absensi/masuk");
    }
}
