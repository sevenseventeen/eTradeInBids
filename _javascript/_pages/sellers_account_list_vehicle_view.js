$(document).ready(function() {
	
    $("#submit_button").click(function() {

		var errors = "";
		
		if ($('#year').val() == "" || $('#year').val() == "Select a Year") { 
			errors += "Year\n"; 
		}

		if ($('#make').val() == "" || $('#make').val() == "Select a Make") { 
			errors += "Make\n"; 
		}
		
		if ($('#model').val() == "" || $('#make').val() == "Select a Model") { 
			errors += "Model\n"; 
		}
		
		if ($('#style').val() == "" || $('#make').val() == "Select a Style") { 
			errors += "Style\n"; 
		}
		
		if ($('#vin').val() == "" || $('#vin').val().length != 17) { 
			errors += "VIN\n"; 
		}

		if ($('#upholstery_type').val() == "") { 
			errors += "Upholstery Type\n"; 
		}

		if ($('#number_of_cylinders').val() == "") { 
			errors += "Number of Cylinders\n"; 
		}

		if ($('#transmission_type').val() == "") { 
			errors += "Transmission Type\n"; 
		}

		if ($('#number_of_speeds').val() == "") { 
			errors += "Number of Speeds\n"; 
		}

		if ($('#fuel_type').val() == "") { 
			errors += "Fuel Type\n"; 
		}

		if ($('#drive_type').val() == "") { 
			errors += "Drive Type\n"; 
		}

		if ($('#exterior_color').val() == "") { 
			errors += "Exterior Color\n"; 
		}

		if ($('#interior_color').val() == "") { 
			errors += "Interior Color\n"; 
		}

		if ($('#mileage').val() == "") { 
			errors += "Mileage\n"; 
		}

		if ($('#is_actual_mileage').val() == "") { 
			errors += "Is Actual Mileage\n"; 
		}

		if ($('#is_actual_mileage').val() == "no") {
			if ($('#mileage_notes').val() == "") { 
				errors += "Additional Mileage Information\n"; 
			}
		}

		if ($('#original_owner').val() == "") { 
			errors += "Original Owner\n"; 
		}

		if ($('#any_accidents').val() == "") { 
			errors += "Any Accidents\n"; 
		}

		if ($('#any_accidents').val() == "yes") {
			if ($('#accident_repair_history').val() == "") { 
				errors += "Accident Repair History\n"; 
			}
		}

		if ($('#any_repainting').val() == "") { 
			errors += "Any Repainting\n"; 
		}

		if ($('#vehicle_location_street').val() == "") { 
			errors += "Vehicle Location Street\n"; 
		}

		if ($('#vehicle_location_city').val() == "") { 
			errors += "Vehicle Location City\n"; 
		}

		if ($('#vehicle_location_state').val() == "") { 
			errors += "Vehicle Location State\n"; 
		}

		if ($('#vehicle_location_zip').val() == "") { 
			errors += "Vehicle Location Zip\n"; 
		}

		if ($('#license_plate_number').val() == "") { 
			errors += "License Plate Number\n"; 
		}

		if ($('#state_of_registration').val() == "") { 
			errors += "State of Registration\n"; 
		}

		if ($('#registration_expiration_month').val() == "") { 
			errors += "Registration Expiration Month\n"; 
		}

		if ($('#registration_expiration_year').val() == "") { 
			errors += "Registration Expiration Year\n"; 
		}

		if(	$('[name="userfile"]').val() == ""	) {
			errors += "Main Image\n"; 
		}

		if (!$('#power_steering_yes').is(":checked") && !$('#power_steering_no').is(":checked")) { 
			errors += "Power Streering\n"; 
		}

		if (!$('#air_conditioning_yes').is(":checked") && !$('#air_conditioning_no').is(":checked")) { 
			errors += "Air Conditioning\n"; 
		}

		if (!$('#power_windows_yes').is(":checked") && !$('#power_windows_no').is(":checked")) { 
			errors += "Power Windows\n"; 
		}

		if (!$('#power_door_locks_yes').is(":checked") && !$('#power_door_locks_no').is(":checked")) { 
			errors += "Power Door Locks\n"; 
		}

		if (!$('#cruise_control_yes').is(":checked") && !$('#cruise_control_no').is(":checked")) { 
			errors += "Cruise Control\n"; 
		}

		if (!$('#cd_player_changer_yes').is(":checked") && !$('#cd_player_changer_no').is(":checked")) { 
			errors += "CD Player/Changer\n"; 
		}

		if (!$('#premium_sound_yes').is(":checked") && !$('#premium_sound_no').is(":checked")) { 
			errors += "Premium Sound\n"; 
		}

		if (!$('#integrated_phone_yes').is(":checked") && !$('#integrated_phone_no').is(":checked")) { 
			errors += "Integrated Phone\n"; 
		}

		if (!$('#dual_airbags_yes').is(":checked") && !$('#dual_airbags_no').is(":checked")) { 
			errors += "Dual Airbags\n"; 
		}

		if (!$('#four_wheel_abs_brakes_yes').is(":checked") && !$('#four_wheel_abs_brakes_no').is(":checked")) { 
			errors += "Four Wheel ABS Brakes\n"; 
		}

		if (!$('#traction_control_yes').is(":checked") && !$('#traction_control_no').is(":checked")) { 
			errors += "Traction Control\n"; 
		}

		if (!$('#power_seats_yes').is(":checked") && !$('#power_seats_no').is(":checked")) { 
			errors += "Power Seats\n"; 
		}

		if (!$('#dual_power_seats_yes').is(":checked") && !$('#dual_power_seats_no').is(":checked")) { 
			errors += "Dual Power Seats\n"; 
		}

		if (!$('#flip_up_moon_roof_yes').is(":checked") && !$('#flip_up_moon_roof_no').is(":checked")) { 
			errors += "Flip Up Moon Roof\n"; 
		}

		if (!$('#privacy_glass_yes').is(":checked") && !$('#privacy_glass_no').is(":checked")) { 
			errors += "Privacy Glass\n"; 
		}

		if (!$('#navigation_yes').is(":checked") && !$('#navigation_no').is(":checked")) { 
			errors += "Navigation\n"; 
		}

		if (!$('#entertainment_system_dvd_yes').is(":checked") && !$('#entertainment_system_dvd_no').is(":checked")) { 
			errors += "Entertainment System/DVD\n"; 
		}

		if (!$('#oversized_off_road_yes').is(":checked") && !$('#oversized_off_road_no').is(":checked")) { 
			errors += "Oversized Off Road Tires\n"; 
		}

		if (!$('#roof_rack_yes').is(":checked") && !$('#roof_rack_no').is(":checked")) { 
			errors += "Roof Rack\n"; 
		}

		if (!$('#running_boards_yes').is(":checked") && !$('#running_boards_no').is(":checked")) { 
			errors += "Running Boards\n"; 
		}

		if (!$('#sliding_rear_window_yes').is(":checked") && !$('#sliding_rear_window_no').is(":checked")) { 
			errors += "Sliding Rear Window\n"; 
		}

		if (!$('#bed_liner_yes').is(":checked") && !$('#bed_liner_no').is(":checked")) { 
			errors += "Bed Liner\n"; 
		}

		if (!$('#canopy_shell_yes').is(":checked") && !$('#canopy_shell_no').is(":checked")) { 
			errors += "Canopy/Shell\n"; 
		}

		if (!$('#quad_seating_yes').is(":checked") && !$('#quad_seating_no').is(":checked")) { 
			errors += "Quad Seating\n"; 
		}

		if (!$('#tilt_steering_wheel_yes').is(":checked") && !$('#tilt_steering_wheel_no').is(":checked")) { 
			errors += "Tilt Steering Wheel\n"; 
		}

		if (!$('#all_wheel_drive_yes').is(":checked") && !$('#all_wheel_drive_no').is(":checked")) { 
			errors += "All Wheel Drive\n"; 
		}

		if (!$('#alloy_wheels_yes').is(":checked") && !$('#alloy_wheels_no').is(":checked")) { 
			errors += "Alloy Wheels\n"; 
		}

		if (!$('#towing_package_yes').is(":checked") && !$('#towing_package_no').is(":checked")) { 
			errors += "Towing Package\n"; 
		}

		if (!$('#custom_bumper_yes').is(":checked") && !$('#custom_bumper_no').is(":checked")) { 
			errors += "Custom Bumper\n"; 
		}

		if (!$('#grill_guard_yes').is(":checked") && !$('#grill_guard_no').is(":checked")) { 
			errors += "Grill Guard\n"; 
		}

		if (!$('#third_row_seat_yes').is(":checked") && !$('#third_row_seat_no').is(":checked")) { 
			errors += "Third Row Seat\n"; 
		}

		if (!$('#paint_body_good').is(":checked") && !$('#paint_body_fair').is(":checked") && !$('#paint_body_poor').is(":checked")) { 
			errors += "Paint/Body\n"; 
		}

		if (!$('#glass_good').is(":checked") && !$('#glass_fair').is(":checked") && !$('#glass_poor').is(":checked")) { 
			errors += "Glass\n"; 
		}

		if (!$('#tires_good').is(":checked") && !$('#tires_fair').is(":checked") && !$('#tires_poor').is(":checked")) { 
			errors += "Tires\n"; 
		}

		if (!$('#brakes_good').is(":checked") && !$('#brakes_fair').is(":checked") && !$('#brakes_poor').is(":checked")) { 
			errors += "Brakes\n"; 
		}

		if (!$('#transmission_good').is(":checked") && !$('#transmission_fair').is(":checked") && !$('#transmission_poor').is(":checked")) { 
			errors += "Transmission\n"; 
		}

		if (!$('#clutch_good').is(":checked") && !$('#clutch_fair').is(":checked") && !$('#clutch_poor').is(":checked") && !$('#clutch_na').is(":checked")) { 
			errors += "Clutch\n"; 
		}

		if (!$('#carpet_good').is(":checked") && !$('#carpet_fair').is(":checked") && !$('#carpet_poor').is(":checked")) { 
			errors += "Carpet\n"; 
		}

		if (!$('#upholstery_good').is(":checked") && !$('#upholstery_fair').is(":checked") && !$('#upholstery_poor').is(":checked")) { 
			errors += "Upholstery\n"; 
		}

		if (!$('#engine_good').is(":checked") && !$('#engine_fair').is(":checked") && !$('#engine_poor').is(":checked")) { 
			errors += "Engine\n"; 
		}

		if (!$('#exhaust_good').is(":checked") && !$('#exhaust_fair').is(":checked") && !$('#exhaust_poor').is(":checked")) { 
			errors += "Exhaust\n"; 
		}

		if (!$('#shocks_good').is(":checked") && !$('#shocks_fair').is(":checked") && !$('#shocks_poor').is(":checked")) { 
			errors += "Shocks\n"; 
		}

		if (!$('#air_conditioning_good').is(":checked") && !$('#air_conditioning_fair').is(":checked") && !$('#air_conditioning_poor').is(":checked")) { 
			errors += "Air Conditioning\n"; 
		}

		if (!$('#general_overall_condition_good').is(":checked") && !$('#general_overall_condition_fair').is(":checked") && !$('#general_overall_condition_poor').is(":checked")) { 
			errors += "General Overall Condition\n"; 
		}

		if (!$('#vehicle_smoked_in_yes').is(":checked") && !$('#vehicle_smoked_in_no').is(":checked")) { 
			errors += "Vehicle Smoked In\n"; 
		}

		if (!$('#salvage_yes').is(":checked") && !$('#salvage_no').is(":checked")) { 
			errors += "Salvage\n"; 
		}

		if (!$('#lemon_law_buyback_yes').is(":checked") && !$('#lemon_law_buyback_no').is(":checked")) { 
			errors += "Lemon Law Buyback\n"; 
		}

		if (!$('#warranty_return_yes').is(":checked") && !$('#warranty_return_no').is(":checked")) { 
			errors += "Warranty Return\n"; 
		}

		if (!$('#frame_damage_yes').is(":checked") && !$('#frame_damage_no').is(":checked")) { 
			errors += "Frame Damage\n"; 
		}

		if (!$('#flood_damage_yes').is(":checked") && !$('#flood_damage_no').is(":checked")) { 
			errors += "Flood Damage\n"; 
		}

		if (!$('#terms_of_use_checkbox').is(":checked")) { 
			errors += "Terms of Use\n"; 
		}

		

		if (errors != "") {
			alert("Please check the following fields: \n"+errors);
			return false;
		}

	});
   
});

