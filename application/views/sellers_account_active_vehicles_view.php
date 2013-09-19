<?php  include '_includes/head.php' ?>

	<div id="main_container" class="sellers_account">
        
        <script type="text/javascript">
            
            //setInterval("timer_tick()", 3000); 
            
            function timer_tick() {
                console.log('tick');
            }   
        </script>
		
		<?php
			$main_navigation = "my_account"; 
			$account_navigation = 'active_vehicles';
			include '_includes/header.php' 
		?>
		
		<?php include '_includes/sellers_account_navigation.php'; ?>
		<?php $user_id = $this->session->userdata('user_id'); ?>
		
		<div class="module_960 drop_shadow rounded_corners">
			<h1>Your Active Listings</h1>
		</div>
		
		<?php include '_includes/get_image_paths.php' ?>
        <script type="text/javascript" src="<?php echo base_url().'_javascript/slideshow.js'; ?>"></script>
		
<!--		<div class="module_960" id="sellers_listings"> -->
		
			<?php $old_vehicle_id = 0; ?>
			<?php

			if (count($results) == 0) { ?>
				<div class="module_960 drop_shadow rounded_corners vehicle_listing vehicle_listings">
				<p>You have not currently have any active vehicles. <a href='sellers_account_list_vehicle'>List a vehicle</a> Or <a href='sellers_account_inactive_vehicles'>View Inactive Vehicles</a></p>
				</div>
			<?php }
			$i = 0;

			foreach ($results as $row) {

			        $vehicle_row = $row; // So we can use $vehicle_row as $row in the datetime stuff below. Otherwsie the $row for the other loops overwrites it.  
					$i++;
					$new_vehicle_id = $row->vehicle_id;
					if ($new_vehicle_id != $old_vehicle_id) { 
						$old_vehicle_id = $row->vehicle_id;
					
			?>
				<div class="module_960 drop_shadow rounded_corners vehicle_listing vehicle_listings">
				
					<div class="column_1">
				
						<?php 
							$this->load->model('data_model');
							$main_image_path = $this->data_model->get_main_image_path($row->vehicle_id);
							for ($j=0; $j<count($main_image_path); $j++) {
								echo "<img src=".$main_image_path[$j]->image_name." />";
							}
						?>

						<br class="clear_float" />
						
						<?php echo get_image_paths($results, $row->vehicle_id); ?>
						
						<script type="text/javascript">
							$(function() {
								$('a.<?php echo $row->vehicle_id; ?>').lightBox();
							});

							$(document).ready(function(){
							    
							    $("#expanding_div<?php echo $i; ?>").hide(); 
                                $("#expand_button<?php echo $i; ?>").click(function () {  
                                    $(this).next().toggle("slow"); 
                                    return false; 
                                });

								$("#accept_bid_button<?php echo $i; ?>").fadeTo(0, .3);

								$("#accept_bid_button<?php echo $i; ?>").click(function() {
									if($("#accept_bid_button<?php echo $i; ?>").hasClass("disabled")) {
										alert ('You must read and accept the Terms of Service before accepting a bid.');
										return false;
									} 
								});

								$("accept_terms_checkbox<?php echo $i; ?>").click(0, .2);
								$('#accept_terms_checkbox<?php echo $i; ?>').click(function() {
									if($("#accept_bid_button<?php echo $i; ?>").hasClass("disabled")) {
										$("#accept_bid_button<?php echo $i; ?>").fadeTo(0, 1);
										$("#accept_bid_button<?php echo $i; ?>").removeClass('disabled');
									} else {
										$("#accept_bid_button<?php echo $i; ?>").fadeTo(0, .2);
										$("#accept_bid_button<?php echo $i; ?>").addClass('disabled');
									}
								});
							});
							
						</script>
						
						<br class="clear_float" />
	
					</div>
					
					<div class="column_2">

						<h2>
							<?php 
								echo $row->year.' ';
	   							echo $row->make.' ';
	   							echo $row->model;
	   						?>
	   					</h2>
	   					<h3>
	   						<?php 
	   							echo $row->style;
	   						?>
	   					</h3>
	   					
						<br class="clear_float" />
						
						<ul>
						
							<li class="grey_background">Mileage: 		<?php echo $row->mileage; ?></li>
							<li>Exterior Color: 						<?php echo $row->exterior_color; ?></li>
							<li class="grey_background">Interior Color: <?php echo $row->interior_color; ?></li>
							<li>Upholstery: 							<?php echo $row->upholstery_type; ?></li>
							<li class="grey_background">VIN: 			<?php echo $row->vin; ?></li>
							<li>Drive Type: 							<?php echo $row->drive_type; ?></li>
							
						</ul>
						
						<a href="#" class="expand_button" id="expand_button<?php echo $i; ?>">Toggle Details</a>  
                        
                        <div id="expanding_div<?php echo $i; ?>">
                            <ul>
                            
                                <li>Number of Cylinders:        <?php echo $row->number_of_cylinders; ?></li>
                                <li>Transmission Type:          <?php echo $row->transmission_type; ?></li>
                                <li>Number of Speeds:           <?php echo $row->number_of_speeds; ?></li>
                                <li>Fuel Type:                  <?php echo $row->fuel_type; ?></li>
                                <li>Original Owner:             <?php echo $row->original_owner; ?></li>
                                <li>Mileage: 					<?php echo $row->mileage; ?></li>
                                <li>Is Actual Mileage: 			<?php echo $row->is_actual_mileage; ?></li>
                                <li>Mileage Notes:				<?php echo $row->mileage_notes; ?></li>
                                <li>Any Accidents:              <?php echo $row->any_accidents; ?></li>
                                <li>Accident/Repair History:    <?php echo $row->accident_repair_history; ?></li>
                                <li>Any Repainting:             <?php echo $row->any_repainting; ?></li>
                                <!-- <li>Have Title:            <?php //echo $row->have_title; ?></li> -->
                                <!-- <li>Loan Balance:          <?php //echo $row->loan_balance; ?></li> --> 
                                <li>License Plate Number:       <?php echo $row->license_plate_number; ?></li>
                                <li>State of Registration:      <?php echo $row->state_of_registration; ?></li>
                                <!-- <li>Registration Expiration:   <?php //echo $row->registration_expiration_date; ?></li>  -->
                                <li>Paint/Body Condition:       <?php echo $row->paint_body_condition; ?></li>
                                <li>Glass Condition:            <?php echo $row->glass_condition; ?></li>
                                <li>Tires Condition:            <?php echo $row->tires_condition; ?></li>
                                <li>Brakes Condition:           <?php echo $row->brakes_condition; ?></li>
                                <li>Transmission Condition:     <?php echo $row->transmission_condition; ?></li>
                                <li>Clutch Condition:           <?php echo $row->clutch_condition; ?></li>
                                <li>Carpet Condition:           <?php echo $row->carpet_condition; ?></li>
                                <li>Upholstery Condition:       <?php echo $row->upholstery_condition; ?></li>
                                <li>Engine Condition:           <?php echo $row->engine_condition; ?></li>
                                <li>Exhaust Condition:          <?php echo $row->exhaust_condition; ?></li>
                                <li>Shocks Condition:           <?php echo $row->shocks_condition; ?></li>
                                <li>Air Conditioning Condition: <?php echo $row->air_conditioning_condition; ?></li>
                                <li>Vehicle Smoked In:          <?php echo $row->vehicle_smoked_in; ?></li>
                                <li>Salvage:                    <?php echo $row->salvage; ?></li>
                                <li>Lemon Law/Buyback:          <?php echo $row->lemon_law_buyback; ?></li>
                                <li>Warranty Return:            <?php echo $row->warranty_return; ?></li>
                                <li>Frame Damage:               <?php echo $row->frame_damage; ?></li>
                                <li>Flood Damage:               <?php echo $row->flood_damage; ?></li>
                                <li>Additional Condition Information: <?php echo $row->additional_condition_information; ?></li>
                                <li>General Overall Condition:  <?php echo $row->general_overall_condition; ?></li>
                                <!-- <li>Vehicle Type:          <?php //echo $row->vehicle_type; ?></li> -->
                                <li>Power Steering:             <?php echo $row->power_steering; ?></li>
                                <li>All Wheel Drive:            <?php echo $row->all_wheel_drive; ?></li>
                                <li>Air Conditioning:           <?php echo $row->air_conditioning; ?></li>
                                <li>Power Windows:              <?php echo $row->power_windows; ?></li>
                                <li>Power Door Locks:           <?php echo $row->power_door_locks; ?></li>
                                <li>Tilt Steering Wheel:        <?php echo $row->tilt_steering_wheel; ?></li>
                                <li>Cruise Control:             <?php echo $row->cruise_control; ?></li>
                                <li>CD Player/Changer:          <?php echo $row->cd_player_changer; ?></li>
                                <li>Premium Sound:              <?php echo $row->premium_sound; ?></li>
                                <li>Integrated Phone:           <?php echo $row->integrated_phone; ?></li>
                                <li>Dual Airbags:               <?php echo $row->dual_airbags; ?></li>
                                <li>Four Wheel ABS Brakes:      <?php echo $row->four_wheel_abs_brakes; ?></li>
                                <!-- <li>Leather Interior:      <?php //echo $row->leather_interior; ?></li>-->
                                <li>Traction Control:           <?php echo $row->traction_control; ?></li>
                                <li>Power Seat:                 <?php echo $row->power_seat; ?></li>
                                <li>Dual Power Seats:           <?php echo $row->dual_power_seats; ?></li>
                                <li>Flip-up Moon Roof:          <?php echo $row->flip_up_moon_roof; ?></li>
                                <li>Privacy Glass:              <?php echo $row->privacy_glass; ?></li>
                                <li>Navigation:                 <?php echo $row->navigation; ?></li>
                                <li>Alloy Wheels:               <?php echo $row->alloy_wheels; ?></li>
                                <li>Entertainment System/DVD:   <?php echo $row->entertainment_system_dvd; ?></li>
                                <li>Towing Package:             <?php echo $row->towing_package; ?></li>
                                <li>Oversized/Off-road Tires:   <?php echo $row->oversized_off_road_tires; ?></li>
                                <li>Roof Rack:                  <?php echo $row->roof_rack; ?></li>
                                <li>Running Boards:             <?php echo $row->running_boards; ?></li>
                                <li>Sliding Rear Window:        <?php echo $row->sliding_rear_window; ?></li>
                                <li>Bed Liner:                  <?php echo $row->bed_liner; ?></li>
                                <li>Canopy Shell:               <?php echo $row->canopy_shell; ?></li>
                                <li>Custom Bumper:              <?php echo $row->custom_bumper; ?></li>
                                <li>Grill Guard:                <?php echo $row->grill_guard; ?></li>
                                <li>Quad Seating:               <?php echo $row->quad_seating; ?></li>
                                <li>Third Row Seat:             <?php echo $row->third_row_seat; ?></li>
                                
                            </ul>
                        </div>
						
						<h3 id="bid_history">Bid History</h3>
					
						<?php 
						
							$this->load->model('data_model');
							$bid_results = $this->data_model->get_vehicle_bid_history($row->vehicle_id, $row->bid_session);
							if ($bid_results) {
								echo "<ul>";
								foreach ($bid_results as $row) {
									//echo "<li>".date('m.d.y', $row->bid_time). "$".number_format($row->bid_amount)."</li>";								
									echo "<li>$".number_format($row->bid_amount)."</li>";								
								}
								echo "</ul>";
							} else {
								echo "<p>There have been no bids received.</p>";
							}
							
						?>
						
						<!--  Expanding DIV Removed -->
						
					</div>
					
					<div class="column_3">
				
						<!-- 	
								Same as above -
								I'm not sure how to get around this
								I need to loop through the vehicles listed by the user,
								which is done in the model, but I'm not sure how to 
								get the bid history without writing the query here, 
								which seems the break the MVC pattern
								
						-->
						
						 
						<?php
							$query = $this->data_model->get_vehicle_high_bid($row->vehicle_id, $row->bid_session);
							$result = $query->result();
							if ($query->num_rows() > 0) {
								foreach ($result as $row) {
								    echo "<h3>Current High Bid</h3>";
									echo "<h2>$".number_format($row->bid_amount)."</h2>";
									//echo "Bid id: ".$row->bid_id;
								}
								date_default_timezone_set('UTC');
                                $date_added = new DateTime($vehicle_row->date_added);
                                $now = new DateTime(date('Y-m-d H:i:s', time()));
                                $bid_expiration = date_add($date_added, date_interval_create_from_date_string('96 hours'));
                                $interval = $bid_expiration->diff($now, TRUE);
                                echo "<p class='time_left error'>You have ".$interval->format('%d days, %h hours, %i minutes')." to accept this bid.</p>";
							} else {
							    echo "<h3>Current High Bid</h3>";
								echo "<h2>$0</h2>";
							}
						?>
						
						
						
						<?php $checkbox_data = array('name' => 'accept_terms_checkbox', 'id' => 'accept_terms_checkbox'.$i, 'value' => 'accept', 'checked' => FALSE); ?>
					
						
						<?php if($result) { ?>
								<a class="accept_bid rounded_corners drop_shadow blue_gradient disabled" id="accept_bid_button<?php echo $i; ?>" href="accept_bid/<?php echo $row->vehicle_id; ?>/<?php echo $row->buyer_id; ?>/<?php echo $user_id; ?>/<?php echo $row->bid_id; ?>">Accept Bid</a><br />
								<label for="accept_terms_checkbox<?php echo $i; ?>">I accept the <a href="<?php echo base_url(); ?>site/terms_of_service" target="_blank">Terms of Service</a></label> <?php echo form_checkbox($checkbox_data); ?>
						<?php } ?>
						
						<br class="clear_float" />
						<!-- <a href="edit_vehicle/<?php //echo $row->vehicle_id; ?>">Edit This Vehicle</a><br /> -->
						<a href="deactivate_vehicle/<?php echo $row->vehicle_id; ?>">Make This Vehicle Inactive</a><br />
						<a href="edit_vehicle/<?php echo $row->vehicle_id; ?>">Edit this Vehicle</a><br />
					
					</div>
					
					<br class="clear_float" />
				
				</div>
<!--				</div>-->
			
			<?php } ?>
				
		<?php } ?>

<!--		</div>-->
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>

<?php  include '_includes/footer.php' ?>