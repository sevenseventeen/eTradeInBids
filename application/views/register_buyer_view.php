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
					if($("#terms_of_use_scroll").scrollTop() >= $("#terms_of_use_scroll").attr('scrollHeight') - $("#terms_of_use_scroll").height() - 20) {
						$("#terms_of_use_checkbox").removeAttr('disabled');
						$("#i_agree_instructions").hide();
						$("#i_agree_text").fadeIn();
					}
				});
			});
		</script>
		
		<div class="module_960 drop_shadow rounded_corners light_gradient">
			<h1>Register as a Buyer</h1>
			<span class="ion_auth_error">
                <?php echo $this->ion_auth->errors(); ?>
            </span>
			<div class="form">
			
				<?php 
				
				$terms_of_use_data = array('name' => 'terms_of_use', 'id' => 'terms_of_use_checkbox', 'value' => 'accept', 'checked'	=> FALSE, 'disabled'	=> 'disabled');
				$payment_type_options = array('' => 'Select Payment Type', 'Visa' => 'Visa', 'Mastercard' => 'Mastercard', 'American Express' => 'American Express', 'Discover' => 'Discover');
				$card_expiration_month_options 	= array('' => 'Month', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12'); 
    			$card_expiration_year_options 	= array('' => 'Year', '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021', '2022' => '2022', '2023' => '2023', '2024' => '2024', '2025' => '2025');
				
				?>
					
				<?php //echo validation_errors(); ?>
				
				
				<?php echo form_open('auth/create_buyer_account'); ?>
				
				<fieldset>
				
					<label>First Name</label>									<?php echo form_input('first_name', set_value('first_name')); ?>																																												<?php echo form_error('first_name'); ?><br class="clear_float" />
					<label>Last Name</label>									<?php echo form_input('last_name', set_value('last_name')); ?>																																														<?php echo form_error('last_name'); ?><br class="clear_float" />
					<label>Email Address</label>								<?php echo form_input('email', set_value('email')); ?>																																																<?php echo form_error('email'); ?><br class="clear_float" />
					<label>Dealer Name</label>									<?php echo form_input('dealer_name', set_value('dealer_name')); ?>																																										<?php echo form_error('dealer_name'); ?><br class="clear_float" />	
					<label>Title</label>										<?php echo form_input('title', set_value('title')); ?>																																																						<?php echo form_error('title'); ?><br class="clear_float" />
					<label>Business Street Address</label>						<?php echo form_input('business_street_address', set_value('business_street_address')); ?>																		<?php echo form_error('business_street_address'); ?><br class="clear_float" />
					<label>Business City</label>								<?php echo form_input('business_city', set_value('business_city')); ?>																																						<?php echo form_error('business_city'); ?><br class="clear_float" />
					<label>Business State</label>								<?php echo form_input('business_state', set_value('business_state')); ?>																																				<?php echo form_error('business_state'); ?><br class="clear_float" />
					<label>Business Zip Code</label>							<?php echo form_input('business_zip_code', set_value('business_zip_code')); ?>																														<?php echo form_error('business_zip_code'); ?><br class="clear_float" />
					<label>License Number</label>								<?php echo form_input('license_number', set_value('license_number')); ?>																																				<?php echo form_error('license_number'); ?><br class="clear_float" />	
					<label>Insurance Co. Name</label>							<?php echo form_input('insurance_company_name', set_value('insurance_company_name')); ?>																				<?php echo form_error('insurance_company_name'); ?><br class="clear_float" />	
					<label>Insurance Co. Contact Name</label>					<?php echo form_input('insurance_company_contact_name', set_value('insurance_company_contact_name')); ?> 			<?php echo form_error('insurance_company_contact_name'); ?><br class="clear_float" />
					<label>Insurance Co. Contact Phone</label>					<?php echo form_input('insurance_company_contact_phone', set_value('insurance_company_contact_phone')); ?>		<?php echo form_error('insurance_company_contact_phone'); ?><br class="clear_float" />
					<label>Policy Number</label>								<?php echo form_input('insurance_policy_number', set_value('insurance_policy_number')); ?>						<?php echo form_error('insurance_policy_number'); ?><br class="clear_float" />
					<label>Bank Name</label>									<?php echo form_input('bank_name', set_value('bank_name')); ?>																																														<?php echo form_error('bank_name'); ?><br class="clear_float" />	
					<label>Bank Contact Name</label>							<?php echo form_input('bank_contact_name', set_value('bank_contact_name')); ?> 									<?php echo form_error('bank_contact_name'); ?><br class="clear_float" />
					<label>Bank Contact Phone</label>							<?php echo form_input('bank_contact_phone', set_value('bank_contact_phone')); ?>							    <?php echo form_error('bank_contact_phone'); ?><br class="clear_float" />
					<label>Work Telephone Number</label>						<?php echo form_input('business_telephone_number', set_value('business_telephone_number')); ?>														<?php echo form_error('business_telephone_number'); ?><br class="clear_float" />
					<!--<label>Payment Type</label>									<?php echo form_dropdown('payment_type', $payment_type_options) ?>																				<?php echo form_error('payment_type'); ?><br class="clear_float" />
					<label>Card Number</label>									<?php echo form_input('card_number', set_value('card_number')); ?>																					<?php echo form_error('card_number'); ?><br class="clear_float" />
					<label>CVV/CID</label>										<?php echo form_input('cvv', set_value('cvv')); ?>																									<?php echo form_error('cvv'); ?><br class="clear_float" />
					<label>Card Expiration</label>								<?php 		
																					echo form_dropdown('card_expiration_month', $card_expiration_month_options, set_value('card_expiration_month'), 'class="registration_expiration"'); 
																					echo form_dropdown('card_expiration_year', $card_expiration_year_options,  set_value('card_expiration_year'), 'class="registration_expiration"'); 
																				?>
																				<?php echo form_error('card_expiration_month'); ?>
																				<?php echo form_error('card_expiration_year'); ?>-->
					
					
					<label>Password</label>										<?php echo form_password('password', set_value('password')); ?>																																													<?php echo form_error('password'); ?><br class="clear_float" />
					<label>Confirm Password</label>								<?php echo form_password('password_confirmation', set_value('password_confirmation')); ?>																			<?php echo form_error('password_confirmation'); ?><br class="clear_float" />		
					<label>Terms of Service</label>
					
					<div id="terms_of_use_scroll">
						<?php $this->load->view('_includes/terms_of_service_dealer_view'); ?>
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