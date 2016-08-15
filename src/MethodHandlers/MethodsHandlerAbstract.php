<?php

/**
 * abstract class for MethodsHandlers, e.g., EmployeeMethodsHandler
 */

namespace PrismApi\MethodHandlers;

abstract class MethodsHandlerAbstract
{
	protected $url;

	function __construct()
	{
        $this->url = $_ENV['url'];
	}

	public function listMethods()
	{
		return get_class_methods($this);
	}
	
}

