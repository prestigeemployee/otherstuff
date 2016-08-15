<?php

/**
 * DESCRIPTION
 */

namespace PrismApi\Services;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;


// TODO: DO NOT DO THIS IN PRODUCTION

Class MethodsHandlerRepo
{
	protected $methodsHandlerList = [];

	function __construct()
	{
		echo 'MethodsHandlerRepo constructed <br />';
		
		// create a log channel


	}

	public function addHandler(MethodsHandlerAbstract $mh)
	{
		array_push($this->methodsHandlerList, $mh);

		echo 'MethodsHandlerRepo::addHandler: <pre>' . var_export($this->methodsHandlerList, true) . '</pre>';
		
	}

	public function getMethodHandler($name)
	{
		foreach ($this->methodsHandlerList as $methodsHandler)
		{
			if (in_array($name, $methodsHandler->listMethods()))
				return get_class($methodsHandler);
		}
	}
	
}

