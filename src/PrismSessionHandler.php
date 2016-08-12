<?php

/**
 * handles session for PrismAPI
 */

namespace PrismApi;

use Some\Dependency;

Class PrismSessionHandler
{
	public static $username;
    public static $password;
    public static $peoId;
	
	public static $service;

	public function init()
	{
		static::$username = $_ENV['username'];
        static::$password = $_ENV['password'];
        static::$peoId = $_ENV['peoId'];

        static::$service = new PrismCurlService();
	}

	static function makeSession() {
		static::init();

		$fields = [
	        'username'              =>          static::$username,
	        'password'              =>          static::$password,
	        'peoId'                 =>          static::$peoId
	    ];
        
        $url = $_ENV['url'] . 'login/createPeoSession';

        return static::$service->run($url, $fields, 'POST')->sessionId;
	}
	
}

