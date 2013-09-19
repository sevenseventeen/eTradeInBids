<?php  include '_includes/head.php'; ?>

	<div id="main_container">

		<?php
			$main_navigation = "register";  
			include '_includes/header.php'; 
		?>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#i_agree_text").hide();
				$("#terms_of_use_scroll").scroll(function() {
					if($("#terms_of_use_scroll").scrollTop() >= $("#terms_of_use_scroll").prop('scrollHeight') - $("#terms_of_use_scroll").height() - 20) {
						$("#terms_of_use_checkbox").removeAttr('disabled');
						$("#i_agree_instructions").hide();
						$("#i_agree_text").fadeIn();
					}
				});
			});
		</script>
		
		<div class="module_960 rounded_corners drop_shadow registration">
			<h1>Register as a Seller</h1>
			
			<span class="ion_auth_error">
                <?php echo $this->ion_auth->errors(); ?>
            </span>
            
			<div class="form">
			
				<?php 
				
				$terms_of_use_data = array(
					'name' => 'terms_of_use', 
					'id' => 'terms_of_use_checkbox', 
					'value' => 'accept', 'checked'	=> FALSE, 
					'disabled'	=> 'disabled'
				);
				
				?>

				<?php echo form_open('auth/create_seller_account'); ?>
				
				<fieldset>
				
					<label>First Name</label>				
						<?php echo form_input('first_name', set_value('first_name')); ?>																							
						<?php echo form_error('first_name'); ?><br class="clear_float" />
					
					<label>Last Name</label>
						<?php echo form_input('last_name', set_value('last_name')); ?>																								
						<?php echo form_error('last_name'); ?><br class="clear_float" />
					
					<label>Email Address</label>
						<?php echo form_input('email', set_value('email')); ?>																										
						<?php echo form_error('email'); ?><br class="clear_float" />
					
					<!-- <label>Is this a business?</label>	<?php //echo form_checkbox('is_business', set_value('checked')); ?> Yes 																		
					<?php //echo form_error('is_business'); ?><br class="clear_float" /> -->
					<!-- <label>Business Name</label> 			<?php //echo form_input('business_name', set_value('business_name')); ?>																				
					<?php //echo form_error('business_name'); ?><br class="clear_float" /> -->
					<!-- <label>Title</label> 					<?php //echo form_input('title', set_value('title')); ?>																										
					<?php //echo form_error('title'); ?><br class="clear_float" /> -->
					
					<label>Street Address</label>
						<?php echo form_input('business_street_address', set_value('business_street_address')); ?>
						<?php echo form_error('business_street_address'); ?><br class="clear_float" />
					
					<label>City</label>
						<?php echo form_input('business_city', set_value('business_city')); ?>																				
						<?php echo form_error('business_city'); ?><br class="clear_float" />
					
					<label>State</label>
						<?php echo form_input('business_state', set_value('business_state')); ?>																		
						<?php echo form_error('business_state'); ?><br class="clear_float" />
					
					<label>Zip Code</label>
						<?php echo form_input('business_zip_code', set_value('business_zip_code')); ?>												
						<?php echo form_error('business_zip_code'); ?><br class="clear_float" />
					
					<!-- <label>Fax Number</label> 				<?php //echo form_input('fax_number', set_value('fax_number')); ?>																							
					<?php //echo form_error('fax_number'); ?><br class="clear_float" />-->
					
					<label>Telephone Number</label>
						<?php echo form_input('telephone_number', set_value('telephone_number')); ?>
						<?php echo form_error('telephone_number'); ?>
						<br class="clear_float" />

					<?php if ($this->config->item('brand') == "cutradeinbids") { ?>

						<label>Your Credit Union</label>
							<?php echo form_input('your_credit_union', set_value('your_credit_union')); ?>
							<?php echo form_error('your_credit_union'); ?>
							<br class="clear_float" />

						<label>Referred By</label>
							<?php echo form_input('referred_by', set_value('referred_by')); ?>
							<?php echo form_error('referred_by'); ?>
							<br class="clear_float" />

					<?php } ?>
					
					<label>Password</label>					
					<?php echo form_password('password', set_value('password')); ?>																								
					<?php echo form_error('password'); ?><br class="clear_float" />
					
					<label>Confirm Password</label>			
						<?php echo form_password('password_confirmation', set_value('password_confirmation')); ?>
						<?php echo form_error('password_confirmation'); ?><br class="clear_float" />
					
					<label>Terms of Service</label>				
	
					<div id="terms_of_use_scroll">
						<?php $this->load->view('_includes/terms_of_service_vehicle_owner_view')?>
					</div>
					
					<br class="clear_float" />
					
					<?php echo form_checkbox($terms_of_use_data);?> <span id="i_agree_text">I agree to the terms of this website.</span><span id="i_agree_instructions">(Scroll to the bottom of Terms to enable this checkbox.)</span><span class="terms_of_use_checkbox_error"><?php echo form_error('terms_of_use'); ?></span><br class="clear_float" />
					
				</fieldset>
				
				<?php 
					$submit_data = Array('type' => 'submit', 'name' => 'submit', 'type' => 'image', 'src' => base_url().'_images/button_sprite.png', 'value' => 'submit', 'alt' => 'Submit', 'class' => 'register_submit');
					echo form_submit($submit_data);
				?>
				
				<br class="clear_float" />
								
				<?php echo form_close(); ?>
			
			</div>
			
		</div>
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>