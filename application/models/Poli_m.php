<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_m extends CI_Model {
	public function getPoli(){
		$this->db->select('id, nama, icon');
		$output = $this->db->get('poli')->result();

		return $output;
	}
}

/* End of file Poli_m.php */
/* Location: ./application/models/Poli_m.php */