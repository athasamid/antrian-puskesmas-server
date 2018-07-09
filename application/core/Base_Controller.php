<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');

		// Check login
		$uri_action = $this->uri->segment(1);
		// Jika prefix segment bukaan auth maka check user sudah login atau belum
		if ($uri_action != 'auth') { 
			if (!$this->session->userdata('isLogin')) {
				if ($this->input->is_ajax_request()) {
					$this->session->set_flashdata('referer',
						preg_replace('/' . str_replace('/', '\/', base_url()) . '/', '', $_SERVER['HTTP_REFERER'])
					);

					header("{$_SERVER['SERVER_PROTOCOL']} 401 Unauthorized");
					exit();
				} else {
					if (!empty($uri)) $this->session->set_flashdata('referer', $uri);
					redirect(base_url('auth/login'), 'auto', 302);
				}
			}
		}
	}
	public function sendNotification($channel, $event, $data){
		$options = array(
			'cluster' => $_ENV['PUSHER_CLUSTER'],
			'encrypted' => true
		);

		$pushNotification = new \Pusher\PushNotifications\PushNotifications(array(
			'instanceId' => $_ENV['PUSHER_INSTANCE_ID'],
			'secretKey' => $_ENV['PUSHER_SECRET_KEY']
		));

		$publishResponse = $pushNotification->publish(
			$channel, ['fcm' => ['data' => ['event' => $event, 'info' => $data]]]
		);
	}
}

/* End of file Base_Controller.php */
/* Location: ./application/core/Base_Controller.php */