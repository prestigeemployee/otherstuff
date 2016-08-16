<?php

require_once __DIR__ . '/../.env.php';

use PrismApi\PrismApi;
use PrismApi\MethodHandlers\ApplicantMethodsHandler;
use PrismApi\MethodHandlers\BenefitsMethodsHandler;
use PrismApi\MethodHandlers\ClientMasterMethodsHandler;
use PrismApi\MethodHandlers\DeductionsMethodsHandler;
use PrismApi\MethodHandlers\EmployeeMethodsHandler;
use PrismApi\MethodHandlers\PayrollMethodsHandler;
use PrismApi\MethodHandlers\SubscriptionMethodsHandler;
use PrismApi\MethodHandlers\TimesheetMethodsHandler;

/**
 * PrismApiTest
 */
class PrismApiTest extends PHPUnit\Framework\TestCase
{
	/** @test */
	function get_client_codes_returns_json()
	{

		$api = new PrismApi();

		$handlers = [
		new ApplicantMethodsHandler, new BenefitsMethodsHandler, new ClientMasterMethodsHandler, new DeductionsMethodsHandler, new EmployeeMethodsHandler, new PayrollMethodsHandler, new SubscriptionMethodsHandler, new TimesheetMethodsHandler
		];

		$api->addHandler($handlers);

		$this->assertNotNull($api->getClientCodes('000100'));


	}
}