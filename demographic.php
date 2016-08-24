<?php

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

function get_demographic_information($getEmployee)
{
	// echo 'demographic.php-- $getEmployee->employee[0]: <pre>' . var_export($getEmployee->employee[0], true) . '</pre> <br />';

	return json_encode((array) $getEmployee->employee[0]);
}

$api = new PrismApi();
$api->addHandler(new EmployeeMethodsHandler);

$getEmployee = $api->getEmployee(EMPLOYEEID, CLIENTID);
$demographicInfo = get_demographic_information($getEmployee);
?>

<body>
<?=$demographicInfo ?>
</body>