<?php

/**
 * DESCRIPTION
 */

namespace PrismApi\Services;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;
use PrismApi\PrismCurlService;
use PrismApi\PrismSessionHandler;

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
	public $service;
	public $session;
	private $methodsHandlerList = [];

	function __construct()
	{
		$this->service = new PrismCurlService();
		$this->session = PrismSessionHandler::makeSession();        
	}

	public function addHandler(MethodsHandlerAbstract $mh)
	{
		$mh->setupMethodHandler($this);
		
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

