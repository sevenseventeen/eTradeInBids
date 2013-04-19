<?php

class Admin extends CI_Controller {

	function index() {
		
	}
    
    function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('site/login');
        }
    }
	
	function approve_account($user_id) {
		$this->load->model('data_model');
		$result = $this->data_model->approve_account($user_id);
		if ($result) {
			$buyer_details = $this->data_model->get_buyer_details($user_id);
            $from_email = $this->config->item('email_from_support');
            $from_name = $this->config->item('email_name_from_new_accounts');
			$this->load->library('email');
	        $this->email->set_newline("\r\n");
	        $this->email->from($from_email, $from_name);
	        $this->email->to($buyer_details[0]->email);
	        $this->email->subject('Your account has been approved!');
	        $this->email->message('Congratulations, your eTradeInBids account has been approved. Please use the email address and password you used to set up your account to login here: https://www.etradeinbids.com');
			$this->email->send();
			redirect('site/admin');
		} else {
			echo "Sorry, there was a problem. (Line 22 admin.php)";
		}
	}
	
	function decline_account($user_id) {
		$this->load->model('data_model');
		$result = $this->data_model->decline_account($user_id);
		if ($result) {
			$buyer_details = $this->data_model->get_buyer_details($user_id);
            $from_email = $this->config->item('email_from_support');
            $from_name = $this->config->item('email_name_from_new_accounts');
			$this->load->library('email');
	        $this->email->set_newline("\r\n");
	        $this->email->from($from_email, $from_name);
	        $this->email->to($buyer_details[0]->email);
	        $this->email->subject('Account Problem');
	        $this->email->message("We\'re sorry, we are unable to approve your account at eTradeInBids at this time. A member of our team should be contacting you shortly.");
			$this->email->send();
			redirect('site/admin');
		} else {
			echo "Sorry, there was a problem. (Line 41 admin.php)";
		}
	}
	
	function buyer_details($user_id) {
		$this->load->model('data_model');
		$buyer_details = $this->data_model->get_buyer_details($user_id);
		$data['buyer_details'] = $buyer_details; 
		$this->load->view('buyer_details_view', $data);
	}
	
	function seller_details($user_id) {
		$this->load->model('data_model');
		$seller_details = $this->data_model->get_seller_details($user_id);
		$data['seller_details'] = $seller_details; 
		$this->load->view('seller_details_view', $data);
	}
	
	function vehicle_details($vehicle_id) {
		date_default_timezone_set('UTC');
		$this->load->model('data_model');
		$vehicle_details  = $this->data_model->get_vehicle_details($vehicle_id);
		$vehicle_bid_details  = $this->data_model->get_vehicle_bid_details($vehicle_id);
		$data['vehicle_details'] = $vehicle_details; 
		$data['vehicle_bid_details'] = $vehicle_bid_details; 
		$this->load->view('admin_vehicle_details_view', $data);
	}
    
}

?>