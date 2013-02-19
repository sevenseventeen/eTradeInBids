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
	
$DivisionsRequest = array(
		"accountInfo" => $accountInfo,
		"modelYear" => "2011",
					);

$result = $client->getDivisions($DivisionsRequest);

var_dump ($result);

?>