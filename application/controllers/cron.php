<?php

class Cron extends CI_Controller {

	function index() {
		
	}
	
	function check_listing_duration() {
	    
		date_default_timezone_set('UTC');
		$this->load->model('data_model');
		$all_vehicles_for_sale = $this->data_model->get_all_vehicles_for_sale();

        error_log("Testing");
		
		foreach ($all_vehicles_for_sale as $vehicle) {
		    
            $date_added         = new DateTime($vehicle->date_added);
            $now                = new DateTime(date('Y-m-d H:i:s', time()));
            $interval           = date_diff($date_added, $now, FALSE);
            $hours              = $interval->format('%h');
            $day_hours          = $interval->format('%d') * 24;
            $total_hours        = $day_hours+$hours;
            
            switch ($total_hours) {
                    
                case 24:
                    
                    $vehicle_id = $vehicle->vehicle_id;
                    $buyer_id_array = array();
                    $all_buyers = $this->data_model->get_all_buyers();
                    foreach ($all_buyers as $buyer) {
                        $buyer_has_bid = $this->data_model->check_for_bids($vehicle_id, $buyer->id);
                        if(!$buyer_has_bid) {
                            $vehicle_year   = $vehicle->year; 
                            $vehicle_make   = $vehicle->make; 
                            $vehicle_model  = $vehicle->model;
                            $buyer_email = $buyer->email;
                            $from_email = $this->config->item('email_from_support');
                            $from_name = $this->config->item('email_name_from_alerts');
                            $bcc_email = $this->config->item('email_to_josh');
                            $message = "Just a reminder, bidding on the ".$vehicle_year." ".$vehicle_make." ".$vehicle_model." will close in 24 hours and it looks like you haven't placed a bid. Please login to bid at https://www.etradeinbids.com. \n\nThanks for using eTradeInBids\n\n";
                            
                            $this->load->library('email');
                            $this->email->clear();
                            $this->email->from($from_email, $from_name);
                            $this->email->to($buyer_email);
                            $this->email->bcc($bcc_email);
                            $this->email->subject('A Reminder to Bid on a | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model);
                            $this->email->message($message);
                            $this->email->send();
                        }
                    }
                    break;
                
                case 48:
                    
                    $vehicle_id = $vehicle->vehicle_id;
                    $vehicle_year   = $vehicle->year; 
                    $vehicle_make   = $vehicle->make; 
                    $vehicle_model  = $vehicle->model;
                    $this->data_model->expire_bid_status($vehicle_id);
                    $seller_id = $vehicle->user_id; 
                    $seller_details = $this->data_model->get_user_by_id($seller_id);
                    $seller_email = $seller_details[0]->email;
                    $from_email = $this->config->item('email_from_support');
                    $from_name = $this->config->item('email_name_from_alerts');
                    $bcc_email = $this->config->item('email_to_josh');
                    $message = "The bidding window for the ".$vehicle_year." ".$vehicle_make." ".$vehicle_model." listed on eTradeInbids has closed. Please login and review your bids at https://www.etradeinbids.com. You have 48 hours from your first notification to accept a bid. Thanks for using eTradeInBids\n\n";
                    
                    $this->load->library('email');
                    $this->email->clear();
                    $this->email->from($from_email, $from_name);
                    $this->email->to($seller_email);
                    $this->email->bcc($bcc_email);
                    $this->email->subject('Information About Your Vehicle | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model);
                    $this->email->message($message);
                    $this->email->send();
                    break;
                    
                case 96:
                    
                    $vehicle_id = $vehicle->vehicle_id;
                    $this->data_model->deactivate_vehicle($vehicle_id);
                    $vehicle_year   = $vehicle->year; 
                    $vehicle_make   = $vehicle->make; 
                    $vehicle_model  = $vehicle->model;
                    $bid_session    = $vehicle->bid_session;
                    $bids = $this->data_model->get_vehicle_bid_history($vehicle_id, $bid_session);
                    
                    foreach($bids as $bid) {
                        $buyer_id = $bid->buyer_id;
                        $buyer_details = $this->data_model->get_user_by_id($buyer_id);
                        $buyer_email = $buyer_details[0]->email;
                        $from_email = $this->config->item('email_from_support');
                        $from_name = $this->config->item('email_name_from_administrator');
                        $bcc_email = $this->config->item('email_to_josh');
                        $message = "Sorry, the seller on the ".$vehicle_year." ".$vehicle_make." ".$vehicle_model." has not accepted any bids and the listing has since expired. We truly appreciate your participation. Remember the higher the bids, the more likely the seller will accept. \n\nPlease click here https://www.etradeinbids.com to bid on other vehicles. Thank you for using eTradeInBids";
                        $this->load->library('email');
                        $this->email->clear();
                        $this->email->from($from_email, $from_name);
                        $this->email->to($buyer_email);
                        $this->email->bcc($bcc_email);
                        $this->email->subject('Information About Your Bid | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model);
                        $this->email->message($message);
                        $this->email->send();   
                    }
                    break;
            }
        }
	}
}

?>