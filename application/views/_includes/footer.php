</body>

	<script type="text/javascript" src="<?php echo base_url().'_javascript/jquery-ui.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'_javascript/main.js'; ?>"></script>

	<?php 
		if(isset($file_name)) {
			if(file_exists("_javascript/_pages/".$file_name.".js")) {
				echo "<script src='".base_url()."_javascript/_pages/".$file_name.".js'></script>";
			}
		}
	?>

</html>