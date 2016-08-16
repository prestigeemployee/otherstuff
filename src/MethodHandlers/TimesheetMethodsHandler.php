<?php

/**
 * timesheet methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerBase;

Class TimesheetMethodsHandler extends MethodsHandlerBase
{
    const RESTPATH = 'timesheet';

    function __construct() {}

    /**
     * [getParamData description]
     * @param  string clientId   [description]
     * @param  string userId [description]
     * @return json             
     */
    public function getParamData($clientId, $userId)
    {
        $fields = [
            'sessionId'         =>          $this->parent->session,
            'clientId'          =>          $clientId,
            'userId'            =>          $userId,
        ];
    
        $url = $this->url . 'timesheet/getParamData';
        return $this->parent->service->run($url,$fields);
    }

}