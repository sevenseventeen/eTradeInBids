<?php

//PHP5 samples use native PHP5 SOAP.

$namespace="urn:description6.kp.chrome.com";

$wsdl = "http://services.chromedata.com/AutomotiveDescriptionService/AutomotiveDescriptionService6?WSDL";
$client = new SoapClient($wsdl);

$locale = array(
		"country" => "US",
		"language" => "EN"
	);
$accountInfo = array(
	"accountNumber" => "XXXXXX",
	"accountSecret" => "XXXXXXXXXXXXXXXX",
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
 

	// Define elements for and make getVehicleInformationFromVin request

			$returnParameters = array(
				"useSafeStandards" => 'true',
				"excludeFleetOnlyStyles" => 'false',
				"includeAvailableEquipment" => 'true',
				"includeExtendedDescriptions" => 'true',
				"includeExtendedTechnicalSpecifications" => 'false',
				"includeRegionSpecificStyles" => 'true',
				"includeConsumerInformation" => 'false',
				"enableEnrichedVehicleEquipment" => 'false'
			);
			$vinRequest = array(
				"accountInfo" => $accountInfo,
				"vin" => 'XXXXXXXXXXXXXXXXX',
				"manufacturerModelCode" => '',
				"trimName" => '',
				"wheelBase" => '',
				"manufacturerOptionCodes" => '',
				"equipmentDescriptions" => '',
				"exteriorColorName" => '',
				"returnParameters" => $returnParameters
			);
			$vehicleInfo = $client->getVehicleInformationFromVin($vinRequest);
			
		
	
var_dump ($vehicleInfo);
?>
