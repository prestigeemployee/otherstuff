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
		$handlers = [
		new ApplicantMethodsHandler, new BenefitsMethodsHandler, new ClientMasterMethodsHandler, new DeductionsMethodsHandler, new EmployeeMethodsHandler, new PayrollMethodsHandler, new SubscriptionMethodsHandler, new TimesheetMethodsHandler
		];

		$this->methodsHandlerList = $handlers;
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

