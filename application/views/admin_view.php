<?php  include '_includes/head.php' ?>

	<div id="main_container">
	    
	    <!-- Testing Git -->

		<?php
			$main_navigation = "";  
			include '_includes/header.php' 
		?>
		
		<div class="module_960 rounded_corners drop_shadow light_gradient">
			
			<h1>Buyers Awaiting Approval</h1>
			
			<table class="admin">
				<tr>
					<td>Name</td>
					<td>Dealer Name</td>
					<td>Telephone</td>
					<td>E-Mail</td>
					<td>Credit Card</td>
					<td>Approve</td>
					<td>Decline</td>
				</tr>
				
				
				
				<?php foreach ($pending_buyer_accounts as $pending_buyer_account) { ?>
				
					<tr>
						<td><a href="<?php echo base_url(); ?>admin/buyer_details/<?php echo $pending_buyer_account->user_id; ?>"><?php echo $pending_buyer_account->first_name." ".$pending_buyer_account->last_name; ?></a></td>
						<td><?php echo $pending_buyer_account->dealer_name; ?></td>
						<td><?php echo $pending_buyer_account->business_telephone_number; ?></td>
						<td><?php echo "<a href='mailto:$pending_buyer_account->email'>Email</a>"; ?></td>
						<td><?php echo ucfirst($pending_buyer_account->credit_card_validation); ?></td>
						<td><a href="<?php echo base_url(); ?>admin/approve_account/<?php echo $pending_buyer_account->user_id; ?>">Approve</a></td>
						<td><a href="<?php echo base_url(); ?>admin/decline_account/<?php echo $pending_buyer_account->user_id; ?>">Decline</a></td>
					</tr>	
				
				<?php } ?>
				
			</table>
			
		</div>
		
		<div class="module_960 rounded_corners drop_shadow light_gradient">
            
            <h1>All Vehicles</h1>
            
            <table class="admin">
                <tr>
                    <td>Year</td>
                    <td>Make</td>
                    <td>Model</td>
                    <td>Seller</td>
                    <td>Listing Status</td>
                    <td>Bid Status</td>
                    <td>Vehicle Details</td>
                </tr>
                
                <?php foreach ($all_vehicles_and_related_data as $vehicle_and_data) { ?>
                
                    <tr>
                        <td><?php echo $vehicle_and_data->year; ?></td>
                        <td><?php echo $vehicle_and_data->make; ?></td>
                        <td><?php echo $vehicle_and_data->model; ?></td>
                        <td><a href="<?php echo base_url(); ?>admin/seller_details/<?php echo $vehicle_and_data->user_id; ?>"><?php echo $vehicle_and_data->first_name." ".$vehicle_and_data->last_name  ?></a></td>
                        <td><?php echo $vehicle_and_data->listing_status  ?></td>
                        <td><?php echo $vehicle_and_data->bid_status  ?></td>
                        <td><a href="<?php echo base_url(); ?>admin/vehicle_details/<?php echo $vehicle_and_data->vehicle_id; ?>">View Details</a></td>
                    </tr>   
                
                <?php } ?>
                
            </table>
            
        </div>
		
		<div class="module_960 rounded_corners drop_shadow light_gradient">
			
			<h1>All Buyer Accounts</h1>
			
			<table class="admin">
				<tr>
					<td>Name</td>
					<td>Dealer Name</td>
					<td>Telephone</td>
					<td>E-Mail</td>
					<td>Credit Card</td>
					<td>Account Status</td>
					<td>Approve</td>
					<td>Decline</td>
				</tr>
				
				<?php foreach ($all_buyer_accounts as $buyer_account) { ?>
				
					<tr>
						<td><a href="<?php echo base_url(); ?>admin/buyer_details/<?php echo $buyer_account->user_id; ?>"><?php echo $buyer_account->first_name." ".$buyer_account->last_name; ?></a></td>
						<td><?php echo $buyer_account->dealer_name; ?></td>
						<td><?php echo $buyer_account->business_telephone_number; ?></td>
						<td><?php echo "<a href='mailto:$buyer_account->email'>Email</a>"; ?></td>
						<td><?php echo ucfirst($buyer_account->credit_card_validation); ?></td>
						<td><?php echo ucfirst($buyer_account->approved); ?></td>
						<td><a href="<?php echo base_url(); ?>admin/approve_account/<?php echo $buyer_account->user_id; ?>">Approve</a></td>
						<td><a href="<?php echo base_url(); ?>admin/decline_account/<?php echo $buyer_account->user_id; ?>">Decline</a></td>
					</tr>	
				
				<?php } ?>
				
			</table>
			
		</div>
		
		<div class="module_960 rounded_corners drop_shadow light_gradient">
			
			<h1>All Seller Accounts</h1>
			
			<table class="admin">
				<tr>
					<td>Name</td>
					<td>Business Name</td>
					<td>Telephone</td>
					<td>E-Mail</td>
				</tr>
				
				<?php foreach ($all_seller_accounts as $seller_account) { ?>
				
					<tr>
						<td><a href="<?php echo base_url(); ?>admin/seller_details/<?php echo $seller_account->user_id; ?>"><?php echo $seller_account->first_name." ".$seller_account->last_name; ?></a></td>
						<td><?php echo $seller_account->business_name; ?></td>
						<td><?php echo $seller_account->telephone_number; ?></td>
						<td><?php echo "<a href='mailto:$seller_account->email'>Email</a>"; ?></td>
					</tr>	
				
				<?php } ?>
				
			</table>
			
		</div>
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>
	
<?php  include '_includes/footer.php' ?>