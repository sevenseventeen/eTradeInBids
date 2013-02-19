<?php  include '_includes/head.php' ?>

	<div id="main_container">

		<?php
			//$main_navigation = "home";  
			//include '_includes/header.php' 
		?>

		<div id="terms_of_service" class="module_960 rounded_corners drop_shadow light_gradient">
			<a href="#dealers">For Dealers</a><br />
			<a href="#vehicle_owners">For Vehicle Owners</a>
			<?php $this->load->view('_includes/terms_of_service_dealer_view')?>
			<?php $this->load->view('_includes/terms_of_service_vehicle_owner_view')?>
		</div>
		
		<?php  //include '_includes/footer_module.php' ?>
	
	</div>
	
<?php  include '_includes/footer.php' ?>