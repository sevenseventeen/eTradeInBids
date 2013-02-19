<div>
	
	<div>
		<h1>Purchase Order Agreement</h1>
	
		<p>This automatically generated purchase order is a binding document and is considered signed and accepted for the both parties without signatures.</p>  		
		<p>All vehicles are sold "As-Is", as described and the seller makes no guaranty in any manner whatsoever. Some exclusions may apply, see the on-line terms of use, most notably if the vehicle is if the vehicle is not as described in the vehicle description.</p>
		<p>It is understood and agreed that the title of ownership of the above described vehicle(s) does not pass to the buyer until the final payment is confirmed. Payment due within a minimum of 5 days provided the seller holds the title.</p>
	
		<p>
			<strong><u>Vehicle Details</u></strong><br />
			<?php
				echo $vehicle_details[0]->year.' '.$vehicle_details[0]->make.' '.$vehicle_details[0]->model.'<br />';
				echo "VIN: ".$vehicle_details[0]->vin.'<br />'; 
				echo $vehicle_details[0]->vehicle_location_street.'<br />'; 
				echo $vehicle_details[0]->vehicle_location_city.', '.$vehicle_details[0]->vehicle_location_state.' '.$vehicle_details[0]->vehicle_location_zip.'<br />';
				echo "Purchase price: $".number_format($bid_details[0]->bid_amount);
			?>
		</p>
		
		<p>
			<strong><u>Buyer Details</u></strong><br />
			<?php
				$buyer_email = $buyer_details[0]->email;
				echo $buyer_details[0]->first_name.' '.$buyer_details[0]->last_name.'<br />'; ; 
				echo $buyer_details[0]->dealer_name.'<br />'; 
				echo $buyer_details[0]->business_street_address.'<br />'; 
				echo $buyer_details[0]->business_city.', '.$buyer_details[0]->business_state.' '.$buyer_details[0]->business_zip_code.'<br />';
				echo $buyer_details[0]->business_telephone_number.'<br />';
				echo "<a href='mailto:$buyer_email'>$buyer_email</a><br />";
			?>
		</p>
		
		<p>
			<strong><u>Seller Details</u></strong><br />
			<?php
				$seller_email = $seller_details[0]->email;
				echo $seller_details[0]->first_name.' '.$seller_details[0]->last_name.'<br />'; ; 
				echo $seller_details[0]->business_name.'<br />'; 
				echo $seller_details[0]->business_street_address.'<br />'; 
				echo $seller_details[0]->business_city.', '.$seller_details[0]->business_state.' '.$seller_details[0]->business_zip_code.'<br />';
				echo $seller_details[0]->telephone_number.'<br />';
				echo "<a href='mailto:$seller_email'>$seller_email</a><br />";
			?>
		</p>
		
	</div>
	
</div>
	
