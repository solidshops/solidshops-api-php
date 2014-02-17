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
}