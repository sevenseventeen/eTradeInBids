<?php  include '_includes/head.php'; ?>

	<?php 
		//echo $css;
		//echo $src;
	?>

	<div id="main_container">
		
		<?php
			$main_navigation = "home";  
			include '_includes/header.php';
		?>
		
		<div class="module_960">
			<h1 class="title_module">UPLOAD TEST VIEW</h1>
		</div>
		
		<div class="module_560">
			<h1>Test Upload</h1>
			<input id="file_upload" name="file_upload" type="file" />
			<a href="javascript:$('#file_upload').uploadifyUpload();">Upload Files</a>
		</div>
		
		<div id="fileinfotarget"></div>
		
		<div class="module_400">
			
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
