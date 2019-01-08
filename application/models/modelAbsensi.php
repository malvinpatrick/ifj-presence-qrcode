<?php
	class modelAbsensi extends CI_Model {
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->helper('form');
	        $this->load->helper('url');
			$this->load->database();
			
			date_default_timezone_set("Asia/Jakarta");
	    }

	    public function fetchMasuk()
	    {
			return $this->db->select('k.NRP as nrp, m.Nama as nama, k.Jam_Masuk as jam_masuk')
					->from('kehadiran k, mahasiswa m')
					->where('k.NRP = m.NRP')
					->where("DATE_FORMAT(k.Tanggal, '%Y-%m-%d') = '".date('Y-m-d')."'")
					->order_by('k.Jam_Masuk', 'desc')
					->get()
					->result();
		}

		public function fetchKeluar()
	    {
			return $this->db->select('k.NRP as nrp, m.Nama as nama, k.Jam_Masuk as jam_masuk, k.Jam_Keluar as jam_keluar')
					->from('kehadiran k, mahasiswa m')
					->where('k.NRP = m.NRP')
					->where("DATE_FORMAT(k.Tanggal, '%Y-%m-%d') = '".date('Y-m-d')."'")
					->order_by('k.Jam_Masuk', 'desc')
					->get()
					->result();
		}
	}
?>