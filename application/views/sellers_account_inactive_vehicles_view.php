<?php  include '_includes/head.php' ?>

	<div id="main_container" class="sellers_account">

		<?php
			$main_navigation = "my_account";
			$account_navigation = 'inactive_vehicles';  
			include '_includes/header.php' 
		?>
		
		<?php include '_includes/sellers_account_navigation.php'; ?>
		
		<div class="module_960 drop_shadow rounded_corners">
			<h1>Your Inactive Listings</h1>
		</div>
		
		<?php include '_includes/get_image_paths.php'?>
		
		
			<?php $old_vehicle_id = 0; ?>
			<?php

			if (count($results) == 0) { ?>
				
				<div class="module_960 drop_shadow rounded_corners vehicle_listing vehicle_listings">
				<p>You have not have any inactive vehicles. <a href='sellers_account_active_vehicles'>Check active vehicles page</a></p>
				</div>
			
			<?php } ?>
			
			<?php 
			foreach ($results as $row) {
					$new_vehicle_id = $row->vehicle_id;
					if ($new_vehicle_id != $old_vehicle_id) { 
						$old_vehicle_id = $row->vehicle_id;
					
			?>
				<div class="module_960 drop_shadow rounded_corners vehicle_listing vehicle_listings">
					<div class="column_1">
				
						<img src=<?php echo $row->main_image_path; ?> />
						
						<br class="clear_float" />
						
						
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
							<li>Exterior Color: <?php echo $row->exterior_color; ?></li>
							<li class="grey_background">Interior Color: <?php echo $row->interior_color; ?></li>
							<li>Upholstery: 	<?php echo $row->upholstery_type; ?></li>
							<li class="grey_background">VIN: 			<?php echo $row->vin; ?></li>
							<li>Drive Type: 	<?php echo $row->drive_type; ?></li>
							
						</ul>
						
						<h3 id="bid_history">Bid History</h3>
					
						<?php 
						
							$this->load->model('data_model');
							$bid_results = $this->data_model->get_vehicle_bid_history($row->vehicle_id, $row->bid_session);
							if ($bid_results) {
								echo "<ul>";
								foreach ($bid_results as $row) {
									echo "<li>$".number_format($row->bid_amount)."</li>";								
								}
								echo "</ul>";
							} else {
								echo "There have been no bids received.";
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
						
						<br class="clear_float" />
						<a href="activate_vehicle/<?php echo $row->vehicle_id; ?>">Make This Vehicle Active</a><br />
						<a href="delete_vehicle/<?php echo $row->vehicle_id; ?>">Permanently Remove This Vehicle</a>
					
					</div>
					
					<br class="clear_float" />
				
				</div>
			
			<?php } ?>
				
		<?php } ?>

<!--		</div>-->
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>

<?php  include '_includes/footer.php' ?>