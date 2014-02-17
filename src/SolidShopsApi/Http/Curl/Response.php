<?php
namespace SolidShopsApi\Http\Curl;

class Response
{

    private $body = '';
    private $arr_headers = array();

    public function __construct($response)
    {

        # Headers regex
        $pattern = '#HTTP/\d\.\d.*?$.*?\r\n\r\n#ims';

        # Extract headers from response
        preg_match_all($pattern, $response, $matches);
        $headers_string = array_pop($matches[0]);
        $headers = explode("\r\n", str_replace("\r\n\r\n", '', $headers_string));

        # Remove headers from the response body
        $this->body = str_replace($headers_string, '', $response);

        # Extract the version and status from the first header
//        $version_and_status = array_shift($headers);
//        preg_match('#HTTP/(\d\.\d)\s(\d\d\d)\s(.*)#', $version_and_status, $matches);
//        $this->headers['Http-Version'] = $matches[1];
//        $this->headers['Status-Code'] = $matches[2];
//        $this->headers['Status'] = $matches[2].' '.$matches[3];

        # Convert headers into an associative array
        foreach ($headers as $header) {
            preg_match('#(.*?)\:\s(.*)#', $header, $matches);
            if (isset($matches[1])) {
                $this->arr_headers[$matches[1]] = $matches[2];
            }
        }
    }

    public function __toString()
    {
        return $this->body;
    }


    public function getHeaders()
    {
        return $this->arr_headers;
    }


    public function getBody()
    {
        return $this->body;
    }

    public function getBodyAsArray()
    {
        return json_decode($this->body, true);
    }

    public function getBodyAsObject()
    {
        return json_decode($this->body);
    }

    public function toJsonResponse()
    {
    	
    	$obj_jsonreponse = new \SolidShopsApi\Http\Dt\JsonResponse();
    	try{
    		/*$arr_body = $this->getBodyAsArray();
    		$obj_jsonreponse->setHttpStatus($arr_body['http_status']);
    		$obj_jsonreponse->setSuccess($arr_body['success']);
    		
    		if(isset($arr_body['data'])){
    			$obj_jsonreponse->setData($arr_body['data']);
    		}
    		
    		if(isset($arr_body['errors'])){
    			$obj_jsonreponse->setErrors($arr_body['errors']);
    		}
    		*/
    		$obj_body = $this->getBodyAsObject();

    		$obj_jsonreponse->setHttpStatus($obj_body->http_status);
    		$obj_jsonreponse->setSuccess($obj_body->success);
    		
    		if(isset($obj_body->data)){
    			$obj_jsonreponse->setData($obj_body->data);
    		}
    		
    		if(isset($obj_body->errors)){
    			$obj_jsonreponse->setErrors($obj_body->errors);
    		}
    		 
    	}catch (\Exception $e){
    		$obj_jsonResponse = new \SolidShopsApi\Http\Dt\JsonResponse();
    		$obj_jsonResponse->setSuccess(false);
    	}
       
        


        return $obj_jsonreponse;
    }

}