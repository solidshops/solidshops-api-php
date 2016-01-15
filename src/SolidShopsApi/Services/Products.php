<?php

namespace SolidShopsApi\Services;

class Products extends \SolidShopsApi\Services\Base {
	protected $_entity = "products";

	public function getlist($arr_option = null) {
		return parent::getlist($arr_option);
	}
	public function get($id) {
		return parent::get($id);
	}
	
	public function test(){
	    $api_endpoint = "/oauth/test";
	    //$api_endpoint = "/shops";
	    
	    $obj_response = $this->httpGet ( $api_endpoint );
	    //error_log(print_r($obj_response,true));
	    $obj_jsonresponse = $obj_response->toJsonResponse ();
	    
	    return $obj_jsonresponse;
	}
	
	public function create($input) {
		$api_endpoint = "/" . $this->_entity;
	
		$obj_response = $this->httpPost ( $api_endpoint ,$input);
	
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
