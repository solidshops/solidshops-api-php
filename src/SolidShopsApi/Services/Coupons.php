<?php
namespace SolidShopsApi\Services;
class Coupons extends \SolidShopsApi\Services\Base {
	protected $_entity = "coupons";
	public function getlist($arr_option = null) {
		return parent::getlist($arr_option);
	}
}
