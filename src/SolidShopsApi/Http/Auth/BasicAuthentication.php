<?php

namespace SolidShopsApi\Http\Auth;

class BasicAuthentication
{

    private $_user = "";
    private $_password = "";

    public function __construct($user,$password)
    {

    	$this->setUser($user);
    	$this->setPassword($password);

    }


    public function setUser($value)
    {
        $this->_user = $value;
    }

    public function setPassword($value)
    {
        $this->_password = $value;
    }
	
    public function getUser()
    {
    	return $this->_user;
    }
    
    public function getPassword()
    {
    	return $this->_password;
    }
    
   
}