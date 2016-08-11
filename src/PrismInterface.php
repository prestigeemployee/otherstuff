<?php 

namespace PrismApi;

interface PrismInterface
{
	/**
	 * EMPLOYEE METHODS
	 * 
	*/

	public function getAddressInfo($clientId, $employeeId);

	public function getEmployee($employeeId, $clientId, $options = '');

	public function getEmployeeList($clientId);
	
	public function getJobRates($clientId, $employeeId);

	public function getPayRateHistory($clientId, $employeeId);

	/**
	 * SUBCRIPTION METHODS
	 * 
	 */
	

	/**
	 * CLIENTMASTER METHODS
	 * 
	 */
	public function getClientCodes($clientId, $options = '');

    public function getClientMaster($clientId);

    public function getGeoLocations($zipCode);

    public function getPayrollSchedule($clientId);

    /**
     * BENEFITS METHODS
     * 
     */

    public function getActiveBenefitPlans($clientId, $employeeId, $planId, $effectiveDate);

    

}