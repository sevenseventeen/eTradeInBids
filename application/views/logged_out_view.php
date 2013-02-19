<?php  include '_includes/head.php'; ?>

	<div id="main_container">

		<?php
			$main_navigation = "";  
			include '_includes/header.php'; 
		?>
		
		<div class="module_960 drop_shadow rounded_corners light_gradient">
			<h1>You Are Now Logged Out</h1>
			<?php echo "<p>".anchor('site/login', 'Click here to login.')."</p>"; ?>
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
