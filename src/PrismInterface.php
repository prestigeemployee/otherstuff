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

    /**
     * benefits METHODS
     * 
     */

    public function getActiveBenefitPlans($clientId, $employeeId, $planId, $effectiveDate);

    public function getActiveDependents($clientId, $employeeId);
    
    public function getActiveRetirementPlan($clientId, $employeeId, $effectiveDate);

    public function getBenefitPlans($clientId, $employeeId, $planId);

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


}