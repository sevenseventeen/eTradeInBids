<?php  include '_includes/head.php'; ?>

	<div id="main_container">
		
		<?php
			$main_navigation = "home";  
			include '_includes/header.php';

			//echo $this->$config['server_name'];
		?>
		
		<div class="module_960 drop_shadow rounded_corners light_gradient width_480">
			<a href="<?php echo base_url(); ?>site/register_seller"><img src="<?php echo base_url().'_images/home_page_main_image.jpg'; ?>" /></a>
			<div id="steps">
				<div class="step first">
					<img src="<?php echo base_url().'_images/step1.jpg'; ?>">
					<h3>Step 1 Test</h3>
					<p>Upload an image of your car as well as some basic details.</p>
				</div>
				<div class="step">
					<img src="<?php echo base_url().'_images/step2.jpg'; ?>">
					<h3>Step 2</h3>
					<p>Start receiving bids on your car and choose to accept the highest offer.</p>
				</div>
				<div class="step">
					<img src="<?php echo base_url().'_images/step3.jpg'; ?>">
					<h3>Step 3</h3>
					<p>Choose a date and place for your car to be picked up and receive the payment.</p>
				</div>
			</div>
			<br class="clear_float" />
			<a href="<?php echo base_url(); ?>site/register_seller"><img id="get_started_button" src="<?php echo base_url().'_images/get_started_creative_intellects.png'; ?>"></a>
			<!-- <h1>Why you should use eTradeInBids</h1>
			<div class="right_image">
				<img alt="bidding_on_vehicles" src="<?php echo base_url().'_images/bid_for_vehicle.jpg'; ?>" />
			</div>
			<p>In 2007 over 16.5 million new cars were delivered in the United States alone. In 2008 that number dropped below 10 million. Consider the magnitude of 6.5 million less autos delivered from one year to the next. As the industry is slowly recovering, the demand for quality used cars is sky-rocketing. Auto dealers and wholesalers alike are desperately looking for more used vehicles for their inventories; they need them quick and are willing to pay top dollar and handle all shipping costs. This site is designed to link those buyers to individual and commercial (i.e., financial institutions and owners of a fleet of vehicles) to receive real-time top dollars for your previously owned car. Sure you can research your next new car on-line and find a fantastic new car, but what about your trade? There are national dealer groups touting “we want your car”, and they do. But how do you know you are getting a good deal. You can go on-line and obtain all sorts of information about the supposed value of your car, but will any of those websites actually buy the car for that value?  Moreover, will you benefit from what could be local demand for a particular model that could dramatically increase the price of your vehicle and for which you may otherwise be oblivious to its existence?</p>
			<p>At eTradeInBids.com our registered and licensed dealers will buy your car. Not just one, but multiple dealers will review your vehicle and present you with actual bids to purchase your car.  You then choose which bid you want to accept (or don't accept any, your choice, no obligation.) The best news for you is that they will compete against each other and pay top dollar because they ALL want your car! Fast!</p> 
			<br class="clear_float" />-->
		</div>
		
	<?php  include '_includes/footer_module.php'; ?>
	
	</div>

<?php  include '_includes/footer.php'; ?>
