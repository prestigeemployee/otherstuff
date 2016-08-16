<?php

/**
 * Employee methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerBase;

Class EmployeeMethodsHandler extends MethodsHandlerBase
{
	const RESTPATH = 'employee';

    function __construct() {}

    /**
     * [getAddressInfo description]
     * @param  string $clientId   [description]
     * @param  string $employeeId [description]
     * @return json             
     */
    public function getAddressInfo($clientId, $employeeId)
    {
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . '/getAddressInfo';
        return $this->parent->service->run($url, $fields);
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
        // echo 'EmployeeMethodsHandler::getEmployee(): <pre>' . var_export([
        //     'employeeId' => $employeeId,
        //     'clientId' => $clientId
        //     ], true) . '</pre> <br />';
        
        
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'employeeId'            =>          $employeeId,
        'clientId'              =>          $clientId,
        'options'               =>          $options
        ];
        $url = $this->url . '/getEmployee';

        return $this->parent->service->run($url,$fields);
    }
	
    /**
     * [getEmployeeList description]
     * @param  string $clientId [description]
     * @return json           includes employeeId
     */
    public function getEmployeeList($clientId)
    {
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'clientId'              =>          $clientId
        ];

        $url = $this->url . '/getEmployeeList';
        return $this->parent->service->run($url,$fields);
    }

    /**
     * [getJobRates description]
     * @param  string $clientId   [description]
     * @param  string $employeeId [description]
     * @return json             [description]
     */
    public function getJobRates($clientId, $employeeId)
    {
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . '/getJobRates';
        return $this->parent->service->run($url,$fields);   
    }

    /**
     * [getPayRateHistory description]
     * @param  string $clientId   [description]
     * @param  string $employeeId [description]
     * @return json             
     */
    public function getPayRateHistory($clientId, $employeeId)
    {
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . '/getPayRateHistory';
        return $this->parent->service->run($url,$fields);
    }

    

    
}

