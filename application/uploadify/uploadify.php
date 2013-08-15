<?php

if (!empty($_FILES)) {

	$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
	$new_extension = strtolower(end(explode('.', $_FILES['Filedata']['name'])));
	
	if (!in_array($new_extension, $allowed_extensions)) {
		echo "Error";
	} else {
	
        if ($_SERVER['SERVER_NAME'] == "localhost" ) {    
			$target_path = $_SERVER['DOCUMENT_ROOT'] . '/development/etradeinbids/_uploads/';
        } else {
			$target_path = $_SERVER['DOCUMENT_ROOT'] . '/_uploads/';
        }
        
		$timestamp 					= str_replace('.', '', gettimeofday(true));
		$file_extension 			= pathinfo($_FILES['Filedata']['name'], PATHINFO_EXTENSION);
		$temp_file 					= $_FILES['Filedata']['tmp_name'];
		$new_file_name 				= $timestamp.".".$file_extension;
		$target_path_with_filename	= str_replace('//','//', $target_path) . $new_file_name;

		move_uploaded_file($temp_file, $target_path_with_filename);
	
		/* 
		 
		$file_array is populated here and echoed back as the response
		Then, it's sent to the upload_model for processing (resizing, renaming, of images.) 
		 
		*/
		
		$file_array = array();
		$file_array['file_name']	= $new_file_name;
		$file_array['file_ext'] 	= $file_extension;
		$file_array['file_path']	= $target_path;
		$file_array['file_temp'] 	= $temp_file;
		
		/* 
		 
		Endcode the file array as json and echo as response.
		 
		*/
	
		$json_array = json_encode($file_array);
		echo $json_array;
	}

} else {
	
	echo "1";	

}

?>