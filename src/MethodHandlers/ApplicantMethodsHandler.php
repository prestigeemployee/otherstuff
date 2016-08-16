<?php

/**
 * Applicant methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerBase;

Class ApplicantMethodsHandler extends MethodsHandlerBase
{
    const RESTPATH = 'applicant';

    function __construct() {}

    /**
     * [getJobApplicants description]
     * @param  string clientId   [description]
     * @return json             
     */
    public function getJobApplicants($clientId)
    {
        $fields = [
            'sessionId'             =>          $this->parent->session,
            'clientId'                =>          $clientId,
        ];
    
        $url = $this->url . '/getJobApplicants';
        return $this->parent->service->run($url,$fields);
    }

}