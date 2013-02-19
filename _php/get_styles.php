<?php 

//		$modelID = $_GET['modelID'];
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
//				"filterRules" => $filterRules,
//				"modelId" => $modelID
//			);
//		
//		$result = $client->getStyles($divisionsRequest);
//		$styles = $result->style;




		$namespace="urn:description6.kp.chrome.com";
		$modelID = $_GET['modelID'];
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
			
		$StylesRequest = array(
				"accountInfo" => $accountInfo,
				"modelId" => $modelID
							);
		
		$result = $client->getStyles($StylesRequest);
//		$result = $client->getStyles($divisionsRequest);
		$styles = $result->style;
		
//		var_dump ($result);





		$style_html = "<select name='style'><option>Select a Style</option>";
		foreach ($styles as $style) {
			if ($style->styleName == '') {
				$style_html = "<select name='style'>";
				$style_html .= "<option value='No Styles Available'>No Styles Available</option>\n";
				$style_html .= "</select>";
				break;
			} else {
				$style_html .= "<option value='".strtolower($style->styleName)."'>".$style->styleName."</option>\n";
			}
		}
		$style_html .= "</select>";
		echo $style_html;
		
?>