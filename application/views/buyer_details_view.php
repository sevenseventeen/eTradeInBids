<?php  include '_includes/head.php' ?>

	<div id="main_container">

		<?php
			$main_navigation = "";  
			include '_includes/header.php' 
		?>
		
		<div class="module_960 rounded_corners drop_shadow light_gradient buyer_details">
			<h1>Buyer Details</h1>
			
			<p><strong>First Name:</strong> 					<?php echo $buyer_details[0]->first_name; ?></p>
			<p><strong>Last Name:</strong>						<?php echo $buyer_details[0]->last_name; ?></p>
			<p><strong>Email:</strong>							<?php echo $buyer_details[0]->email; ?></p>
			<p><strong>Dealer Name:</strong> 					<?php echo $buyer_details[0]->dealer_name; ?></p>
			<p><strong>Title:</strong> 							<?php echo $buyer_details[0]->title; ?></p>
			<p><strong>Business Street Address:</strong> 		<?php echo $buyer_details[0]->business_street_address; ?></p>
			<p><strong>Business City:</strong> 					<?php echo $buyer_details[0]->business_city ?></p>
			<p><strong>Business State:</strong> 				<?php echo $buyer_details[0]->business_state ?></p>
			<p><strong>Business Zip Code:</strong> 				<?php echo $buyer_details[0]->business_zip_code ?></p>
			<p><strong>Business Telephone Number:</strong> 		<?php echo $buyer_details[0]->business_telephone_number ?></p>
			<p><strong>License Number:</strong> 				<?php echo $buyer_details[0]->license_number ?></p>
			<p><strong>Insurance Company Name:</strong> 		<?php echo $buyer_details[0]->insurance_company_name ?></p>
			<p><strong>Insurance Company Contact Name:</strong> <?php echo $buyer_details[0]->insurance_company_contact_name ?></p>
			<p><strong>Insurance Company Phone:</strong> 		<?php echo $buyer_details[0]->insurance_company_contact_phone ?></p>
			<p><strong>Bank Name:</strong> 						<?php echo $buyer_details[0]->bank_name ?></p>
			<p><strong>Bank Contact Name:</strong> 				<?php echo $buyer_details[0]->bank_contact_name ?></p>
			<p><strong>Bank Contact Phone:</strong> 			<?php echo $buyer_details[0]->bank_contact_phone ?></p>
			<p><strong>Insurance Policy Number:</strong> 		<?php echo $buyer_details[0]->insurance_policy_number ?></p>
		</div>
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>
	
<?php  include '_includes/footer.php' ?>