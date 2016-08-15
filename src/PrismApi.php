<?php
//$soapclient = new SoapClient('https://api.hrpyramid.net/api-1.4/services/rest?_wadl');
/**
 * This RESTful API v1.4 for Prism in PHP
 * https://api.hrpyramid.net/api-1.2/services
 */

namespace PrismApi;

use PrismApi\MethodHandlers\MethodsHandlerAbstract;
use PrismApi\PrismCurlService;
use PrismApi\PrismInterface;
use PrismApi\Services\MethodsHandlerRepo;


Class PrismApi
{
    // TODO: delete this later
    protected $url;
    protected $methodsHandlerRepo;

    protected $username;
    protected $password;
    protected $peoId;

    public function __construct()
    {
        $this->username = $_ENV['username'];
        $this->password = $_ENV['password'];
        $this->peoId = $_ENV['peoId'];
        // TODO: delete this later since MethodsHandlerAbstract will take care of it
        $this->url = $_ENV['url'];

        $this->methodsHandlerRepo = new MethodsHandlerRepo();
    }

    /**
     * receives the api call
     * @param  string $name method name e.g., getEmployee()
     * @param  array $args arguments passed
     * @return json       response by API
     */
    public function __call($name, $args)
    {
        $mh = $this->methodsHandlerRepo->getMethodHandler($name);

        return call_user_func_array([$mh, $name], $args);
    }

    /**
     * add a methodsHandler
     * @param MethodsHandlerAbstract $args dynamic number of MethodsHandlerAbstract arguments
     */
    function addHandler(MethodsHandlerAbstract ... $args)
    {
        foreach ($args as $arg) {
            $this->methodsHandlerRepo->addHandler($arg);
        }
    }

    protected function getSessionId() 
    {
        $fields = [
        'username'              =>          $this->username,
        'password'              =>          $this->password,
        'peoId'                 =>          $this->peoId
        ];
        $url = $this->url . 'login/createPeoSession';
        return $this->service->run($url, $fields, 'POST')->sessionId;
    }



}
