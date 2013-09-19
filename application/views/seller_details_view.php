<?php  include '_includes/head.php' ?>

	<div id="main_container">

		<?php
			$main_navigation = "";  
			include '_includes/header.php' 
		?>
		
		<div class="module_960 rounded_corners drop_shadow light_gradient buyer_details">
			<h1>Seller Details</h1>
			
			<p><strong>First Name:</strong> 					<?php echo $seller_details[0]->first_name; ?></p>
			<p><strong>Last Name:</strong>						<?php echo $seller_details[0]->last_name; ?></p>
			<p><strong>Email:</strong>							<?php echo $seller_details[0]->email; ?></p>
			<!-- <p><strong>Business Name:</strong> --> 		<?php //echo $seller_details[0]->business_name; ?></p>
			<!-- <p><strong>Title:</strong> --> 				<?php //echo $seller_details[0]->title; ?></p>
			<p><strong>Business Street Address:</strong> 		<?php echo $seller_details[0]->business_street_address; ?></p>
			<p><strong>Business City:</strong> 					<?php echo $seller_details[0]->business_city ?></p>
			<p><strong>Business State:</strong> 				<?php echo $seller_details[0]->business_state ?></p>
			<p><strong>Business Zip Code:</strong> 				<?php echo $seller_details[0]->business_zip_code ?></p>
			<p><strong>Telephone Number:</strong> 		        <?php echo $seller_details[0]->telephone_number ?></p>
			<p><strong>Credit Union Name:</strong> 		        <?php echo $seller_details[0]->your_credit_union ?></p>
			<p><strong>Referred By:</strong> 		        	<?php echo $seller_details[0]->referred_by ?></p>
			<!-- <p><strong>Fax Number:</strong> --> 		    <?php //echo $seller_details[0]->fax_number ?></p>
		</div>
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>
	
<?php  include '_includes/footer.php' ?>