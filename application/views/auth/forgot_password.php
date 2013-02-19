<?php  $this->load->view('_includes/head.php'); ?>

	<div id="main_container">

		<?php
			$data['main_navigation'] = "";  
			$this->load->view('_includes/header.php', $data);
		?>
		
		<div class="module_960 rounded_corners drop_shadow light_gradient">
			<h1>Forgot Password</h1>
			<p>Please enter your <?php echo $identity_human;?> so we can send you an email to reset your password.</p>
			
			<?php $submit_data 	= Array('type' => 'submit', 'id' => 'submit_button', 'name' => 'submit', 'type' => 'image', 'src' => base_url().'_images/reset_password.png', 'value' => 'submit', 'alt' => 'Submit', 'class' => 'reset_password_submit'); ?>
				
				<?php echo form_open("auth/forgot_password");?>
				
				<label><?php echo $identity_human; ?></label> <?php echo form_input($identity, set_value($identity)); ?><?php echo form_error($identity); ?><br class="clear_float" />
				<?php echo form_submit($submit_data);?>
			      
			<?php echo form_close();?>
			<br class="clear_float" />
		</div>
		
	<?php  $this->load->view('_includes/footer_module.php'); ?>
	
	</div>
	
<?php  $this->load->view('_includes/footer.php'); ?>