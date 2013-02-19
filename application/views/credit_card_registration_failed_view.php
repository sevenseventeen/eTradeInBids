<?php  include '_includes/head.php'; ?>

	<div id="main_container">

        <?php
			$main_navigation = 'register';  
			include '_includes/header.php';
		?>
		
		<div class="module_960 drop_shadow rounded_corners">
			
			<h1>Unable to Verify Credit Card</h1>
			<p>Your user account has been created, but we were unable to verify your credit card. Please check the information and <a href="<?php echo base_url(); ?>auth/register_credit_card">try again</a>. If you continue to have trouble, please <a href="<?php echo base_url(); ?>site/contact_us">contact us</a>.</p> 
			
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
