<?php
	class ModelAdmin extends CI_Model {
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->helper('form');
	        $this->load->helper('url');
			$this->load->database();
			
			date_default_timezone_set("Asia/Jakarta");
		}
		
		public function fetchLaporanByDate($date1, $date2)
		{
			/**
			 * $date -> format : d-m-Y
			 */
			return $this->db->select('k.NRP as nrp, m.Nama as nama, k.Tanggal as tanggal, k.Jam_masuk as jam_masuk, k.Jam_Keluar as jam_keluar')
							->from('mahasiswa m, kehadiran k')
							->where('m.NRP = k.NRP')
							->where('k.Jam_Keluar is not null')
							->where("k.Tanggal >= STR_TO_DATE('".$date1."','%d-%m-%Y')")
							->where("k.Tanggal <= STR_TO_DATE('".$date2."','%d-%m-%Y')")
							->order_by('k.NRP', 'asc')
							->get()->result();
		}

		public function countAttendanceByDate($date1, $date2)
		{
			/**
			 * $date -> format : d-m-Y
			 */
			return $this->db->select("count(k.nrp) as jumlah, DATE_FORMAT(k.Tanggal,'%d-%m-%Y') as tanggal")
							->from('kehadiran k')
							->where('k.Jam_Keluar is not null')
							->where("k.Tanggal >= STR_TO_DATE('".$date1."','%d-%m-%Y')")
							->where("k.Tanggal <= STR_TO_DATE('".$date2."','%d-%m-%Y')")
							->group_by('k.Tanggal')
							->get()->result();
		}
	}
?>