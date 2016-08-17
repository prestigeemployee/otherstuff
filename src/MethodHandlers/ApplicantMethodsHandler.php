<?php

/**
 * Applicant methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class ApplicantMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'applicant';

    function __construct() {
        parent::__construct();
        
        $this->setUrl(self::RESTPATH);
    }

    /**
     * [getJobApplicants description]
     * @param  string clientId   [description]
     * @return json             
     */
    public function getJobApplicants($clientId)
    {
        $fields = [
            'sessionId'             =>          $this->repo->session,
            'clientId'                =>          $clientId,
        ];
    
        $url = $this->url . '/getJobApplicants';
        return $this->repo->service->run($url,$fields);
    }

}