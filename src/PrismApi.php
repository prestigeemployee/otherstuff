<?php
//$soapclient = new SoapClient('https://api.hrpyramid.net/api-1.4/services/rest?_wadl');
/**
 * This RESTful API v1.4 for Prism in PHP
 * https://api.hrpyramid.net/api-1.2/services
 */

namespace PrismApi;

use PrismApi\PrismInterface;

Class PrismApi implements PrismInterface
{
    protected $username = 'ENTERHERE';
    protected $password = 'ENTERHERE';
    protected $peoId = 'ENTERHERE';
    protected $url = 'https://api.hrpyramid.net/api-1.4/services/rest/';
    public function __construct()
    {
        $this->session = $this->getSessionId();
    }
    protected function getSessionId() 
    {
        $fields = [
        'username'          =>          $this->username,
        'password'          =>          $this->password,
        'peoId'             =>          $this->peoId
        ];
        $url = $this->url . 'login/createPeoSession';
        return $this->run($url, $fields, 'POST')->sessionId;
    }    

    public function getAddressInfo($clientId, $employeeId)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'clientId'          =>          $clientId,
        'employeeId'        =>          $employeeId
        ];
        $url = $this->url . 'employee/getAddressInfo';
        return $this->run($url,$fields);
    }

    /**
     * [getEmployee description]
     * @param  string $employeeId [description]
     * @param  string $clientId   [description]
     * @param  string $options    [description]
     * @return json             
     */
    public function getEmployee($employeeId, $clientId, $options = '')
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'employeeId'        =>          $employeeId,
        'clientId'          =>          $clientId,
        'options'           =>          $options
        ];
        $url = $this->url . 'employee/getEmployee';
        return $this->run($url,$fields);
    }

    /**
     * [getEmployeeList description]
     * @param  string $clientId [description]
     * @return json           includes employeeId
     */
    public function getEmployeeList($clientId)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'clientId'          =>          $clientId
        ];

        $url = $this->url . 'employee/getEmployeeList';
        return $this->run($url,$fields);
    }

    /**
     * [getJobRates description]
     * @param  string $clientId   [description]
     * @param  string $employeeId [description]
     * @return json             [description]
     */
    public function getJobRates($clientId, $employeeId)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'clientId'          =>          $clientId,
        'employeeId'        =>          $employeeId
        ];

        $url = $this->url . 'employee/getJobRates';
        return $this->run($url,$fields);   
    }

    /**
     * [getPayRateHistory description]
     * @param  string $clientId   [description]
     * @param  string $employeeId [description]
     * @return json             
     */
    public function getPayRateHistory($clientId, $employeeId)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'clientId'          =>          $clientId,
        'employeeId'        =>          $employeeId
        ];

        $url = $this->url . 'employee/getPayRateHistory';
        return $this->run($url,$fields);
    }

    // TODO: WHAT IS userStringId?
    public function getAllSubscriptions($userStringId)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'userStringId'      =>          $userStringId
        ];

        $url = $this->url . 'subscription/getAllSubscriptions';
        return $this->run($url,$fields);
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
        'sessionId'         =>          $this->session,
        'clientId'          =>          $clientId,
        'options'           =>          $options
        ];

        $url = $this->url . 'clientMaster/getClientCodes';
        return $this->run($url,$fields);
    }

    /**
     * [getClientMaster description]
     * @param  string $clientId [description]
     * @return json           [description]
     */
    public function getClientMaster($clientId)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'clientId'          =>          $clientId
        ];

        $url = $this->url . 'clientMaster/getClientMaster';
        return $this->run($url,$fields);
    }

    /**
     * [getGeoLocations description]
     * @param  string $zipCode [description]
     * @return json          [description]
     */
    public function getGeoLocations($zipCode)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'zipCode'           =>          $zipCode
        ];

        $url = $this->url . 'clientMaster/getGeoLocations';
        return $this->run($url,$fields);
    }

    /**
     * [getPayrollSchedule description]
     * @param  string $clientId [description]
     * @return json           [description]
     */
    public function getPayrollSchedule($clientId)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'clientId'          =>          $clientId,
        ];

        $url = $this->url . 'clientMaster/getPayrollSchedule';
        return $this->run($url,$fields);
    }


    // TODO: WHAT IS planId?
    public function getActiveBenefitPlans($clientId, $employeeId, $planId, $effectiveDate)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'clientId'          =>          $clientId,
        'employeeId'        =>          $employeeId,
        'planId'            =>          $planId,
        'effectiveDate'     =>          $effectiveDate
        ];

        $url = $this->url . 'benefits/getActiveBenefitPlans';
        return $this->run($url,$fields);
    }

    /**
     * [getActiveDependents description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getActiveDependents($clientId, $employeeId)
    {
        $fields = [
        'sessionId'         =>          $this->session,
        'clientId'          =>          $clientId,
        'employeeId'        =>          $employeeId
        ];

        $url = $this->url . 'benefits/getActiveDependents';
        return $this->run($url,$fields);
    }  

    /**
     * [getActiveRetirementPlan description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getActiveRetirementPlan($clientId, $employeeId, $effectiveDate)
    {
        $fields = [
            'sessionId'             =>          $this->session,
            'clientId'              =>          $clientId,
            'employeeId'            =>          $employeeId,
            'effectiveDate'         =>          $effectiveDate
        ];
    
        $url = $this->url . 'benefits/getActiveRetirementPlan';
        return $this->run($url,$fields);
    }



    /**
     * Uses cURL to handle output data
     * @todo might be good to seperate this into another class in the future since this is our implementation
     * @param  string $url
     * @param  array $fields
     * @return array
     */
    protected function run($url, $fields, $method = 'GET')
    {
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        switch ($method) {
            case 'POST':
            curl_setopt($handle, CURLOPT_URL, $url);
            curl_setopt($handle, CURLOPT_POST, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($fields));
            break;
            case 'GET':
            curl_setopt($handle, CURLOPT_URL, $url . '?' . http_build_query($fields));
            break;
            default:
            die("BAD METHOD");
            break;
        }

        $result = curl_exec($handle);
        if($result === FALSE)
            var_dump(curl_error($handle));
        else
            return json_decode(curl_exec($handle));   
    }
}


