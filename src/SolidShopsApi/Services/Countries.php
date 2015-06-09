<?php
namespace SolidShopsApi\Services;
class Countries extends \SolidShopsApi\Services\Base {

	protected $_entity = "countries";
	public function getlist($arr_option = null) {
		return parent::getlist($arr_option);
	}

}
