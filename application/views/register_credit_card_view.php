<?php  include '_includes/head.php'; ?>

	<div id="main_container">

		<?php
			$main_navigation = "register_credit_card";  
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
			<h1>Register Credit Card</h1>
			<p class="sub_heading">Your user account has been created. However, a valid credit card is required to activate your account. Your card will only be charged when a seller accepts your bid and your information will be transmitted and stored securely. If you have any questions, please <a href="<?php echo base_url(); ?>site/contact_us">contact us</a></p>
			
			<div class="form">
			
				<?php 
				
				$terms_of_use_data = array('name' => 'terms_of_use', 'id' => 'terms_of_use_checkbox', 'value' => 'accept', 'checked'	=> FALSE, 'disabled'	=> 'disabled');
				$payment_type_options = array('' => 'Select Payment Type', 'Visa' => 'Visa', 'Mastercard' => 'Mastercard', 'American Express' => 'American Express', 'Discover' => 'Discover');
				$card_expiration_month_options 	= array('' => 'Month', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12'); 
    			$card_expiration_year_options 	= array('' => 'Year', '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021', '2022' => '2022', '2023' => '2023', '2024' => '2024', '2025' => '2025');
				//$email = urldecode($email);
				
				?>
					
				<?php //echo validation_errors(); ?>
				<?php echo $this->ion_auth->errors(); ?>
				
				<?php echo form_open('auth/register_credit_card'); ?>
				
				<fieldset>
				
					<label>Payment Type</label>						<?php echo form_dropdown('payment_type', $payment_type_options) ?>		<?php echo form_error('payment_type'); ?><br class="clear_float" />																																							
					<label>Card Number</label>						<?php echo form_input('card_number', set_value('card_number')); ?>		<?php echo form_error('card_number'); ?><br class="clear_float" />																																						
					<label>CVV/CID</label>							<?php echo form_input('cvv', set_value('cvv')); ?>						<?php echo form_error('cvv'); ?><br class="clear_float" />																																																				
					<label>Card Expiration</label>					<?php 		
																		echo form_dropdown('card_expiration_month', $card_expiration_month_options, set_value('card_expiration_month'), 'class="registration_expiration"'); 
																		echo form_dropdown('card_expiration_year', $card_expiration_year_options,  set_value('card_expiration_year'), 'class="registration_expiration"'); 
																	?>
																	<?php echo form_error('card_expiration_month'); ?>
																	<?php echo form_error('card_expiration_year'); ?>
																	<?php //echo form_hidden('id', set_value('id', $id)); ?>
																	<?php echo form_hidden('email', set_value('email', $email)); ?>
					<br class="clear_float" />
				
				</fieldset>
				
				<?php 
					$submit_data = Array('type' => 'submit', 'name' => 'submit', 'type' => 'image', 'src' => base_url().'_images/button_sprite.png', 'value' => 'submit', 'alt' => 'Submit', 'class' => 'register_submit');
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