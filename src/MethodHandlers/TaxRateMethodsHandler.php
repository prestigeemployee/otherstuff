<?php

/**
 * Employee methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class TaxRateMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'taxRate';

    function __construct() {
        parent::__construct();
    
        $this->setUrl(self::RESTPATH);
    }

    /**
     * [getTaxRate description]
     * @param  string workersCompPolicyId   [description]
     * @param  string workersCompClass [description]
     * @param  string employerId [description]
     * @return json             
     */
    public function getTaxRate($workersCompPolicyId, $workersCompClass, $employerId, $effectiveDate, $clientId, $stateCode, $mode)
    {
        $fields = [
            'workersCompPolicyId'       =>          $workersCompPolicyId,
            'workersCompClass'          =>          $workersCompClass,
            'employerId'                =>          $employerId,
            'effectiveDate'             =>          $effectiveDate,
            'clientId'                  =>          $clientId,
            'stateCode'                 =>          $stateCode,
            'mode'                      =>          $mode,
            'sessionId'                 =>          $this->repo->session,
        ];
    
        $url = $this->url . '/getTaxRate';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getWorkersCompClasses description]
     * @param  string stateCode   [description]
     * @return json             
     */
    public function getWorkersCompClasses($stateCode)
    {
        $fields = [
            'stateCode'                 =>          $stateCode,
            'sessionId'                 =>          $this->repo->session,
        ];
    
        $url = $this->url . '/getWorkersCompClasses';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getWorkersCompPolicyList description]
     * @param  string effectiveDate   [description]
     * @return json             
     */
    public function getWorkersCompPolicyList($effectiveDate)
    {
        $fields = [
            'effectiveDate'             =>          $effectiveDate,
            'sessionId'                 =>          $this->repo->session,
        ];
    
        $url = $this->url . '/getWorkersCompPolicyList';
        return $this->repo->service->run($url,$fields);
    }

}