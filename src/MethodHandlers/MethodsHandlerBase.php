<?php

/**
 * abstract class for MethodsHandlers, e.g., EmployeeMethodsHandler
 */

namespace PrismApi\MethodHandlers;

use PrismApi\PrismCurlService;
use PrismApi\PrismSessionHandler;

class MethodsHandlerBase
{
	protected $service;
	static protected $url;
	static protected $session;
	protected $parent = NULL;
	const RESTPATH = '';


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

	/**
	 * adds parent MethodsHandlerBase class and changes url of MethodsHandler
	 * @param  MethodsHandlerBase $mhb parent
	 * @return null                  
	 */
	public function setupMethodHandler(MethodsHandlerBase $mhb)
    {
        $this->parent = $mhb;

        // TODO:kinda bad to be setting URL here
        $this->url = $this->parent->url . STATIC::RESTPATH;
    }
	
}

