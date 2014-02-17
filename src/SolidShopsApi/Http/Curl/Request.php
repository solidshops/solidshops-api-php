<?php

namespace SolidShopsApi\Http\Curl;

class Request
{

	// private curl
	private $curl_connect_timeout = 2;
	private $curl_timeout = 4;
	private $arr_headers = array();
	private $arr_cookies = array();
	private $arr_options = array();
	protected $request;

	public function __construct()
	{
		$this->addHeader('Content-Type', 'application/json');
	}
	
	public function setConnectTimeout($value) {
		$this->curl_connect_timeout = $value;
	}
	
	public function setCurlTimeout($value) {
		$this->curl_timeout = $value;
	}

	public function addHeader($key, $value)
	{
		$this->arr_headers [$key] = $value;
	}

	public function addCookie($key, $value)
	{
		$this->arr_cookies [$key] = $value;
	}

	public function addOption($key, $value)
	{
		$this->arr_options [$key] = $value;
	}

	public function head($url, $vars = array())
	{
		return $this->request('HEAD', $url, $vars);
	}

	public function get($url, $vars = array())
	{
		if (!empty($vars)) {
			$url .= (stripos($url, '?') !== false) ? '&' : '?';
			$url .= (is_string($vars)) ? $vars : http_build_query($vars, '', '&');
		}
		return $this->request('GET', $url);
	}

	public function post($url, $vars = array(), $port = null)
	{
		return $this->request('POST', $url, $vars, $port);
	}

	public function put($url, $vars = array())
	{
		return $this->request('PUT', $url, $vars);
	}

	public function delete($url, $vars = array())
	{
		return $this->request('DELETE', $url, $vars);
	}

	private function request($method, $url, $vars = null, $port = null)
	{
		$this->request = \curl_init();

		if (is_string($vars)) {
			$this->addHeader('Content-Length', strlen($vars));
		}

		if($port){
			$this->addOption('CURLOPT_PORT', $port);
		}

		switch (strtoupper($method)) {
			case 'HEAD' :
				$this->addOption('CURLOPT_NOBODY', true);
				break;
			case 'GET' :
				$this->addOption('CURLOPT_HTTPGET', true);
				break;
			case 'POST' :
				$this->addOption('CURLOPT_POST', true);
				break;
			default :
				$this->addOption('CURLOPT_CUSTOMREQUEST', $method);
		}

		$this->addOption('CURLOPT_URL', $url);
		if (!empty($vars)) {
			$this->addOption('CURLOPT_POSTFIELDS', $vars);
		}

		$this->set_request_options();
		$this->set_request_headers();

		$response = \curl_exec($this->request);

		if ($response) {
			$response = new Response($response);
			$this->error = null;
		} else {
			$this->error = \curl_errno($this->request) . ' - ' . \curl_error($this->request);
		}

		curl_close($this->request);

		return $response;
	}

	private function set_request_headers()
	{
		$headers = array();
		foreach ($this->arr_headers as $key => $value) {
			$headers [] = $key . ': ' . $value;
		}
		curl_setopt($this->request, CURLOPT_HEADER, 1);
		curl_setopt($this->request, CURLOPT_HTTPHEADER, $headers);
	}

	private function set_request_options()
	{
		// Set some default CURL options
		curl_setopt($this->request, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->request, CURLOPT_USERAGENT, 'SolidShopsApiPhp/CurlRequest');
		curl_setopt($this->request, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->request, CURLOPT_CONNECTTIMEOUT, $this->curl_connect_timeout);
		curl_setopt($this->request, CURLOPT_TIMEOUT, $this->curl_timeout);


		// Set any custom CURL options
		foreach ($this->arr_options as $option => $value) {
			curl_setopt($this->request, constant('CURLOPT_' . str_replace('CURLOPT_', '', strtoupper($option))), $value);
		}

		// Cookie stuff
		if (count($this->arr_cookies) > 0) {
			$str_cookie = http_build_query($this->arr_cookies);
			curl_setopt($this->request, CURLOPT_COOKIE, $str_cookie);
		}
	}

}