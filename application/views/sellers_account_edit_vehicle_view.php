<?php  include '_includes/head.php' ?>

	<div id="main_container" class="sellers_account edit_vehicle_page">

		<?php
			$main_navigation = "my_account";
			$account_navigation = '';
			include '_includes/header.php';
		?>
		
		<script type="text/javascript" src="<?php echo base_url().'_javascript/swfobject.js'; ?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#i_agree_text").hide();
				$("#terms_of_use_scroll").scroll(function() {
					if($("#terms_of_use_scroll").scrollTop() >= $("#terms_of_use_scroll").attr('scrollHeight') - $("#terms_of_use_scroll").height() - 20) {
						$("#terms_of_use_checkbox").removeAttr('disabled');
						$("#i_agree_instructions").hide();
						$("#i_agree_text").fadeIn();
					}
				});
			});
		</script>	
		
		<script type="text/javascript">
        
            $(document).ready(function(){

                $("#im_done").hide();
                $("#no_flash").hide();

                if(!swfobject.hasFlashPlayerVersion("9.0.115")) {
                    $("#no_flash").show();  
                }
        
            });
                            
        </script>
			
		<script type="text/javascript">

			function get_makes(modelYear) {
				document.getElementById("make_select").innerHTML='<select></select>';
				document.getElementById("model_select").innerHTML='<select></select>';
				document.getElementById("style_select").innerHTML='<select></select>';
				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			  		xmlhttp = new XMLHttpRequest();
			  	} else { // code for IE6, IE5
			  		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  	}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			    		document.getElementById("make_select").innerHTML=xmlhttp.responseText;
			    	} 
			  	}
				xmlhttp.open("GET", "<?php echo base_url().'_php/get_makes.php?modelYear='; ?>"+modelYear, true);
				xmlhttp.send();
			}

			function get_models(element, selectedIndex) {
				document.getElementById("model_select").innerHTML='<select></select>';
				document.getElementById("style_select").innerHTML='<select></select>';
				var divisionId = element.options[selectedIndex].id;
				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			  		xmlhttp = new XMLHttpRequest();	
			  	} else { // code for IE6, IE5
			  		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  	}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			    		document.getElementById("model_select").innerHTML=xmlhttp.responseText;
			    	} 
			  	}
				xmlhttp.open("GET", "<?php echo base_url().'_php/get_models.php?divisionId='; ?>"+divisionId, true);
				xmlhttp.send();
			}

			function get_styles(element, selectedIndex) {
				document.getElementById("style_select").innerHTML='<select></select>';
				var modelID = element.options[selectedIndex].id;
				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			  		xmlhttp = new XMLHttpRequest();	
			  	} else { // code for IE6, IE5
			  		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  	}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			    		document.getElementById("style_select").innerHTML=xmlhttp.responseText;
			    	} 
			  	}
				xmlhttp.open("GET", "<?php echo base_url().'_php/get_styles.php?modelID='; ?>"+modelID, true);
				xmlhttp.send();
			}

		</script>
		
		<script type="text/javascript">

    		$(document).ready(function(){
    			
    			$("#approximate_payoff_container").hide(); 
    			$("#leinholder_name_container").hide();

    			<?php if ($vehicle_details[0]->any_accidents != "Yes") { ?>
    				$("#accident_repair_history_container").hide();
    			<?php } else { ?>
    				$("#accident_repair_history_container").show();
    			<?php } ?>

    			<?php if ($vehicle_details[0]->is_actual_mileage != "No") { ?>
    				$("#not_actual_mileage_notes_container").hide();
    			<?php } ?>

    			$("#is_actual_mileage").change(function () {
					if($(this).val() == "Yes") {
						$("#not_actual_mileage_notes_container").hide();
					} else {
						$("#not_actual_mileage_notes_container").fadeTo(0, 1);
					}
				});

    			$("#any_accidents").change(function () {
    				if($(this).val() != "Yes") {
    					$("#accident_repair_history_container").hide();
    				} else {
    					$("#accident_repair_history_container").fadeTo(0, 1);
    				}
    			});
    
    			<?php if ($this->session->userdata('any_accidents') == "Yes") { ?>
                    $("#accident_repair_history_container").fadeTo(0, 1);
                <?php } else { ?>
                    $("#accident_repair_history_container").hide();
                <?php } ?>
    
    		});

		</script>
		
		<?php if (isset($vin_data)) { //echo "<h1>VIN Data Set</h1>"; ?>
		
			<?php 
			
			$upholstery_code_array = Array('1077', '1078', '1079'); 
			$upholstery_value = generic_equipment_array_lookup($upholstery_code_array, $vin_data);
			
			$transmission_code_array = Array('1130', '1131'); 
			$transmission_value = generic_equipment_array_lookup($transmission_code_array, $vin_data);
			
			$number_of_speeds_code_array = Array('1101', '1102', '1103', '1104', '1105', '1106', '1107', '1108', '1146', '1147', '1148', '1210', '1220', '1301');
			$number_of_speeds_value = generic_equipment_array_lookup($number_of_speeds_code_array, $vin_data);
			
			$fuel_type_value = $vin_data->vehicleSpecification->engines->fuelType;
			
			$power_steering_yes_value 			= generic_equipment_lookup(1084, $vin_data);
			$air_conditioning_yes_value 		= generic_equipment_lookup(1011, $vin_data);
			$power_windows_yes_value 			= generic_equipment_lookup(1126, $vin_data);
			$power_door_locks_yes_value 		= generic_equipment_lookup(1063, $vin_data);
			$cruise_control_yes_value 			= generic_equipment_lookup(1033, $vin_data);
			$cd_player_changer_yes_value 		= generic_equipment_lookup(1001, $vin_data);
			$premium_sound_yes_value 			= generic_equipment_lookup(1136, $vin_data);
			$integrated_phone_yes_value 		= generic_equipment_lookup(1085, $vin_data);
			$dual_airbags_yes_value 			= generic_equipment_lookup(1002, $vin_data);
			$four_wheel_abs_brakes_yes_value 	= generic_equipment_lookup(1018, $vin_data);
			$traction_control_yes_value			= generic_equipment_lookup(1100, $vin_data);
			$power_seats_yes_value				= generic_equipment_lookup(1074, $vin_data);
			$dual_power_seats_yes_value			= generic_equipment_lookup(1075, $vin_data);
			$flip_up_moon_roof_yes_value		= generic_equipment_lookup(1067, $vin_data);
			$privacy_glass_yes_value			= generic_equipment_lookup(1158, $vin_data);
			$navigation_yes_value			 	= generic_equipment_lookup(1066, $vin_data);
			$entertainment_system_dvd_yes_value	= generic_equipment_lookup(1215, $vin_data);
			$oversized_off_road_yes_value		= generic_equipment_lookup(1091, $vin_data);
			$roof_rack_yes_value 				= generic_equipment_lookup(1172, $vin_data);
			$running_boards_yes_value 			= generic_equipment_lookup(1072, $vin_data);
			$sliding_rear_window_yes_value 		= generic_equipment_lookup(1206, $vin_data);
			$bed_liner_yes_value 				= generic_equipment_lookup(1216, $vin_data);
			$canopy_shell_yes_value 			= generic_equipment_lookup(1219, $vin_data);
			$quad_seating_yes_value 			= generic_equipment_lookup(1141, $vin_data);
			
			?>
				
			<script type="text/javascript">

				$(document).ready(function(){

					$("#year").append("<option value='<?php echo $vin_data->modelYear; ?>'><?php echo $vin_data->modelYear; ?></option>");
					$("#year").val('<?php echo $vin_data->modelYear; ?>');

					$("#make").removeAttr('disabled');
					$("#make").append("<option value='<?php echo $vin_data->vinMakeName; ?>'><?php echo $vin_data->vinMakeName; ?></option>");
					$("#make").val('<?php echo $vin_data->vinMakeName; ?>');

					$("#model").removeAttr('disabled');
					$("#model").append("<option value='<?php echo $vin_data->vinModelName; ?>'><?php echo $vin_data->vinModelName; ?></option>");
					$("#model").val('<?php echo $vin_data->vinModelName; ?>');

					$("#style").removeAttr('disabled');	
					$("#style").append("<option value='<?php echo $vin_data->vinStyleName; ?>'><?php echo $vin_data->vinStyleName; ?></option>");
					$("#style").val('<?php echo $vin_data->vinStyleName; ?>');

					$("#vin").val('<?php echo $vin_data->vin; ?>');
					
					$("#upholstery_type").val('<?php echo $upholstery_value; ?>');

					$("#number_of_cylinders").val('<?php echo $vin_data->vehicleSpecification->engines->cylinders; ?>');

					$("#transmission_type").val('<?php echo $transmission_value; ?>');

					$("#number_of_speeds").val('<?php echo $number_of_speeds_value; ?>');
					$("#fuel_type").val('<?php echo $fuel_type_value; ?>');

					$("#power_steering_yes").attr('checked', 			<?php if ($power_steering_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#power_steering_no").attr('checked', 			<?php if ($power_steering_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#air_conditioning_yes").attr('checked', 			<?php if ($air_conditioning_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#air_conditioning_no").attr('checked', 			<?php if ($air_conditioning_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#power_windows_yes").attr('checked', 			<?php if ($power_windows_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#power_windows_no").attr('checked', 				<?php if ($power_windows_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#power_door_locks_yes").attr('checked', 			<?php if ($power_door_locks_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#power_door_locks_no").attr('checked', 			<?php if ($power_door_locks_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#cruise_control_yes").attr('checked', 			<?php if ($cruise_control_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#cruise_control_no").attr('checked', 			<?php if ($cruise_control_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#cd_player_changer_yes").attr('checked', 		<?php if ($cd_player_changer_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#cd_player_changer_no").attr('checked', 			<?php if ($cd_player_changer_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#premium_sound_yes").attr('checked', 			<?php if ($premium_sound_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#premium_sound_no").attr('checked', 				<?php if ($premium_sound_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#integrated_phone_yes").attr('checked', 			<?php if ($integrated_phone_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#integrated_phone_no").attr('checked', 			<?php if ($integrated_phone_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#dual_airbags_yes").attr('checked', 				<?php if ($dual_airbags_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#dual_airbags_no").attr('checked', 				<?php if ($dual_airbags_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#four_wheel_abs_brakes_yes").attr('checked', 	<?php if ($four_wheel_abs_brakes_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#four_wheel_abs_brakes_no").attr('checked', 		<?php if ($four_wheel_abs_brakes_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#traction_control_yes").attr('checked', 			<?php if ($traction_control_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#traction_control_no").attr('checked', 			<?php if ($traction_control_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#power_seats_yes").attr('checked', 				<?php if ($power_seats_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#power_seats_no").attr('checked', 				<?php if ($power_seats_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#dual_power_seats_yes").attr('checked', 			<?php if ($dual_power_seats_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#dual_power_seats_no").attr('checked', 			<?php if ($dual_power_seats_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#flip_up_moon_roof_yes").attr('checked', 		<?php if ($flip_up_moon_roof_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#flip_up_moon_roof_no").attr('checked', 			<?php if ($flip_up_moon_roof_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#privacy_glass_yes").attr('checked', 			<?php if ($privacy_glass_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#privacy_glass_no").attr('checked', 				<?php if ($privacy_glass_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#navigation_yes").attr('checked', 				<?php if ($navigation_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#navigation_no").attr('checked', 				<?php if ($navigation_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#entertainment_system_dvd_yes").attr('checked', 	<?php if ($entertainment_system_dvd_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#entertainment_system_dvd_no").attr('checked', 	<?php if ($entertainment_system_dvd_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#oversized_off_road_yes").attr('checked', 		<?php if ($oversized_off_road_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#oversized_off_road_no").attr('checked', 		<?php if ($oversized_off_road_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#roof_rack_yes").attr('checked', 				<?php if ($roof_rack_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#roof_rack_no").attr('checked', 					<?php if ($roof_rack_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#running_boards_yes").attr('checked', 			<?php if ($running_boards_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#running_boards_no").attr('checked', 			<?php if ($running_boards_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#sliding_rear_window_yes").attr('checked', 		<?php if ($sliding_rear_window_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#sliding_rear_window_no").attr('checked', 		<?php if ($sliding_rear_window_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#bed_liner_yes").attr('checked', 				<?php if ($bed_liner_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#bed_liner_no").attr('checked', 					<?php if ($bed_liner_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#canopy_shell_yes").attr('checked', 				<?php if ($canopy_shell_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#canopy_shell_no").attr('checked', 				<?php if ($canopy_shell_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

					$("#quad_seating_yes").attr('checked', 				<?php if ($quad_seating_yes_value) { echo 'true'; } else { echo 'false'; } ?>);
					$("#quad_seating_no").attr('checked', 				<?php if ($quad_seating_yes_value) { echo 'false'; } else { echo 'true'; } ?>);

				});
	
			</script>
			
		<?php } ?>
			
			
			
			
			
			
		
		
		<div class="module_960 drop_shadow rounded_corners">
			<h1>Edit a Vehicle</h1>
			<p><?php echo $this->session->flashdata('message'); ?></p>
			
			<?php
			
    			function generic_equipment_lookup($category_id, $vin_data) {
    				$generic_equipment = $vin_data->genericEquipment;
    				for($i=0; $i<sizeof($generic_equipment); ++$i) {
    					$matched = false;
    					if ($generic_equipment[$i]->categoryId == $category_id) {
    						if ($generic_equipment[$i]->installed == 1) {
    							$matched = true;
    							return true;
    						}
    					}
    					
    					if ($i == sizeof($generic_equipment) && $matched == false) {
    						echo "<h1>LAST ONE</h1>";				
    						return false;
    					}
    				}
    			}
    			
    			function generic_equipment_array_lookup($category_id_array, $vin_data) {
    				for($i=0; $i<sizeof($category_id_array); ++$i) {
    					$generic_equipment = $vin_data->genericEquipment;
    					foreach ($generic_equipment as $option){
    						if ($option->categoryId == $category_id_array[$i]) {
    							return $option->description;
    						} 
    					}
    				}
    			}
			
			?>
			
		</div>

		<div class="module_960 drop_shadow rounded_corners" id="add_a_vehicle">
		
			<?php 
			
			$blank_options							= array('' => '');
			$exterior_color_options 				= array('' => '', 'Black' => 'Black', 'Blue' => 'Blue', 'Brown' => 'Brown', 'Copper' => 'Copper', 'Gold' => 'Gold', 'Gray' => 'Gray', 'Green' => 'Green', 'Maroon' => 'Maroon', 'Non Color' => 'Non Color', 'Orange' => 'Orange', 'Purple' => 'Purple', 'Red' => 'Red', 'Silver' => 'Silver', 'Tan' => 'Tan', 'Teal' => 'Teal', 'White' => 'White', 'Yellow' => 'Yellow', 'Other' => 'Other');
			$interior_color_options 				= array('' => '', 'Black' => 'Black', 'Blue' => 'Blue', 'Brown' => 'Brown', 'Copper' => 'Copper', 'Gold' => 'Gold', 'Gray' => 'Gray', 'Green' => 'Green', 'Maroon' => 'Maroon', 'Non Color' => 'Non Color', 'Orange' => 'Orange', 'Purple' => 'Purple', 'Red' => 'Red', 'Silver' => 'Silver', 'Tan' => 'Tan', 'Teal' => 'Teal', 'White' => 'White', 'Yellow' => 'Yellow', 'Other' => 'Other');
			$upholstery_options 					= array('' => '', 'Leather Seats' => 'Leather Seats', 'Cloth Seats' => 'Cloth Seats', 'Vinyl Seats' => 'Vinyl Seats');
			$cylinder_options						= array('' => '', '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12');
			$transmission_options					= array('' => '', 'A/T' => 'Automatic', 'M/T' => 'Manual');
			$number_of_speeds_options				= array('' => '', '1-Speed A/T' => '1-Speed A/T', '3-Speed A/T' => '3-Speed A/T', '4-Speed A/T' => '4-Speed A/T', '5-Speed A/T' => '5-Speed A/T', '6-Speed A/T' => '7-Speed A/T', '7-Speed A/T' => '7-Speed A/T', '8-Speed A/T' => '8-Speed A/T', '4-Speed M/T' => '4-Speed M/T', '5-Speed M/T' => '5-Speed M/T', '6-Speed M/T' => '6-Speed M/T', '7-Speed M/T' => '7-Speed M/T', '8-Speed M/T' => '8-Speed M/T');
			$fuel_type_options 						= array('' => '', 'Gasoline Fuel' => 'Gasoline Fuel', 'Diesel Fuel' => 'Diesel Fuel', 'Electric Fuel System' => 'Electric Fuel System');
			$drive_type_options 					= array('' => '', 'Two Wheel Drive' => 'Two Wheel Drive', 'Four Wheel Drive' => 'Four Wheel Drive', 'All Wheel Drive' => 'All Wheel Drive');
			$original_owner_options					= array('' => '', 'Yes' => 'Yes', 'No' => 'No');
			$any_accidents_options					= array('' => '', 'Yes' => 'Yes', 'No' => 'No');
			$any_repainting_options					= array('' => '', 'Yes' => 'Yes', 'No' => 'No');
			$have_title_options						= array('' => '', 'Yes' => 'Yes', 'No' => 'No');
			$approximate_payoff_data 				= array('name' => 'approximate_payoff', 'id' => 'approximate_payoff' );
			$leinholder_name_data 					= array('name' => 'leinholder_name', 'id' => 'leinholder_name');
    		$registration_expiration_month_options 	= array('' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12'); 
    		$registration_expiration_year_options 	= array('' => '', '2006' => '2006', '2007' => '2007', '2008' => '2008', '2009' => '2009', '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014');
    		$is_actual_mileage_options			 	= array('' => '', 'Yes' => 'Yes', 'No' => 'No');
			$state_options							= array(
                '' => '', 
                'Alabama' => 'Alabama',	
                'Alaska' => 'Alaska',	
                'Arizona' => 'Arizona',	
                'Arkansas' => 'Arkansas',
                'California' => 'California',	
                'Colorado' => 'Colorado',	
                'Connecticut' => 'Connecticut',	
                'Delaware' => 'Delaware',	
                'District of Columbia' => 'District of Columbia',	
                'Florida' => 'Florida',	
                'Georgia' => 'Georgia',	
                'Guam' => 'Guam',	
                'Hawaii' => 'Hawaii',	
                'Idaho' => 'Idaho',	
                'Illinois' => 'Illinois',
                'Indiana' => 'Indiana',
                'Iowa' => 'Iowa',	
                'Kansas' => 'Kansas',	
                'Kentucky' => 'Kentucky',
                'Louisiana' => 'Louisiana',	
                'Maine' => 'Maine',	
                'Maryland' => 'Maryland',
                'Massachusetts' => 'Massachusetts',	
                'Michigan' => 'Michigan',	
                'Minnesota' => 'Minnesota',	
                'Mississippi' => 'Mississippi',	
                'Missouri' => 'Missouri',	
                'Montana' => 'Montana',	
                'Nebraska' => 'Nebraska',
                'Nevada' => 'Nevada',
                'New Hampshire' => 'New Hampshire',	
                'New Mexico' => 'New Mexico',
                'New York' => 'New York',
                'North Carolina' => 'North Carolina',
                'North Dakota' => 'North Dakota',
                'Ohio' => 'Ohio',
                'Oklahoma' => 'Oklahoma',
                'Oregon' => 'Oregon',
                'Pennsylvania' => 'Pennsylvania',	
                'Puerto Rico' => 'Puerto Rico',	
                'Rhode Island' => 'Rhode Island',	
                'South Carolina' => 'South Carolina',	
                'South Dakota' => 'South Dakota',	
                'Tennessee' => 'Tennessee',	
                'Texas' => 'Texas',	
                'Utah' => 'Utah',	
                'Vermont' => 'Vermont',	
                'Virginia' => 'Virginia',	
                'Virgin Islands' => 'Virgin Islands',	
                'Washington' => 'Washington',	
                'West Virginia' => 'West Virginia',	
                'Wisconsin' => 'Wisconsin',	
                'Wyoming' => 'Wyoming'
            );    
    		
    		?>
			
    		<?php $attributes = array('class' => 'vehicle_upload_form'); ?>
			<?php echo form_open_multipart('site/update_vehicle', $attributes); ?>
			
			<?php 
				if (isset($vin_data)) {
					echo "<h2 class='vin_verify'>Success! We have found data for the VIN you entered. However, please verify and complete all data fields before submitting.</h2>";
				}

				if (isset($vin_error)) {
					echo "<h2 class='vin_failure'>Sorry, that VIN was not recognized. Please check the number and try again. If you continue to have trouble, please <a href='". base_url() ."site/contact_us'>Contact Us</a></h2>";
				}
			?>			
			
			
			<fieldset>
				
				<legend>Vehicle Profile</legend>
				
				<?php
					$year_html = "<label>Year</label><select name='year' id='year' onChange='get_makes(this.value);'><option>Select a Year</option>";
					foreach ($model_years as $model_year) {
						//$set_select = set_select('year', 2010);
						if($model_year == $vehicle_details[0]->year) {
						    $set_select = 'selected=selected';    
						} else {
						    $set_select = '';
						}
						
						$year_html .= '<option '.$set_select.' value="'.strtolower($model_year).'">'.$model_year.'</option>\n';
					}
					$year_html .= "</select>".form_error("year")."<br class='clear_float' />";
					echo $year_html;
				?>
				
				
				
				<!-- ************  Make Select ************ -->
				


				<?php if ($this->session->userdata('make')) { ?>
				
					<label>Make</label>
					<div id="make_select">
						<select id="make" onchange="get_models(this, this.selectedIndex);" name="make">
							<option selected="selected" value=<?php echo $this->session->userdata('make'); ?>><?php echo $this->session->userdata('make'); ?></option>
						</select>
					</div>
					<?php echo form_error('make'); ?>
					
				<?php } else { ?>
				
					<label>Make</label>
					<div id="make_select">
						<select id="make" onchange="get_models(this, this.selectedIndex);" name="make" >
							<option selected="selected" value="<?php echo $vehicle_details[0]->make; ?>"><?php echo $vehicle_details[0]->make; ?></option><?php echo form_error('make'); ?>
						</select>
					</div>
					<?php echo form_error('make'); ?>
				
				<?php } ?>
				
				<br class="clear_float" />
				
				
				
				<!-- ************  Model Select ************ -->
				
				
				
				<?php if ($this->session->userdata('model')) { ?>
				
					<label>Model</label>
					<div id="model_select"> 
						<select id="model" onchange="get_styles(this, this.selectedIndex);" name="model">
							<option selected="selected" value=<?php echo $this->session->userdata('model'); ?>><?php echo $this->session->userdata('model'); ?></option><?php echo form_error('model'); ?>
						</select>
					</div>
					<?php echo form_error('model'); ?>
					
				<?php } else { ?>
				
					<label>Model</label>
					<div id="model_select"> 
						<select id="model" onchange="get_styles(this, this.selectedIndex);" name="model" >
							<option selected="selected" value="<?php echo $vehicle_details[0]->model; ?>"><?php echo $vehicle_details[0]->model; ?></option><?php echo form_error('model'); ?>
						</select>
					</div>
					<?php echo form_error('model'); ?>
				
				<?php } ?>
				
				<br class="clear_float" />
				
				
				
				<!-- ************  Style Select ************ -->
				
				
				
				<?php if ($this->session->userdata('style')) { ?>
				
					<label>Style</label>
					<div id="style_select"> 
						<select id="style" onchange="get_models(this, this.selectedIndex);" name="style" >
							<option selected="selected" value=<?php echo $this->session->userdata('style'); ?>><?php echo $this->session->userdata('style'); ?></option><?php echo form_error('style'); ?>
						</select>
					</div>
					<?php echo form_error('style'); ?>
					
				<?php } else { ?>
				
					<label>Style</label>
					<div id="style_select"> 
						<select id="style" onchange="get_models(this, this.selectedIndex);" name="style" >
							<option selected="selected" value="<?php echo $vehicle_details[0]->style; ?>"><?php echo $vehicle_details[0]->style; ?></option><?php echo form_error('style'); ?>
						</select>
					</div>
					<?php echo form_error('style'); ?>
				
				<?php } ?>
				
				<br class="clear_float" />
				
				<?php 
				
				$vin_input = array('name' => 'vin', 'id' => 'vin', 'value' => $vehicle_details[0]->vin);
				
				?>
				
				<label>VIN</label>							
				    <?php echo form_input($vin_input); ?>
				    <?php echo form_error('vin'); ?>
				    <br class="clear_float" />
				
				<label>Upholstery Type</label>				
				    <?php echo form_dropdown('upholstery_type', $upholstery_options, set_value('upholstery_type', $vehicle_details[0]->upholstery_type), 'id="upholstery_type"'); ?>
				    <?php echo form_error('upholstery_type'); ?>
				    <br class="clear_float" />
				
				<label>Number of Cylinders</label>
				    <?php echo form_dropdown('number_of_cylinders', $cylinder_options, set_value('number_of_cylinders', $vehicle_details[0]->number_of_cylinders), 'id="number_of_cylinders"'); ?>  
				    <?php echo form_error('number_of_cylinders'); ?>
				    <br class="clear_float" />
				
				<label>Transmission Type</label>			
				    <?php echo form_dropdown('transmission_type', $transmission_options, set_value('transmission_type', $vehicle_details[0]->transmission_type), 'id="transmission_type"'); ?>
				    <?php echo form_error('transmission_type'); ?>
				    <br class="clear_float" />
				
				<label>Number of Speeds</label>
				    <?php echo form_dropdown('number_of_speeds', $number_of_speeds_options, set_value('number_of_speeds', $vehicle_details[0]->number_of_speeds), 'id="number_of_speeds"'); ?>
				    <?php echo form_error('number_of_speeds'); ?>
				    <br class="clear_float" />
				
				<label>Fuel Type</label>					
				    <?php echo form_dropdown('fuel_type', $fuel_type_options, set_value('fuel_type', $vehicle_details[0]->fuel_type), 'id="fuel_type"'); ?>                               
				    <?php echo form_error('fuel_type'); ?>
				    <br class="clear_float" />
				
				<label>Drive Type</label>					
				    <?php echo form_dropdown('drive_type', $drive_type_options, set_value('drive_type', $vehicle_details[0]->drive_type), 'id="drive_type"'); ?>							  
				    <?php echo form_error('drive_type'); ?>
				    <br class="clear_float" />
				
				<label>Exterior Color</label>				
				    <?php echo form_dropdown('exterior_color', $exterior_color_options, set_value('exterior_color', $vehicle_details[0]->exterior_color)); ?>																
				    <?php echo form_error('exterior_color'); ?>
				    <br class="clear_float" />
				
                <label>Interior Color</label>				
				    <?php echo form_dropdown('interior_color', $interior_color_options, set_value('interior_color', $vehicle_details[0]->interior_color)); ?>																
				    <?php echo form_error('interior_color'); ?>
				    <br class="clear_float" />
				
				<label>Mileage</label>						
				    <?php echo form_input('mileage', set_value('mileage', $vehicle_details[0]->mileage)); ?>
				    <?php echo form_error('mileage'); ?>
				    <br class="clear_float" />

				<label>Actual Mileage</label>						
				    <?php echo form_dropdown('is_actual_mileage', $is_actual_mileage_options, set_value('is_actual_mileage', $vehicle_details[0]->is_actual_mileage), 'id="is_actual_mileage"'); ?>
				    <?php echo form_error('is_actual_mileage'); ?>
				    <br class="clear_float" />
				
				    <div id="not_actual_mileage_notes_container">
						<label>Additional Mileage Information</label>		
						<textarea id="mileage_notes" name="mileage_notes"><?php echo $vehicle_details[0]->mileage_notes; ?></textarea>
						<?php echo form_error('mileage_notes'); ?>
						<br class="clear_float" />
					</div>

				<label>Orginal Owner</label>				
				    <?php echo form_dropdown('original_owner', $original_owner_options, set_value('original_owner', $vehicle_details[0]->original_owner), 'id="drive_type"'); ?>
				    <?php echo form_error('original_owner'); ?>
				    <br class="clear_float" />
				
				<label>Any Accidents</label>
				    <?php echo form_dropdown('any_accidents', $any_accidents_options, set_value('any_accidents', $vehicle_details[0]->any_accidents), 'id="any_accidents"'); ?>
				    <?php echo form_error('any_accidents'); ?>
				    <br class="clear_float" />
				
    				<div id="accident_repair_history_container">
    					<label>Accident/Repair History</label>		
    					<textarea id="accident_repair_history" name="accident_repair_history"><?php echo $vehicle_details[0]->accident_repair_history; ?></textarea><?php echo form_error('accident_repair_history'); ?>
    					<br class="clear_float">
    				</div>
				
				<label>Any Repainting</label>
				    <?php echo form_dropdown('any_repainting', $any_repainting_options, set_value('any_repainting', $vehicle_details[0]->any_repainting), 'id="drive_type"'); ?>
				    <?php echo form_error('any_repainting'); ?>
				    <br class="clear_float" />
				
				<label>Vehicle Location - Street</label>
				    <?php echo form_input('vehicle_location_street', set_value('vehicle_location_street', $vehicle_details[0]->vehicle_location_street)); ?>
				    <?php echo form_error('vehicle_location_street'); ?>
				    <br class="clear_float" />
				
				<label>Vehicle Location - City</label>
				    <?php echo form_input('vehicle_location_city', set_value('vehicle_location_city', $vehicle_details[0]->vehicle_location_city)); ?>
				    <?php echo form_error('vehicle_location_city'); ?>
				    <br class="clear_float" />
				
				<label>Vehicle Location - State</label>		
				    <?php echo form_dropdown('vehicle_location_state', $state_options, set_value('vehicle_location_state', $vehicle_details[0]->vehicle_location_state), 'id="drive_type"'); ?>																					
				    <?php echo form_error('vehicle_location_state'); ?>
				    <br class="clear_float" />
				
				<label>Vehicle Location - Zip</label>		
				    <?php echo form_input('vehicle_location_zip', set_value('vehicle_location_zip', $vehicle_details[0]->vehicle_location_zip)); ?>
				    <?php echo form_error('vehicle_location_zip'); ?>
				    <br class="clear_float" />
				
				<label>License Plate Number</label>
				    <?php echo form_input('license_plate_number', set_value('license_plate_number', $vehicle_details[0]->license_plate_number)); ?>
				    <?php echo form_error('license_plate_number'); ?>
				    <br class="clear_float" />
				
				<label>State of Registration</label>		
				    <?php echo form_dropdown('state_of_registration', $state_options, set_value('state_of_registration', $vehicle_details[0]->state_of_registration), 'id="drive_type"'); ?>																		
				    <?php echo form_error('state_of_registration'); ?>
				    <br class="clear_float" />
				
				<label>Registration Expiration Date</label>	
				    <?php
				        echo form_dropdown('registration_expiration_month', $registration_expiration_month_options, set_value('registration_expiration_month', $vehicle_details[0]->registration_expiration_month), 'class="registration_expiration"');
				        echo form_dropdown('registration_expiration_year', $registration_expiration_year_options,  set_value('registration_expiration_year', $vehicle_details[0]->registration_expiration_year), 'class="registration_expiration"');
				        echo form_error('registration_expiration_month');
				        echo form_error('registration_expiration_year'); ?>
				        <br class="clear_float" />
				
				<!--<label>Main Image <strong>4MB Maximum</strong></label>					
				    <?php echo form_upload('userfile'); ?>
				    <br class="clear_float" />-->
				
			</fieldset>
			
			
			<fieldset>
				
				<legend>Vehicle Options</legend>
				
				<?php $vehicle_type_options = array('' => '', 'Car' => 'Car', 'Truck' => 'Truck', 'SUV/Van' => 'SUV/Van');?>
	
				<div id="car_options">
					<?php include '_includes/all_options_edit_mode.php'; ?>
				</div>
			
			</fieldset>
			
			
			<fieldset>
			
				<legend>Vehicle Condition</legend>
				
				<label>Paint/Body</label>
				
    				<label class="radio_label" for="paint_body_good">Good</label>   
    				<input id="paint_body_good" class="radio_button" type="radio" value="Good" <?php if ($vehicle_details[0]->paint_body_condition == 'Good') echo 'checked="checked"'; ?> name="paint_body_condition" />
    				<label class="radio_label" for="paint_body_fair">Fair</label>
    				<input id="paint_body_fair" class="radio_button" type="radio" value="Fair" <?php if ($vehicle_details[0]->paint_body_condition == 'Fair') echo 'checked="checked"'; ?> name="paint_body_condition" />
    				<label class="radio_label" for="paint_body_poor">Poor</label>
    				<input id="paint_body_poor" class="radio_button" type="radio" value="Poor" <?php if ($vehicle_details[0]->paint_body_condition == 'Poor') echo 'checked="checked"'; ?> name="paint_body_condition" />
    				<?php echo form_error('paint_body_condition'); ?>
    				<br class="clear_float">
				
				<label>Glass</label>
											
                    <label class="radio_label" for="glass_good">Good</label>		
                    <input id="glass_good" class="radio_button" type="radio" value="Good" name="glass_condition" <?php if ($vehicle_details[0]->glass_condition == 'Good') echo 'checked="checked"'; ?> >
        			<label class="radio_label" for="glass_fair">Fair</label>		
        			<input id="glass_fair" class="radio_button" type="radio" value="Fair" name="glass_condition" <?php if ($vehicle_details[0]->glass_condition == 'Fair') echo 'checked="checked"'; ?> >
        			<label class="radio_label" for="glass_poor">Poor</label>		
        			<input id="glass_poor" class="radio_button" type="radio" value="Poor" name="glass_condition" <?php if ($vehicle_details[0]->glass_condition == 'Poor') echo 'checked="checked"'; ?> >
        			<?php echo form_error('glass_condition'); ?>
        			<br class="clear_float">
				
				<label>Tires (percentage left)</label>			
				    <label class="radio_label" for="tires_good">Good</label>
				    <input id="tires_good" class="radio_button" type="radio" value="Good" name="tires_condition" <?php if ($vehicle_details[0]->tires_condition == 'Good') echo 'checked="checked"'; ?> > 
					<label class="radio_label" for="tires_fair">Fair</label>		
					<input id="tires_fair" class="radio_button" type="radio" value="Fair" name="tires_condition" <?php if ($vehicle_details[0]->tires_condition == 'Fair') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="tires_poor">Poor</label>		
					<input id="tires_poor" class="radio_button" type="radio" value="Poor" name="tires_condition" <?php if ($vehicle_details[0]->tires_condition == 'Poor') echo 'checked="checked"'; ?> >
					<?php echo form_error('tires_condition'); ?>
					<br class="clear_float">
				
				<label>Brakes</label>							
				    <label class="radio_label" for="brakes_good">Good</label>
				    <input id="brakes_good" class="radio_button" type="radio" value="Good" name="brakes_condition" <?php if ($vehicle_details[0]->brakes_condition == 'Good') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="brakes_fair">Fair</label>		
					<input id="brakes_fair" class="radio_button" type="radio" value="Fair" name="brakes_condition" <?php if ($vehicle_details[0]->brakes_condition == 'Fair') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="brakes_poor">Poor</label>		
					<input id="brakes_poor" class="radio_button" type="radio" value="Poor" name="brakes_condition" <?php if ($vehicle_details[0]->brakes_condition == 'Poor') echo 'checked="checked"'; ?> >
					<?php echo form_error('brakes_condition'); ?>
					<br class="clear_float">
				
				<label>Transmission (shifts smoothly)</label>	
    				<label class="radio_label" for="transmission_good">Good</label>		
    				<input id="transmission_good" class="radio_button" type="radio" value="Good" name="transmission_condition" <?php if ($vehicle_details[0]->transmission_condition == 'Good') echo 'checked="checked"'; ?> >
            		<label class="radio_label" for="transmission_fair">Fair</label>
            		<input id="transmission_fair" class="radio_button" type="radio" value="Fair" name="transmission_condition" <?php if ($vehicle_details[0]->transmission_condition == 'Fair') echo 'checked="checked"'; ?> >
            		<label class="radio_label" for="transmission_poor">Poor</label>
            		<input id="transmission_poor" class="radio_button" type="radio" value="Poor" name="transmission_condition" <?php if ($vehicle_details[0]->transmission_condition == 'Poor') echo 'checked="checked"'; ?> >
            		<?php echo form_error('transmission_condition'); ?>
            		<br class="clear_float">
				
				<label>Clutch (if Applicable)</label>			
                    <label class="radio_label" for="clutch_good">Good</label>		
                    <input id="clutch_good" class="radio_button" type="radio" value="Good" name="clutch_condition" <?php if ($vehicle_details[0]->clutch_condition == 'Good') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="clutch_fair">Fair</label>
					<input id="clutch_fair" class="radio_button" type="radio" value="Fair" name="clutch_condition" <?php if ($vehicle_details[0]->clutch_condition == 'Fair') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="clutch_poor">Poor</label>
					<input id="clutch_poor" class="radio_button" type="radio" value="Poor" name="clutch_condition" <?php if ($vehicle_details[0]->clutch_condition == 'Poor') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="clutch_na">N/A</label>
					<input id="clutch_na"   class="radio_button" type="radio" value="NA" name="clutch_condition" <?php if ($vehicle_details[0]->clutch_condition == 'NA') echo 'checked="checked"'; ?> >
					<?php echo form_error('clutch_condition'); ?>
					<br class="clear_float">
				
				<label>Carpet</label>							
                    <label class="radio_label" for="carpet_good">Good</label>
                    <input id="carpet_good" class="radio_button" type="radio" value="Good" name="carpet_condition" <?php if ($vehicle_details[0]->carpet_condition == 'Good') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="carpet_fair">Fair</label>
					<input id="carpet_fair" class="radio_button" type="radio" value="Fair" name="carpet_condition" <?php if ($vehicle_details[0]->carpet_condition == 'Fair') echo 'checked="checked"'; ?>>
					<label class="radio_label" for="carpet_poor">Poor</label>
					<input id="carpet_poor" class="radio_button" type="radio" value="Poor" name="carpet_condition" <?php if ($vehicle_details[0]->carpet_condition == 'Poor') echo 'checked="checked"'; ?> >
					<?php echo form_error('carpet_condition'); ?>
					<br class="clear_float">
				
				<label>Upholstery</label>						
                    <label class="radio_label" for="upholstery_good">Good</label>
                    <input id="upholstery_good" class="radio_button" type="radio" value="Good" name="upholstery_condition" <?php if ($vehicle_details[0]->upholstery_condition == 'Good') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="upholstery_fair">Fair</label>
					<input id="upholstery_fair" class="radio_button" type="radio" value="Fair" name="upholstery_condition" <?php if ($vehicle_details[0]->upholstery_condition == 'Fair') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="upholstery_poor">Poor</label>
					<input id="upholstery_poor" class="radio_button" type="radio" value="Poor" name="upholstery_condition" <?php if ($vehicle_details[0]->upholstery_condition == 'Poor') echo 'checked="checked"'; ?> >
					<?php echo form_error('upholstery_condition'); ?>
					<br class="clear_float">
				
				<label>Engine (runs smoothly, loud)</label>		
                    <label class="radio_label" for="engine_good">Good</label>
                    <input id="engine_good" class="radio_button" type="radio" value="Good" name="engine_condition" <?php if ($vehicle_details[0]->engine_condition == 'Good') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="engine_fair">Fair</label>
					<input id="engine_fair" class="radio_button" type="radio" value="Fair" name="engine_condition" <?php if ($vehicle_details[0]->engine_condition == 'Fair') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="engine_poor">Poor</label>
					<input id="engine_poor" class="radio_button" type="radio" value="Poor" name="engine_condition" <?php if ($vehicle_details[0]->engine_condition == 'Poor') echo 'checked="checked"'; ?> >
					<?php echo form_error('engine_condition'); ?>
					<br class="clear_float">
				
				<label>Exhaust (smokes, rattles)</label>		
                    <label class="radio_label" for="exhaust_good">Good</label>
                    <input id="exhaust_good" class="radio_button" type="radio" value="Good" name="exhaust_condition" <?php if ($vehicle_details[0]->exhaust_condition == 'Good') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="exhaust_fair">Fair</label>
					<input id="exhaust_fair" class="radio_button" type="radio" value="Fair" name="exhaust_condition" <?php if ($vehicle_details[0]->exhaust_condition == 'Fair') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="exhaust_poor">Poor</label>
					<input id="exhaust_poor" class="radio_button" type="radio" value="Poor" name="exhaust_condition" <?php if ($vehicle_details[0]->exhaust_condition == 'Poor') echo 'checked="checked"'; ?> >
					<?php echo form_error('exhaust_condition'); ?>
					<br class="clear_float">
				
				<label>Shocks</label>							
                    <label class="radio_label" for="shocks_good">Good</label>
                    <input id="shocks_good" class="radio_button" type="radio" value="Good" name="shocks_condition" <?php if ($vehicle_details[0]->shocks_condition == 'Good') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="shocks_fair">Fair</label>
					<input id="shocks_fair" class="radio_button" type="radio" value="Fair" name="shocks_condition" <?php if ($vehicle_details[0]->shocks_condition == 'Fair') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="shocks_poor">Poor</label>
					<input id="shocks_poor" class="radio_button" type="radio" value="Poor" name="shocks_condition" <?php if ($vehicle_details[0]->shocks_condition == 'Poor') echo 'checked="checked"'; ?> >
					<?php echo form_error('shocks_condition'); ?>
					<br class="clear_float">
				
				<label>Air conditioning (blows cold?)</label>	
				    <label class="radio_label" for="air_conditioning_good">Good</label>
				    <input id="air_conditioning_good" class="radio_button" type="radio" value="Good" name="air_conditioning_condition" <?php if ($vehicle_details[0]->air_conditioning_condition == 'Good') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="air_conditioning_fair">Fair</label>
					<input id="air_conditioning_fair" class="radio_button" type="radio" value="Fair" name="air_conditioning_condition" <?php if ($vehicle_details[0]->air_conditioning_condition == 'Fair') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="air_conditioning_poor">Poor</label>
					<input id="air_conditioning_poor" class="radio_button" type="radio" value="Poor" name="air_conditioning_condition" <?php if ($vehicle_details[0]->air_conditioning_condition == 'Poor') echo 'checked="checked"'; ?> >
					<?php echo form_error('air_conditioning_condition'); ?>
					<br class="clear_float">
				
				<label>General Overall Condition</label>		
                    <label class="radio_label" for="general_overall_condition_good">Good</label>
                    <input id="general_overall_condition_good" class="radio_button" type="radio" value="Good" name="general_overall_condition" <?php if ($vehicle_details[0]->general_overall_condition == 'Good') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="general_overall_condition_fair">Fair</label>
					<input id="general_overall_condition_fair" class="radio_button" type="radio" value="Fair" name="general_overall_condition" <?php if ($vehicle_details[0]->general_overall_condition == 'Fair') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="general_overall_condition_poor">Poor</label>
					<input id="general_overall_condition_poor" class="radio_button" type="radio" value="Poor" name="general_overall_condition" <?php if ($vehicle_details[0]->general_overall_condition == 'Poor') echo 'checked="checked"'; ?> >
					<?php echo form_error('general_overall_condition'); ?>
					<br class="clear_float">
																																
				<label>Vehicle Smoked In</label>				
                    <label class="radio_label" for="vehicle_smoked_in_yes">Yes</label>
                    <input id="vehicle_smoked_in_yes" class="radio_button" type="radio" value="Yes" name="vehicle_smoked_in" <?php if ($vehicle_details[0]->vehicle_smoked_in == 'Yes') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="vehicle_smoked_in_no">No</label>
					<input id="vehicle_smoked_in_no" class="radio_button" type="radio" value="No" name="vehicle_smoked_in" <?php if ($vehicle_details[0]->vehicle_smoked_in == 'No') echo 'checked="checked"'; ?> >
					<?php echo form_error('vehicle_smoked_in'); ?>
					<br class="clear_float">
																																
				<label>Salvage</label>							
                    <label class="radio_label" for="salvage_yes">Yes</label>		
                    <input id="salvage_yes" class="radio_button" type="radio" value="Yes" name="salvage" <?php if ($vehicle_details[0]->salvage == 'Yes') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="salvage_no">No</label>		
					<input id="salvage_no" class="radio_button" type="radio" value="No" name="salvage" <?php if ($vehicle_details[0]->salvage == 'No') echo 'checked="checked"'; ?> >
					<?php echo form_error('salvage'); ?>
					<br class="clear_float">
																
				<label>Lemon Law/Buyback</label>				
                    <label class="radio_label" for="lemon_law_buyback_yes">Yes</label>
                    <input id="lemon_law_buyback_yes" class="radio_button" type="radio" value="Yes" name="lemon_law_buyback" <?php if ($vehicle_details[0]->lemon_law_buyback == 'Yes') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="lemon_law_buyback_no">No</label>
					<input id="lemon_law_buyback_no" class="radio_button" type="radio" value="No" name="lemon_law_buyback" <?php if ($vehicle_details[0]->lemon_law_buyback == 'No') echo 'checked="checked"'; ?> >
					<?php echo form_error('lemon_law_buyback'); ?>
					<br class="clear_float">
																
				<label>Warranty Return</label>					
                    <label class="radio_label" for="warranty_return_yes">Yes</label>
                    <input id="warranty_return_yes" class="radio_button" type="radio" value="Yes" name="warranty_return" <?php if ($vehicle_details[0]->warranty_return == 'Yes') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="warranty_return_no">No</label>
					<input id="warranty_return_no" class="radio_button" type="radio" value="No" name="warranty_return" <?php if ($vehicle_details[0]->warranty_return == 'No') echo 'checked="checked"'; ?> >
					<?php echo form_error('warranty_return'); ?>
					<br class="clear_float">
																
				<label>Frame Damage</label>						
                    <label class="radio_label" for="frame_damage_yes">Yes</label>
                    <input id="frame_damage_yes" class="radio_button" type="radio" value="Yes" name="frame_damage" <?php if ($vehicle_details[0]->frame_damage == 'Yes') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="frame_damage_no">No</label>
					<input id="frame_damage_no" class="radio_button" type="radio" value="No" name="frame_damage" <?php if ($vehicle_details[0]->frame_damage == 'No') echo 'checked="checked"'; ?> >
					<?php echo form_error('frame_damage'); ?>
					<br class="clear_float">
																
				<label>Flood Damage</label>						
                    <label class="radio_label" for="flood_damage_yes">Yes</label>
                    <input id="flood_damage_yes" class="radio_button" type="radio" value="Yes" name="flood_damage" <?php if ($vehicle_details[0]->flood_damage == 'Yes') echo 'checked="checked"'; ?> >
					<label class="radio_label" for="flood_damage_no">No</label>
					<input id="flood_damage_no" class="radio_button" type="radio" value="No" name="flood_damage" <?php if ($vehicle_details[0]->flood_damage == 'No') echo 'checked="checked"'; ?> >
					<?php echo form_error('flood_damage'); ?>
					<br class="clear_float">

				<label>Additional Condition Information</label>	<textarea id="additional_condition_information" name="additional_condition_information"><?php echo $vehicle_details[0]->additional_condition_information; ?></textarea>
				    <?php echo form_error('additional_condition_information'); ?>
				    <br class="clear_float" />														
 				
				<?php $terms_of_use_data = array('name' => 'terms_of_use', 'id' => 'terms_of_use_checkbox', 'value' => 'accept', 'checked'	=> FALSE, 'disabled'	=> 'disabled'); ?>
				
				<!--
				
				<label>Terms of Service</label>
						
				<div id="terms_of_use_scroll">
					<?php $this->load->view('_includes/terms_of_service_vehicle_owner_view'); ?>
				</div>
				<br class="clear_float" />
				
				<?php echo form_checkbox($terms_of_use_data); ?> 
				<span id="i_agree_text">I agree to the terms of this website.</span>
				<span id="i_agree_instructions">(Scroll to the bottom of Terms to enable this checkbox.)</span>
				<span class="terms_of_use_checkbox_error"><?php echo form_error('terms_of_use'); ?></span>
				<br class="clear_float" />
				
				-->
			</fieldset>
			
			<?php 
                echo form_hidden('vehicle_id', $vehicle_details[0]->vehicle_id);
                $submit_data = Array(
                    'type' => 'submit', 
                    'id' => 'submit_button', 
                    'name' => 'submit', 
                    'type' => 'image', 
                    'src' => base_url().'_images/update_vehicle.png', 
                    'value' => 'submit', 
                    'alt' => 'Submit', 
                    'class' => 'vehicle_submit disabled'
                );
                echo form_submit($submit_data);
            
            ?>
            <?php echo form_close(); ?>
            <br class="clear_float" />
            
			
			
			

		</div>
	
		<div class="module_960 drop_shadow rounded_corners" id="add_a_vehicle">
		    <legend>Upload Additional Images</legend><br />
            <div id="uploadify_form">
                <div id="no_flash">Please <a href="http://get.adobe.com/flashplayer/" target="_blank">update your Flash Player</a> to upload multiple photos.</div>
                <input id="file_upload" name="file_upload" type="file" />
                <p id="im_done">Success! Your images have been added. Refresh this page to see them in the Current Images section below.</>
            </div>
            <br class="clear_float" />
		</div>
		
		<div class="module_960 drop_shadow rounded_corners" id="add_a_vehicle">
            <legend>Current Images (Click to Delete)</legend>
		    <div id="remove_image_grid">
                <?php 
                    foreach ($vehicle_images as $vehicle_image) {
                        echo '<a href="'.base_url().'site/delete_image/'.$vehicle_image->vehicle_id.'/'.$vehicle_image->image_id.'" ><img src="'.$vehicle_image->image_name.'" /></a>';
                    }
                ?>
            </div>

            <?php 
                //echo "<pre>";
               // print_r($vehicle_details);
               // echo "</pre>";
            ?>
		</div>

	<?php  include '_includes/footer_module.php' ?>
	
	</div>

<?php  include '_includes/footer.php' ?>