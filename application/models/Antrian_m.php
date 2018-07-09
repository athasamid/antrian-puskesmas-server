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
			$this->db->where('date(w_antrian) = date(now()) and id_poli = '.$input['id_poli']);
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
		$this->db->select('a.id, a.id_poli, a.id_pasien, a.w_antrian, date(a.w_antrian) as date_antrian, a.no_antrian');
		$this->db->join('pasien p', 'p.id = a.id_pasien');
		$this->db->join('masyarakat m', 'm.id = p.id_masyarakat');
		$this->db->join('user u', 'u.id_pemilik = m.id and u.jenis_pemilik = \'masyarakat\'');
		$this->db->order_by('a.w_antrian', 'desc');
		$this->db->where('u.id', $id_user);
		$antrian = $this->db->get('antrian a')->result();

		foreach ($antrian as $row) {
			$start = new DateTime();
			$start->setTime( 0, 0, 0 );

			$end = new DateTime();
			$end->setTime(23, 59, 59);

			$checkedDate = DateTime::createFromFormat( "Y-m-d H:i:s", $row->w_antrian );

			$this->db->select('id, id_poli, waktu, antrian');
			$this->db->where('id_poli = '. $row->id_poli .' and waktu = \''.$row->date_antrian.'\'');
			$dilayani = $this->db->get('poli_dilayani')->row();
			$row->dilayani = $dilayani ? (int)$dilayani->antrian : 0;

			$row->in_progress = ($checkedDate->getTimestamp() > $start->getTimestamp() && $checkedDate->getTimestamp() < $end->getTimestamp()) && $row->dilayani < $row->no_antrian;
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
		$this->db->select('a.id, a.id_poli, a.id_pasien, a.w_antrian, date(a.w_antrian) as date_antrian, a.no_antrian');
		$this->db->where('a.id', $id);
		$antrian = $this->db->get('antrian a')->row();

		$this->db->select('id, id_poli, waktu, antrian');
		$this->db->where('id_poli = '. $antrian->id_poli .' and waktu = \''.$antrian->date_antrian.'\'');
		$dilayani = $this->db->get('poli_dilayani')->row();

		$antrian->dilayani = $dilayani ? (int)$dilayani->antrian : 0;

		$start = new DateTime();
		$start->setTime( 0, 0, 0 );

		$end = new DateTime();
		$end->setTime(23, 59, 59);

		$checkedDate = DateTime::createFromFormat( "Y-m-d H:i:s", $antrian->w_antrian );
		$antrian->in_progress = ($checkedDate->getTimestamp() > $start->getTimestamp() && $checkedDate->getTimestamp() < $end->getTimestamp()) && $antrian->dilayani < $antrian->no_antrian;

		$this->db->select('id, nama, icon');
		$this->db->where('id', $antrian->id_poli);
		$antrian->poli = $this->db->get('poli')->row();
		$antrian->poli->icon = base_url($antrian->poli->icon);

		$this->db->select('id, nama, alamat, kelamin, tgl_lahir, tempat_lahir, no_askes, no_telp');
		$this->db->where('id', $antrian->id_pasien);
		$antrian->pasien = $this->db->get('pasien')->row();

		return $antrian;
	}

	public function panggil($id, $refresh = false){
		$this->db->select('id, nama, icon');
		$this->db->where('id', $id);
		$output = $this->db->get('poli')->row();

		$this->db->select('antrian');
		$this->db->where('id_poli ='. $id.' and waktu = date(now())');
		$antrian = $this->db->get('poli_dilayani')->row();

		$output->urutan = sprintf("%04d", $antrian ? $antrian->antrian + 1 : 1);

		$this->db->select('no_antrian');
		$this->db->where('no_antrian > '. $output->urutan.' and date(w_antrian) = date(now()) and id_poli  = '.$id);
		$this->db->order_by('no_antrian', 'asc');
		$next_antrian = $this->db->get('antrian', 5, 0)->result();

		$this->db->select('a.id, p.id_masyarakat, u.id id_user, p.nama, '.$output->urutan.' as no_sekarang, p.alamat, p.kelamin, p.tgl_lahir, p.tempat_lahir, p.no_askes, p.no_telp, a.no_antrian');
		$this->db->join('pasien p', 'p.id = a.id_pasien');
		$this->db->join('masyarakat m', 'm.id = p.id_masyarakat');
		$this->db->join('user u', 'u.jenis_pemilik = \'masyarakat\' and u.id_pemilik = m.id');
		$this->db->where('no_antrian >= '. $output->urutan .' and date(w_antrian) = date(now()) and id_poli = '. $id);
		$this->db->order_by('no_antrian', 'asc');
		$dataNotif = $this->db->get('antrian a')->result();

		$this->db->select('a.id, p.nama, a.no_antrian, p.alamat, p.kelamin, p.tgl_lahir, p.tempat_lahir, p.no_askes, p.no_telp');
		$this->db->join('pasien p', 'p.id = a.id_pasien');
		$this->db->where('date(w_antrian) = date(now()) and id_poli = '.$id);
		$this->db->order_by('no_antrian', 'asc');
		$daftar_antrian = $this->db->get('antrian a')->result();

		$output->dataNotif = [];

		$na = '';
		if (count($next_antrian)) {
			foreach ($next_antrian as $row) {
				$na .= '<li class="list-group-item">'.sprintf("%04d", $row->no_antrian).'</li>'; 
			}
		} else {
			$na = '<li class="list-group-item">Belum ada antrian</li>'; 
		}

		$output->list_antrian = $na;

		$da = '';
		if (count($daftar_antrian)) {
			foreach ($daftar_antrian as $row) {
				$da .= '<tr><td rowspan="2" style="font-size: 20pt;  text-align: center;" valign="center">'.$row->no_antrian.'</td><td>'.$row->nama.'</td></tr><tr><td>'.$row->no_telp.'</td></tr>';
			}
		} else {
			$da .= '<tr><td>Tidak ada antrian</td></tr>';
		}

		$output->daftar_antrian = $da;

		$this->db->select('id');
		$this->db->where('no_antrian > '. $output->urutan.' and date(w_antrian) = date(now()) and id_poli  = '.$id);
		$output->sisa = count($this->db->get('antrian')->result());

		$output->dataNotif = $dataNotif;

		if ($output->sisa > 0 && !$refresh) {
			$output->dataNotif = $dataNotif;
			if($antrian){
				$this->db->where('waktu = date(now()) and id_poli = '.$id);
				$this->db->update('poli_dilayani', ['antrian' =>$output->urutan]);
			} else {
				$this->db->insert('poli_dilayani', ['id_poli' => $id, 'antrian' => 1, 'waktu' => date('Y-m-d')]);
			}
		}

		$output->suara = explode(' ', terbilang($output->urutan));

		return $output;
	}

	public function buatManual($id){
		$this->db->select('no_antrian');
		$this->db->where('date(w_antrian) = date(now()) and id_poli = '.$id);
		$this->db->order_by('no_antrian', 'desc');
		$lastAntrian = $this->db->get('antrian')->row();

		$this->db->select('id, nama, icon');
		$this->db->where('id', $id);
		$poli = $this->db->get('poli')->row();

		$poli->icon = base_url('images/'.$poli->icon);

		$antrian = 1;
		if ($lastAntrian) {
			$antrian = $lastAntrian->no_antrian + 1;
		}

		$data = [
			'id_poli' => $id,
			'id_pasien' => null,
			'no_antrian' => $antrian,
			'w_antrian' => date('Y-m-d H:i:s')
		];

		$this->db->insert('antrian', $data);
		$id = $this->db->insert_id();

		return ['id' => $id, 'antrian' => $antrian, 'waktu' => $data['w_antrian'], 'poli' => $poli];
		return $output;
	}
}

/* End of file Antrian_m.php */
/* Location: ./application/models/Antrian_m.php */