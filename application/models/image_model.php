<?php 

class Image_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function do_upload() {
		
	}
	
	function process_uploadify_image($data) {
		
		// ***********FROM WORKING UPLOAD FUNCTION ***************/
		
		$json = $data['json'];
		$file_path = $json->{'file_path'}.$json->{'file_name'};
        $file_name = $this->session->userdata('user_id')."_".$json->{'file_name'};
        $vehicle_id = $this->session->userdata('vehicle_id');
		
		//****************  Resize and Rename *****************/

		$config = array(
			'create_thumb' 	=> TRUE,
			'source_image' 	=> $file_path,
			'new_image'		=> './_thumbnails/'.$file_name,
			'width'			=> 300,
			'height'		=> 10000,
			'maintain_ratio'=> TRUE,
			'thumb_marker'	=> ''
		);
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
        unlink($file_path);
		
		//****************  Add vehicle data to database *****************/
		
		if (!$vehicle_id) {
			//return FALSE;
            $data = array ('vehicle_id' => 'false', 'image_name' => 'false', 'is_main_image' => 0);
            $result = $this->db->insert('vehicle_images', $data);
		} else {
			$data = array ('vehicle_id' => $vehicle_id, 'image_name' => $file_name, 'is_main_image' => 0);
			$result = $this->db->insert('vehicle_images', $data);
			return $result;
		}
	}
}

?>