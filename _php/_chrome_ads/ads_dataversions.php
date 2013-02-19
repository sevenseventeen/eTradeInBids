<?php

$namespace="urn:configcompare3.kp.chrome.com";

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

$getDataVersions = array(
		"accountInfo" => $accountInfo,
		
					);
$result = $client->getDataVersions($dataVersionsRequest);

var_dump ($result);

?>