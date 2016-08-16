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
use PrismApi\MethodHandlers\SubscriptionMethodsHandler;
use PrismApi\MethodHandlers\TimesheetMethodsHandler;
use PrismApi\PrismApi;


define('CLIENTID', $_ENV['CLIENTID']);
define('EMPLOYEEID', $_ENV['EMPLOYEEID']);

$checkNewingUpPrismApiTimer = microtime(true);
$api = new PrismApi();

$api->addHandler(new ApplicantMethodsHandler, new BenefitsMethodsHandler, new ClientMasterMethodsHandler, new DeductionsMethodsHandler, new EmployeeMethodsHandler, new PayrollMethodsHandler, new SubscriptionMethodsHandler, new TimesheetMethodsHandler);
echo 'Index.php, benchmarking NewingUpPrismApi: <pre>' . var_export(number_format(( microtime(true) - $checkNewingUpPrismApiTimer), 4), true) . '</pre> <br />';

$checkRunningGetEmployeeTimer = microtime(true);
echo 'index.php-- running getEmployee(): <pre>' . var_export($api->getEmployee(EMPLOYEEID, CLIENTID), true) . '</pre> <br />';
echo 'index.php, benchmarking RunningGetEmployee: <pre>' . var_export(number_format(( microtime(true) - $checkRunningGetEmployeeTimer), 4), true) . '</pre> <br />';

$checkRunninggetAllSubscriptionsTimer = microtime(true);
echo 'index.php-- running getAllSubscriptions(): <pre>' . var_export($api->getAllSubscriptions('SOMETHING'), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetAllSubscriptions: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetAllSubscriptionsTimer), 4), true) . '</pre> <br />';

$checkRunninggetClientCodesTimer = microtime(true);
echo 'index.php-- running getClientCodes(): <pre>' . var_export($api->getClientCodes(CLIENTID), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetClientCodes: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetClientCodesTimer), 4), true) . '</pre> <br />';

echo 'Index.php, Running the whole thing: <pre>' . var_export(number_format(( microtime(true) - $runningWholeThing), 4), true) . '</pre> <br />';
