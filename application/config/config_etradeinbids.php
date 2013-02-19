<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 
 * Switch the from and to email addresses depending on the environmnet (server_name)
 * This way Mark won't get all our testing emails
 * Plus, we need to use KNIGHT1902@roadrunner.com to send using localhost. 
 * But, you'll need to set up MailServe to do this
 * 
 * 
 */

$config['test_mode'] = FALSE;

if ($_SERVER['SERVER_NAME'] == "localhost" || $config['test_mode'] == TRUE) {
    $config['email_from_support']               = 'KNIGHT1902@roadrunner.com';
    $config['email_name_from_administrator']    = 'eTradeInBids Administrator';
    $config['email_name_from_new_accounts']     = 'eTradeInBids New Accounts';
    $config['email_name_from_alerts']           = 'eTradeInBids Alerts';
    $config['email_to_admin'] = array('josh@seven-seventeen.com, 7seventeen@gmail.com');
    $config['email_to_josh'] = array('josh@seven-seventeen.com');
    $config['stripe_config'] = array(
        'stripe_key_test_secret'    => 'ikJGPkneLlOrjRuG3Th8CtxVxon81GlC',
        'stripe_key_test_public'    => 'pk_7OcwKKmQ7DV79CUouz9IBfFs0i1y6',
        'stripe_key_live_secret'    => 'TMCDce2INR7nJz7o6JiqvcnsEzix5sBu',
        'stripe_key_live_public'    => 'pk_CbIkQ1ojdMsWINNbDrs8WMhfT5bDj',
        'stripe_test_mode'          => TRUE,
        'stripe_verify_ssl'         => FALSE
    );
} else {
    $config['email_from_support']               = 'support@etradeinbids.com';
    $config['email_name_from_administrator']    = 'eTradeInBids Administrator';
    $config['email_name_from_new_accounts']     = 'eTradeInBids New Accounts';
    $config['email_name_from_alerts']           = 'eTradeInBids Alerts';
    $config['email_to_admin'] = array('josh@seven-seventeen.com, mark@etradeinbids.com');
    $config['email_to_josh'] = array('josh@seven-seventeen.com');
    $config['stripe_config'] = array(
        'stripe_key_test_secret'    => 'ikJGPkneLlOrjRuG3Th8CtxVxon81GlC',
        'stripe_key_test_public'    => 'pk_7OcwKKmQ7DV79CUouz9IBfFs0i1y6',
        'stripe_key_live_secret'    => 'TMCDce2INR7nJz7o6JiqvcnsEzix5sBu',
        'stripe_key_live_public'    => 'pk_CbIkQ1ojdMsWINNbDrs8WMhfT5bDj',
        'stripe_test_mode'          => FALSE,
        'stripe_verify_ssl'         => TRUE
    );
}