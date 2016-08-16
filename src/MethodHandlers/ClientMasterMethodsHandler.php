<?php

/**
 * ClientMaster methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerBase;

Class ClientMasterMethodsHandler extends MethodsHandlerBase
{
    const RESTPATH = 'clientMaster';

    function __construct() {}

    /**
     * [getClientCodes description]
     * @param  string $clientId [description]
     * @param  string $options  [description]
     * @return json
     */
    public function getClientCodes($clientId, $options = '')
    {
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'clientId'              =>          $clientId,
        'options'               =>          $options
        ];

        $url = $this->url . '/getClientCodes';
        return $this->parent->service->run($url,$fields);
    }

    /**
     * [getClientMaster description]
     * @param  string $clientId [description]
     * @return json           [description]
     */
    public function getClientMaster($clientId)
    {
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'clientId'              =>          $clientId
        ];

        $url = $this->url . '/getClientMaster';
        return $this->parent->service->run($url,$fields);
    }

    /**
     * [getGeoLocations description]
     * @param  string $zipCode [description]
     * @return json          [description]
     */
    public function getGeoLocations($zipCode)
    {
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'zipCode'               =>          $zipCode
        ];

        $url = $this->url . '/getGeoLocations';
        return $this->parent->service->run($url,$fields);
    }

    /**
     * [getPayrollSchedule description]
     * @param  string $clientId [description]
     * @return json           [description]
     */
    public function getPayrollSchedule($clientId)
    {
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'clientId'              =>          $clientId,
        ];

        $url = $this->url . '/getPayrollSchedule';
        return $this->parent->service->run($url,$fields);
    }
}