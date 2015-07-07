<?php

namespace SolidShopsApi\Services;

class Base extends \SolidShopsApi\Http\ApiRequest {
	
	
	
	public function getlist($arr_option = null) {
		$api_endpoint = "/" . $this->_entity;
		if (count ( $arr_option ) > 0) {
			$api_endpoint .= "?" . http_build_query ( $arr_option );
		}
		
		$obj_response = $this->httpGet ( $api_endpoint );
		//error_log(print_r($api_endpoint,true));
		$obj_jsonresponse = $obj_response->toJsonResponse ();
		
		return $obj_jsonresponse;
	}
	
	public function get($id) {
		$api_endpoint = "/" . $this->_entity."/".$id;

		$obj_response = $this->httpGet ( $api_endpoint );
		//error_log(print_r($obj_response,true));
		$obj_jsonresponse = $obj_response->toJsonResponse ();
		
		return $obj_jsonresponse;
	}
	
}