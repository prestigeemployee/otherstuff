<?php

/**
 * Payroll methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class PayrollMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'payroll';

    function __construct() {
        parent::__construct();
        
        $this->setUrl(self::RESTPATH);
    }

        /**
     * [getBillingVouchers description]
     * @param  string clientId   [description]
     * @param  string payDateStart [description]
     * @param  string payDateEnd [description]
     * @return json             
     */
    public function getBillingVouchers($clientId, $payDateStart, $payDateEnd)
    {
        $fields = [
            'sessionId'         =>          $this->repo->session,
            'clientId'          =>          $clientId,
            'payDateStart'      =>          $payDateStart,
            'payDateEnd'        =>          $payDateEnd
        ];
    
        $url = $this->url . '/getBillingVouchers';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getClientsWithVouchers description]
     * @param  string payDateStart   e.g., 2016-05-05
     * @param  string paydateEnd [description]
     * @return json             
     */
    public function getClientsWithVouchers($payDateStart, $paydateEnd)
    {
        $fields = [
            'sessionId'         =>          $this->repo->session,
            'payDateStart'      =>          $payDateStart,
            'payDateEnd'        =>          $paydateEnd,
        ];
    
        $url = $this->url . '/getClientsWithVouchers';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getPayrollVouchers description]
     * @param  string clientId   e.g., 2016-05-05
     * @param  string payDateStart [description]
     * @param  string payDateEnd [description]
     * @return json             
     */
    public function getPayrollVouchers($clientId, $payDateStart, $payDateEnd)
    {
        $fields = [
            'sessionId'         =>          $this->repo->session,
            'clientId'          =>          $clientId,
            'payDateStart'      =>          $payDateStart,
            'payDateEnd'        =>          $payDateEnd
        ];
    
        $url = $this->url . '/getPayrollVouchers';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getPayrollNotes description]
     * @param  string clientId   [description]
     * @return json             
     */
    public function getPayrollNotes($clientId)
    {
        $fields = [
            'sessionId'             =>          $this->repo->session,
            'clientId'                =>          $clientId,
        ];
    
        $url = $this->url . '/getPayrollNotes';
        return $this->repo->service->run($url,$fields);
    }

}