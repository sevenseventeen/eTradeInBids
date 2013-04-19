<?php 
	if ($this->config->item('test_mode') == TRUE) { 
		echo '<div id="test_mode"><p class="error">Test Mode</p></div>'; 
	} 
?>

<div id="header" class="module_960 drop_shadow rounded_corners dark_gradient">
	<?php if ($this->config->item('brand') == "cutradeinbids") { ?>
		<a href="<?php echo base_url(); ?>site/"><img alt="etradeinbids_logo" src="<?php echo base_url(); ?>_images/cutradeinbids_logo.png" /></a>
	<?php } else { ?>
		<a href="<?php echo base_url(); ?>site/"><img alt="etradeinbids_logo" src="<?php echo base_url(); ?>_images/etradeinbids_logo_2.0.png" /></a>
	<?php } ?>

	<?php if (!$this->ion_auth->logged_in()) { ?>
		<form id="header_login" method="post" action="<?php echo base_url(); ?>auth/login">
		<input class="rounded_corners inner_shadow toggle_input_value" type="text" value="Email" name="email" />
		<input class="rounded_corners inner_shadow" id="password_text" type="text" value="Password" />
		<input class="rounded_corners inner_shadow" id="password_password" type="password" value="" name="password" />
		<input class="rounded_corners drop_shadow light_gradient" type="submit" value="Login" name="submit" />
		<a href="<?php echo base_url(); ?>auth/forgot_password" >Forgot Password</a>
		</form>
	<?php } else { ?>
		<form id="header_login" method="post" action="<?php echo base_url(); ?>auth/logout">
		<input class="rounded_corners drop_shadow light_gradient" type="submit" value="Logout" name="submit" />
		</form>
	<?php } ?>
		
</div>

<div id="main_navigation_left" class="drop_shadow rounded_corners light_gradient">
	<!-- <a id="home"  				<?php if ($main_navigation == 'home') 			{	echo 'class="main_navigation_item first current_page"'; }   else { echo 'class="main_navigation_item first"'; } ?> href="<?php echo base_url(); ?>site/">Home</a> -->
	<a id="how_does_this_work" 	<?php if ($main_navigation == 'how_this_works') {	echo 'class="main_navigation_item first current_page"'; }         else { echo 'class="main_navigation_item first"'; } ?> 	   href="<?php echo base_url(); ?>site/how_this_works">How This Works</a>
	<a id="faq"		 			<?php if ($main_navigation == 'frequently_asked_questions') 		{	echo 'class="main_navigation_item current_page"'; } 		else { echo 'class="main_navigation_item"'; } ?>       href="<?php echo base_url(); ?>site/frequently_asked_questions">FAQ</a>
	<a id="about_us" 			<?php if ($main_navigation == 'about_us') 		{	echo 'class="main_navigation_item current_page"'; } 		else { echo 'class="main_navigation_item"'; } ?>       href="<?php echo base_url(); ?>site/about_us">About Us</a>
	<a id="sell_cars" 			<?php if ($main_navigation == 'sell_cars') 		{	echo 'class="main_navigation_item current_page"'; } 		else { echo 'class="main_navigation_item"'; } ?>       href="<?php echo base_url(); ?>site/sell_cars">Post a Car</a>
	<a id="dealers" 			<?php if ($main_navigation == 'dealers') 		{	echo 'class="main_navigation_item last current_page"'; } 	else { echo 'class="main_navigation_item last"'; } ?>  href="<?php echo base_url(); ?>site/dealers">Dealers</a>
	<br class="clear_float" />
	
</div>

<div id="main_navigation_right" class="drop_shadow rounded_corners light_gradient">
	
        <?php if (!$this->ion_auth->logged_in()) { ?>
		    <a id="register"  <?php if ($main_navigation == 'register')        {   echo 'class="main_navigation_item first last current_page"'; } else { echo 'class="main_navigation_item first last"'; } ?>  href="<?php echo base_url(); ?>site/register">Register</a>
        <?php } else if ($main_navigation != 'register_credit_card') { ?>
		    <a id="my_account"  <?php if ($main_navigation == 'my_account')    {   echo 'class="main_navigation_item first last current_page"'; } else { echo 'class="main_navigation_item first last"'; } ?>  href="<?php echo base_url(); ?>site/my_account">My Account</a>
		<?php } ?>    
			
</div>

<br class="clear_float" />