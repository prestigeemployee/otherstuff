<?php

require_once __DIR__ . '/vendor/autoload.php';

use PrismApi\PrismApi;

$api = new PrismApi();

echo '<pre>' . var_export($api->getGeoLocations('77006'), true) . '</pre>';
