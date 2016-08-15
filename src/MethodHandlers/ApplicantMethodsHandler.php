<?php

/**
 * Applicant methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class ApplicantMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'applicant';

    function __construct()
    {
        parent::__construct();
        $this->url = $this->url . SELF::RESTPATH;

    }


    /**
     * [getJobApplicants description]
     * @param  string clientId   [description]
     * @return json             
     */
    public function getJobApplicants($clientId)
    {
        $fields = [
            'sessionId'             =>          $this->session,
            'clientId'                =>          $clientId,
        ];
    
        $url = $this->url . '/getJobApplicants';
        return $this->service->run($url,$fields);
    }

}