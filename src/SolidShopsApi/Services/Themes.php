<?php

namespace SolidShopsApi\Services;

class Themes extends \SolidShopsApi\Services\Base {
	protected $_entity = "themes";

	public function getlist($arr_option = null) {
		return parent::getlist($arr_option);
	}
	public function get($id) {
		return parent::get($id);
	}
	
	public function create($input) {
		$api_endpoint = "/" . $this->_entity;
	
		$obj_response = $this->httpPost ( $api_endpoint ,$input);
	
		$obj_jsonresponse = $obj_response->toJsonResponse ();
	
		return $obj_jsonresponse;
	}
	
	public function createFromArchive($file) {
		$api_endpoint = "/" . $this->_entity;
	
		$obj_curl = $this->initCurl();
	
		
		$this->obj_response = null;
		
		
		$obj_curl->addHeader('Content-Type', 'multipart/form-data');
		$obj_curl->addHeader('Expect', '');
		 
		$post = array();
		
		 
		if (version_compare(phpversion(), '5.5.0', '>=')) {
			$post['assets'] = new \CurlFile($file);
		}
		else {
			$post['assets'] = '@' . $file;
		}
		
		
		$obj_response = $obj_curl->post($this->getUri() . $api_endpoint,$post);
		
		
		$obj_jsonresponse = $obj_response->toJsonResponse ();
	
		return $obj_jsonresponse;
	}
	
	public function update($id,$input) {
		$api_endpoint = "/" . $this->_entity."/".$id;
	
		$obj_response = $this->httpPut ( $api_endpoint ,$input);
	
		$obj_jsonresponse = $obj_response->toJsonResponse ();
	
		return $obj_jsonresponse;
	}
	
	public function delete($id) {
		$api_endpoint = "/" . $this->_entity."/".$id;
	
		$obj_response = $this->httpDelete ( $api_endpoint);
	
		$obj_jsonresponse = $obj_response->toJsonResponse ();
	
		return $obj_jsonresponse;
	}
	
}
