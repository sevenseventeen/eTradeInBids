<?php  include '_includes/head.php'; ?>

	<div id="main_container">

		<?php
			$main_navigation = "my_account";
			$account_navigation = '';  
			include '_includes/header.php'; 
		?>
		<?php include '_includes/sellers_account_navigation.php'; ?>
		<div class="module_960 drop_shadow rounded_corners">
			
			<h1>Information Updated</h1>
			<p>Your information has been updated. Please <a href="<?php echo base_url(). 'site/account_management_seller'; ?>">click here</a> to return to the account management page.</p>
			
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
