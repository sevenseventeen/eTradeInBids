<?php 

//		$modelYear = $_GET['modelYear'];
//		$namespace="urn:configcompare3.kp.chrome.com";
//		$wsdl = "http://services.chromedata.com/AutomotiveConfigCompareService/AutomotiveConfigCompareService3?WSDL";
//		$client = new SoapClient($wsdl);
//		
//		$locale = array(
//				"country" => "US",
//				"language" => "EN"
//			);
//			
//		$accountInfo = array(
//			"accountNumber" => "283720",
//			"accountSecret" => "a9346d13d32b422c",
//			"locale" => $locale,
//			"sessionId" => ""
//		);
//		
//		$filterRules = array(
//			"orderAvailability" => "Retail",
//			"postalCode" => "97232",
//			"vehicleTypes" => "Car",
//			"msrpRange" => array(
//				"minimumPrice" => "0",
//				"maximumPrice" => "500000"
//			)
//		);	
//
//		$divisionsRequest = array(
//				"accountInfo" => $accountInfo,
//				"modelYear" => $modelYear,
//				"filterRules" => $filterRules
//			);
//		
//		$result = $client->getDivisions($divisionsRequest);
//		$divisions = $result->division;
		
		
		
		
		
		
		
		$modelYear = $_GET['modelYear'];
		$namespace="urn:description6.kp.chrome.com";
	//	$wsdl = "http://services.chromedata.com/AutomotiveDescriptionService/AutomotiveDescriptionService6?WSDL";
		$wsdl = "http://services.chromedata.com/AutomotiveDescriptionService/AutomotiveDescriptionService6?WSDL";
		$client = new SoapClient($wsdl);
		
		$locale = array(
				"country" => "US",
				"language" => "EN"
			);
		$accountInfo = array(
			"accountNumber" => "283720",
			"accountSecret" => "a9346d13d32b422c",
			"locale" => $locale,
			"sessionId" => ""
		);
		
		// Get data version -- for display in html title
		
		$version = "";
		$dataVersionsRequest = array(
			"accountInfo" => $accountInfo
		);
		
		$getDataVersions = array(
			"accountInfo" => $accountInfo,
		);
			 
		$result = $client->getDataVersions($dataVersionsRequest);
			
		$DivisionsRequest = array(
			"accountInfo" => $accountInfo,
			"modelYear" => $modelYear
		);
		
		$result = $client->getDivisions($DivisionsRequest);
		$divisions = $result->division;
		
		$make_html = "<select onchange='get_models(this, this.selectedIndex);' name='make'><option>Select a Make</option>";
		foreach ($divisions as $division) {
			$make_html .= "<option id='".strtolower($division->divisionId)."' value='".$division->divisionName."'>".$division->divisionName."</option>\n";
		}
		$make_html .= "</select>";
		echo $make_html;

?>