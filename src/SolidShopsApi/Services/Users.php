<?php

namespace SolidShopsApi\Services;

class Users extends \SolidShopsApi\Services\Base {
	protected $_entity = "users";

	public function getlist($arr_option = null) {
		return parent::getlist($arr_option);
	}
	public function get($id) {
		return parent::get($id);
	}
	
	public function update($id,$input) {
	    $api_endpoint = "/" . $this->_entity."/".$id;
	
	    $obj_response = $this->httpPut ( $api_endpoint ,$input);
	
	    $obj_jsonresponse = $obj_response->toJsonResponse ();
	
	    return $obj_jsonresponse;
	}
}
