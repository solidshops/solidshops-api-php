<?php

use SolidShopsApi\Http\Auth\BasicAuthentication;
class ServiceTest extends \PHPUnit_Framework_TestCase {
	public function testSomething() {
		$obj_auth = new \SolidShopsApi\Http\Auth\BasicAuthentication ( "6d9c547cf146054a5a720606a7694467", "fb6440b1fdc21b68269091ba993250ce" );
		
		$obj_product = new \SolidShopsApi\Services\Products ($obj_auth);
		
		$obj_jsonresponse = $obj_product->getlist ();
		
		var_dump($obj_jsonresponse->getErrors());
	}
}
 