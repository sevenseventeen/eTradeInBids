	<div class="module_960 drop_shadow rounded_corners dark_gradient" id="footer_module">
		<div id="links">
        	<ul>
            	<li><h4>Sell Your Vehicle</h4></li>
                <li><a href="<?php echo base_url(); ?>site/register_seller">Register</a></li>
                <li><a href="<?php echo base_url(); ?>site/login">Seller Login</a></li>
            </ul>
        	<ul>
            	<li><h4>Authorized Dealer</h4></li>
                <li><a href="<?php echo base_url(); ?>site/register_buyer">Register Dealership</a></li>
                <li><a href="<?php echo base_url(); ?>site/login">Dealer Login</a></li>
            </ul>
        	<ul>
            	<li><h4>Information</h4></li>
                <li><a href="<?php echo base_url(); ?>site/about_us">About Us</a></li>
                <li><a href="<?php echo base_url(); ?>site/frequently_asked_questions">Frequently Asked Questions</a></li>
                <li><a href="<?php echo base_url(); ?>site/contact_us">Contact Us</a></li>
            </ul>
        	<ul>
            	<li><h4>Legal</h4></li>
                <li><a href="<?php echo base_url(); ?>site/privacy_policy">Privacy Policy</a></li>
                <li><a href="<?php echo base_url(); ?>site/vehicle_owner_representations_and_disclosures">Vehicle Owner Disclosures</a></li>
                <li><a href="<?php echo base_url(); ?>site/terms_of_service">Terms - Vehicle Owner</a></li>
                <?php 
					if ($this->ion_auth->logged_in() && $this->session->userdata('account_type') == 'buyer') {
						echo "<li><a href=".base_url()."site/terms_of_service> | Terms of Service</a></li>";
					}
				?>
            </ul>
        </div>
        <div id="social">
        	<h4>Connect With Us</h4>
        	<!-- <a href="#" class="google_plus">eTradeInBids Google Plus</a> -->
        	<a href="http://www.twitter.com/etradeinbids" target="_blank" class="twitter">eTradeInBids Twitter</a>
        	<a href="http://www.facebook.com/pages/ETradeInBids/213253855475017" target="blank" class="facebook">eTradeInBids Facebook</a>
        </div>
        <br class="clear_float" />
	</div>
    <div id="copyright">
        <p>&copy; Copyright 2011-2013 eTradeInBids, LLC. - All Rights Reserved - 1-888-541-5576</p>
        <p><?php //echo $_SERVER['SERVER_ADDR']; ?></p>
    </div>