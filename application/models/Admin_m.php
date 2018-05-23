<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {
	public function getAll(){
		$this->db->select('a.id, nama, alamat, no_hp, username, email');
		$this->db->join('user u', 'u.jenis_pemilik = \'admin\' AND u.id_pemilik = a.id');
		return $this->db->get('admin a')->result();
	}

	public function get($id){
		$this->db->select('a.id, nama, alamat, no_hp, username, email');
		$this->db->join('user u', 'u.jenis_pemilik = \'admin\' AND u.id_pemilik = a.id');
		$this->db->where('a.id', $id);
		return $this->db->get('admin a')->row();
	}

	public function edit($id, $data){
		$admin = [
			'nama' => $data['nama'],
			'alamat' => $data['alamat'],
			'no_hp' => $data['no_telp'],
			'email' => $data['email']
		];

		$this->db->where('id', $id);
		$admin = $this->db->update('admin', $admin);

		if (!empty($data['password'])) {
			$user = ['password' => password_hash($data['password'], PASSWORD_BCRYPT)];
			$this->db->where(['id_pemilik' => $id, 'jenis_pemilik' => 'admin']);
			$this->db->update('user', $user);
		}

		return $admin;
	}

	public function buat($data){
		$user = [
			'username' => $data['username'],
			'password' => password_hash($data['password'], PASSWORD_BCRYPT)
		];

		$data = [
			'nama' => $data['nama'],
			'alamat' => $data['alamat'],
			'no_hp' => $data['no_telp'],
			'email' => $data['email']
		];

		$this->db->insert('admin', $data);
		$admin_id = $this->db->insert_id();

		$user['id_pemilik'] = $admin_id;
		$user['jenis_pemilik'] = 'admin';

		$this->db->insert('user', $user);
		$user_id = $this->db->insert_id();

		return $user_id && $admin_id;
	}

	public function delete($id){
		$this->db->where('id', $id);
		$admin = $this->db->delete('admin');

		$this->db->where(['id_pemilik' => $id,  'jenis_pemilik' => 'admin']);
		$user = $this->db->delete('user');

		return $user && $admin;
	}
}

/* End of file Admin_m.php */
/* Location: ./application/models/Admin_m.php */