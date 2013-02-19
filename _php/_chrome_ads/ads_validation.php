<?php

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
 

	// Define elements for and make getValidation request

				$ValidationRequest = array(
				"accountInfo" => $accountInfo,
				"vin" => 'WP0AA2A97CS789203',
				"modelYear" => '2012',
				"makeName" => 'Porsche',
				"modelName" => '911',
				"styleName" => '2dr Cpe Carrera'
				//"trimName" => ''				
			);
			$vehicleInfo = $client->validateVinWithVehicleDescription($ValidationRequest);
			
		
	
var_dump ($vehicleInfo);
?>
