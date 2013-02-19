<?php  include '_includes/head.php'; ?>

	<div id="main_container" class="sellers_account my_account">

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
		<?php include '_includes/sellers_account_navigation.php'; ?>
		<div class="module_960 drop_shadow rounded_corners light_gradient">
			<h1>Account Update Form</h1>
			<div class="form">
			
				
				<?php echo form_open('auth/update_seller_password'); ?>
				
					<fieldset>
						<legend>Update Your Password</legend>
							<label>New Password</label>				<?php echo form_password('password',set_value('password')); ?>								<?php echo form_error('password'); ?><br class="clear_float" />
							<label>Confirm New Password</label>		<?php echo form_password('password_confirmation',set_value('password_confirmation')); ?>	<?php echo form_error('password_confirmation'); ?><br class="clear_float" />
																	<?php echo form_hidden('user_id', set_value('user_id', $sellers_account_data[0]->user_id)); ?>																				
							<br class="clear_float" />
					</fieldset>
					
					<?php 
						$submit_data = Array('type' => 'submit', 'name' => 'submit', 'type' => 'image', 'src' => base_url().'_images/button_sprite2.png', 'value' => 'submit', 'alt' => 'Submit', 'class' => 'password_submit');
						echo form_submit($submit_data);
					?>
					
					<br class="clear_float" />
				
				<?php echo form_close(); ?>
			
			</div>
	
			<div class="form">
			
				<?php 
				
				$terms_of_use_data = array('name' => 'terms_of_use', 'id' => 'terms_of_use_checkbox', 'value' => 'accept', 'checked'	=> FALSE, 'disabled'	=> 'disabled');
				$payment_type_options = array('' => 'Select Payment Type', 'Visa' => 'Visa', 'Mastercard' => 'Mastercard', 'American Express' => 'American Express', 'Discover' => 'Discover');
				$card_expiration_month_options 	= array('' => 'Month', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12'); 
    			$card_expiration_year_options 	= array('' => 'Year', '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021', '2022' => '2022', '2023' => '2023', '2024' => '2024', '2025' => '2025');
				
				?>
					
				<?php //echo validation_errors(); ?>
				<?php echo $this->ion_auth->errors(); ?>
				
				<?php echo form_open('auth/update_seller_account'); ?>
				
				<fieldset>
					
					<legend>Update Account Information</legend>
				
					<label>First Name</label>									<?php echo form_input('first_name', set_value('first_name', $sellers_account_data[0]->first_name)); ?>																		<?php echo form_error('first_name'); ?><br class="clear_float" />
					<label>Last Name</label>									<?php echo form_input('last_name', set_value('last_name',$sellers_account_data[0]->last_name)); ?>																			<?php echo form_error('last_name'); ?><br class="clear_float" />
					<label>Email Address/Login</label>							<?php echo form_input('email', set_value('email',$sellers_account_data[0]->email)); ?>																						<?php echo form_error('email'); ?><br class="clear_float" />
					<label>Business Name</label>								<?php echo form_input('business_name', set_value('business_name' , $sellers_account_data[0]->business_name)); ?>																	<?php echo form_error('dealer_name'); ?><br class="clear_float" />	
					<label>Title</label>										<?php echo form_input('title', set_value('title', $sellers_account_data[0]->title)); ?>																						<?php echo form_error('title'); ?><br class="clear_float" />
					<label>Business Street Address</label>						<?php echo form_input('business_street_address', set_value('business_street_address', $sellers_account_data[0]->business_street_address)); ?>								<?php echo form_error('business_street_address'); ?><br class="clear_float" />
					<label>Business City</label>								<?php echo form_input('business_city', set_value('business_city' , $sellers_account_data[0]->business_city)); ?>																<?php echo form_error('business_city'); ?><br class="clear_float" />
					<label>Business State</label>								<?php echo form_input('business_state', set_value('business_state', $sellers_account_data[0]->business_state)); ?>															<?php echo form_error('business_state'); ?><br class="clear_float" />
					<label>Business Zip Code</label>							<?php echo form_input('business_zip_code', set_value('business_zip_code' ,$sellers_account_data[0]->business_zip_code)); ?>													<?php echo form_error('business_zip_code'); ?><br class="clear_float" />
					<label>Fax Number</label>									<?php echo form_input('fax_number', set_value('fax_number', $sellers_account_data[0]->fax_number)); ?>												<?php echo form_error('bank_contact_phone'); ?><br class="clear_float" />
					<label>Telephone Number</label>								<?php echo form_input('telephone_number', set_value('telephone_number',$sellers_account_data[0]->telephone_number)); ?>							<?php echo form_error('business_telephone_number'); ?><br class="clear_float" />
																				<?php echo form_hidden('user_id', set_value('user_id', $sellers_account_data[0]->user_id)); ?>	
					
					<br class="clear_float" />
					
				</fieldset>
				
				<?php 
					$submit_data = Array('type' => 'submit', 'name' => 'submit', 'type' => 'image', 'src' => base_url().'_images/button_sprite2.png', 'value' => 'submit', 'alt' => 'Submit', 'class' => 'update_submit');
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