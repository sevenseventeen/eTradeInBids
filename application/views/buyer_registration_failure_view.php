<?php  include '_includes/head.php'; ?>

	<div id="main_container">

		<?php
			$main_navigation = "buyer_registration_failure";  
			include '_includes/header.php'; 
		?>
		
		<div class="module_960 drop_shadow rounded_corners">
			
			<h1>Credit card approval has failed.</h1>
			<p>I am sorry.Your credit card information is not valid. Please, <a href=<?php echo base_url(). "site/credit_card_info_enter/$email/$id>"; ?>click here</a> to complete the update.</p> 
			<p>Thanks for using eTradeInBids.</p>
			
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
