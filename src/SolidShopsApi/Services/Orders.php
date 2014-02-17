<?php

namespace SolidShopsApi\Services;

class Orders extends \SolidShopsApi\Services\Base {
	protected $_entity = "orders";

	public function getlist($arr_option = null) {
		return parent::getlist($arr_option);
	}
	public function get($id) {
		return parent::get($id);
	}
}