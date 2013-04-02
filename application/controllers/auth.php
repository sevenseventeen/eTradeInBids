<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! class_exists('Controller'))
{
	class Controller extends CI_Controller {}
}

class Auth extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect($this->config->item('base_url'), 'refresh');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->get_users_array();
			$this->load->view('auth/index', $this->data);
		}
	}

	//log the user in
	function login() {
		$this->data['title'] = "Login";
		
		if ($this->ion_auth->logged_in()) { //already logged in so no need to access this page
			redirect($this->config->item('base_url'), 'refresh');
		}

		//validate form input
		
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == true) { //check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');
			
			$this->load->model('data_model');
			$user_details = $this->data_model->get_user_details($this->input->post('email'));
			if ($user_details) {
				
				$email = $this->input->post('email');
				if ($user_details[0]->approved != 'approved' && $user_details[0]->credit_card_validation == 'approved') {
					redirect('site/waiting_for_approval');
				}
				
			}

			if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember)) { //if the login is successful
				//redirect them back to the home page
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				//redirect($this->config->item('base_url'), 'refresh');
                
                $session_array = array('email' => $email);
                $this->session->set_userdata($session_array);
                
				if ($this->session->userdata('account_type') == 'buyer') {
						//$this->load->model('data_model');
						//$user_details = $this->data_model->get_user_details($this->input->post('email'));
						// if ($user_details[0]->credit_card_validation != 'approved') {
							// redirect('site/credit_card_info_re_enter');
						// }
					$this->load->model('data_model');
					$user_details = $this->data_model->get_user_details($this->input->post('email'));
					if ($user_details) {
				
						//$id = $user_details[0]->id; // I don't think we need the id.
						$email = $user_details[0]->email;
                        
                        /*
                         *
                         * I think we can simplify the following use cases by saying
                         * If, at any point, the user's credit_card_validation field is not approved,
                         * Send them to the register credit card view. 
                         * 
                         */
                        
                        if ($user_details[0]->credit_card_validation != 'approved') {
                            redirect('auth/register_credit_card');
                        }
                        
						// if ($user_details[0]->approved == 'approved' && $user_details[0]->credit_card_validation != 'approved') {
							// //$email = urlencode($email);
							// redirect('auth/register_credit_card');
							// //redirect("site/credit_card_info_re_enter/$email/$id");
						// }

						// if ($user_details[0]->approved != 'approved' && $user_details[0]->credit_card_validation != 'approved') {
						// //redirect('site/credit_card_info_re_enter');
							// $email = urlencode($email);
							// redirect("site/credit_card_info_enter/$email/$id");
						// }
					//$this->load->view('credit_card_info_re_enter_view', $data);
					//exit;
				}
					redirect('site/buyers_account_active_vehicles');
				} else if ($this->session->userdata('account_type') == 'seller') {
					redirect('site/sellers_account_active_vehicles');
				} else if ($this->session->userdata('account_type') == 'admin') {
					redirect('site/admin');
				}
			} else { 
				
				//if the login was un-successful
				//redirect them back to the login page
				//echo "failed";
				
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				//redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				redirect('site/login_failed', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				//redirect('site/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		
		} else {  	//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

//			$this->load->view('auth/login', $this->data);
			$this->load->view('login_view', $this->data);
		}
	}

	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them back to the page they came from
		//redirect('auth', 'refresh');
		$this->load->view('logged_out_view', $this->data);
	}

	//change password
	function change_password() {
		
		$this->form_validation->set_rules('old', 'Old password', 'required');
		$this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
		
		$user = $this->ion_auth->get_user($this->session->userdata('user_id'));

		if ($this->form_validation->run() == false) { //display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['old_password'] = array('name' => 'old',
				'id' => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array('name' => 'new',
				'id' => 'new',
				'type' => 'password',
			);
			$this->data['new_password_confirm'] = array('name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
			);
			$this->data['user_id'] = array('name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->load->view('auth/change_password', $this->data);
		
		} else {
			
			$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change) { //if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			} else {
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password() {
		//get the identity type from config and send it when you load the view
		$identity = $this->config->item('identity', 'ion_auth');
		$identity_human = ucwords(str_replace('_', ' ', $identity)); //if someone uses underscores to connect words in the column names
		//$this->data['user_not_found'] = "";
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules($identity, $identity_human, 'required|valid_email');
		if ($this->form_validation->run() == false) {
			//setup the input
			$this->data[$identity] = array('name' => $identity,
				'id' => $identity, //changed
			);
			$this->data['identity'] = $identity; 
			$this->data['identity_human'] = $identity_human;
			$this->load->view('auth/forgot_password', $this->data);
		} else {
			/*
			$this->load->model('data_model');
			To do - Need to fix this 
			$valid_user = $this->data_model->check_user_email($this->input->post($identity));
			if (!$valid_user) {
				//$data['identity'] = $identity; 
				//$data['identity_human'] = $identity_human;
				$data['user_not_found'] = "Sorry, that email address is not recognized.";
				$this->load->view('auth/forgot_password', $data);
			}
			 
			*/
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($this->input->post($identity));

			if ($forgotten) { //if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				// redirect('auth/login', 'refresh');
				redirect('site/reset_password_email_sent', 'refresh'); //we should display a confirmation page here instead of the login page
			} else {
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/forgot_password', 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password

	public function reset_password($code) {
		$reset = $this->ion_auth->forgotten_password_complete($code);
		if ($reset) {  //if the reset worked then send them to the login page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
//			redirect('auth/login', 'refresh');
			redirect('site/new_password_sent', 'refresh');
		} else { //if the reset didnt work then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/forgot_password', 'refresh');
		}
	}
	
	

	//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
			$activation = $this->ion_auth->activate($id, $code);
		else if ($this->ion_auth->is_admin())
			$activation = $this->ion_auth->activate($id);


		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth', 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/forgot_password', 'refresh');
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
		// no funny business, force to integer
		$id = (int) $id;
		
		$this->form_validation->set_rules('confirm', 'confirmation', 'required');
		$this->form_validation->set_rules('id', 'user ID', 'required|is_natural');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->get_user_array($id);
			$this->load->view('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_404();
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			//redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	// Update a buyer's account.
	
	function update_buyer_account() {
		$account_type = "buyer";
		$this->data['title'] = "Update User";

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('dealer_name', 'Dealer Name', 'required|max_length[50]');
		$this->form_validation->set_rules('title', 'Title', 'required|max_length[50]');
		$this->form_validation->set_rules('business_street_address', 'Business Street Address', 'required|max_length[50]');
		$this->form_validation->set_rules('business_city', 'Business City', 'required|max_length[50]');
		$this->form_validation->set_rules('business_state', 'Business State', 'required|max_length[50]');
		$this->form_validation->set_rules('business_zip_code', 'Business Zip Code', 'required|max_length[9]|numeric');
		$this->form_validation->set_rules('license_number', 'License Number', 'required|max_length[50]');
		$this->form_validation->set_rules('insurance_company_name', 'Insurance Co. Name', 'required|max_length[50]');
		$this->form_validation->set_rules('insurance_company_contact_name', 'Insurance Co. Contact Name', 'required|max_length[50]');
		$this->form_validation->set_rules('insurance_company_contact_phone', 'Insurance Co. Contact Phone', 'required|max_length[50]');
		$this->form_validation->set_rules('insurance_policy_number', 'Insurance Policy Number', 'required|max_length[50]');
		$this->form_validation->set_rules('bank_name', 'Insurance Co. Name', 'required|max_length[50]');
		$this->form_validation->set_rules('bank_contact_name', 'Insurance Co. Contact Name', 'required|max_length[50]');
		$this->form_validation->set_rules('bank_contact_phone', 'Insurance Co. Contact Phone', 'required|max_length[50]');
		$this->form_validation->set_rules('business_telephone_number', 'Business Telephone Number', 'required|max_length[50]');
		
		if ($this->form_validation->run() == true) {
			
			$first_name 		= $this->input->post('first_name');
			$last_name 			= $this->input->post('last_name');
			$email 				= $this->input->post('email');
			$additional_data 	= array(
													
											'user_id' => $this->input->post('user_id'),
											'profile_id'=>$this->input->post('profile_id'),
											'dealer_name' => $this->input->post('dealer_name'),
											'title' => $this->input->post('title'),	
											'business_street_address' => $this->input->post('business_street_address'),	
											'business_city' => $this->input->post('business_city'),	
											'business_state' => $this->input->post('business_state'),	
											'business_zip_code' => $this->input->post('business_zip_code'),	
											'license_number' => $this->input->post('license_number'),	
											'insurance_company_name' => $this->input->post('insurance_company_name'),	
											'insurance_company_contact_name' => $this->input->post('insurance_company_contact_name'),	
											'insurance_company_contact_phone' => $this->input->post('insurance_company_contact_phone'),	
											'insurance_policy_number' => $this->input->post('insurance_policy_number'),	
											'bank_name' => $this->input->post('bank_name'),	
											'bank_contact_name' => $this->input->post('bank_contact_name'),	
											'bank_contact_phone' => $this->input->post('bank_contact_phone'),	
											'business_telephone_number' => $this->input->post('business_telephone_number'),
								);
			$additional_data2   = array(
											'payment_type' => $this->input->post('payment_type'),
											'card_number' => $this->input->post('card_number'),
											'cvv' => $this->input->post('cvv'),
											'card_expiration_month' => $this->input->post('card_expiration_month'),
											'card_expiration_year' => $this->input->post('card_expiration_year')
											);
								
			if ($this->ion_auth->update_buyer_account($first_name, $account_type, $last_name, $email, $additional_data)) {
				redirect('site/buyer_update_success');
			} else {
				redirect('site/account_management_buyer');
			}
			
		} else {
//			redirect('site/account_management_buyer');
			$user_id = $this->session->userdata('user_id');
			$this->load->model('data_model');
			$data['buyers_account_data'] = $this->data_model->get_buyers_account_data($user_id);
			$this->load->view('account_management_buyer_view', $data);
			//$this->load->view('account_management_buyer_view');
		}
	}

	// Update a buyer's account.
	
	function update_seller_account() {
		$account_type = "seller";
		$this->data['title'] = "Update User";

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('business_name', 'Business Name', 'required|max_length[50]');
		$this->form_validation->set_rules('title', 'Title', 'required|max_length[50]');
		$this->form_validation->set_rules('business_street_address', 'Business Street Address', 'required|max_length[50]');
		$this->form_validation->set_rules('business_city', 'Business City', 'required|max_length[50]');
		$this->form_validation->set_rules('business_state', 'Business State', 'required|max_length[50]');
		$this->form_validation->set_rules('business_zip_code', 'Business Zip Code', 'required|max_length[9]|numeric');
		$this->form_validation->set_rules('fax_number', 'Fax Number', 'required|max_length[50]');
		$this->form_validation->set_rules('telephone_number', 'Telephone Number', 'required|max_length[50]');
		
		if ($this->form_validation->run() == true) {
			
			$first_name 		= $this->input->post('first_name');
			$last_name 			= $this->input->post('last_name');
			$email 				= $this->input->post('email');
			$additional_data 	= array(
													
											'user_id' => $this->input->post('user_id'),
											'business_name' => $this->input->post('business_name'),
											'title' => $this->input->post('title'),	
											'business_street_address' => $this->input->post('business_street_address'),	
											'business_city' => $this->input->post('business_city'),	
											'business_state' => $this->input->post('business_state'),	
											'business_zip_code' => $this->input->post('business_zip_code'),	
											'bank_contact_name' => $this->input->post('bank_contact_name'),	
											'fax_number' => $this->input->post('fax_number'),	
											'telephone_number' => $this->input->post('telephone_number'),
										
								);
								
			if ($this->ion_auth->update_seller_account($first_name, $account_type, $last_name, $email, $additional_data)) {
				redirect('site/seller_update_success');
			} else {
				redirect('site/account_management_seller');
			}
			
		} else {
//			redirect('site/account_management_buyer');
			$user_id = $this->session->userdata('user_id');
			$this->load->model('data_model');
			$data['sellers_account_data'] = $this->data_model->get_sellers_account_data($user_id);
			$this->load->view('account_management_seller_view', $data);
			//$this->load->view('account_management_buyer_view');
		}
	}

// update forgotten password

function update_forgotten_password() {

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[20]|matches[password_confirmation]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required');
		
	   if ($this->form_validation->run() == true) {
	   	  
		   $password = $this->input->post('password');
		   $forgotten_password_code  = $this->input->post('forgotten_password_code');

			if ($this->ion_auth->update_forgotten_password($password,$forgotten_password_code)) {
				redirect('site/update_password_success');
			} else {
				redirect('site/login');
			}

		} else {
			$data['forgotten_password_code']  = $this->input->post('forgotten_password_code');
			//$user_id = $this->session->userdata('user_id');
			//$this->load->model('data_model');
			//$data['buyers_account_data'] = $this->data_model->get_buyers_account_data($user_id);
			$this->load->view('update_forgotten_password',$data);
	   }
}
	//Update a buyer password
	
	function update_buyer_password() {

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[20]|matches[password_confirmation]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required');
		
	   if ($this->form_validation->run() == true) {
	   	  
		   $password = $this->input->post('password');
		   $user_id  = $this->input->post('user_id');

			if ($this->ion_auth->update_buyer_password($password,$user_id)) {
				redirect('site/buyer_update_success');
			} else {
				redirect('site/account_management_buyer');
			}

		} else {
			
			$user_id = $this->session->userdata('user_id');
			$this->load->model('data_model');
			$data['buyers_account_data'] = $this->data_model->get_buyers_account_data($user_id);
			$this->load->view('account_management_buyer_view', $data);
	   }
}

	function update_seller_password() {

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[20]|matches[password_confirmation]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required');
		
	   if ($this->form_validation->run() == true) {
	   	  
		   $password = $this->input->post('password');
		   $user_id  = $this->input->post('user_id');

			if ($this->ion_auth->update_seller_password($password,$user_id)) {
				redirect('site/seller_update_success');
			} else {
				redirect('site/account_management_seller');
			}

		} else {
			
			$user_id = $this->session->userdata('user_id');
			$this->load->model('data_model');
			$data['sellers_account_data'] = $this->data_model->get_sellers_account_data($user_id);
			$this->load->view('account_management_seller_view', $data);
	   }
}
	
	// Create a new BUYER account.
	
	function create_buyer_account() {
		    
		$account_type = "buyer";
		$this->data['title'] = "Create User";

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('dealer_name', 'Dealer Name', 'required|max_length[50]');
		$this->form_validation->set_rules('title', 'Title', 'required|max_length[50]');
		$this->form_validation->set_rules('business_street_address', 'Business Street Address', 'required|max_length[50]');
		$this->form_validation->set_rules('business_city', 'Business City', 'required|max_length[50]');
		$this->form_validation->set_rules('business_state', 'Business State', 'required|max_length[50]');
		$this->form_validation->set_rules('business_zip_code', 'Business Zip Code', 'required|max_length[9]|numeric');
		$this->form_validation->set_rules('license_number', 'License Number', 'required|max_length[50]');
		$this->form_validation->set_rules('insurance_company_name', 'Insurance Co. Name', 'required|max_length[50]');
		$this->form_validation->set_rules('insurance_company_contact_name', 'Insurance Co. Contact Name', 'required|max_length[50]');
		$this->form_validation->set_rules('insurance_company_contact_phone', 'Insurance Co. Contact Phone', 'required|max_length[50]');
		$this->form_validation->set_rules('insurance_policy_number', 'Insurance Policy Number', 'required|max_length[50]');
		$this->form_validation->set_rules('bank_name', 'Insurance Co. Name', 'required|max_length[50]');
		$this->form_validation->set_rules('bank_contact_name', 'Insurance Co. Contact Name', 'required|max_length[50]');
		$this->form_validation->set_rules('bank_contact_phone', 'Insurance Co. Contact Phone', 'required|max_length[50]');
		$this->form_validation->set_rules('business_telephone_number', 'Business Telephone Number', 'required|max_length[50]');
		$this->form_validation->set_rules('terms_of_use', 'Terms of Use', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[20]|matches[password_confirmation]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required');
		
        // If everything validates 
		
		if ($this->form_validation->run() == true) {
			
			$first_name 		= $this->input->post('first_name');
			$last_name 			= $this->input->post('last_name');
			$email 				= $this->input->post('email');
			$password 			= $this->input->post('password');
			$additional_data 	= array(	
				'dealer_name' => $this->input->post('dealer_name'),
				'title' => $this->input->post('title'),	
				'business_street_address' => $this->input->post('business_street_address'),	
				'business_city' => $this->input->post('business_city'),	
				'business_state' => $this->input->post('business_state'),	
				'business_zip_code' => $this->input->post('business_zip_code'),	
				'license_number' => $this->input->post('license_number'),	
				'insurance_company_name' => $this->input->post('insurance_company_name'),	
				'insurance_company_contact_name' => $this->input->post('insurance_company_contact_name'),	
				'insurance_company_contact_phone' => $this->input->post('insurance_company_contact_phone'),	
				'insurance_policy_number' => $this->input->post('insurance_policy_number'),	
				'bank_name' => $this->input->post('bank_name'),	
				'bank_contact_name' => $this->input->post('bank_contact_name'),	
				'bank_contact_phone' => $this->input->post('bank_contact_phone'),	
				'business_telephone_number' => $this->input->post('business_telephone_number')
            );
        }

		
        // We need to create error message for declined cc info!!

        /* 
         * $from sets from address to knight1902@roadrunner for local testing.
         * Needs to be set up with ISP using MailServe application
         * 
         */ 
        
		if ($this->form_validation->run() == true && $this->ion_auth->register_buyer($first_name, $account_type, $last_name, $email, $password, $additional_data)) {
		    $to = $this->config->item('email_to_admin');
            $from_email = $this->config->item('email_from_support');
            $from_name = $this->config->item('email_name_from_new_accounts');
			$this->load->library('email');
	        $this->email->set_newline("\r\n");
	        $this->email->from($from_email, $from_name);
	        $this->email->to($to);
	        $this->email->subject('New User Awaiting Approval');
	        $this->email->message('A buyer has registered an account and is awaiting approval. Login to approve at https://www.etradeinbids.com');
			$this->email->send();
			
			//We need to figure out the way to send id value from user table;
			//$id = $data['id'];
			//$data['id'] =$this->ion_auth->get_user_by_email($email);
			
			/*
             * 
             * If we track registration by email only, using flashdata, maybe we can rid of the $id and the database calls
             * 
             */
			
			//$this->load->model('data_model');
			//$user_details = $this->data_model->get_user_details($email);
			//$user_id = $user_details[0]->id;
			//$data['id'] = $user_id;
			//$data['email'] = $email;
            
            //$this->session->set_flashdata('user_id', $user_id);
            //echo "Email is: ".$email;
            $session_array = array('email' => $email);
            $this->session->set_userdata($session_array);

			/*
             * Using redirect here so the URL changes, which should allow the back button to work properly.
             * Flash data stores data in a session for only the next server request, then destroys it. 
             * 
             */  
			
            redirect('auth/register_credit_card');
		} else {
			$this->load->view('register_buyer_view');
		}
	}

	function register_credit_card() {

		//$account_type = "buyer";
		//$this->data['title'] = "Register Credit Card Info";
        
        $email = $this->session->userdata('email');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('payment_type', 'Payment Type', 'required');
		$this->form_validation->set_rules('card_number', 'Card Number', 'required|max_length[25]');
		$this->form_validation->set_rules('cvv', 'CVV/CID', 'required');
		$this->form_validation->set_rules('card_expiration_month', 'Card Expiration Month', 'required');
		$this->form_validation->set_rules('card_expiration_year', 'Card Expiration Year', 'required');
		
		
		if ($this->form_validation->run() == true) {
			$payment_type 			= $this->input->post('payment_type');
			$card_number			= $this->input->post('card_number');
			$cvv 					= $this->input->post('cvv');
			$card_expiration_month	= $this->input->post('card_expiration_month');
			$card_expiration_year	= $this->input->post('card_expiration_year');
	        $stripe_config 			= $this->config->item('stripe_config');
	        $this->load->library('stripe', $stripe_config);
	
	        //requiredThe card number, as a string without any separators.exp_monthrequiredTwo digit number representing the card's expiration month.exp_yearrequiredFour digit number representing the card's expiration year.cvcoptional, highly recommendedCard security codenameoptional, recommendedCardholder's full name.
	
	        $card = Array(
	            'number' => $card_number, //4242424242424242
	            'exp_month' => $card_expiration_month,  //07
	            'exp_year' =>  $card_expiration_year,	//2014
	            'cvc' => $cvv  //123
	        ); 
	
	        $json_response = $this->stripe->customer_create($card, $email);
	        $json_response_decoded = json_decode($json_response);
			
			//var_dump(property_exists($json_response_decoded, 'error'));
			//echo "<p>----------</p>";
			//print_r($json_response_decoded);
			//echo "<p>----------</p>";
			//echo $json_response_decoded->error->message;
			//echo "<p>----------</p>";
			//echo $json_response_decoded[0][0];
			//echo "<p>----------</p>";
			//echo $json_response_decoded[0]->error->message;
		
			if (!property_exists($json_response_decoded, 'error')) {
				$stripe_id = $json_response_decoded->id;
				$this->load->model('data_model');
				$this->data_model->register_stripe_id($stripe_id, $email, $card_expiration_month, $card_expiration_year);
	        	redirect('site/buyer_registration_success');
		    } else {
				$this->load->model('data_model');
				$this->data_model->register_stripe_failed($email);
	        	redirect('site/credit_card_registration_failed');
			}
													
		} else {
		    
            //echo "Failed Validation";
		    
            // TODO - I think the view needs the word view at the end. 
            
//			$data['id'] = $this->input->post('id');
//			$data['email']	= $this->input->post('email');
			$data['email']	= $email;
			$this->load->view('register_credit_card_view', $data);
		}
	}

	function re_enter_credit_card_info() {
		$account_type = "buyer";
		$this->data['title'] = "Re-Enter Credit Card Info";
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('payment_type', 'Payment Type', 'required');
		$this->form_validation->set_rules('card_number', 'Card Number', 'required|max_length[25]');
		$this->form_validation->set_rules('cvv', 'CVV/CID', 'required');
		$this->form_validation->set_rules('card_expiration_month', 'Card Expiration Month', 'required');
		$this->form_validation->set_rules('card_expiration_year', 'Card Expiration Year', 'required');
		
		
		if ($this->form_validation->run() == true) {
			$id						= $this->input->post('id');
			$email					= $this->input->post('email');
			$payment_type 			= $this->input->post('payment_type');
			$card_number			= $this->input->post('card_number');
			$cvv 					= $this->input->post('cvv');
			$card_expiration_month	= $this->input->post('card_expiration_month');
			$card_expiration_year	= $this->input->post('card_expiration_year');
			
			
				//$this->ion_auth->register_creditcard_info($id,$payment_type,$card_number,$cvv,$card_expiration_month,$card_expiration_year);
			
			$config['stripe_key_test_public']         = 'pk_m9mjcmI1XxXkcqIk83awd3EPKeCRh';
	        $config['stripe_key_test_secret']         = '3InMbRrGf9vK1HD6P8PW13RWsExh9niE';
	        $config['stripe_key_live_public']         = '';
	        $config['stripe_key_live_secret']         = '';
	        $config['stripe_test_mode']               = TRUE;
	        $config['stripe_verify_ssl']              = FALSE;
	        $this->load->library('stripe', $config);
	
	        //requiredThe card number, as a string without any separators.exp_monthrequiredTwo digit number representing the card's expiration month.exp_yearrequiredFour digit number representing the card's expiration year.cvcoptional, highly recommendedCard security codenameoptional, recommendedCardholder's full name.
	
	        $card = Array(
	            'number' => $card_number, //4242424242424242
	            'exp_month' => $card_expiration_month,  //07
	            'exp_year' =>  $card_expiration_year,	//2014
	            'cvc' => $cvv  //123
	        ); 
	
	        $json_response = $this->stripe->customer_create($card, $email);
	        $json_response_decoded = json_decode($json_response);
			
			//var_dump(property_exists($json_response_decoded, 'error'));
			//echo "<p>----------</p>";
			//print_r($json_response_decoded);
			//echo "<p>----------</p>";
			//echo $json_response_decoded->error->message;
			//echo "<p>----------</p>";
			//echo $json_response_decoded[0][0];
			//echo "<p>----------</p>";
			//echo $json_response_decoded[0]->error->message;
		
			if (!property_exists($json_response_decoded, 'error')) {
				// Find out how to check approved member to direct this page!!!
				$this->load->model('data_model');
				$user_details = $this->data_model->get_user_details($email);
				$stripe_id = $json_response_decoded->id;
				$this->data_model->register_stripe_id($stripe_id, $email, $card_expiration_month, $card_expiration_year);
        		redirect('site/buyer_registration_success');
				
				
		    } else {
				$this->load->model('data_model');
				$this->data_model->register_stripe_failed($email);
	        	redirect('site/buyer_registration_failure');
			}
													
		} else {
			$data['id'] = $this->input->post('id');
			$data['email']	= $this->input->post('email');
			$this->load->view('credit_card_info_enter_view',$data);
		}
	}

function update_credit_card_info() {
		$account_type = "buyer";
		$this->data['title'] = "Update Credit Card Info";
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('payment_type', 'Payment Type', 'required');
		$this->form_validation->set_rules('card_number', 'Card Number', 'required|max_length[25]');
		$this->form_validation->set_rules('cvv', 'CVV/CID', 'required');
		$this->form_validation->set_rules('card_expiration_month', 'Card Expiration Month', 'required');
		$this->form_validation->set_rules('card_expiration_year', 'Card Expiration Year', 'required');
		
		
		if ($this->form_validation->run() == true) {
			$id						= $this->input->post('id');
			$user_id				= $this->input->post('user_id');
			$stripe_id				= $this->input->post('stripe_id');
			$email					= $this->input->post('email');
			$payment_type 			= $this->input->post('payment_type');
			$card_number			= $this->input->post('card_number');
			$cvv 					= $this->input->post('cvv');
			$card_expiration_month	= $this->input->post('card_expiration_month');
			$card_expiration_year	= $this->input->post('card_expiration_year');
			
			//$this->ion_auth->register_creditcard_info($id,$payment_type,$card_number,$cvv,$card_expiration_month,$card_expiration_year);
			
			// $config['stripe_key_test_public']         = 'pk_m9mjcmI1XxXkcqIk83awd3EPKeCRh';
	        // $config['stripe_key_test_secret']         = '3InMbRrGf9vK1HD6P8PW13RWsExh9niE';
	        // $config['stripe_key_live_public']         = '';
	        // $config['stripe_key_live_secret']         = '';
	        // $config['stripe_test_mode']               = TRUE;
	        // $config['stripe_verify_ssl']              = FALSE;
	        // $this->load->library('stripe', $config);
            $stripe_config = $this->config->item('stripe_config');
            $this->load->library('stripe', $stripe_config);
	
	        //requiredThe card number, as a string without any separators.exp_monthrequiredTwo digit number representing the card's expiration month.exp_yearrequiredFour digit number representing the card's expiration year.cvcoptional, highly recommendedCard security codenameoptional, recommendedCardholder's full name.
	
	        $card = Array(
	            'number' => $card_number, //4242424242424242
	            'exp_month' => $card_expiration_month,  //07
	            'exp_year' =>  $card_expiration_year,	//2014
	            'cvc' => $cvv  //123
	        ); 
			
			$newdata = Array(
				'card' => $card,
				'email' => $email,
				'description' =>'credit card updated'
			);
			
			
	
	        //$json_response = $this->stripe->customer_create($card, $email);
			
			$json_response = $this->stripe->customer_update($stripe_id, $newdata);
			
	        $json_response_decoded = json_decode($json_response);
			
			//var_dump(property_exists($json_response_decoded, 'error'));
			//echo "<p>----------</p>";
			//print_r($json_response_decoded);
			//echo "<p>----------</p>";
			//echo $json_response_decoded->error->message;
			//echo "<p>----------</p>";
			//echo $json_response_decoded[0][0];
			//echo "<p>----------</p>";
			//echo $json_response_decoded[0]->error->message;
		
			if (!property_exists($json_response_decoded, 'error')) {
				$stripe_id = $json_response_decoded->id;
				$this->load->model('data_model');
				$this->data_model->register_stripe_id($stripe_id, $email, $card_expiration_month, $card_expiration_year);
	        	redirect('site/credit_card_update_success');
		    } else {
				//$this->load->model('data_model');
				//$this->data_model->register_stripe_failed($email);
	        	redirect('site/credit_card_update_failure');
			}
													
		} else {
			$user_id = $this->session->userdata('user_id');
			$this->load->model('data_model');
			$data['buyers_account_data'] = $this->data_model->get_buyers_account_data($user_id);
			$this->load->view('account_management_buyer_view', $data);
		}
	}

	// Create a new SELLER account.
	
	function create_seller_account() {
		$account_type = "seller";
		$this->data['title'] = "Create User";
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('business_name', 'Business Name', 'required|max_length[50]');
		$this->form_validation->set_rules('title', 'Title', 'required|max_length[50]');
		$this->form_validation->set_rules('business_street_address', 'Business Street Address', 'required|max_length[50]');
		$this->form_validation->set_rules('business_city', 'Business City', 'required|max_length[50]');
		$this->form_validation->set_rules('business_state', 'Business State', 'required|max_length[50]');
		$this->form_validation->set_rules('business_zip_code', 'Business Zip Code', 'required|max_length[9]|numeric');
		$this->form_validation->set_rules('fax_number', 'Fax Number', 'required|max_length[50]');
		$this->form_validation->set_rules('telephone_number', 'Telephone Number', 'required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[20]|matches[password_confirmation]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('terms_of_use', 'Terms of Use', 'required');
		
		if ($this->form_validation->run() == true) {
			
			$first_name 		= $this->input->post('first_name');
			$last_name 			= $this->input->post('last_name');
			$email 				= $this->input->post('email');
			$password 			= $this->input->post('password');
			$additional_data 	= array(	'business_name' => $this->input->post('business_name'),
											'title' => $this->input->post('title'),	
											'business_street_address' => $this->input->post('business_street_address'),	
											'business_city' => $this->input->post('business_city'),	
											'business_state' => $this->input->post('business_state'),	
											'business_zip_code' => $this->input->post('business_zip_code'),	
											'fax_number' => $this->input->post('fax_number'),	
											'telephone_number' => $this->input->post('telephone_number'),
											'approved' => 'approved'	
								);
		} 

		if ($this->form_validation->run() == true && $this->ion_auth->register_seller($first_name, $account_type, $last_name, $email, $password, $additional_data)) { 
			redirect('site/seller_registration_success');
		} else {
			$this->load->view('register_seller_view');
		}
	}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
				$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}
