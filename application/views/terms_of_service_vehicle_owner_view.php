<?php  include '_includes/head.php' ?>

	<div id="main_container">

		<?php
			//$main_navigation = "home";  
			//include '_includes/header.php' 
		?>

		<div class="module_960 rounded_corners drop_shadow light_gradient">

			<h1>Terms of Service</h1>
			
			<a href="#dealers">For Dealers</a>
			<a href="#vehicle_owners">For Vehicle Owners</a>
			
			<a name="#dealers"></a>
			<?php $this->load->view('_includes/terms_of_service_dealer_view'); ?>
			
			<a name="#vehicle_owners"></a>
			<?php $this->load->view('_includes/terms_of_service_vehicle_owner_view'); ?>

		</div>
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>
	
<?php  include '_includes/footer.php' ?>