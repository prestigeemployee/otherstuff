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

function get_benefit_information($getBenefitPlans)
{
	// foreach ($getBenefitPlans->benefitPlan as $benefitPlan) {
	// 	echo 'benefits.php-- $benefitPlan: <pre>' . var_export($benefitPlan, true) . '</pre> <br />';	
	// }
	return json_encode((array) $getBenefitPlans->benefitPlan);
}

$api = new PrismApi();
$api->addHandler(new BenefitsMethodsHandler);

$getBenefitPlans = $api->getBenefitPlans(CLIENTID, EMPLOYEEID);
$benefitInfo = get_benefit_information($getBenefitPlans);
?>

<body>
<?=$benefitInfo ?>
</body>