<?php 
		
	function get_image_paths($results, $vehicle_id) {
		$image_paths = "<div class='thumbnail_grid'>";
		foreach ($results as $row) {
			if ($row->vehicle_id == $vehicle_id) {
			   // echo $row->image_name."<br />";
				if ($row->image_name != '') {
					$image_paths .= "<div style='background-image:url(".base_url()."_thumbnails/".$row->image_name.")'; class='thumbnail'></div>";
				}
			}
		}
		$image_paths .= "</div>";
		return $image_paths;			
	}
    
    /*
     * This function was originally built to be used with the jQuery lightbox stuff. 
     * It's been updated for a new thumbnail viewing system, but left here just in case. 
     * 
     */
    
    /*
	function get_image_paths($results, $vehicle_id) {
		$image_paths = "<div class='hidden'>";
		foreach ($results as $row) {
			if ($row->vehicle_id == $vehicle_id) {
				if ($row->image_name != '') {
					$image_paths .= "<a class='$vehicle_id' href='".base_url()."_uploads/".$row->image_name."'>$row->image_name</a><br />";
				}
			}
		}
		$image_paths .= "</div>";
		return $image_paths;			
	}*/

?>