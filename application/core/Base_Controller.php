<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {
	public function sendNotification($channel, $event, $data){
		$options = array(
			'cluster' => $_ENV['PUSHER_CLUSTER'],
			'encrypted' => true
		);

		/*$pusher = new Pusher\Pusher(
			$_ENV['PUSHER_KEY'], $_ENV['PUSHER_SECRET'], $_ENV['PUSHER_APP_ID'], $options
		);

		$pusher->trigger($channel, $event, $data);*/

		$pushNotification = new \Pusher\PushNotifications\PushNotifications(array(
			'instanceId' => $_ENV['PUSHER_INSTANCE_ID'],
			'secretKey' => $_ENV['PUSHER_SECRET_KEY']
		));

		//var_dump(['fcm' => ['notification' => ['title' => 'title', 'body' => 'body'], 'data' => ['event' => $event, 'data' => $data]]]);die;

		$publishResponse = $pushNotification->publish(
			$channel, ['fcm' => ['data' => ['event' => $event, 'info' => $data]]]
		);
	}
}

/* End of file Base_Controller.php */
/* Location: ./application/core/Base_Controller.php */