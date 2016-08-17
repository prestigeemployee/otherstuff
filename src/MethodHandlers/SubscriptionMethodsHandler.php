<?php

/**
 * Subscription methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class SubscriptionMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'subscription';

    function __construct() {
        parent::__construct();
        
        $this->setUrl(self::RESTPATH);
    }


    /**
     * [getAllSubscriptions description]
     * @param  string userStringId   [description]
     * @return json             
     */
    public function getAllSubscriptions($userStringId)
    {
        $fields = [
        'sessionId'             =>          $this->repo->session,
        'userStringId'          =>          $userStringId
        ];

        $url = $this->url . '/getAllSubscriptions';
        return $this->repo->service->run($url,$fields);
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
            'sessionId'         =>          $this->repo->session,
            'subscriptionId'    =>          $subscriptionId,
            'replayId'          =>          $replayId,
        ];
    
        $url = $this->url . '/getEvents';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getNewEvents description]
     * @param  string subscriptionId   [description]
     * @return json             
     */
    public function getNewEvents($subscriptionId)
    {
        $fields = [
            'sessionId'         =>          $this->repo->session,
            'subscriptionId'    =>          $subscriptionId,
        ];
    
        $url = $this->url . '/getNewEvents';
        return $this->repo->service->run($url,$fields);
    }

    /**
     * [getSubscription description]
     * @param  string subscriptionId   [description]
     * @return json             
     */
    public function getSubscription($subscriptionId)
    {
        $fields = [
            'sessionId'         =>          $this->repo->session,
            'subscriptionId'    =>          $subscriptionId,
        ];
    
        $url = $this->url . '/getSubscription';
        return $this->repo->service->run($url,$fields);
    }
    

    
}

