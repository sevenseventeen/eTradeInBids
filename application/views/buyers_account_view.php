<?php  include '_includes/head.php' ?>

	<div id="main_container">
	
		<script type="text/javascript">  
		$(document).ready(function(){

			$(".expanding_div").hide(); 
			$(".expand_button").click(function () {  
				$(this).next().toggle("slow"); 
				return false; 
			});

		});
		</script>

		<?php
			$main_navigation = "my_account";  
			include '_includes/header.php' 
		?>
		
		<div class="module_960">
			<h1 class="title_module">Buyers Account - All Active Listings</h1>
		</div>
		
		<?php include '_includes/get_image_paths.php'?>
		
		<div class="module_960" id="current_listings">
			
			<?php 
			if (count($results) == 0) {
				echo "<p>Sorry, there are no vehicles currently listed. Please check back soon.</p>";
			}
			?>
		
			<?php $old_vehicle_id = 0; ?>
			<?php foreach ($results as $row) {
			
			$new_vehicle_id = $row->vehicle_id;
				
			if ($new_vehicle_id != $old_vehicle_id) { 
				$old_vehicle_id = $row->vehicle_id;
					
			?>
				<div class="vehicle_listing first_listing"> <!-- May need to dynamically add classes for first_listing and last_listing -->
				
					<div class="column_1">
				
						<img src=<?php echo base_url()."_thumbnails/".$row->main_image_path; ?> />
						
						<br class="clear_float" />
						
						<div class="view_slideshow">
							<a class='<?php echo $row->vehicle_id; ?>' href='<?php echo base_url()."_uploads/".$row->main_image_path; ?>'>View Slideshow</a>
						</div>
						
						<?php echo get_image_paths($results, $row->vehicle_id); ?>
						
						<script type="text/javascript">
							$(function() {
								$('a.<?php echo $row->vehicle_id; ?>').lightBox();
							});
						</script>
						
						<br class="clear_float" />
	
					</div>
					
					<div class="column_2">

						<h2>
							<?php 
							echo $row->year.' ';
	   						echo $row->make.' ';
	   						echo $row->model.'<br />';
	   						echo $row->style;
	   						?>
	   					</h2>
	   					
						<?php
							echo form_open('site/submit_bid');
							echo form_hidden('vehicle_id', $row->vehicle_id);
							echo form_hidden('buyer_id', $this->session->userdata('user_id'));
							echo form_hidden('seller_id', $row->user_id);
							echo form_input('bid_amount', 'Enter Bid');
							echo form_submit('submit', 'Submit');
							echo form_close(); 
						?>
						
						<br class="clear_float" />
						
						<ul>
						
							<li>Mileage: 		<?php echo $row->mileage; ?></li>
							<li>Exterior Color: <?php echo $row->exterior_color; ?></li>
							<li>Interior Color: <?php echo $row->interior_color; ?></li>
							<li>Upholstery: 	<?php echo $row->upholstery_type; ?></li>
							<li>VIN: 			<?php echo $row->vin; ?></li>
							<li>Drive Type: 	<?php echo $row->drive_type; ?></li>
							
						</ul>
						
						<a href="#" class="expand_button">Toggle Details</a>  
						
						<div class="expanding_div">
							<ul>
							
							
								<li>Number of Cylinders: 		<?php echo $row->number_of_cylinders; ?></li>
								<li>Transmission Type: 			<?php echo $row->transmission_type; ?></li>
								<li>Number of Speeds: 			<?php echo $row->number_of_speeds; ?></li>
								<li>Fuel Type: 					<?php echo $row->fuel_type; ?></li>
								<li>Original Owner: 			<?php echo $row->original_owner; ?></li>
								<li>Any Accidents: 				<?php echo $row->any_accidents; ?></li>
								<li>Any Repainting: 			<?php echo $row->any_repainting; ?></li>
								<li>Have Title: 				<?php echo $row->have_title; ?></li>
								<li>Loan Balance: 				<?php echo $row->loan_balance; ?></li>
								<li>License Plate Number: 		<?php echo $row->license_plate_number; ?></li>
								<li>State of Registration: 		<?php echo $row->state_of_registration; ?></li>
								<li>Registration Expiration: 	<?php echo $row->registration_expiration_date; ?></li>
								<li>Paint/Body Condition: 		<?php echo $row->paint_body_condition; ?></li>
								<li>Glass Condition: 			<?php echo $row->glass_condition; ?></li>
								<li>Tires Condition: 			<?php echo $row->tires_condition; ?></li>
								<li>Brakes Condition: 			<?php echo $row->brakes_condition; ?></li>
								<li>Transmission Condition: 	<?php echo $row->transmission_condition; ?></li>
								<li>Clutch Condition: 			<?php echo $row->clutch_condition; ?></li>
								<li>Carpet Condition: 			<?php echo $row->carpet_condition; ?></li>
								<li>Upholstery Condition: 		<?php echo $row->upholstery_condition; ?></li>
								<li>Engine Condition: 			<?php echo $row->engine_condition; ?></li>
								<li>Exhaust Condition: 			<?php echo $row->exhaust_condition; ?></li>
								<li>Shocks Condition: 			<?php echo $row->shocks_condition; ?></li>
								<li>Air Conditioning Condition: <?php echo $row->air_conditioning_condition; ?></li>
								<li>General Overall Condition: 	<?php echo $row->general_overall_condition; ?></li>
								<li>Accident/Repair History: 	<?php echo $row->accident_repair_history; ?></li>
								<li>Vehicle Type: 				<?php echo $row->vehicle_type; ?></li>
								<li>Power Steering: 			<?php echo $row->power_steering; ?></li>
								<li>All Wheel Drive: 			<?php echo $row->all_wheel_drive; ?></li>
								<li>Air Conditioning: 			<?php echo $row->air_conditioning; ?></li>
								<li>Power Windows: 				<?php echo $row->power_windows; ?></li>
								<li>Power Door Locks: 			<?php echo $row->power_door_locks; ?></li>
								<li>Tilt Steering Wheel: 		<?php echo $row->tilt_steering_wheel; ?></li>
								<li>Cruise Control: 			<?php echo $row->cruise_control; ?></li>
								<li>CD Player/Changer: 			<?php echo $row->cd_player_changer; ?></li>
								<li>Premium Sound: 				<?php echo $row->premium_sound; ?></li>
								<li>Integrated Phone: 			<?php echo $row->integrated_phone; ?></li>
								<li>Dual Airbags: 				<?php echo $row->dual_airbags; ?></li>
								<li>Four Wheel ABS Brakes: 		<?php echo $row->four_wheel_abs_brakes; ?></li>
								<li>Leather Interior: 			<?php echo $row->leather_interior; ?></li>
								<li>Traction Control: 			<?php echo $row->traction_control; ?></li>
								<li>Power Seat: 				<?php echo $row->power_seat; ?></li>
								<li>Dual Power Seats: 			<?php echo $row->dual_power_seats; ?></li>
								<li>Flip-up Moon Roof: 			<?php echo $row->flip_up_moon_roof; ?></li>
								<li>Privacy Glass: 				<?php echo $row->privacy_glass; ?></li>
								<li>Navigation: 				<?php echo $row->navigation; ?></li>
								<li>Alloy Wheels: 				<?php echo $row->alloy_wheels; ?></li>
								<li>Entertainment System/DVD: 	<?php echo $row->entertainment_system_dvd; ?></li>
								<li>Towing Package: 			<?php echo $row->towing_package; ?></li>
								<li>Oversized/Off-road Tires: 	<?php echo $row->oversized_off_road_tires; ?></li>
								<li>Roof Rack: 					<?php echo $row->roof_rack; ?></li>
								<li>Running Boards: 			<?php echo $row->running_boards; ?></li>
								<li>Sliding Rear Window: 		<?php echo $row->sliding_rear_window; ?></li>
								<li>Bed Liner: 					<?php echo $row->bed_liner; ?></li>
								<li>Canopy Shell: 				<?php echo $row->canopy_shell; ?></li>
								<li>Custom Bumper: 				<?php echo $row->custom_bumper; ?></li>
								<li>Grill Guard: 				<?php echo $row->grill_guard; ?></li>
								<li>Quad Seating: 				<?php echo $row->quad_seating; ?></li>
								<li>Third Row Seat: 			<?php echo $row->third_row_seat; ?></li>
								
							</ul>
						</div>
						
					</div>
					
					<br class="clear_float" />
				
				</div>
			
			<?php } ?>
				
		<?php } ?>
			
		</div>
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>

<?php  include '_includes/footer.php' ?>