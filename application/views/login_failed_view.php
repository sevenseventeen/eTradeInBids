<?php  include '_includes/head.php'; ?>

	<div id="main_container" class="login_failed">

		<?php
			$main_navigation = "";  
			include '_includes/header.php'; 
		?>
		
		<div class="module_960 rounded_corners drop_shadow">
			
			<?php if (!$this->ion_auth->logged_in()) { ?>
			
				<h1>Login Failed</h1>
				<p>Sorry, that email/password combination was not recognized - please try again. If you forgot your password, please <a href="<?php echo base_url(); ?>auth/forgot_password" >click here.</a></p>
			
				<?php echo form_open('auth/login'); ?>
			
				<label>Email Address</label>	<?php echo form_input('email', set_value('email')); ?>				<?php echo form_error('email'); ?>				<br class="clear_float" />
				<label>Password</label>			<?php echo form_password('password', set_value('password')); ?>		<?php echo form_error('password'); ?>	<br class="clear_float" />
			
				<?php 
					$submit_data = Array('type' => 'submit', 'name' => 'submit', 'type' => 'image', 'src' => base_url().'_images/login_button.png', 'value' => 'submit', 'alt' => 'Submit', 'class' => 'login_submit');
					echo form_submit($submit_data);
				?>
			
				<?php echo form_close(); ?>
			
				<p class="or_register">Or, <?php echo anchor('site/register', 'Register'); ?></p>
				<br class="clear_float" />
			
			<?php } else { ?>
			
				<h1>You are already logged in.</h1>
			
			<?php } ?>
			
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
