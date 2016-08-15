<?php

/**
 * Benefits methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class BenefitsMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'benefits';

    function __construct()
    {
        parent::__construct();
        $this->url = $this->url . SELF::RESTPATH;

    }

    // TODO: WHAT IS planId?
    /**
     * [getActiveBenefitPlans description]
     * @param  string $clientId      [description]
     * @param  string $employeeId    [description]
     * @param  string $planId        [description]
     * @param  string $effectiveDate e.g., 2016-05-05
     * @return json                
     */
    public function getActiveBenefitPlans($clientId, $employeeId, $planId, $effectiveDate)
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId,
        'planId'                =>          $planId,
        'effectiveDate'         =>          $effectiveDate
        ];

        $url = $this->url . '/getActiveBenefitPlans';
        return $this->service->run($url,$fields);
    }

    /**
     * [getActiveDependents description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getActiveDependents($clientId, $employeeId)
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . '/getActiveDependents';
        return $this->service->run($url,$fields);
    }  

    /**
     * [getActiveRetirementPlan description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getActiveRetirementPlan($clientId, $employeeId, $effectiveDate)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
            'effectiveDate'     =>          $effectiveDate
        ];
    
        $url = $this->url . '/getActiveRetirementPlan';
        return $this->service->run($url,$fields);
    }

    /**
     * [getBenefitPlans description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @param  string $planId [description]
     * @return json             
     */
    public function getBenefitPlans($clientId, $employeeId, $planId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
            'planId'            =>          $planId
        ];
    
        $url = $this->url . '/getBenefitPlans';
        return $this->service->run($url,$fields);
    }

    /**
     * [getDependents description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getDependents($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId
        ];
    
        $url = $this->url . '/getDependents';
        return $this->service->run($url,$fields);
    }

    /**
     * [getFlexPlans description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getFlexPlans($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
        ];
    
        $url = $this->url . '/getFlexPlans';
        return $this->service->run($url,$fields);
    }

    /**
     * [getPaidTimeOff description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getPaidTimeOff($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
        ];
    
        $url = $this->url . '/getPaidTimeOff';
        return $this->service->run($url,$fields);
    }

    /**
     * [getPaidTimeOffPlans description]
     * @param  string clientId   [description]
     * @return json             
     */
    public function getPaidTimeOffPlans($clientId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
        ];
    
        $url = $this->url . '/getPaidTimeOffPlans';
        return $this->service->run($url,$fields);
    }

    /**
     * [getRetirementLoans description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getRetirementLoans($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
        ];
    
        $url = $this->url . '/getRetirementLoans';
        return $this->service->run($url,$fields);
    }

    /**
     * [getRetirementPlan description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getRetirementPlan($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
        ];
    
        $url = $this->url . '/getRetirementPlan';
        return $this->service->run($url,$fields);
    }
}