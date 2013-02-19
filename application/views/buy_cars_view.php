<?php  include '_includes/head.php'; ?>

	<div id="main_container">
		
		<?php
			$main_navigation = "my_account";  
			include '_includes/header.php';
		?>
		
		<div class="module_960">
			<h1 class="title_module">Buy Cars</h1>
		</div>
		
		<div class="module_560">
			<p>The Auctions have fewer inventories and there seems to be more buyers than ever.  Face it quality used cars are difficult to find these days.  We are all looking for an edge or a new source for cars.  It’s here; access to repossessions, personal trade-ins and lease returns has never been easier.  With our relationships with financial institutions across the country, our consumer facing web presence as well as links to multiple ecommerce sites we have hundreds of links to access used car opportunities.  If you qualify as an eTradeInBids wholesaler/ dealer we will notify you real-time whenever there is a car available for bid in your area.  View the details and put a number on it, it’s that easy.  If your bid is the highest we will notify the seller and you immediately by exchanging contact information for you to finalize the details.   There will be small fee per transaction only if your bid is accepted by the seller.</p>
			<p>Accepting dealer applications now, start here! <span class="error">(Place the dealer app button here)</span></p>
		</div>
		
		<div class="module_400">
			<?php if (!$this->ion_auth->logged_in()) { ?>
			
				<h1>Please Login</h1>
			
				<?php echo form_open('auth/login'); ?>
			
				<p>Email Address</p>
				<?php echo form_input('email', 'seller@seven-seventeen.com'); ?>
			
				<p>Password</p>
				<?php echo form_password('password', '0swell'); ?>
			
				<?php echo form_submit("submit", "Login"); ?>
			
				<?php echo form_close(); ?>
			
				<p>	
					Or, <?php echo anchor('site/register', 'Register'); ?><br />
				</p>
			
			<?php } else { ?>
			
				<a class="button" href="my_account">View My Account</a>
			
			<?php } ?>
		</div>
		
		<br class="clear_float" />
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
