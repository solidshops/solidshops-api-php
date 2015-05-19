<?php

namespace SolidShopsApi\Services;

class Carts extends \SolidShopsApi\Services\Base {
	protected $_entity = "carts";

	public function getlist($arr_option = null) {
		return parent::getlist($arr_option);
	}

	public function get($cartId) {
		return parent::get($cartId);
	}

	public function create($input=null) {
		$api_endpoint = "/" . $this->_entity;
		
		$obj_response = $this->httpPost ( $api_endpoint ,$input);
		
		$obj_jsonresponse = $obj_response->toJsonResponse ();
		
		return $obj_jsonresponse;
	}
	
	public function addItem($cartId,$input) {
		$api_endpoint = "/" . $this->_entity."/".$cartId."/items";
	
		$obj_response = $this->httpPost ( $api_endpoint ,$input);
	
		$obj_jsonresponse = $obj_response->toJsonResponse ();
	
		return $obj_jsonresponse;
	}
	
	public function removeItem($cartId,$itemId) {
		$api_endpoint = "/" . $this->_entity."/".$cartId."/items/".$itemId;
	
		$obj_response = $this->httpDelete ( $api_endpoint);
	
		$obj_jsonresponse = $obj_response->toJsonResponse ();
	
		return $obj_jsonresponse;
	}


	public function update($cartId,$input) {
		$api_endpoint = "/" . $this->_entity."/".$cartId;
		
		$obj_response = $this->httpPut ( $api_endpoint ,$input);
		
		$obj_jsonresponse = $obj_response->toJsonResponse ();
		
		return $obj_jsonresponse;
	}
}
