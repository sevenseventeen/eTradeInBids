<?php  include '_includes/head.php'; ?>

	<div id="main_container">

		<?php
			$main_navigation = "register";  
			include '_includes/header.php'; 
		?>
		
		<div id="register_options" class="module_960 drop_shadow rounded_corners">
			
			<?php echo anchor('site/register_seller', 'Register to Sell Your Car Here'); ?><br />
			<?php echo anchor('site/register_buyer', 'Register to be a Certified Dealer'); ?>
			
		</div>
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
