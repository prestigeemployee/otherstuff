<?php

$runningWholeThing = microtime(true);

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
$addingHandlersTimer = microtime(true);

$checkNewingUpHandlersTimer = microtime(true);



echo 'Index.php, benchmarking newingUpHandlersTimer: <pre>' . var_export(number_format(( microtime(true) - $checkNewingUpHandlersTimer), 4), true) . '</pre> <br />';


$api->addHandler($handlers);

echo 'Index.php, benchmarking adding handlers: <pre>' . var_export(number_format(( microtime(true) - $addingHandlersTimer), 4), true) . '</pre> <br />';


$runningGetClientCodes = microtime(true);
echo 'Index.php: <pre>' . var_export($api->getClientCodes(CLIENTID), true) . '</pre> <br />';
echo 'Index.php, Running getClientCodes(): <pre>' . var_export(number_format(( microtime(true) - $runningGetClientCodes), 4), true) . '</pre> <br />';

$runningGetPayRateHistory = microtime(true);
echo 'Index.php: <pre>' . var_export($api->getPayRateHistory(CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'Index.php, Running getPayRateHistory(): <pre>' . var_export(number_format(( microtime(true) - $runningGetPayRateHistory), 4), true) . '</pre> <br />';

echo 'Index.php: <pre>' . var_export($api->getClientMaster(CLIENTID), true) . '</pre> <br />';
echo 'Index.php: <pre>' . var_export($api->getFlexPlans(CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'Index.php: <pre>' . var_export($api->getBillingVouchers(CLIENTID, '2016-02-20', '2016-07-20'), true) . '</pre> <br />';
echo 'Index.php: <pre>' . var_export($api->getJobApplicants(CLIENTID), true) . '</pre> <br />';

echo 'Index.php, Running the whole thing: <pre>' . var_export(number_format(( microtime(true) - $runningWholeThing), 4), true) . '</pre> <br />';
