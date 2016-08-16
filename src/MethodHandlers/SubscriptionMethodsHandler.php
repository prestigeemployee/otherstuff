<?php

/**
 * Subscription methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerBase;

Class SubscriptionMethodsHandler extends MethodsHandlerBase
{
    const RESTPATH = 'subscription';

    function __construct() {}


    /**
     * [getAllSubscriptions description]
     * @param  string userStringId   [description]
     * @return json             
     */
    public function getAllSubscriptions($userStringId)
    {
        $fields = [
        'sessionId'             =>          $this->parent->session,
        'userStringId'          =>          $userStringId
        ];

        $url = $this->url . '/getAllSubscriptions';
        return $this->parent->service->run($url,$fields);
    }
    
    /**
     * [getEvents description]
     * @param  string subscriptionId   [description]
     * @param  string replayId [description]
     * @return json             
     */
    public function getEvents($subscriptionId, $replayId)
    {
        $fields = [
            'sessionId'         =>          $this->parent->session,
            'subscriptionId'    =>          $subscriptionId,
            'replayId'          =>          $replayId,
        ];
    
        $url = $this->url . '/getEvents';
        return $this->parent->service->run($url,$fields);
    }

    /**
     * [getNewEvents description]
     * @param  string subscriptionId   [description]
     * @return json             
     */
    public function getNewEvents($subscriptionId)
    {
        $fields = [
            'sessionId'         =>          $this->parent->session,
            'subscriptionId'    =>          $subscriptionId,
        ];
    
        $url = $this->url . '/getNewEvents';
        return $this->parent->service->run($url,$fields);
    }

    /**
     * [getSubscription description]
     * @param  string subscriptionId   [description]
     * @return json             
     */
    public function getSubscription($subscriptionId)
    {
        $fields = [
            'sessionId'         =>          $this->parent->session,
            'subscriptionId'    =>          $subscriptionId,
        ];
    
        $url = $this->url . '/getSubscription';
        return $this->parent->service->run($url,$fields);
    }
    

    
}

