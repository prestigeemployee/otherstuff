<?php

/**
 * abstract class for MethodsHandlers, e.g., EmployeeMethodsHandler
 */

namespace PrismApi\MethodHandlers;

use PrismApi\Services\MethodsHandlerRepo;

class MethodsHandlerAbstract
{
	protected $url;
	protected $repo;
	const RESTPATH = '';


	function __construct()
	{
		$this->setUrl($_ENV['url']);
	}

	protected function setUrl($url)
	{
		$this->url .= $url;
	}

	public function listMethods()
	{
		return get_class_methods($this);
	}

	/**
	 * adds repo
	 * @param  MethodsHandlerRepo $mhr parent
	 * @return null                  
	 */
	public function setupMethodHandler(MethodsHandlerRepo $mhr)
    {
        $this->repo = $mhr;
    }
	
}

