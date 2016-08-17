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

$api->addHandler(new EmployeeMethodsHandler, new ApplicantMethodsHandler, new BenefitsMethodsHandler, new ClientMasterMethodsHandler, new DeductionsMethodsHandler, new PayrollMethodsHandler, new SubscriptionMethodsHandler, new TimesheetMethodsHandler);
echo 'index.php, benchmarking NewingUpPrismApi: <pre>' . var_export(number_format(( microtime(true) - $checkNewingUpPrismApiTimer), 4), true) . '</pre> <br />';


$checkRunningGetEmployeeTimer = microtime(true);
echo 'index.php-- running getEmployee(): <pre>' . var_export($api->getEmployee(EMPLOYEEID, CLIENTID), true) . '</pre> <br />';
echo 'index.php, benchmarking RunningGetEmployee: <pre>' . var_export(number_format(( microtime(true) - $checkRunningGetEmployeeTimer), 4), true) . '</pre> <br />';

$checkRunninggetJobRatesTimer = microtime(true);
echo 'index.php-- running getJobRates(): <pre>' . var_export($api->getJobRates(CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetJobRates: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetJobRatesTimer), 4), true) . '</pre> <br />';

$checkRunninggetAllSubscriptionsTimer = microtime(true);
echo 'index.php-- running getAllSubscriptions(): <pre>' . var_export($api->getAllSubscriptions('SOMETHING'), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetAllSubscriptions: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetAllSubscriptionsTimer), 4), true) . '</pre> <br />';

$checkRunninggetEventsTimer = microtime(true);
echo 'index.php-- running getEvents(): <pre>' . var_export($api->getEvents('92932', '239230'), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetEvents: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetEventsTimer), 4), true) . '</pre> <br />';

$checkRunninggetClientCodesTimer = microtime(true);
echo 'index.php-- running getClientCodes(): <pre>' . var_export($api->getClientCodes(CLIENTID), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetClientCodes: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetClientCodesTimer), 4), true) . '</pre> <br />';

$checkRunninggetGeoLocationsTimer = microtime(true);
echo 'index.php-- running getGeoLocations(): <pre>' . var_export($api->getGeoLocations('77006'), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetGeoLocations: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetGeoLocationsTimer), 4), true) . '</pre> <br />';

$checkRunninggetActiveDependentsTimer = microtime(true);
echo 'index.php-- running getActiveDependents(): <pre>' . var_export($api->getActiveDependents(CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetActiveDependents: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetActiveDependentsTimer), 4), true) . '</pre> <br />';

$checkRunninggetDeductionsTimer = microtime(true);
echo 'index.php-- running getDeductions(): <pre>' . var_export($api->getDeductions(CLIENTID, EMPLOYEEID), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetDeductions: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetDeductionsTimer), 4), true) . '</pre> <br />';

$checkRunninggetJobApplicantsTimer = microtime(true);
echo 'index.php-- running getJobApplicants(): <pre>' . var_export($api->getJobApplicants(CLIENTID), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetJobApplicants: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetJobApplicantsTimer), 4), true) . '</pre> <br />';

$checkRunninggetBillingVouchersTimer = microtime(true);
echo 'index.php-- running getBillingVouchers(): <pre>' . var_export($api->getBillingVouchers(CLIENTID, '2016-05-02', '2016-08-02'), true) . '</pre> <br />';
echo 'index.php, benchmarking RunninggetBillingVouchers: <pre>' . var_export(number_format(( microtime(true) - $checkRunninggetBillingVouchersTimer), 4), true) . '</pre> <br />';

echo 'index.php, benchmarking RunningWholeThing: <pre>' . var_export(number_format(( microtime(true) - $runningWholeThing), 4), true) . '</pre> <br />';
