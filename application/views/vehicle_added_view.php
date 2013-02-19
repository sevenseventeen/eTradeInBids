<?php  include '_includes/head.php' ?>

	<div id="main_container">

		<?php
			$main_navigation = "my_account";  
			include '_includes/header.php' 
		?>
		
		<script type="text/javascript" src="<?php echo base_url().'_javascript/swfobject.js'; ?>"></script>
		<script type="text/javascript">
		
			$(document).ready(function(){

		    	$("#im_done").hide();
				$("#no_flash").hide();

	    		if(!swfobject.hasFlashPlayerVersion("9.0.115")) {
	        		$("#no_flash").show();  
	    		}
		
			});
							
		</script>

		<?php foreach ($result as $row) { ?>
		
		<div class="module_960 rounded_corners drop_shadow uploaded_vehicle">
			<img alt="vehicle_image" src="<?php echo base_url()."_thumbnails/".$row->main_image_path; ?>" />
			<h2>Success! Your <?php echo $row->year.' '.$row->make.' '.$row->model ?> has been uploaded.</h2>
			<h1>Next, Upload Additional Photos</h1>
			<p>Uploading additional photos leads to higher bids.</p>
			<p>Important - each image must be less than 4MB. You can resize your images using an image processing program like Google Picassa</p>
			
			
			<div id="uploadify_form">
				<div id="no_flash">Please <a href="http://get.adobe.com/flashplayer/" target="_blank">update your Flash Player</a> to upload multiple photos.</div>
				<input id="file_upload" name="file_upload" type="file" />
				<a id="skip_this" href="<?php echo base_url(); ?>site/my_account/">Skip This</a>
				<a id="im_done" href="<?php echo base_url(); ?>site/my_account/">I'm Done</a>
			</div>
			<br class="clear_float" />
		</div>
		
		<?php } ?>
			
	<?php  include '_includes/footer_module.php' ?>
	
	</div>

<?php  include '_includes/footer.php' ?>