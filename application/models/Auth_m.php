<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {
	public function do_login($username, $password, $api = false)
	{
		$this->db->select('id, username, password, jenis_pemilik, id_pemilik');	
		$this->db->where('username', $username);

		if ($user = $this->db->get('user')->row()) {
			if ($api && $user->jenis_pemilik != 'masyarakat'){
				return ['error' => ['Username atau password tidak sesuai']];
			} else if (password_verify($password, $user->password)) {
				switch ($user->jenis_pemilik) {
					case 'admin':
						$user->info  = $this->db
							->select('id, nama, alamat, no_hp')
							->where('id', $user->id_pemilik)
							->get('admin')->row();
						break;
					case 'apoteker':
						$user->info = $this->db
							->select('id, nama, alamat, no_hp')
							->where('id', $user->id_pemilik)
							->get('apoteker')->row();
						break;
					//Bingung kasih nama, jadi ak nama i masyarakat	
					case 'masyarakat':
						$user->info = $this->db
							->select('id, nama, alamat, no_hp, email')
							->where('id', $user->id_pemilik)
							->get('masyarakat')->row();
						break;
				}

				unset($user->password);
				unset($user->id_pemilik);

				return $user;
			} else {
				return ['error' => ['Username atau password tidak sesuai']];
			}
		} else {
			return ['error' => ['Username atau password tidak sesuai']];
		}
	}

	public function do_register($inputs){
		$output = [];

		$this->db->select('m.email, u.username');
		$this->db->join('masyarakat m', 'm.id = u.id_pemilik');
		$this->db->where('u.username', $inputs['username']);
		$checkUsernameExist = $this->db->get('user u')->row();

		$this->db->select('m.email, u.username');
		$this->db->join('masyarakat m', 'm.id = u.id_pemilik');
		$this->db->where('m.email', $inputs['email']);
		$checkEmailExist = $this->db->get('user u')->row();

		if ($checkEmailExist) {
			$output['error'][] = 'Email sudah digunakan';
		} elseif ($checkUsernameExist) {
			$output['error'][] = 'Username sudah digunakan';
		} else {
			$dataMasyarakat = [
				'nama' => $inputs['nama'],
				'alamat' => $inputs['alamat'],
				'no_hp' => $inputs['no_hp'],
				'email' => $inputs['email'],
				'kelamin' => $inputs['kelamin']
			];

			$this->db->insert('masyarakat', $dataMasyarakat);
			$id_pemilik = $this->db->insert_id();

			$dataUser = [
				'username' => $inputs['username'],
				'password' => password_hash($inputs['password'], PASSWORD_BCRYPT),
				'jenis_pemilik' => 'masyarakat',
				'id_pemilik' => $id_pemilik
			];

			$this->db->insert('user', $dataUser);

			$output = ['success' => true];
		}

		return $output;
	}
}

/* End of file Auth_m.php */
/* Location: ./application/models/Auth_m.php */