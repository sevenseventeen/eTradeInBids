<fieldset>
				
	<legend>Vehicle Options</legend>
	
	
	<label>Vehicle Type</label>					<?php echo form_dropdown('make', $blank_options, '', 'id="make_select" onChange="get_models(this, this.value);"'); ?><br class="clear_float" />
	
	
	<label>Power Steering</label>				<label class="radio_label" for="power_steering_yes">Yes</label>		<input id="power_steering_yes" class="radio_button" type="radio" value="Yes" name="power_steering">
												<label class="radio_label" for="power_steering_no">No</label>		<input id="power_steering_no"  class="radio_button" type="radio" value="No" name="power_steering">
												<br class="clear_float">
																	
	<label>All Wheel Drive</label>				<label class="radio_label" for="all_wheel_drive_yes">Yes</label>	<input id="all_wheel_drive_yes" class="radio_button" type="radio" value="Yes" name="all_wheel_drive">
												<label class="radio_label" for="all_wheel_drive_no">No</label>		<input id="all_wheel_drive_no"  class="radio_button" type="radio" value="No" name="all_wheel_drive">
												<br class="clear_float">
																	
	<label>Air Conditioning</label>				<label class="radio_label" for="air_conditioning_yes">Yes</label>	<input id="air_conditioning_yes" class="radio_button" type="radio" value="Yes" name="air_conditioning">
												<label class="radio_label" for="air_conditioning_no">No</label>		<input id="air_conditioning_no"  class="radio_button" type="radio" value="No" name="air_conditioning">
												<br class="clear_float">
																	
	<label>Power Windows</label>				<label class="radio_label" for="power_windows_yes">Yes</label>		<input id="power_windows_yes" class="radio_button" type="radio" value="Yes" name="power_windows">
												<label class="radio_label" for="power_windows_no">No</label>		<input id="power_windows_no"  class="radio_button" type="radio" value="No" name="power_windows">
												<br class="clear_float">
																	
	<label>Power Door Locks</label>				<label class="radio_label" for="power_door_locks_yes">Yes</label>	<input id="power_door_locks_yes" class="radio_button" type="radio" value="Yes" name="power_door_locks">
												<label class="radio_label" for="power_door_locks_no">No</label>		<input id="power_door_locks_no"  class="radio_button" type="radio" value="No" name="power_door_locks">
												<br class="clear_float">
																	
	<label>Tilt Steering Wheel</label>			<label class="radio_label" for="tilt_steering_wheel_yes">Yes</label>	<input id="tilt_steering_wheel_yes" class="radio_button" type="radio" value="Yes" name="tilt_steering_wheel">
												<label class="radio_label" for="tilt_steering_wheel_no">No</label>		<input id="tilt_steering_wheel_no"  class="radio_button" type="radio" value="No" name="tilt_steering_wheel">
												<br class="clear_float">
																	
	<label>Cruise Control</label>				<label class="radio_label" for="cruise_control_yes">Yes</label>		<input id="cruise_control_yes" class="radio_button" type="radio" value="Yes" name="cruise_control">
												<label class="radio_label" for="cruise_control_no">No</label>		<input id="cruise_control_no"  class="radio_button" type="radio" value="No" name="cruise_control">
												<br class="clear_float">
																	
	<label>CD player/ Changer</label>			<label class="radio_label" for="cd_player_changer_yes">Yes</label>	<input id="cd_player_changer_yes" class="radio_button" type="radio" value="Yes" name="cd_player_changer">
												<label class="radio_label" for="cd_player_changer_no">No</label>	<input id="cd_player_changer_no"  class="radio_button" type="radio" value="No" name="cd_player_changer">
												<br class="clear_float">
																	
	<label>Premium Sound</label>				<label class="radio_label" for="premium_sound_yes">Yes</label>		<input id="premium_sound_yes" class="radio_button" type="radio" value="Yes" name="premium_sound">
												<label class="radio_label" for="premium_sound_no">No</label>		<input id="premium_sound_no"  class="radio_button" type="radio" value="No" name="premium_sound">
												<br class="clear_float">
																	
	<label>Integrated phone</label>				<label class="radio_label" for="integrated_phone_yes">Yes</label>	<input id="integrated_phone_yes" class="radio_button" type="radio" value="Yes" name="integrated_phone">
												<label class="radio_label" for="integrated_phone_no">No</label>		<input id="integrated_phone_no"  class="radio_button" type="radio" value="No" name="integrated_phone">
												<br class="clear_float">
																	
	<label>Dual Airbags</label>					<label class="radio_label" for="dual_airbags_yes">Yes</label>		<input id="dual_airbags_yes" class="radio_button" type="radio" value="Yes" name="dual_airbags">
												<label class="radio_label" for="dual_airbags_no">No</label>			<input id="dual_airbags_no"  class="radio_button" type="radio" value="No" name="dual_airbags">
												<br class="clear_float">
																	
	<label>4 wheel ABS Brakes</label>			<label class="radio_label" for="4_wheel_abs_brakes_yes">Yes</label>	<input id="4_wheel_abs_brakes_yes" class="radio_button" type="radio" value="Yes" name="4_wheel_abs_brakes">
												<label class="radio_label" for="4_wheel_abs_brakes_no">No</label>	<input id="4_wheel_abs_brakes_no"  class="radio_button" type="radio" value="No" name="4_wheel_abs_brakes">
												<br class="clear_float">
																	
	<label>Leather Interior</label>				<label class="radio_label" for="leather_interior_yes">Yes</label>	<input id="leather_interior_yes" class="radio_button" type="radio" value="Yes" name="leather_interior">
												<label class="radio_label" for="leather_interior_no">No</label>		<input id="leather_interior_no"  class="radio_button" type="radio" value="No" name="leather_interior">
												<br class="clear_float">
																	
	<label>Traction Control</label>				<label class="radio_label" for="traction_control_yes">Yes</label>	<input id="traction_control_yes" class="radio_button" type="radio" value="Yes" name="traction_control">
												<label class="radio_label" for="traction_control_no">No</label>		<input id="traction_control_no"  class="radio_button" type="radio" value="No" name="traction_control">
												<br class="clear_float">
																	
	<label>Power Seat</label>					<label class="radio_label" for="power_seats_yes">Yes</label>		<input id="power_seats_yes" class="radio_button" type="radio" value="Yes" name="power_seats">
												<label class="radio_label" for="power_seats_no">No</label>			<input id="power_seats_no"  class="radio_button" type="radio" value="No" name="power_seats">
												<br class="clear_float">
																	
	<label>Dual power seats</label>				<label class="radio_label" for="dual_power_seats_yes">Yes</label>	<input id="dual_power_seats_yes" class="radio_button" type="radio" value="Yes" name="dual_power_seats">
												<label class="radio_label" for="dual_power_seats_no">No</label>		<input id="dual_power_seats_no"  class="radio_button" type="radio" value="No" name="dual_power_seats">
												<br class="clear_float">
																	
	<label>Flip up moon roof</label>			<label class="radio_label" for="flip_up_moon_roof_yes">Yes</label>	<input id="flip_up_moon_roof_yes" class="radio_button" type="radio" value="Yes" name="flip_up_moon_roof">
												<label class="radio_label" for="flip_up_moon_roof_no">No</label>	<input id="flip_up_moon_roof_no"  class="radio_button" type="radio" value="No" name="flip_up_moon_roof">
												<br class="clear_float">
																	
	<label>Privacy glass</label>				<label class="radio_label" for="privacy_glass_yes">Yes</label>		<input id="privacy_glass_yes" class="radio_button" type="radio" value="Yes" name="privacy_glass">
												<label class="radio_label" for="privacy_glass_no">No</label>		<input id="privacy_glass_no"  class="radio_button" type="radio" value="No" name="privacy_glass">
												<br class="clear_float">
																	
	<label>Navigation</label>					<label class="radio_label" for="navigation_yes">Yes</label>			<input id="navigation_yes" class="radio_button" type="radio" value="Yes" name="navigation">
												<label class="radio_label" for="navigation_no">No</label>			<input id="navigation_no"  class="radio_button" type="radio" value="No" name="navigation">
												<br class="clear_float">
																	
	<label>Alloy wheels</label>					<label class="radio_label" for="alloy_wheels_yes">Yes</label>		<input id="alloy_wheels_yes" class="radio_button" type="radio" value="Yes" name="alloy_wheels">
												<label class="radio_label" for="alloy_wheels_no">No</label>			<input id="alloy_wheels_no"  class="radio_button" type="radio" value="No" name="alloy_wheels">
												<br class="clear_float">
																	
	<label>Entertainment system/ DVD</label>	<label class="radio_label" for="entertainment_system_dvd_yes">Yes</label>	<input id="entertainment_system_dvd_yes" class="radio_button" type="radio" value="Yes" name="entertainment_system_dvd">
												<label class="radio_label" for="entertainment_system_dvd_no">No</label>			<input id="entertainment_system_dvd_no"  class="radio_button" type="radio" value="No" name="entertainment_system_dvd">
												<br class="clear_float">
																	
	<label>Towing package</label>				<label class="radio_label" for="towing_package_yes">Yes</label>		<input id="towing_package_yes" class="radio_button" type="radio" value="Yes" name="towing_package">
												<label class="radio_label" for="towing_package_no">No</label>		<input id="towing_package_no"  class="radio_button" type="radio" value="No" name="towing_package">
												<br class="clear_float">
</fieldset>