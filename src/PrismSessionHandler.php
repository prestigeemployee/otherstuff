<?php

/**
 * handles session for PrismAPI
 */

namespace PrismApi;

use Some\Dependency;

Class PrismSessionHandler
{
	protected $username;
    protected $password;
    protected $peoId;

	function __construct($foo = null)
	{
		$this->username = $_ENV['username'];
        $this->password = $_ENV['password'];
        $this->peoId = $_ENV['peoId'];
	}

	public function makeSession($service, $serviceUrl) {
		$fields = [
	        'username'              =>          $this->username,
	        'password'              =>          $this->password,
	        'peoId'                 =>          $this->peoId
        ];
        
        $url = $serviceUrl . 'login/createPeoSession';

        return $service->run($url, $fields, 'POST')->sessionId;
	}
	
}

