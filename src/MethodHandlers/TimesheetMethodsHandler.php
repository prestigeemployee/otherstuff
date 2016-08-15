<?php

/**
 * timesheet methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class TimesheetMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'timesheet';

    function __construct()
    {
        parent::__construct();
        $this->url = $this->url . SELF::RESTPATH;

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
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'userId'            =>          $userId,
        ];
    
        $url = $this->url . 'timesheet/getParamData';
        return $this->service->run($url,$fields);
    }

}