<?php

class Bitexen{
	
	public	$USERNAME='emailadresi';
	
	public	$Passphrase='Passphrase';
	
	public	$apiKey='apiKey';
	
	public	$secretKey='secretKey';
	
  
	public function sign_request($time) {

    		$message = $this->apiKey . $this->USERNAME . $this->Passphrase . $time . '{}';
		
		$signature=strtoupper(hash_hmac('SHA256', $message, $this->secretKey));
		
		return $signature;
	
	}

 	public function AllList(){
		
		$url = 'https://www.bitexen.com/api/v1/market_info/';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$header = array( 
		'Content-Type: application/json'
		);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		$curl_response = curl_exec($curl);
		return $curl_response;
	}

	public function getBalance(){

		$url = 'https://www.bitexen.com/api/v1/balance/';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$time=time();
		$header = array( 
		'ACCESS-USER: '. $this->USERNAME,
		'ACCESS-PASSPHRASE: '. $this->Passphrase,
		'ACCESS-TIMESTAMP: '.$time,
		'ACCESS-SIGN: '.$this->sign_request($time),
		'ACCESS-KEY: '. $this->apiKey,
		'Content-Type: application/json'
		);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		$curl_response = curl_exec($curl);
		return $curl_response;

	}
	
}
