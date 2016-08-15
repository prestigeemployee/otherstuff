<?php

/**
 * Subscription methods
 */

namespace PrismApi\MethodHandlers;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;

Class SubscriptionMethodsHandler extends MethodsHandlerAbstract
{
    const RESTPATH = 'subscription';

    function __construct()
    {
        parent::__construct();
        $this->url = $this->url . SELF::RESTPATH;

    }

    /**
     * [getSubscription description]
     * @param  string subscriptionId   [description]
     * @return json             
     */
    public function getSubscription($subscriptionId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'subscriptionId'    =>          $subscriptionId,
        ];
    
        $url = $this->url . '/getSubscription';
        return $this->service->run($url,$fields);
    }
    
}

