<?php 
		
	function get_image_paths($results, $vehicle_id) {
		$image_paths = "<div class='thumbnail_grid'>";
		foreach ($results as $row) {
			if ($row->vehicle_id == $vehicle_id) {
				if ($row->image_name != '') {
					$image_paths .= "<div style='background-image:url(".$row->image_name.")'; class='thumbnail'></div>";
				}
			}
		}
		$image_paths .= "</div>";
		return $image_paths;			
	}

?>