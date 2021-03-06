<?php

/**
 * Employee methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class EmployeeMethodsHandler extends MethodsHandlerAbstract
{
	const RESTPATH = 'employee';

    function __construct() {
        parent::__construct();
        
        $this->setUrl(self::RESTPATH);
    }

    /**
     * [getAddressInfo description]
     * @param  string $clientId   [description]
     * @param  string $employeeId [description]
     * @return json             
     */
    public function getAddressInfo($clientId, $employeeId)
    {
        $fields = [
        'sessionId'             =>          $this->repo->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . '/getAddressInfo';
        return $this->repo->service->run($url, $fields);
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
        'sessionId'             =>          $this->repo->session,
        'employeeId'            =>          $employeeId,
        'clientId'              =>          $clientId,
        'options'               =>          $options
        ];
        $url = $this->url . '/getEmployee';

        return $this->repo->service->run($url,$fields);
    }
	
    /**
     * [getEmployeeList description]
     * @param  string $clientId [description]
     * @return json           includes employeeId
     */
    public function getEmployeeList($clientId)
    {
        $fields = [
        'sessionId'             =>          $this->repo->session,
        'clientId'              =>          $clientId
        ];

        $url = $this->url . '/getEmployeeList';
        return $this->repo->service->run($url,$fields);
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
        'sessionId'             =>          $this->repo->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . '/getJobRates';
        return $this->repo->service->run($url,$fields);   
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
        'sessionId'             =>          $this->repo->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . '/getPayRateHistory';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getEmployeeSSNList description]
     * @param  string clientId   [description]
     * @param  stri [description]
     * @param   [description]
     * @return json             
     */
    public function getEmployeeSSNList($clientId)
    {
        $fields = [
            'sessionId'             =>          $this->repo->session,
            'clientId'                =>          $clientId,
        ];
    
        $url = $this->url . '/getEmployeeSSNList';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getEmpRestricted description]
     * @param  string employeeId   [description]
     * @param  string clientId [description]
     * @param  string options [description]
     * @return json             
     */
    public function getEmpRestricted($employeeId, $clientId, $options = '')
    {
        $fields = [
            'sessionId'             =>          $this->repo->session,
            'employeeId'                =>          $employeeId,
            'clientId'                =>          $clientId,
            'options'                =>          $options
        ];
    
        $url = $this->url . '/getEmpRestricted';
        return $this->repo->service->run($url,$fields);
    }

    
}

