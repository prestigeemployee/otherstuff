<?php 

namespace PrismApi;

interface PrismInterface
{
	/**
	 * employee METHODS
	 * 
	*/

	public function getAddressInfo($clientId, $employeeId);

	public function getEmployee($employeeId, $clientId, $options = '');

	public function getEmployeeList($clientId);
	
	public function getJobRates($clientId, $employeeId);

	public function getPayRateHistory($clientId, $employeeId);

    public function getEmployeeSSNList($clientId);

    public function getEmpRestricted($employeeId, $clientId, $options = '');
    
	/**
	 * subcription METHODS
	 * 
	 */
	
    public function getAllSubscriptions($userStringId);

    public function getSubscription($subscriptionId);

    public function getEvents($subscriptionId, $replayId);

    public function getNewEvents($subscriptionId);


	

	/**
	 * clientmaster METHODS
	 * 
	 */
	public function getClientCodes($clientId, $options = '');

    public function getClientMaster($clientId);

    public function getGeoLocations($zipCode);

    public function getPayrollSchedule($clientId);

    public function getClientContact($clientId);

    public function getClientList($inActive);

    /**
     * benefits METHODS
     * 
     */

    public function getActiveBenefitPlans($clientId, $employeeId, $planId, $effectiveDate);

    public function getActiveDependents($clientId, $employeeId);
    
    public function getActiveRetirementPlan($clientId, $employeeId, $effectiveDate);

    public function getBenefitPlans($clientId, $employeeId, $planId = NULL);

    public function getDependents($clientId, $employeeId);

    public function getFlexPlans($clientId, $employeeId);

    public function getPaidTimeOff($clientId, $employeeId);

    public function getPaidTimeOffPlans($clientId);

    public function getRetirementLoans($clientId, $employeeId);

    public function getRetirementPlan($clientId, $employeeId);

    /**
     *  deductions METHODS
     * 
     */
    
    public function getDeductions($clientId, $employeeId, $options = '');
    
    /**
     * timesheet METHODS
     * 
     */
    
    public function getParamData($clientId, $userId);

    /**
     * applicant METHODS
     * 
     */
    
    public function getJobApplicants($clientId);
    
    /**
     * payroll Methods
     * 
     */

    public function getBillingVouchers($clientId, $payDateStart, $payDateEnd);

	public function getClientsWithVouchers($payDateStart, $paydateEnd);

    public function getPayrollVouchers($clientId, $payDateStart, $payDateEnd);

    public function getPayrollNotes($clientId);

    /**
     * prismSecurity methods
     * 
     */

    public function getClientList($prismUserId);

    public function isClientAllowed($prismUserId, $clientId);

    public function isEmployeeAllowed($prismUserId, $clientId, $employeeId);

    /**
     * taxRate
     * 
     */

    public function getTaxRate($workersCompPolicyId, $workersCompClass, $employerId, $effectiveDate, $clientId, $stateCode, $mode);

    public function getWorkersCompClasses($stateCode);

    public function getWorkersCompPolicyList($effectiveDate);

    public function getWorkersCompPolicyList($effectiveDate);
       
}