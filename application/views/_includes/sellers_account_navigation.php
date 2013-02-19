<div id="account_navigation_container">
	
	<a id="active_vehicles"		<?php if ($account_navigation == 'active_vehicles') 	{ echo 'class="account_tab_active drop_shadow rounded_corners"'; } else { echo 'class="account_tab_inactive"'; } ?> href="<?php echo base_url(); ?>site/sellers_account_active_vehicles">Active Vehicles</a>
	<a id="list_a_vehicle" 		<?php if ($account_navigation == 'list_a_vehicle') 		{ echo 'class="account_tab_active drop_shadow rounded_corners"'; } else { echo 'class="account_tab_inactive"'; } ?> href="<?php echo base_url(); ?>site/sellers_account_list_vehicle">List a Vehicle</a>
	<a id="inactive_vehicles"	<?php if ($account_navigation == 'inactive_vehicles')	{ echo 'class="account_tab_active drop_shadow rounded_corners"'; } else { echo 'class="account_tab_inactive"'; } ?> href="<?php echo base_url(); ?>site/sellers_account_inactive_vehicles">Inactive Vehicles</a>
	<a id="reports" 			<?php if ($account_navigation == 'reports')				{ echo 'class="account_tab_active drop_shadow rounded_corners"'; } else { echo 'class="account_tab_inactive"'; } ?> href="<?php echo base_url(); ?>site/sellers_account_reports">Reports</a>
	<a id="edit_my_account" 	<?php if ($account_navigation == 'edit_my_account')		{ echo 'class="account_tab_active drop_shadow rounded_corners"'; } else { echo 'class="account_tab_inactive"'; } ?> href="<?php echo base_url(); ?>site/account_management_seller">Edit My Account</a>

</div>

<div class="clear_float" ></div>

<div id="account_tab_background" class="rounded_corners"></div>

<?php if ($account_navigation == 'active_vehicles')		{ echo "<div id='account_tab_shadow_cover' class='first_acount_tab'></div>"; } ?>
<?php if ($account_navigation == 'list_a_vehicle')		{ echo "<div id='account_tab_shadow_cover' class='second_account_tab'></div>"; } ?>
<?php if ($account_navigation == 'inactive_vehicles')	{ echo "<div id='account_tab_shadow_cover' class='third_account_tab'></div>"; } ?>
<?php if ($account_navigation == 'reports')				{ echo "<div id='account_tab_shadow_cover' class='fourth_account_tab'></div>"; } ?>
<?php if ($account_navigation == 'edit_my_account')		{ echo "<div id='account_tab_shadow_cover' class='fifth_account_tab'></div>"; } ?>