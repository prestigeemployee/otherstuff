<?php

/**
 * Deductions methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class DeductionsMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'deductions';

    function __construct() {
        parent::__construct();
        
        $this->setUrl(self::RESTPATH);
    }
    
    /**
     * [getDeductions description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @param  string options [description]
     * @return json             
     */
    public function getDeductions($clientId, $employeeId, $options = '')
    {
        $fields = [
            'sessionId'         =>          $this->repo->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
            'options'           =>          $options
        ];
    
        $url = $this->url . '/getDeductions';
        return $this->repo->service->run($url,$fields);
    }

}