<?php  include '_includes/head.php'; ?>

	<div id="main_container" class="buyers_account my_account">

		<?php
			$main_navigation = "my_account";
			$account_navigation = 'edit_my_account';
			include '_includes/header.php' 
		?>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#i_agree_text").hide();
				$("#terms_of_use_scroll").scroll(function() {
					if($("#terms_of_use_scroll").scrollTop() >= $("#terms_of_use_scroll").attr('scrollHeight') - $("#terms_of_use_scroll").height() - 20) {
						$("#terms_of_use_checkbox").removeAttr('disabled');
						$("#i_agree_instructions").hide();
						$("#i_agree_text").fadeIn();
					}
				});
			});
		</script>
		<?php include '_includes/buyers_account_navigation.php'; ?>
		<div class="module_960 drop_shadow rounded_corners light_gradient">
			<h1>Account Update Form</h1>
			<div class="form">
			
				
				<?php echo form_open('auth/update_buyer_password'); ?>
				
					<fieldset>
						<legend>Update Your Password</legend>
							<label>New Password</label>				<?php echo form_password('password',set_value('password')); ?>								<?php echo form_error('password'); ?><br class="clear_float" />
							<label>Confirm New Password</label>		<?php echo form_password('password_confirmation',set_value('password_confirmation')); ?>	<?php echo form_error('password_confirmation'); ?><br class="clear_float" />
																	<?php echo form_hidden('user_id', set_value('user_id', $buyers_account_data[0]->user_id)); ?>																				
							<br class="clear_float" />
					</fieldset>
					
					<?php 
						$submit_data = Array('type' => 'submit', 'name' => 'submit', 'type' => 'image', 'src' => base_url().'_images/button_sprite2.png', 'value' => 'submit', 'alt' => 'Submit', 'class' => 'password_submit');
						echo form_submit($submit_data);
					?>
					
					<br class="clear_float" />
				
				<?php echo form_close(); ?>
			
			</div>
	
		
			
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>