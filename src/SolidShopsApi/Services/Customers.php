<?php

namespace SolidShopsApi\Services;

class Customers extends \SolidShopsApi\Services\Base {
	protected $_entity = "customers";

	public function getlist($arr_option = null) {
		return parent::getlist($arr_option);
	}
	public function get($id) {
		return parent::get($id);
	}
}
