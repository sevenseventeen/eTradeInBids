<?php  include '_includes/head.php'; ?>

	<div id="main_container">

		<?php
			$main_navigation = "my_account";  
			include '_includes/header.php';
		?>
		
		<?php $buyer_details = $buyer_details[0]; ?>
		
		<?php 
		
//			echo "<pre>";
//			print_r($result);		
//			echo "</pre>";
		
		?>
		
		<div class="module_960 rounded_corners drop_shadow">
			<h1>Congratulations, you've accepted a bid.</h1>
<!--		<p>Please use the contact information to contact the buyer. You should also receive an email with this information. If you don't receive an email shortly, please be sure to check your junk/spam folder and add etradeinbids.com to your accepted email list.</p>-->
			
			<p>The buyer will be contacting you shortly to arrange the details of this transaction. Should you need to contact the buyer, their details are listed below. You should also receive an email with this information. If you don't receive an email shortly, please be sure to check your junk/spam folder and add etradeinbids.com to your accepted email list.</p>
			
			<p class="address_block">
				
				<?php

					echo $buyer_details->first_name.' '.$buyer_details->last_name.'<br />'; ; 
					echo $buyer_details->dealer_name.'<br />'; 
					echo $buyer_details->business_street_address.'<br />'; 
					echo $buyer_details->business_city.', '.$buyer_details->business_state.' '.$buyer_details->business_zip_code.'<br />';
					echo $buyer_details->business_telephone_number.'<br />';
					echo "<a href='mailto:$buyer_details->email' />$buyer_details->email<br />";
					
				?>
			
			</p>
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
