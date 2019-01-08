<?php
	class modelMahasiswa extends CI_Model {
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->helper('form');
	        $this->load->helper('url');
			$this->load->database();
			
			date_default_timezone_set("Asia/Jakarta");
		}
		
		public function getNamaByNrp($nrp)
		{
			return $this->db->select('Nama as nama')
							->from('mahasiswa')
							->where('NRP', $nrp)
							->get()
							->row()->nama;

		}
	}
?>