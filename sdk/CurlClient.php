<?php

namespace sdk;

//use sdk\http\Response;
use sdk\exceptions\APIUnavailableException;

class CurlClient {
    public function request(string $url = '') {
        $curl = curl_init();
		
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));
		
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		
		// Close request to clear up some resources
		curl_close($curl);
		
		return $resp;
    }
    
}