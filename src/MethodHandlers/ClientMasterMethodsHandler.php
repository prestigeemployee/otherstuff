<?php

/**
 * ClientMaster methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class ClientMasterMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'clientMaster';

    function __construct() {
        parent::__construct();
        
        $this->setUrl(self::RESTPATH);
    }

    /**
     * [getClientCodes description]
     * @param  string $clientId [description]
     * @param  string $options  [description]
     * @return json
     */
    public function getClientCodes($clientId, $options = '')
    {
        $fields = [
        'sessionId'             =>          $this->repo->session,
        'clientId'              =>          $clientId,
        'options'               =>          $options
        ];

        $url = $this->url . '/getClientCodes';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getClientMaster description]
     * @param  string $clientId [description]
     * @return json           [description]
     */
    public function getClientMaster($clientId)
    {
        $fields = [
        'sessionId'             =>          $this->repo->session,
        'clientId'              =>          $clientId
        ];

        $url = $this->url . '/getClientMaster';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getGeoLocations description]
     * @param  string $zipCode [description]
     * @return json          [description]
     */
    public function getGeoLocations($zipCode)
    {
        $fields = [
        'sessionId'             =>          $this->repo->session,
        'zipCode'               =>          $zipCode
        ];

        $url = $this->url . '/getGeoLocations';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getPayrollSchedule description]
     * @param  string $clientId [description]
     * @return json           [description]
     */
    public function getPayrollSchedule($clientId)
    {
        $fields = [
        'sessionId'             =>          $this->repo->session,
        'clientId'              =>          $clientId,
        ];

        $url = $this->url . '/getPayrollSchedule';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getClientList description]
     * @param  bool inActive   [description]
     * @return json             
     */
    public function getClientList($inActive)
    {
        $fields = [
            'sessionId'             =>          $this->repo->session,
            'inActive'                =>          $inActive,
        ];
    
        $url = $this->url . '/getClientList';
        return $this->repo->service->run($url,$fields);
    }   


}