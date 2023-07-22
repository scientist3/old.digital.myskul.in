<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_model extends CI_Model {
	
	public function send_sms($numbers = null,$message = null){
		
		if(empty($numbers)) return null;
		// Account details
		$apiKey = urlencode('SQuIxz6bygI-zudW1U7EstyrV5d8IIAVtMYSGPFNGm');
		
		// Message details
		//$numbers = array(7006939042);
		$sender = urlencode('TXTLCL');
		//$message = rawurlencode('Hi Nadu,Sorry i forget ur birthday. Miss U #nadu#aamu.');
	 
		//$numbers = implode(',', $numbers);
	 
		// Prepare data for POST request
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	 
		// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		// Process your response here
		//echo $response;
		//die;
		/*{
			"balance":1,
			"batch_id":1204000170,
			"cost":2,
			"num_messages":1,
			"message": {
				"num_parts":2,
				"sender":"TXTLCL",
				"content":"Your report has been generated,You can download your report from our website www.valleydiagnosticcentre.com with your userid: P7XOIPXH and password= ."
				},
			"receipt_url":"",
			"custom":"",
			"messages":[{
					"id":"11682570080",
					"recipient":917006939042}],
			"status":"success"
		}*/
		return $response;
	}
	
	public function getconfigvalue(){
		
		/*$this->_ci =& get_instance();
		$this->_ci->config->load('smsconfig');

		//$this->db = $this->_ci->config->item('mojo_db');
		*/
		$this->config->load('smsconfig'); 
		return $this->config->item('apiKey'); 
	}
}
