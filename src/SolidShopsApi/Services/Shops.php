<?php

namespace SolidShopsApi\Services;

class Shops extends \SolidShopsApi\Services\Base {
	protected $_entity = "shops";

	public function get($id) {
		return parent::get($id);
	}
}