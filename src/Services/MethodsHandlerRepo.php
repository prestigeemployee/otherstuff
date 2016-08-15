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

	}

	public function addHandler(MethodsHandlerAbstract $mh)
	{
		array_push($this->methodsHandlerList, $mh);		
	}

	public function getMethodHandler($name)
	{
		foreach ($this->methodsHandlerList as $methodsHandler)
		{
			if (in_array($name, $methodsHandler->listMethods()))
				return $methodsHandler;
		}
	}
}

