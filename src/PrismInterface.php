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

    
    
    /**
     *  deductions METHODS
     * 
     */
    


}