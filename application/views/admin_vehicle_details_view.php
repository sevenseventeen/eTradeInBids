<?php  include '_includes/head.php' ?>

	<div id="main_container">
	
		<?php
			$main_navigation = '';
			$account_navigation = '';
			include '_includes/header.php' 
		?>

		<div class="module_960 drop_shadow rounded_corners">
			<h1>Vehicle Detail View</h1>
		</div>
		
		<div class="module_960 drop_shadow rounded_corners vehicle_detail">
           <img src=<?php echo base_url()."_thumbnails/".$vehicle_details[0]->main_image_path; ?> /><br />
           <h2><?php echo $vehicle_details[0]->year.' '.$vehicle_details[0]->make.' '.$vehicle_details[0]->model.' '.$vehicle_details[0]->style; ?></h2>
           <p><?php echo $vehicle_details[0]->first_name.' '.$vehicle_details[0]->last_name; ?></p>
           <p><?php echo 'VIN: '.$vehicle_details[0]->vin; ?></p>
           <br class="clear_float" />
        </div>
        
        
        
        <div class="module_960 drop_shadow rounded_corners">
            <h1>Vehicle Bid Data</h1>
            
            <table class="admin">
                <tr>
                    <td>Bid Amount</td>
                    <td>Buyer Name</td>
                    <td>Bid Date</td>
                    <td>Bid Session</td>
                </tr>
                
                <?php foreach ($vehicle_bid_details as $vehicle_bid_detail) { ?>
                    <tr>
                        
                        <td><?php echo '$'.number_format($vehicle_bid_detail->bid_amount); ?></td>
                        <td><a href="<?php echo base_url(); ?>admin/buyer_details/<?php echo $vehicle_bid_detail->id; ?>"><?php echo ucfirst($vehicle_bid_detail->first_name)." ".ucfirst($vehicle_bid_detail->last_name); ?></a></td>
                        <td><?php echo date($vehicle_bid_detail->bid_time); ?></td>
                        <td><?php echo $vehicle_bid_detail->bid_session; ?></td>
                    </tr>
                <? } ?>
            
            </table>

        </div>
		
	<?php  include '_includes/footer_module.php' ?>
	
	</div>

<?php  include '_includes/footer.php' ?>