<?php

namespace SolidShopsApi\Http;

class ApiRequest
{

    private $_schema = "";
    private $_domain = "";
    private $_auth = null;

    /** @var \SolidShopsApi\Http\Curl\Request|null  */
    public $_obj_curl = null;

    public function __construct($obj_auth)
    {

    	$this->setSchema("https");
    	$this->setDomain("api.solidshops.com");
    	$this->setAuth($obj_auth);
    	
        
    }


    public function initCurl(){
    	$this->_obj_curl = new \SolidShopsApi\Http\Curl\Request();
    	
    	$this->_obj_curl->addHeader('Content-Type', 'application/json');
    	$this->_obj_curl->addOption('CURLOPT_SSL_VERIFYHOST', false);
    	$this->_obj_curl->addOption('CURLOPT_SSL_VERIFYPEER', false);
    	
    	if($this->_auth instanceof \SolidShopsApi\Http\Auth\BasicAuthentication){
    		$this->_obj_curl->addOption('CURLOPT_USERPWD', $this->_auth->getUser().":".$this->_auth->getPassword());
    		$this->_obj_curl->addOption('CURLOPT_HTTPAUTH', CURLAUTH_BASIC);
    	}
    	
    	if($this->_auth instanceof \SolidShopsApi\Http\Auth\ApiKeyAuthentication){
    	    $this->_obj_curl->addHeader("X-SolidShops-ApiKey",$this->_auth->getApiKey());
    	}

    	if($this->_auth instanceof \SolidShopsApi\Http\Auth\OAuth2ClientCredentialsAuthentication){
    	    $this->_obj_curl->addHeader("Authorization","Bearer " . $this->_auth->getToken());
    	}
    	return $this->_obj_curl;
    }
    
    
    public function setSchema($value)
    {
        $this->_schema = $value;
    }

    public function setDomain($value)
    {
        $this->_domain = $value;
    }
    
    public function setAuth($value)
    {
    	$this->_auth = $value;
    }

    protected function httpGet($path)
    {
    	$this->initCurl();
        $this->obj_response = null;

        //$this->_obj_curl->setConnectTimeout(5000);
        //$this->_obj_curl->setCurlTimeout(5000);
        
       // echo $this->getUri() . $path;
        $obj_response = $this->_obj_curl->get($this->getUri() . $path);

        
        return $obj_response;
        /*
        $obj_jsonbody =  json_decode($obj_response->getBody());
        $obj_jsonrepost = new \SolidShopsApi\Http\Dt\JsonResponse();
        */
        
        

    }

    //payload can be json string, http url encode
    protected function httpPost($path, $payload)
    {
    	$this->initCurl();
        $this->obj_response = null;

        $obj_response = $this->_obj_curl->post($this->getUri() . $path, $payload);

        return $obj_response;

    }

    //payload can be json string, http url encode
    protected function httpPut($path, $payload)
    {
    	$this->initCurl();
    	$this->obj_response = null;
    
    	$obj_response = $this->_obj_curl->put($this->getUri() . $path, $payload);
    
    	return $obj_response;
    
    }
    
    protected function httpDelete($path)
    {
    	$this->initCurl();
    	$this->obj_response = null;
    
    	$obj_response = $this->_obj_curl->delete($this->getUri() . $path);
    
    	return $obj_response;
    
    }
    
    
    public function getUri()
    {
    	$url = $this->_schema . "://" . $this->_domain."/v1";
    	return $url;
    }

    //convert input: json|array|object to json
    public function toJson($input)
    {
        switch (true) {
            case is_array($input):
                return json_encode($input);
                break;

            case is_object($input):
                return json_encode((array)$input);
                break;
            default:
                return $input;
                break;
        }
    }
}
