<?php  include '_includes/head.php'; ?>

	<div id="main_container">

		<?php
			$main_navigation = "register";  
			include '_includes/header.php'; 
		?>
		
		<div class="module_960 drop_shadow rounded_corners">
			
			<h1>Your Card Has Been Updated</h1>
			<p>Your credit card has been updated. Please <a href="<?php echo base_url(). 'site/account_management_buyer'; ?>">click here</a> to return to the account management page.</p>
			
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
