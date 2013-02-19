<?php  include '_includes/head.php' ?>

	<div id="main_container">

		<?php
			$main_navigation = "home";  
			include '_includes/header.php' 
		?>
		
		<div class="module_960">
			<h1 class="title_module">VIN Results</h1>
		</div>
		
		<div class="module_960" id="add_a_vehicle">
		
			<p>
				<?php echo $xml->VCodes->Record['Year']; ?>
				<?php echo " ".$xml->VCodes->Record['Make']; ?>
				<?php echo " ".$xml->VCodes->Record['Model']; ?>
				<?php //echo $xml->VCodes->Record['FuelType']; ?>
			</p>

		</div>
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>

<?php  include '_includes/footer.php' ?>