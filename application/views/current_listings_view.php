<?php  include '_includes/head.php' ?>

	<div id="main_container">

		<?php
			$main_navigation = "my_account";  
			include '_includes/header.php' 
		?>
		
		<div class="module_960">
			<h1 class="title_module">Current Listings</h1>
		</div>
		
		<div class="module_header">
			<h2>Current Listings</h2>
		</div>
		
		<div class="module_960" id="current_listings">
		
			<div class="vehicle_listing first_listing">
			
				<div class="column_1">
			
					<img src=<?php echo base_url().'_images/vehicle_placholder.jpg'; ?> />
					<br class="clear_float" />
					
					<div id="number_of_images">23 Images</div>
					<div id="view_larger">View Larger</div>
					<br class="clear_float" />
					
				</div>
				
				<div class="column_2">
					
					<h2>2010 Rolls Royce Phantom Drophead Coupe</h2>
					
					<div class="input_holder">INPUT_FPO</div>
					<div class="input_holder">INPUT_FPO</div>
					<br class="clear_float" />
					
					<ul>
						<li>Mileage: 43,200</li>
						<li>Color: Silver</li>
						<li>Condition: Excellent</li>
						<li>VIN: YXHDD7834HFJJJFKE</li>
					</ul>
					
					<p><strong>Vehicle Description</strong></p>
					
					<p>Vehicle Description Goes Here</p>
					
				</div>
				
				<br class="clear_float" />
			
			</div>
			
		</div>
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>

<?php  include '_includes/footer.php' ?>