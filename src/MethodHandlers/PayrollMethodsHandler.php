<?php

/**
 * Payroll methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class PayrollMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'payroll';

    function __construct()
    {
        parent::__construct();
        $this->url = $this->url . SELF::RESTPATH;

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
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'payDateStart'      =>          $payDateStart,
            'payDateEnd'        =>          $payDateEnd
        ];
    
        $url = $this->url . '/getBillingVouchers';
        return $this->service->run($url,$fields);
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
            'sessionId'         =>          $this->session,
            'payDateStart'      =>          $payDateStart,
            'payDateEnd'        =>          $paydateEnd,
        ];
    
        $url = $this->url . '/getClientsWithVouchers';
        return $this->service->run($url,$fields);
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
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'payDateStart'      =>          $payDateStart,
            'payDateEnd'        =>          $payDateEnd
        ];
    
        $url = $this->url . '/getPayrollVouchers';
        return $this->service->run($url,$fields);
    }

}