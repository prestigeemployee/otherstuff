<?php

/**
 * DESCRIPTION
 */

namespace PrismApi\Services;

use PrismApi\MethodHandlers\MethodsHandlerBase;
use PrismApi\MethodHandlers\ApplicantMethodsHandler;
use PrismApi\MethodHandlers\BenefitsMethodsHandler;
use PrismApi\MethodHandlers\ClientMasterMethodsHandler;
use PrismApi\MethodHandlers\DeductionsMethodsHandler;
use PrismApi\MethodHandlers\EmployeeMethodsHandler;
use PrismApi\MethodHandlers\PayrollMethodsHandler;
use PrismApi\MethodHandlers\SubscriptionMethodsHandler;
use PrismApi\MethodHandlers\TimesheetMethodsHandler;

// TODO: DO NOT DO THIS IN PRODUCTION

Class MethodsHandlerRepo
{
	protected $methodsHandlerBase;
	protected $methodsHandlerList = [];

	function __construct()
	{
		$this->methodsHandlerBase = new MethodsHandlerBase;
	}

	public function addHandler(MethodsHandlerBase $mh)
	{
		$mh->setParent($this->methodsHandlerBase);
		$this->methodsHandlerList[] = $mh;
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

