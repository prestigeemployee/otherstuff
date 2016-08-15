<?php

/**
 * Employee methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class EmployeeMethodsHandler extends MethodsHandlerAbstract
{
	const RESTPATH = 'employee';

	function __construct()
	{
		parent::__construct();
		$this->url = $this->url . SELF::RESTPATH;
	}

	/**
     * [getEmployee description]
     * @param  string $employeeId [description]
     * @param  string $clientId   [description]
     * @param  string $options    [description]
     * @return json             
     */
    public function getEmployee($employeeId, $clientId, $options = '')
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'employeeId'            =>          $employeeId,
        'clientId'              =>          $clientId,
        'options'               =>          $options
        ];
        $url = $this->url . 'employee/getEmployee';
        return $this->service->run($url,$fields);
    }
	
}

