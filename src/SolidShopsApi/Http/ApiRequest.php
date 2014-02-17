<?php

namespace SolidShopsApi\Http;

class ApiRequest
{

    private $_schema = "";
    private $_domain = "";

    /** @var \SolidShopsApi\Http\Curl\Request|null  */
    public $_obj_curl = null;

    public function __construct($obj_auth)
    {

    	$this->setSchema("https");
    	$this->setDomain("api.solidshops.com");
    	
        $this->_obj_curl = new \SolidShopsApi\Http\Curl\Request();

        $this->_obj_curl->addHeader('Content-Type', 'application/json');
        $this->_obj_curl->addOption('CURLOPT_SSL_VERIFYHOST', false);
        $this->_obj_curl->addOption('CURLOPT_SSL_VERIFYPEER', false);

        if($obj_auth instanceof \SolidShopsApi\Http\Auth\BasicAuthentication){
      
        	 $this->_obj_curl->addOption('CURLOPT_USERPWD', $obj_auth->getUser().":".$obj_auth->getPassword());
        	 $this->_obj_curl->addOption('CURLOPT_HTTPAUTH', CURLAUTH_BASIC);

        }
    }


    public function setSchema($value)
    {
        $this->_schema = $value;
    }

    public function setDomain($value)
    {
        $this->_domain = $value;
    }
	

    protected function httpGet($path)
    {
        $this->obj_response = null;

        echo $this->getUri() . $path;
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
        $this->obj_response = null;

        $obj_response = $this->_obj_curl->post($this->getUri() . $path, $payload, $this->_port);

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