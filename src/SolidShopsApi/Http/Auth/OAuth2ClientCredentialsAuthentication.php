<?php

namespace SolidShopsApi\Http\Auth;

class OAuth2ClientCredentialsAuthentication
{

    private $_client_id = "";
    private $_client_secret = "";
    private $_token = "";


    public function __construct($config)
    {

    	$this->setClientId($config['client_id']);
    	$this->setClientSecret($config['client_secret']);
    	
    	if(isset($config['token'])){
    	    $this->setToken($config['token']);
    	}else{
    	    $obj_auth = new \SolidShopsApi\Http\Auth\BasicAuthentication ( $this->getClientId(),$this->getClientSecret() );
    	    $obj_req = new \SolidShopsApi\Services\OAuth($obj_auth);
    	    $obj_req->setDomain("api.solidshops.dev");

    	    $this->setToken($obj_req->tokenClientCredentials());
    	    
    	}
    	

    }


    public function getClientId()
    {
        return $this->_client_id;
    }

    public function getClientSecret()
    {
        return $this->_client_secret;
    }


    public function getToken()
    {
        return $this->_token;
    }

    public function setClientId($_client_id)
    {
        $this->_client_id = $_client_id;
    }


    public function setClientSecret($_client_secret)
    {
        $this->_client_secret = $_client_secret;
    }


    public function setToken($_token)
    {
        $this->_token = $_token;
    }

	
   
}