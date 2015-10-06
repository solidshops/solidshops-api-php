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
}
