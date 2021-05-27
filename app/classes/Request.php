<?php
/**
 * Request File
 * 
 * @package crudapp
 * @file Request File
 * @type class
 * @example 
 * 	To get GET/POST Body or Parameters : $request->getBody()
 * 
 */

/**
 * @namespace classes all classes will be under App Classes namespace
 */

namespace classes;

class Request
{
	function __construct()
	{
		$this->bootstrapSelf();
	}

	private function bootstrapSelf()
	{
		foreach ($_SERVER as $key => $value) {
			$this->{$this->toCamelCase($key)} = $value;
		}
	}

	private function toCamelCase($string)
	{
		$result = strtolower($string);

		preg_match_all('/_[a-z]/', $result, $matches);

		foreach ($matches[0] as $match) {
			$c = str_replace('_', '', strtoupper($match));
			$result = str_replace($match, $c, $result);
		}

		return $result;
	}

	public function getBody()
	{
		if ($this->requestMethod === "GET") {
			$body = array();
			foreach ($_GET as $key => $value) {
				$body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
			}
			return;
		}

		if ($this->requestMethod == "POST") {

			$body = array();
			foreach ($_POST as $key => $value) {
				$body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
			}

			return $body;
		}
	}
}
