<label>Power Steering</label>				
    <label class="radio_label" for="power_steering_yes">Yes</label>
    <input id="power_steering_yes" class="radio_button" type="radio" value="Yes" name="power_steering" <?php if ($vehicle_details[0]->power_steering == 'Yes') echo 'checked="checked"'; ?> >
    <label class="radio_label" for="power_steering_no">No</label>
    <input id="power_steering_no"  class="radio_button" type="radio" value="No" name="power_steering" <?php if ($vehicle_details[0]->power_steering == 'No') echo 'checked="checked"'; ?>>
    <?php echo form_error('power_steering'); ?>
    <br class="clear_float">
																
<label>Air Conditioning</label>				
    <label class="radio_label" for="air_conditioning_yes">Yes</label>	
    <input id="air_conditioning_yes" class="radio_button" type="radio" value="Yes" name="air_conditioning" <?php if ($vehicle_details[0]->air_conditioning == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="air_conditioning_no">No</label>
	<input id="air_conditioning_no"  class="radio_button" type="radio" value="No" name="air_conditioning" <?php if ($vehicle_details[0]->air_conditioning == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('air_conditioning'); ?>
	<br class="clear_float">
																
<label>Power Windows</label>				
    <label class="radio_label" for="power_windows_yes">Yes</label>
    <input id="power_windows_yes" class="radio_button" type="radio" value="Yes" name="power_windows" <?php if ($vehicle_details[0]->power_windows == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="power_windows_no">No</label>
	<input id="power_windows_no"  class="radio_button" type="radio" value="No" name="power_windows" <?php if ($vehicle_details[0]->power_windows == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('power_windows'); ?>
	<br class="clear_float">
																
<label>Power Door Locks</label>				
    <label class="radio_label" for="power_door_locks_yes">Yes</label>
    <input id="power_door_locks_yes" class="radio_button" type="radio" value="Yes" name="power_door_locks" <?php if ($vehicle_details[0]->power_door_locks == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="power_door_locks_no">No</label>
	<input id="power_door_locks_no"  class="radio_button" type="radio" value="No" name="power_door_locks" <?php if ($vehicle_details[0]->power_door_locks == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('power_door_locks'); ?>
	<br class="clear_float">
																
<label>Cruise Control</label>				
    <label class="radio_label" for="cruise_control_yes">Yes</label>
    <input id="cruise_control_yes" class="radio_button" type="radio" value="Yes" name="cruise_control" <?php if ($vehicle_details[0]->cruise_control == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="cruise_control_no">No</label>
	<input id="cruise_control_no"  class="radio_button" type="radio" value="No" name="cruise_control" <?php if ($vehicle_details[0]->cruise_control == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('cruise_control'); ?>
	<br class="clear_float">
																
<label>CD player/ Changer</label>			
    <label class="radio_label" for="cd_player_changer_yes">Yes</label>
    <input id="cd_player_changer_yes" class="radio_button" type="radio" value="Yes" name="cd_player_changer" <?php if ($vehicle_details[0]->cd_player_changer == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="cd_player_changer_no">No</label>
	<input id="cd_player_changer_no"  class="radio_button" type="radio" value="No" name="cd_player_changer" <?php if ($vehicle_details[0]->cd_player_changer == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('cd_player_changer'); ?>
	<br class="clear_float">
																
<label>Premium Sound</label>				
    <label class="radio_label" for="premium_sound_yes">Yes</label>
    <input id="premium_sound_yes" class="radio_button" type="radio" value="Yes" name="premium_sound" <?php if ($vehicle_details[0]->premium_sound == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="premium_sound_no">No</label>
	<input id="premium_sound_no"  class="radio_button" type="radio" value="No" name="premium_sound" <?php if ($vehicle_details[0]->premium_sound == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('premium_sound'); ?>
	<br class="clear_float">
																
<label>Integrated phone</label>				
    <label class="radio_label" for="integrated_phone_yes">Yes</label>
    <input id="integrated_phone_yes" class="radio_button" type="radio" value="Yes" name="integrated_phone" <?php if ($vehicle_details[0]->integrated_phone == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="integrated_phone_no">No</label>
	<input id="integrated_phone_no"  class="radio_button" type="radio" value="No" name="integrated_phone" <?php if ($vehicle_details[0]->integrated_phone == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('integrated_phone'); ?>
	<br class="clear_float">
																
<label>Dual Airbags</label>					
    <label class="radio_label" for="dual_airbags_yes">Yes</label>
    <input id="dual_airbags_yes" class="radio_button" type="radio" value="Yes" name="dual_airbags" <?php if ($vehicle_details[0]->dual_airbags == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="dual_airbags_no">No</label>
	<input id="dual_airbags_no"  class="radio_button" type="radio" value="No" name="dual_airbags" <?php if ($vehicle_details[0]->dual_airbags == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('dual_airbags'); ?>
	<br class="clear_float">
																
<label>Four Wheel ABS Brakes</label>		
    <label class="radio_label" for="four_wheel_abs_brakes_yes">Yes</label>
    <input id="four_wheel_abs_brakes_yes" class="radio_button" type="radio" value="Yes" name="four_wheel_abs_brakes" <?php if ($vehicle_details[0]->four_wheel_abs_brakes == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="four_wheel_abs_brakes_no">No</label>
	<input id="four_wheel_abs_brakes_no"  class="radio_button" type="radio" value="No" name="four_wheel_abs_brakes" <?php if ($vehicle_details[0]->four_wheel_abs_brakes == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('four_wheel_abs_brakes'); ?>
	<br class="clear_float">
																
<label>Traction Control</label>				
    <label class="radio_label" for="traction_control_yes">Yes</label>
    <input id="traction_control_yes" class="radio_button" type="radio" value="Yes" name="traction_control" <?php if ($vehicle_details[0]->traction_control == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="traction_control_no">No</label>
	<input id="traction_control_no"  class="radio_button" type="radio" value="No" name="traction_control" <?php if ($vehicle_details[0]->traction_control == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('traction_control'); ?>
	<br class="clear_float">
																
<label>Power Seat</label>					
    <label class="radio_label" for="power_seats_yes">Yes</label>
    <input id="power_seats_yes" class="radio_button" type="radio" value="Yes" name="power_seat" <?php if ($vehicle_details[0]->power_seat == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="power_seats_no">No</label>
	<input id="power_seats_no"  class="radio_button" type="radio" value="No" name="power_seat" <?php if ($vehicle_details[0]->power_seat == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('power_seat'); ?>
	<br class="clear_float">
																
<label>Dual power seats</label>				
    <label class="radio_label" for="dual_power_seats_yes">Yes</label>
    <input id="dual_power_seats_yes" class="radio_button" type="radio" value="Yes" name="dual_power_seats" <?php if ($vehicle_details[0]->dual_power_seats == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="dual_power_seats_no">No</label>
	<input id="dual_power_seats_no"  class="radio_button" type="radio" value="No" name="dual_power_seats" <?php if ($vehicle_details[0]->dual_power_seats == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('dual_power_seats'); ?>
	<br class="clear_float">
																
<label>Flip up moon roof</label>			
    <label class="radio_label" for="flip_up_moon_roof_yes">Yes</label>
    <input id="flip_up_moon_roof_yes" class="radio_button" type="radio" value="Yes" name="flip_up_moon_roof" <?php if ($vehicle_details[0]->flip_up_moon_roof == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="flip_up_moon_roof_no">No</label>
	<input id="flip_up_moon_roof_no"  class="radio_button" type="radio" value="No" name="flip_up_moon_roof" <?php if ($vehicle_details[0]->flip_up_moon_roof == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('flip_up_moon_roof'); ?>
	<br class="clear_float">
																
<label>Privacy glass</label>				
    <label class="radio_label" for="privacy_glass_yes">Yes</label>
    <input id="privacy_glass_yes" class="radio_button" type="radio" value="Yes" name="privacy_glass" <?php if ($vehicle_details[0]->privacy_glass == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="privacy_glass_no">No</label>
	<input id="privacy_glass_no"  class="radio_button" type="radio" value="No" name="privacy_glass" <?php if ($vehicle_details[0]->privacy_glass == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('privacy_glass'); ?>
	<br class="clear_float">
																
<label>Navigation</label>					
    <label class="radio_label" for="navigation_yes">Yes</label>
    <input id="navigation_yes" class="radio_button" type="radio" value="Yes" name="navigation" <?php if ($vehicle_details[0]->navigation == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="navigation_no">No</label>
	<input id="navigation_no"  class="radio_button" type="radio" value="No" name="navigation" <?php if ($vehicle_details[0]->navigation == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('navigation'); ?>
	<br class="clear_float">
																
<label>Entertainment system/ DVD</label>	
    <label class="radio_label" for="entertainment_system_dvd_yes">Yes</label>
    <input id="entertainment_system_dvd_yes" class="radio_button" type="radio" value="Yes" name="entertainment_system_dvd" <?php if ($vehicle_details[0]->entertainment_system_dvd == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="entertainment_system_dvd_no">No</label>
	<input id="entertainment_system_dvd_no"  class="radio_button" type="radio" value="No" name="entertainment_system_dvd" <?php if ($vehicle_details[0]->entertainment_system_dvd == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('entertainment_system_dvd'); ?>
	<br class="clear_float">
																
<label>Oversized or Off Road Tires</label>	
    <label class="radio_label" for="oversized_off_road_yes">Yes</label>
    <input id="oversized_off_road_yes" class="radio_button" type="radio" value="Yes" name="oversized_off_road_tires" <?php if ($vehicle_details[0]->oversized_off_road_tires == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="oversized_off_road_no">No</label>
	<input id="oversized_off_road_no"  class="radio_button" type="radio" value="No" name="oversized_off_road_tires" <?php if ($vehicle_details[0]->oversized_off_road_tires == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('oversized_off_road_tires'); ?>
	<br class="clear_float">
																
<label>Roof Rack</label>					
    <label class="radio_label" for="roof_rack_yes">Yes</label>
    <input id="roof_rack_yes" class="radio_button" type="radio" value="Yes" name="roof_rack" <?php if ($vehicle_details[0]->roof_rack == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="roof_rack_no">No</label>
	<input id="roof_rack_no"  class="radio_button" type="radio" value="No" name="roof_rack" <?php if ($vehicle_details[0]->roof_rack == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('roof_rack'); ?>
	<br class="clear_float">
																
<label>Running Boards</label>				
    <label class="radio_label" for="running_boards_yes">Yes</label>
    <input id="running_boards_yes" class="radio_button" type="radio" value="Yes" name="running_boards" <?php if ($vehicle_details[0]->running_boards == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="running_boards_no">No</label>
	<input id="running_boards_no"  class="radio_button" type="radio" value="No" name="running_boards" <?php if ($vehicle_details[0]->running_boards == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('running_boards'); ?>
	<br class="clear_float">
																
<label>Sliding Rear Window</label>			
    <label class="radio_label" for="sliding_rear_window_yes">Yes</label>
    <input id="sliding_rear_window_yes" class="radio_button" type="radio" value="Yes" name="sliding_rear_window" <?php if ($vehicle_details[0]->sliding_rear_window == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="sliding_rear_window_no">No</label>
	<input id="sliding_rear_window_no"  class="radio_button" type="radio" value="No" name="sliding_rear_window" <?php if ($vehicle_details[0]->sliding_rear_window == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('sliding_rear_window'); ?>
	<br class="clear_float">
																
<label>Bed Liner</label>					
    <label class="radio_label" for="bed_liner_yes">Yes</label>
    <input id="bed_liner_yes" class="radio_button" type="radio" value="Yes" name="bed_liner" <?php if ($vehicle_details[0]->bed_liner == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="bed_liner_no">No</label>
	<input id="bed_liner_no"  class="radio_button" type="radio" value="No" name="bed_liner" <?php if ($vehicle_details[0]->bed_liner == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('bed_liner'); ?>
	<br class="clear_float">
																
<label>Canopy/Shell</label>					
    <label class="radio_label" for="canopy_shell_yes">Yes</label>
    <input id="canopy_shell_yes" class="radio_button" type="radio" value="Yes" name="canopy_shell" <?php if ($vehicle_details[0]->canopy_shell == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="canopy_shell_no">No</label>
	<input id="canopy_shell_no"  class="radio_button" type="radio" value="No" name="canopy_shell" <?php if ($vehicle_details[0]->canopy_shell == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('canopy_shell'); ?>
	<br class="clear_float">
											
<label>Quad Seating</label>					
    <label class="radio_label" for="quad_seating_yes">Yes</label>
    <input id="quad_seating_yes" class="radio_button" type="radio" value="Yes" name="quad_seating" <?php if ($vehicle_details[0]->quad_seating == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="quad_seating_no">No</label>
	<input id="quad_seating_no"  class="radio_button" type="radio" value="No" name="quad_seating" <?php if ($vehicle_details[0]->quad_seating == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('quad_seating'); ?>
	<br class="clear_float">
											
<label>Tilt Steering Wheel</label>			
    <label class="radio_label" for="tilt_steering_wheel_yes">Yes</label>
    <input id="tilt_steering_wheel_yes" class="radio_button" type="radio" value="Yes" name="tilt_steering_wheel" <?php if ($vehicle_details[0]->tilt_steering_wheel == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="tilt_steering_wheel_no">No</label>
	<input id="tilt_steering_wheel_no"  class="radio_button" type="radio" value="No" name="tilt_steering_wheel" <?php if ($vehicle_details[0]->tilt_steering_wheel == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('tilt_steering_wheel'); ?>
	<br class="clear_float">
											
<label>All Wheel Drive</label>				
    <label class="radio_label" for="all_wheel_drive_yes">Yes</label>
    <input id="all_wheel_drive_yes" class="radio_button" type="radio" value="Yes" name="all_wheel_drive" <?php if ($vehicle_details[0]->all_wheel_drive == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="all_wheel_drive_no">No</label>
	<input id="all_wheel_drive_no"  class="radio_button" type="radio" value="No" name="all_wheel_drive" <?php if ($vehicle_details[0]->all_wheel_drive == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('all_wheel_drive'); ?>
	<br class="clear_float">
											
<label>Alloy wheels</label>					
    <label class="radio_label" for="alloy_wheels_yes">Yes</label>
    <input id="alloy_wheels_yes" class="radio_button" type="radio" value="Yes" name="alloy_wheels" <?php if ($vehicle_details[0]->alloy_wheels == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="alloy_wheels_no">No</label>
	<input id="alloy_wheels_no"  class="radio_button" type="radio" value="No" name="alloy_wheels" <?php if ($vehicle_details[0]->alloy_wheels == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('alloy_wheels'); ?>
	<br class="clear_float">
											
<label>Towing package</label>				
    <label class="radio_label" for="towing_package_yes">Yes</label>
    <input id="towing_package_yes" class="radio_button" type="radio" value="Yes" name="towing_package" <?php if ($vehicle_details[0]->towing_package == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="towing_package_no">No</label>
	<input id="towing_package_no"  class="radio_button" type="radio" value="No" name="towing_package" <?php if ($vehicle_details[0]->towing_package == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('towing_package'); ?>
	<br class="clear_float">
																
<label>Custom Bumper</label>				
    <label class="radio_label" for="custom_bumper_yes">Yes</label>
    <input id="custom_bumper_yes" class="radio_button" type="radio" value="Yes" name="custom_bumper" <?php if ($vehicle_details[0]->custom_bumper == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="custom_bumper_no">No</label>
	<input id="custom_bumper_no"  class="radio_button" type="radio" value="No" name="custom_bumper" <?php if ($vehicle_details[0]->custom_bumper == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('custom_bumper'); ?>
	<br class="clear_float">
																
<label>Grill Guard</label>					
    <label class="radio_label" for="grill_guard_yes">Yes</label>
    <input id="grill_guard_yes" class="radio_button" type="radio" value="Yes" name="grill_guard" <?php if ($vehicle_details[0]->grill_guard == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="grill_guard_no">No</label>
	<input id="grill_guard_no"  class="radio_button" type="radio" value="No" name="grill_guard" <?php if ($vehicle_details[0]->grill_guard == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('grill_guard'); ?>
	<br class="clear_float">
																
<label>Third Row Seat</label>				
    <label class="radio_label" for="third_row_seat_yes">Yes</label>
    <input id="third_row_seat_yes" class="radio_button" type="radio" value="Yes" name="third_row_seat" <?php if ($vehicle_details[0]->third_row_seat == 'Yes') echo 'checked="checked"'; ?> >
	<label class="radio_label" for="third_row_seat_no">No</label>
	<input id="third_row_seat_no"  class="radio_button" type="radio" value="No" name="third_row_seat" <?php if ($vehicle_details[0]->third_row_seat == 'No') echo 'checked="checked"'; ?> >
	<?php echo form_error('third_row_seat'); ?>
	<br class="clear_float">
