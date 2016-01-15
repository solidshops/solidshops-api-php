<?php

namespace SolidShopsApi\Http\Auth;

class ApiKeyAuthentication
{

    private $_apikey = "";

    public function __construct($key)
    {

    	$this->setApiKey($key);

    }


    public function setApiKey($value)
    {
        $this->_apikey = $value;
    }

    public function getApiKey()
    {
        return $this->_apikey ;
    }
	
   
}