<?php

/**
 * abstract class for MethodsHandlers, e.g., EmployeeMethodsHandler
 */

namespace PrismApi\MethodHandlers;

use PrismApi\PrismCurlService;
use PrismApi\PrismSessionHandler;

abstract class MethodsHandlerAbstract
{
    protected $service;
	static protected $url;
    static protected $session;


	function __construct()
	{
        $this->url = $_ENV['url'];
        $this->service = new PrismCurlService();
        $this->session = PrismSessionHandler::makeSession();        
        
	}

	public function listMethods()
	{
		return get_class_methods($this);
	}
	
}

