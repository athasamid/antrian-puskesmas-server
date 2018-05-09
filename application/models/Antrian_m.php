<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian_m extends CI_Model {
	public function buat($input){
		$this->db->select('a.id');
		$this->db->join('pasien p', 'p.id = a.id_pasien');
		$this->db->join('masyarakat m', 'm.id = p.id');
		$this->db->join('user u', 'u.id_pemilik = m.id and u.jenis_pemilik = \'masyarakat\'');
		$this->db->where('p.id = '.$input['id_pasien'].' and date(w_antrian) = date(now())');
		$check = $this->db->get('antrian a')->row();

		if ($check) {
			return ['id' => $check->id];
		} else {
			$this->db->select('no_antrian');
			$this->db->where('date(w_antrian) = date(now())');
			$this->db->order_by('no_antrian', 'desc');
			$lastAntrian = $this->db->get('antrian')->row();

			$antrian = 1;
			if ($lastAntrian) {
				$antrian = $lastAntrian->no_antrian + 1;
			}

			$data = [
				'id_poli' => $input['id_poli'],
				'id_pasien' => $input['id_pasien'],
				'no_antrian' => $antrian,
				'w_antrian' => date('Y-m-d H:i:s')
			];

			$this->db->insert('antrian', $data);
			$id = $this->db->insert_id();

			return ['id' => $id];
		}
	}

	public function lihat($id_user){
		$this->db->select('a.id, a.id_poli, a.id_pasien, a.w_antrian, a.no_antrian');
		$this->db->join('pasien p', 'p.id = a.id_pasien');
		$this->db->join('masyarakat m', 'm.id = p.id_masyarakat');
		$this->db->join('user u', 'u.id_pemilik = m.id and u.jenis_pemilik = \'masyarakat\'');
		$this->db->where('u.id', $id_user);
		$antrian = $this->db->get('antrian a')->result();

		foreach ($antrian as $row) {
			$today = new DateTime();
			$today->setTime( 0, 0, 0 );

			$checkedDate = DateTime::createFromFormat( "Y-m-d H:i:s", $row->w_antrian );
			$diff = $today->diff( $checkedDate );
			$diffDays = (integer)$diff->format( "%R%a" );

			$row->in_progress = $diffDays == 0;
			$this->db->select('id, nama');
			$this->db->where('id', $row->id_poli);
			$row->poli = $this->db->get('poli')->row();

			$this->db->select('id, nama, alamat, kelamin, tgl_lahir, tempat_lahir, no_askes, no_telp');
			$this->db->where('id', $row->id_pasien);
			$row->pasien = $this->db->get('pasien')->row();
		}

		return $antrian;
	}

	public function get($id){
		$this->db->select('a.id, a.id_poli, a.id_pasien, a.w_antrian, a.no_antrian');
		$this->db->where('a.id', $id);
		$antrian = $this->db->get('antrian a')->row();

		$this->db->select('id, nama, icon');
		$this->db->where('id', $antrian->id_poli);
		$antrian->poli = $this->db->get('poli')->row();
		$antrian->poli->icon = base_url($antrian->poli->icon);

		$this->db->select('id, nama, alamat, kelamin, tgl_lahir, tempat_lahir, no_askes, no_telp');
		$this->db->where('id', $antrian->id_pasien);
		$antrian->pasien = $this->db->get('pasien')->row();

		return $antrian;
	}
}

/* End of file Antrian_m.php */
/* Location: ./application/models/Antrian_m.php */