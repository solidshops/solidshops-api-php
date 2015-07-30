<?php

namespace SolidShopsApi\Services;

class Categories extends \SolidShopsApi\Services\Base {
	protected $_entity = "categories";

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
