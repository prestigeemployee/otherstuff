<?php

$runningWholeThing = microtime(true);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . './.env.php';

use PrismApi\MethodHandlers\ApplicantMethodsHandler;
use PrismApi\MethodHandlers\BenefitsMethodsHandler;
use PrismApi\MethodHandlers\ClientMasterMethodsHandler;
use PrismApi\MethodHandlers\DeductionsMethodsHandler;
use PrismApi\MethodHandlers\EmployeeMethodsHandler;
use PrismApi\MethodHandlers\PayrollMethodsHandler;
use PrismApi\MethodHandlers\PrismSecurityMethodsHandler;
use PrismApi\MethodHandlers\SubscriptionMethodsHandler;
use PrismApi\MethodHandlers\TaxRateMethodsHandler;
use PrismApi\MethodHandlers\TimesheetMethodsHandler;
use PrismApi\PrismApi;


define('CLIENTID', $_ENV['CLIENTID']);
define('EMPLOYEEID', $_ENV['EMPLOYEEID']);

$checkNewingUpPrismApiTimer = microtime(true);
$api = new PrismApi();

$api->addHandler(new EmployeeMethodsHandler, new ApplicantMethodsHandler, new BenefitsMethodsHandler, new ClientMasterMethodsHandler, new DeductionsMethodsHandler, new PayrollMethodsHandler, new PrismSecurityMethodsHandler, new SubscriptionMethodsHandler, new TimesheetMethodsHandler, new TaxRateMethodsHandler);
echo 'index.php, benchmarking NewingUpPrismApi: <pre>' . var_export(number_format(( microtime(true) - $checkNewingUpPrismApiTimer), 4), true) . '</pre> <br />';

$checkgetEmployeeTimer = microtime(true);
echo 'index.php-- getEmployee(EMPLOYEEID, CLIENTID): <pre>' . var_export($api->getEmployee(EMPLOYEEID, CLIENTID), true) . '</pre> <br />';
echo 'index.php, benchmarking getEmployee: <pre>' . var_export(number_format(( microtime(true) - $checkgetEmployeeTimer), 4), true) . '</pre> <br />';

$checkgetActiveDependentsTimer = microtime(true);
echo 'index.php-- getActiveDependents(EMPLOYEEID, CLIENTID): <pre>' . var_export($api->getActiveDependents(CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'index.php, benchmarking getActiveDependents: <pre>' . var_export(number_format(( microtime(true) - $checkgetActiveDependentsTimer), 4), true) . '</pre> <br />';

$checkgetRetirementPlanTimer = microtime(true);
echo 'index.php-- getRetirementPlan(EMPLOYEEID, CLIENTID): <pre>' . var_export($api->getRetirementPlan(CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'index.php, benchmarking getRetirementPlan: <pre>' . var_export(number_format(( microtime(true) - $checkgetRetirementPlanTimer), 4), true) . '</pre> <br />';

$checkgetClientMasterTimer = microtime(true);
echo 'index.php-- getClientMaster(EMPLOYEEID, CLIENTID): <pre>' . var_export($api->getClientMaster(CLIENTID), true) . '</pre> <br />';
echo 'index.php, benchmarking getClientMaster: <pre>' . var_export(number_format(( microtime(true) - $checkgetClientMasterTimer), 4), true) . '</pre> <br />';





//////////////////////////////////////////////////////
echo 'index.php, benchmarking runningWholeThing: <pre>' . var_export(number_format(( microtime(true) - $runningWholeThing), 4), true) . '</pre> <br />';