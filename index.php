<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . './.env.php';

use PrismApi\PrismApi;


define('CLIENTID', $_ENV['CLIENTID']);
define('EMPLOYEEID', $_ENV['EMPLOYEEID']);


$api = new PrismApi();

echo '<pre>' . var_export($api->getPayrollSchedule(CLIENTID), true) . '</pre>';