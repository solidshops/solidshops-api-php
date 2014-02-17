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
}