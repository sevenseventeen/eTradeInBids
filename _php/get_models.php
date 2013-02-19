<?php 

//		$divisionId = $_GET['divisionId'];
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
//				"modelYear" => "2010",
//				"filterRules" => $filterRules,
//				"divisionId"	=> $divisionId
//			);
//		
//		$result = $client->getModelsByDivision($divisionsRequest);
//		$models = $result->model;
//		
//		
		
		$divisionId = $_GET['divisionId'];
		$namespace="urn:description6.kp.chrome.com";
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
		
		$getDataVersions = array (
			"accountInfo" => $accountInfo
		);
			 
		$result = $client->getDataVersions($dataVersionsRequest);
			
		$ModelsByDivisionRequest = array(
			"accountInfo" => $accountInfo,
			"modelYear" => '2011',
			"divisionId" => $divisionId
		);
		
		$result = $client->getModelsByDivision($ModelsByDivisionRequest);
		$models = $result->model;
		//var_dump ($result);
		
		$model_html = "<select onchange='get_styles(this, this.selectedIndex);' name='model'><option>Select a Model</option>";
		foreach ($models as $model) {
			$model_html .= "<option id='".strtolower($model->modelId)."' value='".$model->modelName."'>".$model->modelName."</option>\n";
		}
		$model_html .= "</select>"; 
		echo $model_html;

?>