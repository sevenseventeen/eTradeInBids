<?php  include '_includes/head.php' ?>

	<div id="main_container">

		<?php
			$main_navigation = "";  
			include '_includes/header.php' 
		?>
		
		<div class="module_960 rounded_corners drop_shadow light_gradient">
			<?php 
			
			if($status_message != "") {
				echo $status_message;
			} else { 
			
			?>
				<h1>Contact Us</h1>
				<form action="<?php echo base_url(); ?>site/send_mail" method="post">
					<label>Your Name</label>	<input type="text" name="name" value="<?php echo set_value('name', ''); ?>" />	<?php echo form_error('name'); ?>				<br class="clear_float" />
					<label>Your Email</label>	<input type="text" name="email" value="<?php echo set_value('email', ''); ?>" /><?php echo form_error('email'); ?>			<br class="clear_float" />
					<label>Your Message</label>	<textarea name="message"><?php echo set_value('message', ''); ?></textarea>		<?php echo form_error('message'); ?>	<br class="clear_float" />
					<input type="image" name="submit" value="submit" id="submit_button" class="mail_submit"  src="<?php echo base_url().'_images/submit.png'; ?>" alt="Submit" /><br class="clear_float" />
				</form>
			
			<?php } ?>
			
		</div>
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>
	
<?php  include '_includes/footer.php' ?>