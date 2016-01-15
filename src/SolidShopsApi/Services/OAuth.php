<?php

namespace SolidShopsApi\Services;

class OAuth extends \SolidShopsApi\Services\Base {
	protected $_entity = "oauth";

	public function tokenClientCredentials() {
		$api_endpoint = "/" . $this->_entity ."/token";
	
	
	
		$obj_curl = $this->initCurl();
		
		
		$this->obj_response = null;
		
		
		$obj_curl->addHeader('Content-Type', 'multipart/form-data');

			
		$post = array();
		$post['grant_type'] = "client_credentials";
		
		$response = $obj_curl->post($this->getUri() . $api_endpoint,$post);
		
		$tokenObject = json_decode($response->getBody());
		
		return $tokenObject->access_token;
	
	
	
	
	
	
	
	
	
	}
	
}