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

$checkRunningFunctionCallTimer = microtime(true);
echo 'index.php-- running(): <pre>' . var_export($api->getClientList(true), true) . '</pre> <br />';
echo 'index.php, benchmarking Runnin: <pre>' . var_export(number_format(( microtime(true) - $checkRunningFunctionCallTimer), 4), true) . '</pre> <br />';

$checkRunningFunctionCallTimer = microtime(true);
echo 'index.php-- running(): <pre>' . var_export($api->getPayrollNotes(CLIENTID), true) . '</pre> <br />';
echo 'index.php, benchmarking Runnin: <pre>' . var_export(number_format(( microtime(true) - $checkRunningFunctionCallTimer), 4), true) . '</pre> <br />';

$checkRunningFunctionCallTimer = microtime(true);
echo 'index.php-- running(): <pre>' . var_export($api->isClientAllowed('something', CLIENTID), true) . '</pre> <br />';
echo 'index.php, benchmarking Runnin: <pre>' . var_export(number_format(( microtime(true) - $checkRunningFunctionCallTimer), 4), true) . '</pre> <br />';

$checkRunningFunctionCallTimer = microtime(true);
echo 'index.php-- running(): <pre>' . var_export($api->isEmployeeAllowed('something', CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'index.php, benchmarking Runnin: <pre>' . var_export(number_format(( microtime(true) - $checkRunningFunctionCallTimer), 4), true) . '</pre> <br />';

$checkRunningFunctionCallTimer = microtime(true);
echo 'index.php-- running(): <pre>' . var_export($api->getTaxRate('string', 'string', 'something', '2016-08-20', CLIENTID, 'soet', 'heting'), true) . '</pre> <br />';
echo 'index.php, benchmarking Runnin: <pre>' . var_export(number_format(( microtime(true) - $checkRunningFunctionCallTimer), 4), true) . '</pre> <br />';

$checkRunningFunctionCallTimer = microtime(true);
echo 'index.php-- running(): <pre>' . var_export($api->getWorkersCompClasses('NY'), true) . '</pre> <br />';
echo 'index.php, benchmarking Runnin: <pre>' . var_export(number_format(( microtime(true) - $checkRunningFunctionCallTimer), 4), true) . '</pre> <br />';

$checkRunningFunctionCallTimer = microtime(true);
echo 'index.php-- running(): <pre>' . var_export($api->getWorkersCompPolicyList('2016-08-15'), true) . '</pre> <br />';
echo 'index.php, benchmarking Runnin: <pre>' . var_export(number_format(( microtime(true) - $checkRunningFunctionCallTimer), 4), true) . '</pre> <br />';


echo 'index.php, benchmarking runningWholeThing: <pre>' . var_export(number_format(( microtime(true) - $runningWholeThing), 4), true) . '</pre> <br />';