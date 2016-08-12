<?php 

namespace PrismApi;

/**
 * summary
 */
class PrismCurlService
{
	protected $handle;

    /**
     * summary
     */
    public function __construct()
    {
    	$handle = curl_init();
    	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        // TODO: DO NOT DO THIS IN PRODUCTION
    	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    	$this->handle = $handle;
    }

    /**
     * [run description]
     * @param  string $url    [description]
     * @param  array $fields [description]
     * @param  string $method [description]
     * @return json         Result of curl
     */
    public function run($url, $fields, $method = 'GET')
    {
    	$handle = $this->handle;

    	switch ($method) {
    		case 'POST':
	    		curl_setopt($handle, CURLOPT_URL, $url);
	    		curl_setopt($handle, CURLOPT_POST, true);
	    		curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($fields));
	    		break;
    		case 'GET':
	    		curl_setopt($handle, CURLOPT_POST, false);
	    		curl_setopt($handle, CURLOPT_URL, $url . '?' . http_build_query($fields));
	    		break;
    		default:
	    		die("BAD METHOD");
	    		break;
    	}

    	$result = curl_exec($handle);
    	
    	if($result === FALSE) {
    		die(curl_error($handle));
    	}
    	else
    		return json_decode(curl_exec($handle));
    }


}