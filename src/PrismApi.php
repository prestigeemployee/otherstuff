<?php
//$soapclient = new SoapClient('https://api.hrpyramid.net/api-1.4/services/rest?_wadl');
/**
 * This RESTful API v1.4 for Prism in PHP
 * https://api.hrpyramid.net/api-1.2/services
 */

namespace PrismApi;

use PrismApi\PrismInterface;
use PrismApi\PrismCurlService;

Class PrismApi implements PrismInterface
{
    protected $url;
    protected $service;
    public $session;

    protected $username;
    protected $password;
    protected $peoId;

    public function __construct()
    {
        $this->username = $_ENV['username'];
        $this->password = $_ENV['password'];
        $this->peoId = $_ENV['peoId'];
        $this->url = $_ENV['url'];

        $this->service = new PrismCurlService();
        $this->session = PrismSessionHandler::makeSession();
        
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

    public function getAddressInfo($clientId, $employeeId)
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . 'employee/getAddressInfo';
        return $this->service->run($url, $fields);
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
        'sessionId'             =>          $this->session,
        'employeeId'            =>          $employeeId,
        'clientId'              =>          $clientId,
        'options'               =>          $options
        ];
        $url = $this->url . 'employee/getEmployee';
        return $this->service->run($url,$fields);
    }

    /**
     * [getEmployeeList description]
     * @param  string $clientId [description]
     * @return json           includes employeeId
     */
    public function getEmployeeList($clientId)
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId
        ];

        $url = $this->url . 'employee/getEmployeeList';
        return $this->service->run($url,$fields);
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
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . 'employee/getJobRates';
        return $this->service->run($url,$fields);   
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
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . 'employee/getPayRateHistory';
        return $this->service->run($url,$fields);
    }

    /**
     * [getAllSubscriptions description]
     * @param  string userStringId   [description]
     * @return json             
     */
    public function getAllSubscriptions($userStringId)
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'userStringId'          =>          $userStringId
        ];

        $url = $this->url . 'subscription/getAllSubscriptions';
        return $this->service->run($url,$fields);
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
            'sessionId'         =>          $this->session,
            'subscriptionId'    =>          $subscriptionId,
            'replayId'          =>          $replayId,
        ];
    
        $url = $this->url . 'subscription/getEvents';
        return $this->service->run($url,$fields);
    }

    /**
     * [getNewEvents description]
     * @param  string subscriptionId   [description]
     * @return json             
     */
    public function getNewEvents($subscriptionId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'subscriptionId'    =>          $subscriptionId,
        ];
    
        $url = $this->url . 'subscription/getNewEvents';
        return $this->service->run($url,$fields);
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
    
        $url = $this->url . 'subscription/getSubscription';
        return $this->service->run($url,$fields);
    }

    /**
     * [getJobApplicants description]
     * @param  string clientId   [description]
     * @return json             
     */
    public function getJobApplicants($clientId)
    {
        $fields = [
            'sessionId'             =>          $this->session,
            'clientId'                =>          $clientId,
        ];
    
        $url = $this->url . 'applicant/getJobApplicants';
        return $this->service->run($url,$fields);
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
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId,
        'options'               =>          $options
        ];

        $url = $this->url . 'clientMaster/getClientCodes';
        return $this->service->run($url,$fields);
    }

    /**
     * [getClientMaster description]
     * @param  string $clientId [description]
     * @return json           [description]
     */
    public function getClientMaster($clientId)
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId
        ];

        $url = $this->url . 'clientMaster/getClientMaster';
        return $this->service->run($url,$fields);
    }

    /**
     * [getGeoLocations description]
     * @param  string $zipCode [description]
     * @return json          [description]
     */
    public function getGeoLocations($zipCode)
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'zipCode'               =>          $zipCode
        ];

        $url = $this->url . 'clientMaster/getGeoLocations';
        return $this->service->run($url,$fields);
    }

    /**
     * [getPayrollSchedule description]
     * @param  string $clientId [description]
     * @return json           [description]
     */
    public function getPayrollSchedule($clientId)
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId,
        ];

        $url = $this->url . 'clientMaster/getPayrollSchedule';
        return $this->service->run($url,$fields);
    }

    

    // TODO: WHAT IS planId?
    public function getActiveBenefitPlans($clientId, $employeeId, $planId, $effectiveDate)
    {
        $fields = [
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId,
        'planId'                =>          $planId,
        'effectiveDate'         =>          $effectiveDate
        ];

        $url = $this->url . 'benefits/getActiveBenefitPlans';
        return $this->service->run($url,$fields);
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
        'sessionId'             =>          $this->session,
        'clientId'              =>          $clientId,
        'employeeId'            =>          $employeeId
        ];

        $url = $this->url . 'benefits/getActiveDependents';
        return $this->service->run($url,$fields);
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
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
            'effectiveDate'     =>          $effectiveDate
        ];
    
        $url = $this->url . 'benefits/getActiveRetirementPlan';
        return $this->service->run($url,$fields);
    }

    /**
     * [getBenefitPlans description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @param  string $planId [description]
     * @return json             
     */
    public function getBenefitPlans($clientId, $employeeId, $planId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
            'planId'            =>          $planId
        ];
    
        $url = $this->url . 'benefits/getBenefitPlans';
        return $this->service->run($url,$fields);
    }

    /**
     * [getDependents description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getDependents($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId
        ];
    
        $url = $this->url . 'benefits/getDependents';
        return $this->service->run($url,$fields);
    }

    /**
     * [getFlexPlans description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getFlexPlans($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
        ];
    
        $url = $this->url . 'benefits/getFlexPlans';
        return $this->service->run($url,$fields);
    }

    /**
     * [getPaidTimeOff description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getPaidTimeOff($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
        ];
    
        $url = $this->url . 'benefits/getPaidTimeOff';
        return $this->service->run($url,$fields);
    }

    /**
     * [getPaidTimeOffPlans description]
     * @param  string clientId   [description]
     * @return json             
     */
    public function getPaidTimeOffPlans($clientId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
        ];
    
        $url = $this->url . 'benefits/getPaidTimeOffPlans';
        return $this->service->run($url,$fields);
    }

    /**
     * [getRetirementLoans description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getRetirementLoans($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
        ];
    
        $url = $this->url . 'benefits/getRetirementLoans';
        return $this->service->run($url,$fields);
    }

    /**
     * [getRetirementPlan description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @return json             
     */
    public function getRetirementPlan($clientId, $employeeId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
        ];
    
        $url = $this->url . 'benefits/getRetirementPlan';
        return $this->service->run($url,$fields);
    }

    /**
     * [getDeductions description]
     * @param  string clientId   [description]
     * @param  string employeeId [description]
     * @param  string options [description]
     * @return json             
     */
    public function getDeductions($clientId, $employeeId, $options = '')
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'employeeId'        =>          $employeeId,
            'options'           =>          $options
        ];
    
        $url = $this->url . 'deductions/getDeductions';
        return $this->service->run($url,$fields);
    }

    /**
     * [getParamData description]
     * @param  string clientId   [description]
     * @param  string userId [description]
     * @return json             
     */
    public function getParamData($clientId, $userId)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'userId'            =>          $userId,
        ];
    
        $url = $this->url . 'timesheet/getParamData';
        return $this->service->run($url,$fields);
    }

    /**
     * [getBillingVouchers description]
     * @param  string clientId   [description]
     * @param  string payDateStart [description]
     * @param  string payDateEnd [description]
     * @return json             
     */
    public function getBillingVouchers($clientId, $payDateStart, $payDateEnd)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'payDateStart'      =>          $payDateStart,
            'payDateEnd'        =>          $payDateEnd
        ];
    
        $url = $this->url . 'payroll/getBillingVouchers';
        return $this->service->run($url,$fields);
    }

    /**
     * [getClientsWithVouchers description]
     * @param  string payDateStart   e.g., 2016-05-05
     * @param  string paydateEnd [description]
     * @return json             
     */
    public function getClientsWithVouchers($payDateStart, $paydateEnd)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'payDateStart'      =>          $payDateStart,
            'payDateEnd'        =>          $paydateEnd,
        ];
    
        $url = $this->url . 'payroll/getClientsWithVouchers';
        return $this->service->run($url,$fields);
    }

    /**
     * [getPayrollVouchers description]
     * @param  string clientId   e.g., 2016-05-05
     * @param  string payDateStart [description]
     * @param  string payDateEnd [description]
     * @return json             
     */
    public function getPayrollVouchers($clientId, $payDateStart, $payDateEnd)
    {
        $fields = [
            'sessionId'         =>          $this->session,
            'clientId'          =>          $clientId,
            'payDateStart'      =>          $payDateStart,
            'payDateEnd'        =>          $payDateEnd
        ];
    
        $url = $this->url . 'payroll/getPayrollVouchers';
        return $this->service->run($url,$fields);
    }

    public function __destruct() {
        curl_close($this->service->handle);
    }



























































    // /**
    //  * Uses cURL to handle output data
    //  * @todo might be good to seperate this into another class in the future since this is our implementation
    //  * @param  string $url
    //  * @param  array $fields
    //  * @return array
    //  */
    // protected function run($url, $fields, $method = 'GET')
    // {
    //     $handle = curl_init();
    //     curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    //     switch ($method) {
    //         case 'POST':
    //         curl_setopt($handle, CURLOPT_URL, $url);
    //         curl_setopt($handle, CURLOPT_POST, true);
    //         curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($fields));
    //         break;
    //         case 'GET':
    //         curl_setopt($handle, CURLOPT_URL, $url . '?' . http_build_query($fields));
    //         break;
    //         default:
    //         die("BAD METHOD");
    //         break;
    //     }

    //     $result = curl_exec($handle);
    //     if($result === FALSE)
    //         var_dump(curl_error($handle));
    //     else
    //         return json_decode(curl_exec($handle));   
    // }
}


