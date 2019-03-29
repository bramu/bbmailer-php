<?php

if (!function_exists('json_encode')) {
	throw new Exception('BBMailer needs the JSON PHP extension.');
}

require(dirname(__FILE__) . '/bbmailer/client.php');

class BBMailer {

	private $client;

	public function __construct($auth_token) {
		if (!$auth_token) {
			throw new Exception("BBMailer: auth_token parameter is required");
		}
		$this->client = new BBMailer\Client($auth_token);
	}

	public function send_email($template_name, $to_address, $data_mapping) {
		return $this->client->send_email($template_name, $to_address, $data_mapping);
	}

	public function send_event($event_name, $customer_email, $event_properties) {
		return $this->client->send_event($event_name, $customer_email, $event_properties);
	}

}

?>
