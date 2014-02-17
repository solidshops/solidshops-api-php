<?php

namespace SolidShopsApi\Http\Dt;

class JsonResponse
{

	protected $http_status = false;
    protected $succes = false;
    protected $data = null;
    protected $errors = null;


    public function __construct()
    {
        $this->succes = false;
    }

    public function setHttpStatus($http_status)
    {
    	$this->http_status =$http_status;
    }
    
    public function getHttpStatus()
    {
    	return $this->http_status;
    }
    
    public function setSuccess($success)
    {
        $this->succes =$success;
    }

    public function getSuccess()
    {
        return $this->succes;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

  
    public function setErrors($arr_errors)
    {
    	 $this->errors = $arr_errors;
    }
    
    public function getErrors()
    {
        return $this->errors;
    }

    public function __toString()
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        $arr_return = array();
        $arr_return['success'] = $this->getSuccess();
        //(string)  ($this->getSuccess() ? "true":"false" )."x"
        $arr_return['data'] = $this->getData();
        $arr_return['errors'] = $this->getErrors();
        return $arr_return;
    }

}