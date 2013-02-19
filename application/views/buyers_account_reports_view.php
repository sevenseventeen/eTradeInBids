<?php  include '_includes/head.php' ?>

	<div id="main_container" class="buyers_account">

		<?php
			$main_navigation = "my_account";
			$account_navigation = 'reports';  
			include '_includes/header.php' 
		?>
		
		<?php include '_includes/buyers_account_navigation.php'; ?>
		
		<div class="module_960 drop_shadow rounded_corners">
			<h1>Your Reports</h1>
		</div>
		
		<div class="module_960 drop_shadow rounded_corners">
			
			<table class="reports">
			
				<tr class="header">
					<td>Accepted Date</td>
					<td>VIN</td>
					<td>Year</td>
					<td>Make</td>
					<td>Model</td>
					<td>Cost</td>
					<td>Seller</td>
				</tr>
				
				<?php
				
				date_default_timezone_set('UTC');
				foreach ($accepted_bids as $accepted_bid) {
					echo "<tr>";
					echo "<td>".date("m.d.y", strtotime($accepted_bid->bid_accepted_date))."</td>";
					echo "<td>$accepted_bid->vin</td>";
					echo "<td>$accepted_bid->year</td>";
					echo "<td>$accepted_bid->make</td>";
					echo "<td>$accepted_bid->model</td>";
					echo "<td>$".number_format($accepted_bid->bid_amount)."</td>";
					echo "<td>$accepted_bid->dealer_name</td>";
					echo "</tr>";
				}
				
				?>
			</table>
		</div>
		
		<?php include '_includes/footer_module.php' ?>
	
	</div>

<?php  include '_includes/footer.php' ?>