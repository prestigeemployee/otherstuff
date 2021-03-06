<?php

/**
 * timesheet methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class TimesheetMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'timesheet';

    function __construct() {
        parent::__construct();
        
        $this->setUrl(self::RESTPATH);
    }

    /**
     * [getParamData description]
     * @param  string clientId   [description]
     * @param  string userId [description]
     * @return json             
     */
    public function getParamData($clientId, $userId)
    {
        $fields = [
            'sessionId'         =>          $this->repo->session,
            'clientId'          =>          $clientId,
            'userId'            =>          $userId,
        ];
    
        $url = $this->url . 'timesheet/getParamData';
        return $this->repo->service->run($url,$fields);
    }

}