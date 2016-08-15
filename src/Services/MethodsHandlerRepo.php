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
	{}

	public function addHandler(MethodsHandlerAbstract $mh)
	{
		$this->methodsHandlerList[get_class($mh)] = $mh;
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

