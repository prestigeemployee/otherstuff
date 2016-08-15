<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . './.env.php';

use PrismApi\PrismApi;
use PrismApi\MethodHandlers\ApplicantMethodsHandler;
use PrismApi\MethodHandlers\BenefitsMethodsHandler;
use PrismApi\MethodHandlers\ClientMasterMethodsHandler;
use PrismApi\MethodHandlers\DeductionsMethodsHandler;
use PrismApi\MethodHandlers\EmployeeMethodsHandler;
use PrismApi\MethodHandlers\PayrollMethodsHandler;
use PrismApi\MethodHandlers\SubscriptionMethodsHandler;
use PrismApi\MethodHandlers\TimesheetMethodsHandler;

define('CLIENTID', $_ENV['CLIENTID']);
define('EMPLOYEEID', $_ENV['EMPLOYEEID']);

$api = new PrismApi();

// TODO: maybe put all MethodsHandlers in .env?
$api->addHandler(new ApplicantMethodsHandler, new BenefitsMethodsHandler, new ClientMasterMethodsHandler, new DeductionsMethodsHandler, new EmployeeMethodsHandler, new PayrollMethodsHandler, new SubscriptionMethodsHandler, new TimesheetMethodsHandler);

echo 'Index.php: <pre>' . var_export($api->getClientCodes(CLIENTID), true) . '</pre> <br />';
echo 'Index.php: <pre>' . var_export($api->getPayRateHistory(CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'Index.php: <pre>' . var_export($api->getClientMaster(CLIENTID), true) . '</pre> <br />';
echo 'Index.php: <pre>' . var_export($api->getFlexPlans(CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'Index.php: <pre>' . var_export($api->getBillingVouchers(CLIENTID, '2016-02-20', '2016-07-20'), true) . '</pre> <br />';
echo 'Index.php: <pre>' . var_export($api->getJobApplicants(CLIENTID), true) . '</pre> <br />';