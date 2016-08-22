<?php

/**
 * Employee methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class PrismSecurityMethodsHandler extends MethodsHandlerAbstract
{
	const RESTPATH = 'prismSecurity';

    function __construct() {
        parent::__construct();
    
        $this->setUrl(self::RESTPATH);
    }

    /**
     * [getClientList description]
     * @param  string prismUserId   [description]
     * @return json             
     */
    public function getClientList($prismUserId)
    {
        $fields = [
            'sessionId'             =>          $this->repo->session,
            'prismUserId'                =>          $prismUserId,
        ];
    
        $url = $this->url . '/getClientList';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [isClientAllowed description]
     * @param  string prismUserId   [description]
     * @param  string clientId [description]
     * @return json             
     */
    public function isClientAllowed($prismUserId, $clientId)
    {
        $fields = [
            'sessionId'             =>          $this->repo->session,
            'prismUserId'                =>          $prismUserId,
            'clientId'                =>          $clientId,
        ];
    
        $url = $this->url . '/isClientAllowed';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [isEmployeeAllowed description]
     * @param  string prismUserId   [description]
     * @param  string clientId [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function isEmployeeAllowed($prismUserId, $clientId, $employeeId)
    {
        $fields = [
            'sessionId'             =>          $this->repo->session,
            'prismUserId'                =>          $prismUserId,
            'clientId'                =>          $clientId,
            'employeeId'                =>          $employeeId
        ];
    
        $url = $this->url . '/isEmployeeAllowed';
        return $this->repo->service->run($url,$fields);
    }



}