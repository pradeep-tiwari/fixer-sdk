<?php

namespace sdk\CurlClient;

//use sdk\http\Response;
use sdk\exceptions\APIUnavailableException;

class CurlClient {
    
    private $_url;   
    private $_response = [];

    
    public function request(string $url = '') {
        $this->_url = $url;
        
        $ch = curl_init($this->getURL());
		curl_setopt_array($ch, array(
			// CURLOPT_CONNECTTIMEOUT => 1,
			// CURLOPT_TIMEOUT => 5,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true
		));
        
        return $this->_response($ch);
    }
    
    private function _response($ch = null) {
        $response = curl_exec($ch);
		$this->response['status'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
        if ($this->response['status'] != 200 or $response == '') {
			throw new APIUnavailableException('API Unreachable');
		}
		
        // escaped characters
		$response = str_replace('\\', '', $response);
		
        $this->response['body'] = json_decode($response);
		if ($this->response['body']->type != 'success') {
			throw new APIUnavailableException('API Failed');
		}
		
        $this->cleanUp();
		
        return $this->response['body']->value;
    }
    
}