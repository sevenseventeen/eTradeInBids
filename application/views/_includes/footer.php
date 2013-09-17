</body>

	<?php 
		if(isset($file_name)) {
			if(file_exists("_javascript/_pages/".$file_name.".js")) {
				echo "<script src='".base_url()."_javascript/_pages/".$file_name.".js'></script>";
			}
		}
	?>

</html>