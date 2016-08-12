<?php

require_once __DIR__ . '/vendor/autoload.php';

use PrismApi\PrismApi;


define('CLIENTID', 'ENTERHERE');
define('EMPLOYEEID', 'ENTERHERE');


$api = new PrismApi();

echo '<pre>' . var_export($api->getPayrollSchedule(CLIENTID), true) . '</pre>';

