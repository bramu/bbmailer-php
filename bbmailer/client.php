<?php

namespace BBMailer;

class Client {

	private $auth_token;

	public function __construct($auth_token) {
		$this->auth_token = $auth_token;
    }

    public function send_email($template_name, $to_address, $data_mapping) {
		$endpoint = "http://localhost:4000/api/send_event";

		$request_data = array(
			'auth_token' => $this->auth_token,
			'email' => $to_address,
			'template_name' => $template_name,
			"data_mapping" => $data_mapping
		);

		return $this->_send($endpoint, $request_data);
	}


    private function _send($endpoint, $request_data) {
		$request_data = json_encode($request_data);

		$headers  = array('Accept: application/json', 'Content-Type: application/json');

		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $endpoint);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $request_data);

		$result = curl_exec($handle);
		$code   = curl_getinfo($handle, CURLINFO_HTTP_CODE);
		curl_close($handle);

		return $result;
	}

}

?>