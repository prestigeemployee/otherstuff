<?php

/**
 * contains all PrismApi methods that start with employee
 */

namespace PrismApi\MethodClasses;

use PrismApi\PrismApi;

Class EmployeeMethods extends PrismApi
{
    function __construct() {
    	parent::__construct();

    }

    public function foo()
    {
    	echo $this->url;
    }

	public function getAddressInfo($clientId, $employeeId)
    {

        $fields = [
	        'sessionId'             =>          $this->session,
	        'clientId'              =>          $clientId,
	        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . 'employee/getAddressInfo';
        return $this->service->run($url, $fields);
    }
	
}

