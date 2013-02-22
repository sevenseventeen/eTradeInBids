<?php 

function force_numeric($input) {
	$output = preg_replace("/[^0-9]/", '', $input);
	return $output;
}

?>
