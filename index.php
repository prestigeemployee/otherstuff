<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . './.env.php';

use PrismApi\PrismApi;
use PrismApi\MethodHandlers\EmployeeMethodsHandler;
use PrismApi\MethodHandlers\SubscriptionMethodsHandler;

define('CLIENTID', $_ENV['CLIENTID']);
define('EMPLOYEEID', $_ENV['EMPLOYEEID']);

$api = new PrismApi();

// TODO: maybe put all MethodsHandlers in .env?
$api->addHandler(new EmployeeMethodsHandler, new SubscriptionMethodsHandler);

echo 'Index.php: <pre>' . var_export($api->getSubscription('202349'), true) . '</pre> <br />';

