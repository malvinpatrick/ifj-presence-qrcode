<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        date_default_timezone_set("Asia/Jakarta");

        $this->load->model('ModelAdmin');

        if($this->session->userdata('login') != true or $this->session->userdata('type') != 'admin')
            redirect("Login");
	}
	
	public function index()
	{
        $this->dashboard();
    }

    /**
     * UNTUK MENG-LOAD HALAMAN DASHOBOARD DAN LAPORAN
     * BY : PATRICK
     */
    public function dashboard()
    {
        //GET COUNT KEHADIRAN TODAY
        $jumlah = $this->db->from('kehadiran')
                            ->where("Tanggal = STR_TO_DATE('".date('d-m-Y')."','%d-%m-%Y')")
                            ->count_all_results();
        $data['jumlah'] = $jumlah;
        $data['tab'] = 'dashboard';
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/dashboard');
    }

    public function laporan()
    {
        //GET COUNT KEHADIRAN TODAY
        $jumlah = $this->db->from('kehadiran')
        ->where("Tanggal = STR_TO_DATE('".date('d-m-Y')."','%d-%m-%Y')")
        ->count_all_results();
        $data['jumlah'] = $jumlah;
        $data['tab'] = 'laporan';
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/laporan');
    }

    /**
     * UNTUK SHOW DATA DI TABEL
     * BY : PATRICK
     */
    public function fetchLaporan()
    {
        if($this->input->post('filterAtas')){
            $filterAtas = date('d-m-Y', strtotime($this->input->post('filterAtas')));
            $filterBawah = date('d-m-Y', strtotime($this->input->post('filterBawah')));

            $data = $this->ModelAdmin->fetchLaporanByDate($filterAtas, $filterBawah);
            $parse['data'] = $data;
            $parse['chart'] = $this->ModelAdmin->countAttendanceByDate($filterAtas, $filterBawah);
            $parse['periode'] = "periode $filterAtas s/d $filterBawah";
        }
        header('Content-Type: application/json');
        echo json_encode($parse);
    }

    /**
     * UNTUK EXPORT KE CSV
     * BY : PATRICK
     */
    public function exportCSV()
    {
        $date1 = date('d-m-Y', strtotime($this->input->get('date1')));
        $date2 = date('d-m-Y', strtotime($this->input->get('date2')));

        $data = $this->ModelAdmin->fetchLaporanByDate($date1, $date2);

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Disposition: attachment; filename=Laporan Kehadiran periode $date1 - $date2.csv");

        $output = fopen('php://output', 'w');
        fputcsv($output, array('NRP', 'Nama', 'Tanggal', 'Jam Masuk', 'Jam Keluar'));

        foreach ($data as $i) {
            fputcsv($output, array($i->nrp, $i->nama, $i->tanggal, $i->jam_masuk, $i->jam_keluar));
        }
        fclose($output);
    }

    /**
     * UNTUK SHOW TAMPILAN POLOS VIEW PRINT
     * BY : PATRICK
     */
    public function print()
    {
        $date1 = date('d-m-Y', strtotime($this->input->get('date1')));
        $date2 = date('d-m-Y', strtotime($this->input->get('date2')));

        $data = $this->ModelAdmin->fetchLaporanByDate($date1, $date2);

        $parse['headerLaporan'] = "Laporan Kehadiran UKK PD STTS";
        $parse['headerPeriode'] = "$date1 s/d $date2";
        $parse['data'] = $data;

        $this->load->view('Admin/printView', $parse);
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
}
