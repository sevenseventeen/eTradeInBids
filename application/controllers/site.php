<?php

class Site extends CI_Controller {
    
    function update_vehicle(){
        date_default_timezone_set('UTC');
        if (!$this->ion_auth->logged_in()) {
            redirect('site/login');
        }
        
        $vehicle_id = $this->input->post('vehicle_id');
        
        $year_make_model_style_selections = array(
            'year'  => $this->input->post('year'),
            'make'  => $this->input->post('make'),
            'model' => $this->input->post('model'),
            'style' => $this->input->post('style')
        );
        
        $any_accidents_value = array(
            'any_accidents' => $this->input->post('any_accidents')
        );
        
        $this->session->set_userdata($year_make_model_style_selections);
        $this->session->set_userdata($any_accidents_value);
        $this->load->model('data_model');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('year', 'Year', 'required|numeric');
        $this->form_validation->set_rules('make', 'Make', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('style', 'Style', 'required');
        $this->form_validation->set_rules('drive_type', 'Drive Type', 'required');
        $this->form_validation->set_rules('vin', 'VIN', 'required|exact_length[17]|alpha_numeric');
        $this->form_validation->set_rules('upholstery_type', 'Upholstery Type', 'required');
        $this->form_validation->set_rules('number_of_cylinders', 'Number of Cylinders', 'required');
        $this->form_validation->set_rules('transmission_type', 'Transmission Type', 'required');
        $this->form_validation->set_rules('number_of_speeds', 'Number of Speeds', 'required');
        $this->form_validation->set_rules('fuel_type', 'Fuel Type', 'required');
        $this->form_validation->set_rules('exterior_color', 'Exterior Color', 'required');
        $this->form_validation->set_rules('interior_color', 'Interior Color', 'required');
        $this->form_validation->set_rules('mileage', 'Mileage', 'required');
        $this->form_validation->set_rules('is_actual_mileage', 'Is Mileage Actual', 'required');
        if ($this->input->post('is_actual_mileage') == 'No') {
            $this->form_validation->set_rules('mileage_notes', 'Mileage Notes', 'required');    
        }
        $this->form_validation->set_rules('original_owner', 'Original Owner', 'required');
        $this->form_validation->set_rules('any_accidents', 'Any Accidents', 'required');
        if ($this->input->post('any_accidents') == 'Yes') {
            $this->form_validation->set_rules('accident_repair_history', 'Accident Repair History', 'required');    
        }
        $this->form_validation->set_rules('any_repainting', 'Any Repainting', 'required');
        $this->form_validation->set_rules('vehicle_location_street', 'Vehicle Street Location', 'required');
        $this->form_validation->set_rules('vehicle_location_city', 'Vehicle Location City', 'required');
        $this->form_validation->set_rules('vehicle_location_state', 'Vehcile Location State', 'required');
        $this->form_validation->set_rules('vehicle_location_zip', 'Vehicle Location Zip', 'required');
        $this->form_validation->set_rules('license_plate_number', 'License Plate Number', 'required');
        $this->form_validation->set_rules('state_of_registration', 'State of Registration', 'required');
        $this->form_validation->set_rules('registration_expiration_month', 'Registration Month', 'required');
        $this->form_validation->set_rules('registration_expiration_year', 'Registration Year', 'required');
        $this->form_validation->set_rules('power_steering', 'Power Steering', 'required');
        $this->form_validation->set_rules('air_conditioning', 'Air Conditioning', 'required');
        $this->form_validation->set_rules('power_windows', 'Power Windows', 'required');
        $this->form_validation->set_rules('power_door_locks', 'Power Door Locks', 'required');
        $this->form_validation->set_rules('cruise_control', 'Cruise Control', 'required');
        $this->form_validation->set_rules('cd_player_changer', 'CD Player/Changer', 'required');
        $this->form_validation->set_rules('premium_sound', 'Premium Sound', 'required');
        $this->form_validation->set_rules('integrated_phone', 'Integrated Phone', 'required');
        $this->form_validation->set_rules('dual_airbags', 'Dual Airbags', 'required');
        $this->form_validation->set_rules('four_wheel_abs_brakes', 'Four Wheel ABS Brakes', 'required');
        $this->form_validation->set_rules('traction_control', 'Traction Control', 'required');
        $this->form_validation->set_rules('power_seat', 'Power Seat', 'required');
        $this->form_validation->set_rules('dual_power_seats', 'Dual Power Seat', 'required');
        $this->form_validation->set_rules('flip_up_moon_roof', 'Flip-up Moon Roof', 'required');
        $this->form_validation->set_rules('privacy_glass', 'Privacy Glass', 'required');
        $this->form_validation->set_rules('navigation', 'Navigation', 'required');
        $this->form_validation->set_rules('entertainment_system_dvd', 'Entertainment System/DVD', 'required');
        $this->form_validation->set_rules('oversized_off_road_tires', 'Oversized/Off Road Tires', 'required');
        $this->form_validation->set_rules('roof_rack', 'Roof Rack', 'required');
        $this->form_validation->set_rules('running_boards', 'Running Boards', 'required');
        $this->form_validation->set_rules('sliding_rear_window', 'Sliding Rear Window', 'required');
        $this->form_validation->set_rules('bed_liner', 'Bed Liner', 'required');
        $this->form_validation->set_rules('canopy_shell', 'Canopy Shell', 'required');
        $this->form_validation->set_rules('quad_seating', 'Quad Seating', 'required');
        $this->form_validation->set_rules('tilt_steering_wheel', 'Tilt Steering Wheel', 'required');
        $this->form_validation->set_rules('all_wheel_drive', 'All Wheel Drive', 'required');
        $this->form_validation->set_rules('alloy_wheels', 'Alloy Wheels', 'required');
        $this->form_validation->set_rules('towing_package', 'Towing Package', 'required');
        $this->form_validation->set_rules('custom_bumper', 'Custom Bumper', 'required');
        $this->form_validation->set_rules('grill_guard', 'Grill Guard', 'required');
        $this->form_validation->set_rules('third_row_seat', 'Third Row Seat', 'required');
        $this->form_validation->set_rules('paint_body_condition', 'Paint/Body Condition', 'required');
        $this->form_validation->set_rules('glass_condition', 'Glass Condition', 'required');
        $this->form_validation->set_rules('tires_condition', 'Tires Condition', 'required');
        $this->form_validation->set_rules('brakes_condition', 'Brakes Condition', 'required');
        $this->form_validation->set_rules('transmission_condition', 'Transmission Condition', 'required');
        $this->form_validation->set_rules('clutch_condition', 'Clutch Condition', 'required');
        $this->form_validation->set_rules('carpet_condition', 'Carpet Condition', 'required');
        $this->form_validation->set_rules('upholstery_condition', 'Upholstery Condition', 'required');
        $this->form_validation->set_rules('engine_condition', 'Engine Condition', 'required');
        $this->form_validation->set_rules('exhaust_condition', 'Exhaust Condition', 'required');
        $this->form_validation->set_rules('shocks_condition', 'Shocks Condition', 'required');
        $this->form_validation->set_rules('air_conditioning_condition', 'Air Conditioning Condition', 'required');
        $this->form_validation->set_rules('vehicle_smoked_in', 'Vehicle Smoked In', 'required');
        $this->form_validation->set_rules('salvage', 'Salvage', 'required');
        $this->form_validation->set_rules('lemon_law_buyback', 'Lemon Law/Buyback', 'required');
        $this->form_validation->set_rules('warranty_return', 'Warranty Return', 'required');
        $this->form_validation->set_rules('frame_damage', 'Frame Damage', 'required');
        $this->form_validation->set_rules('flood_damage', 'Flood Damage', 'required');
        $this->form_validation->set_rules('general_overall_condition', 'General Overall Condition', 'required');
        $this->form_validation->set_rules('additional_condition_information', 'Additional Condition Information', 'required');
        
        /* Need to build registration date? */
        
        if ($this->form_validation->run() == FALSE) { // FALSE FOR PRODUCTION
            //echo "VALIDATION ERROR";
            //$this->load->model('data_model');
            $data['model_years'] = $this->data_model->get_model_years();
            //$this->load->view('sellers_account_list_vehicle_view', $data);
            
            $this->session->set_userdata('vehicle_id', $vehicle_id);
            $data['vehicle_images'] = $this->data_model->get_vehicle_images($vehicle_id);
            $data['vehicle_details'] = $this->data_model->get_vehicle_details($vehicle_id);
            // $data['model_years'] = $this->data_model->get_model_years();
            $this->load->view('sellers_account_edit_vehicle_view', $data);
            
        } else {
            
            $year_make_model_style_selections = array(
                'year'  => '',
                'make'  => '',
                'model' => '',
                'style' => ''
            );
            
            $any_accidents_value = array(
                'any_accidents' => ''
            );
            
            $this->session->unset_userdata($year_make_model_style_selections);
            $this->session->unset_userdata($any_accidents_value);
        
            $data = array(
                'user_id'                       => $this->session->userdata('user_id'),
                'year'                          => $this->input->post('year'),
                'make'                          => $this->input->post('make'),
                'model'                         => $this->input->post('model'),
                'style'                         => $this->input->post('style'),
                'vin'                           => $this->input->post('vin'),
                'exterior_color'                => $this->input->post('exterior_color'),
                'interior_color'                => $this->input->post('interior_color'),
                'upholstery_type'               => $this->input->post('upholstery_type'),
                'number_of_cylinders'           => $this->input->post('number_of_cylinders'),
                'transmission_type'             => $this->input->post('transmission_type'),
                'number_of_speeds'              => $this->input->post('number_of_speeds'),
                'fuel_type'                     => $this->input->post('fuel_type'),
                'drive_type'                    => $this->input->post('drive_type'),
                'mileage'                       => str_replace (',', '', $this->input->post('mileage')),
                'is_actual_mileage'             => $this->input->post('is_actual_mileage'),
                'mileage_notes'                 => $this->input->post('mileage_notes'),
                'original_owner'                => $this->input->post('original_owner'),
                'any_accidents'                 => $this->input->post('any_accidents'),
                'any_repainting'                => $this->input->post('any_repainting'),
                'vehicle_location_street'       => $this->input->post('vehicle_location_street'),
                'vehicle_location_city'         => $this->input->post('vehicle_location_city'),
                'vehicle_location_state'        => $this->input->post('vehicle_location_state'),
                'vehicle_location_zip'          => $this->input->post('vehicle_location_zip'),
                'license_plate_number'          => $this->input->post('license_plate_number'),
                'state_of_registration'         => $this->input->post('state_of_registration'),
                'registration_expiration_month' => $this->input->post('registration_expiration_month'),
                'registration_expiration_year'  => $this->input->post('registration_expiration_year'),
                // 'main_image_path'               => $this->input->post('main_image_path'),
                'paint_body_condition'          => $this->input->post('paint_body_condition'),
                'glass_condition'               => $this->input->post('glass_condition'),
                'tires_condition'               => $this->input->post('tires_condition'),
                'brakes_condition'              => $this->input->post('brakes_condition'),
                'transmission_condition'        => $this->input->post('transmission_condition'),
                'clutch_condition'              => $this->input->post('clutch_condition'),
                'carpet_condition'              => $this->input->post('carpet_condition'),
                'upholstery_condition'          => $this->input->post('upholstery_condition'),
                'engine_condition'              => $this->input->post('engine_condition'),
                'exhaust_condition'             => $this->input->post('exhaust_condition'),
                'shocks_condition'              => $this->input->post('shocks_condition'),
                'air_conditioning_condition'    => $this->input->post('air_conditioning_condition'),
                'vehicle_smoked_in'             => $this->input->post('vehicle_smoked_in'),
                'salvage'                       => $this->input->post('salvage'),
                'lemon_law_buyback'             => $this->input->post('lemon_law_buyback'),
                'warranty_return'               => $this->input->post('warranty_return'),
                'frame_damage'                  => $this->input->post('frame_damage'),
                'flood_damage'                  => $this->input->post('flood_damage'),
                'additional_condition_information'  => $this->input->post('additional_condition_information'),
                'general_overall_condition'     => $this->input->post('general_overall_condition'),
                'accident_repair_history'       => $this->input->post('accident_repair_history'),
                'vehicle_type'                  => $this->input->post('vehicle_type'),
                'power_steering'                => $this->input->post('power_steering'),
                'all_wheel_drive'               => $this->input->post('all_wheel_drive'),
                'air_conditioning'              => $this->input->post('air_conditioning'),
                'power_windows'                 => $this->input->post('power_windows'),
                'power_door_locks'              => $this->input->post('power_door_locks'),
                'tilt_steering_wheel'           => $this->input->post('tilt_steering_wheel'),
                'cruise_control'                => $this->input->post('cruise_control'),
                'cd_player_changer'             => $this->input->post('cd_player_changer'),
                'premium_sound'                 => $this->input->post('premium_sound'),
                'integrated_phone'              => $this->input->post('integrated_phone'),
                'dual_airbags'                  => $this->input->post('dual_airbags'),
                'four_wheel_abs_brakes'         => $this->input->post('four_wheel_abs_brakes'),
                'traction_control'              => $this->input->post('traction_control'),
                'power_seat'                    => $this->input->post('power_seat'),
                'dual_power_seats'              => $this->input->post('dual_power_seats'),
                'flip_up_moon_roof'             => $this->input->post('flip_up_moon_roof'),
                'privacy_glass'                 => $this->input->post('privacy_glass'),
                'navigation'                    => $this->input->post('navigation'),
                'alloy_wheels'                  => $this->input->post('alloy_wheels'),
                'entertainment_system_dvd'      => $this->input->post('entertainment_system_dvd'),
                'towing_package'                => $this->input->post('towing_package'),
                'oversized_off_road_tires'      => $this->input->post('oversized_off_road_tires'),
                'roof_rack'                     => $this->input->post('roof_rack'),
                'running_boards'                => $this->input->post('running_boards'),
                'sliding_rear_window'           => $this->input->post('sliding_rear_window'),
                'bed_liner'                     => $this->input->post('bed_liner'),
                'canopy_shell'                  => $this->input->post('canopy_shell'),
                'custom_bumper'                 => $this->input->post('custom_bumper'),
                'grill_guard'                   => $this->input->post('grill_guard'),
                'quad_seating'                  => $this->input->post('quad_seating'),
                'third_row_seat'                => $this->input->post('third_row_seat'),
                'listing_status'                => 'active_listing',
                'date_added'                    => date('Y-m-d H:i:s', time()),
                'bid_status'                    => 'open',
                'invoice_status'                => 'not_invoiced', 
                'bid_session'                    => 0
            );
            
            $updated = $this->data_model->update_vehicle($vehicle_id, $data);

            if ($updated) {
                $this->session->set_flashdata('message', 'Success! Your listing has been updated.');
                redirect("site/edit_vehicle/".$vehicle_id);
            } else {
                echo "Sorry, there was a problem with the update.";
            }
        }
    }
    
    function edit_vehicle($vehicle_id) {
        if (!$this->ion_auth->logged_in()) {
            redirect('site/login');
        }
        
        // !!!! Also need to check if it's a seller
        
        //$data = array();
        $this->load->model('data_model');
        $this->session->set_userdata('vehicle_id', $vehicle_id);
        $data['vehicle_images'] = $this->data_model->get_vehicle_images($vehicle_id);
        $data['vehicle_details'] = $this->data_model->get_vehicle_details($vehicle_id);
        $data['model_years'] = $this->data_model->get_model_years();
        $this->load->view('sellers_account_edit_vehicle_view', $data);
        
    }
    
    function delete_image($vehicle_id, $image_id) {
        $this->load->model('data_model');
        $image_deleted  = $this->data_model->delete_vehicle_image($image_id);
        if ($image_deleted) {
            redirect('site/edit_vehicle/'.$vehicle_id.'#remove_image_grid');
        }
    }

    function frequently_asked_questions() {
        $this->load->view('frequently_asked_questions_view');
    }
    
    function charge_customer(){
        $config['stripe_key_test_public']         = 'pk_m9mjcmI1XxXkcqIk83awd3EPKeCRh';
        $config['stripe_key_test_secret']         = '3InMbRrGf9vK1HD6P8PW13RWsExh9niE';
        $config['stripe_key_live_public']         = '';
        $config['stripe_key_live_secret']         = '';
        $config['stripe_test_mode']               = TRUE;
        $config['stripe_verify_ssl']              = FALSE;
        $this->load->library('stripe', $config);
        
        /*
         * Need to remove this testing data
         * 
         */
        
        $amount = '50';
        $customer_id = 'cus_zYrzkdjfFWyH50';
        $desc = 'Testing Charge';
        
        echo $this->stripe->charge_customer($amount, $customer_id, $desc);
    }
	
	function update_customer(){
        $config['stripe_key_test_public']         = 'pk_m9mjcmI1XxXkcqIk83awd3EPKeCRh';
        $config['stripe_key_test_secret']         = '3InMbRrGf9vK1HD6P8PW13RWsExh9niE';
        $config['stripe_key_live_public']         = '';
        $config['stripe_key_live_secret']         = '';
        $config['stripe_test_mode']               = TRUE;
        $config['stripe_verify_ssl']              = FALSE;
        $this->load->library('stripe', $config);
        
        /*
         * Need to remove this testing data
         * 
         */
        
        $amount = '50';
        $customer_id = 'cus_zYrzkdjfFWyH50';
        $desc = 'Testing Charge';
		$email = 'bryanjang@gmail.com';
		$newdata = array('email'=>$email,'card'=>$card, 'description' =>$desc);
        
        echo $this->stripe->customer_update( $customer_id, $newdata );
    }
	
	function account_management_buyer() {
		
		// If not logged in, redirect to login. 
		
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
        
        $this->load->model('data_model');
        $user_id = $this->session->userdata('user_id');
        if (!$this->data_model->valid_credit_card($user_id)) {
            redirect('auth/register_credit_card');
        }
		
		$data['buyers_account_data'] = $this->data_model->get_buyers_account_data($user_id);
		$this->load->view('account_management_buyer_view', $data);
	}
	
	function account_management_seller() {
		
		// If not logged in, redirect to login. 
		
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		
		
		$user_id = $this->session->userdata('user_id');
		$this->load->model('data_model');
		$data['sellers_account_data'] = $this->data_model->get_sellers_account_data($user_id);
		$this->load->view('account_management_seller_view', $data);
	}
	
	function dompdf() {
		$path = getcwd()."/dompdf/dompdf_config.inc.php";
		require_once($path);
		$html = $this->load->view('purchase_order_view', '', true);
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		$pdf = $dompdf->output();
		$file_path = './_attachments/'.now().'.pdf';
		file_put_contents($file_path, $pdf);
	}
	
	function vehicle_owner_representations_and_disclosures() {
		$this->load->view('vehicle_owner_representations_and_disclosures_view');
	}
	
	function send_mail() {
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['status_message'] = "";
			$this->load->view('contact_us_view', $data);
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$message = $this->input->post('message');
            $to = $this->config->item('email_to_admin');
			$this->load->library('email');
	        $this->email->from($email, $name);
	        $this->email->to($to);
	        $this->email->subject('Contact from eTradeInBids Contact Page');
	        $this->email->message($message);
			if ($this->email->send()) {
	            $data['status_message'] = "<h1>Success</h1><p>Thanks for contacting eTradeInBids.</p>";
	            $this->load->view('contact_us_view', $data);
	        } else {
	            $data['status_message'] = "<h1>Sorry</h1><p>There was an error sending your email. Please try again later.</p>";
	            $this->load->view('contact_us_view', $data);
	        }
		}
	}
	
	function login_failed () {
		$this->load->view('login_failed_view');	
	}
	
	function index() {
		//$this->session->set_flashdata('message', 'testing the flashdata message');
		$this->load->view('home_view');
	}
	
	function get_vin_data() {
		$vin = $this->input->post('vin_lookup');
		$this->load->model('data_model');
		$data['vin_data'] = $this->data_model->get_vin_data($vin);
		$data['model_years'] = $this->data_model->get_model_years();
		$this->load->view('sellers_account_list_vehicle_view', $data);
	}
	
	function sellers_account_list_vehicle() {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		
		$data = array();
		$this->load->model('data_model');
		
		if ($this->input->post('vin_lookup_hidden')) {
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('vin_lookup', 'VIN', 'required|exact_length[17]');
			
			if ($this->form_validation->run() == TRUE) {
				$vin = $this->input->post('vin_lookup');
				$vin_result = $this->data_model->get_vin_data($vin);
                if($vin_result->modelYear) {
				    $data['vin_data'] = $vin_result;
                } else {
                    $data['vin_error'] = '';
                }
			}
		}
        
		$data['model_years'] = $this->data_model->get_model_years();
		$this->load->view('sellers_account_list_vehicle_view', $data);
	}
	
	function admin() {
		$this->load->model('data_model');
		$pending_buyer_accounts = $this->data_model->get_all_pending_buyer_accounts();
		$all_buyer_accounts = $this->data_model->get_all_buyer_accounts();
		$all_seller_accounts = $this->data_model->get_all_seller_accounts();
        $all_vehicles_and_related_data = $this->data_model->get_all_vehicles_and_related_data();
		$data['pending_buyer_accounts'] = $pending_buyer_accounts;
		$data['all_buyer_accounts'] = $all_buyer_accounts;
		$data['all_seller_accounts'] = $all_seller_accounts;
		$data['all_vehicles_and_related_data'] = $all_vehicles_and_related_data;
		$this->load->view('admin_view', $data);
	}
	
	function waiting_for_approval(){
		$this->load->view('waiting_for_approval');
	}
	
	function reset_password_email_sent() {
		$this->load->view('reset_password_email_sent_view');
	}
	
	function new_password_sent() {
		$this->load->view('new_password_sent_view');
	}

	function dealers() {
		if ($this->ion_auth->logged_in()) {
			redirect('site/my_account');
		}
		$this->load->view('dealers_view');
	}
	
	function buyers_account_active_vehicles() {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
        
        $this->load->model('data_model');
        $user_id = $this->session->userdata('user_id');
        if (!$this->data_model->valid_credit_card($user_id)) {
            redirect('auth/register_credit_card');
        }
        
		$data = array();
		$data['results'] = array();
		if ($query = $this->data_model->get_all_vehicles_for_sale_with_images()) {
			$data['results'] = $query;
		}
		$this->load->view('buyers_account_active_vehicles_view', $data);
	}

	function sellers_account_active_vehicles() {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		$this->load->model('data_model');
		$data = array();
		$data['results'] = array();
		$user_id = $this->session->userdata('user_id');
		if ($query = $this->data_model->get_all_active_listings_by_user($user_id)) {
			$data['results'] = $query;
		}
		$this->load->view('sellers_account_active_vehicles_view', $data);
	}

	function sellers_account_inactive_vehicles() {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		$this->load->model('data_model');
		$data = array();
		$data['results'] = array();
		$user_id = $this->session->userdata('user_id');
		if ($query = $this->data_model->get_all_inactive_vehicles_by_user($user_id)) {
			$data['results'] = $query;
		}
		$this->load->view('sellers_account_inactive_vehicles_view', $data);
	}
	
	function update_forgotten_password($forgotten_password_code) {
		
		$data['forgotten_password_code'] = $forgotten_password_code;
		
		$this->load->view('update_forgotten_password', $data);
	}
	
	function sellers_account_reports() {
		
		// !!!!! We might need to lock down the login stuff further to make sure buyers can't see seller URLS (since we're only checking for login, not the account type) at the moment
		
		// Looking for vehicles with an accepted bid status for a particular user. 
		// We'll also want the bid amount.
		// Should also add bid accepted date to database.
		
		
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		$seller_id = $this->session->userdata('user_id');
		$this->load->model('data_model');
		$data['accepted_bids'] = $this->data_model->get_accepted_bids_by_seller($seller_id);
//		foreach ($accepted_bids as $vehicle) {
//			echo $vehicle->winning_bid_id;
//		}
		
//		echo "<pre>";
//		print_r($data['accepted_bids']);
//		echo "</pre>";
		$this->load->view('sellers_account_reports_view', $data);
	}
	
	function buyers_account_reports() {
		
		// !!!!! We might need to lock down the login stuff further to make sure buyers can't see seller URLS (since we're only checking for login, not the account type) at the moment
		
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
        
        $this->load->model('data_model');
        $user_id = $this->session->userdata('user_id');
        if (!$this->data_model->valid_credit_card($user_id)) {
            redirect('auth/register_credit_card');
        }
        
		$data['accepted_bids'] = $this->data_model->get_accepted_bids_by_buyer($user_id);
		$this->load->view('buyers_account_reports_view', $data);
	}
	


	function sell_cars() {
		//		if (!$this->ion_auth->logged_in()) {
		//			redirect('site/login');
		//		} else {
		//			$this->load->view('sellers_account');
		//		}
		if ($this->ion_auth->logged_in()) {
			redirect('site/my_account');
		}
		$this->load->view('sell_cars_view');
	}

	function buy_cars() {
		/*
		 if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
			} else {
			$this->load->view('buyers_account');
			}
			*/
		$this->load->view('buy_cars_view');
	}

	function login() {
		$this->load->view('login_view');
	}

	function logged_out() {
		$this->load->view('logged_out_view');
	}

	function register() {
		$this->load->view('register_view');
	}

	function register_buyer() {
		$this->load->view('register_buyer_view');
	}

	function register_seller() {
		$this->load->view('register_seller_view');
	}

    function buyer_update_success() {
		$this->load->view('buyer_update_success_view');
	}
	
	 function seller_update_success() {
		$this->load->view('seller_update_success_view');
	}
	
	function buyer_registration_success() {
		$this->load->view('buyer_registration_success_view');
	}
	
	function buyer_registration_failure() {
		$this->load->view('buyer_registration_failure_view');
	}
	
	function credit_card_update_success() {
		$this->load->view('credit_card_update_success_view');
	}
	
	function credit_card_registration_failed() {
	    $email = $this->session->flashdata('email');
        echo "Controller Email = ".$email;
		$this->load->view('credit_card_registration_failed_view');
	}
	
	function credit_card_update_failure() {
		$this->load->view('credit_card_update_failure_view');
	}
	
	function credit_card_last_update_failure() {
		$this->load->view('credit_card_last_update_failure_view');
	}
	
	function credit_card_charge_failure() {
		$this->load->view('credit_card_charge_failure_view');
	}
	
	function credit_card_info_enter($id, $email) {
		$data['email'] = $email;
		$data['id'] = $id;
		$this->load->view('credit_card_info_enter_view', $data);
	}
	
	function credit_card_info_re_enter($id, $email) {
		$data['email'] = $email;
		$data['id'] = $id;
		$this->load->view('credit_card_info_re_enter_view', $data);
	}
	
	function register_credit_card_info($id, $email) {
		$data['email'] = $email;
		$data['id'] = $id;
		$this->load->view('register_credit_card_info_view', $data);
	}
	
    /* 
	
     function first_buyer_registration_failure() {
		$this->load->view('first_buyer_registration_failure_view');
	}
	
    */
   
	function seller_registration_success() {
		$this->load->view('seller_registration_success_view');
	}

	function current_listings() {
		//$this->load->view('current_listings_view', $data);
	}

	function how_this_works() {
		$this->load->view('how_this_works_view');
	}

	function image_upload() {
		//$this->load->model('image_model');
		//$this->image_model->do_upload();
	}

	function about_us() {
		$this->load->view('about_us_view');
	}
	
	function update_password_success() {
		$this->load->view('update_password_success');
	}
	
	function my_account() {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
        
		if ($this->session->userdata('account_type') == 'buyer') {
		    $this->load->model('data_model');
            $user_id = $this->session->userdata('user_id');
            if (!$this->data_model->valid_credit_card($user_id)) {
                redirect('auth/register_credit_card');
            }
			redirect('site/buyers_account_active_vehicles');
		} else {
			redirect('site/sellers_account_active_vehicles');
		}
	}

	function upload_test() {
		$this->load->view('upload_test_view');
	}

	function uploadify() {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
        
        $this->load->model('data_model');
        $user_id = $this->session->userdata('user_id');
        if (!$this->data_model->valid_credit_card($user_id)) {
            //redirect('auth/register_credit_card');
        }
        
        
		$file = $this->input->post('filearray');
		$data['json'] = json_decode($file);
		$this->load->model('image_model');
		//print_r($data);
		$this->image_model->process_uploadify_image($data);
	}

	function submit_bid() {
		date_default_timezone_set('UTC');
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
        
        $this->load->model('data_model');
        $user_id = $this->session->userdata('user_id');
        if (!$this->data_model->valid_credit_card($user_id)) {
            redirect('auth/register_credit_card');
        }

        
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('bid_amount', 'Bid Amount', 'required');
		$this->load->model('data_model');
		
		if ($this->form_validation->run() == FALSE) {
			$data = array();
			$data['results'] = array();
			if ($query = $this->data_model->get_all_vehicles_for_sale_with_images()) {
				$data['results'] = $query;
			}
			$this->load->view('buyers_account_active_vehicles_view', $data);
		} else {
			//$search_for = Array('$', ',');
			//$replace_with = Array('', '');
			//$bid_amount = str_replace($search_for, $replace_with, $this->input->post('bid_amount'));
            $bid_amount = preg_replace("/[^0-9]/", '', $this->input->post('bid_amount'));
			$data = array(
				'vehicle_id'	=> $this->input->post('vehicle_id'),
				'buyer_id' 		=> $this->input->post('buyer_id'),
				'seller_id' 	=> $this->input->post('seller_id'),
				'bid_amount' 	=> preg_replace("/[^0-9]/", '', $bid_amount),
				'bid_time'		=> date('Y-m-d H:i:s', time()), 
				'bid_session'   => $this->input->post('bid_session')
			);
			
			$result = $this->data_model->submit_bid($data);
			
			if (!$result) {
				echo "Sorry, there was an error.";
			} else {
                $seller_id = $this->input->post('seller_id');
                $seller_details = $this->data_model->get_user_details_by_id ($seller_id);
                $seller_email = $seller_details[0]->email;
                $bcc_email = $this->config->item('email_to_josh');
                $from_email = $this->config->item('email_from_support'); 
                $from_name = $this->config->item('email_name_from_alerts'); 
                $this->load->library('email');
                $this->email->set_newline("\r\n");
                $this->email->from($from_email, $from_name);
                $this->email->to($seller_email);
                $this->email->bcc($bcc_email);
                $this->email->subject('Your Vehicle Just Received a Bid');
                $this->email->message('Your vehicle on eTradeInBids.com just received a bid. Login to view the bid at https://www.etradeinbids.com');
                $this->email->send();
                
				redirect('site/bid_submitted');
			}
		}
	}
	
	function bid_submitted() {
		$this->load->view('bid_submitted_view');
	}

	function add_vehicle(){
		date_default_timezone_set('UTC');
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		
		$year_make_model_style_selections = array(
			'year'  => $this->input->post('year'),
			'make'	=> $this->input->post('make'),
			'model' => $this->input->post('model'),
			'style' => $this->input->post('style')
		);
		
		$any_accidents_value = array(
			'any_accidents' => $this->input->post('any_accidents')
		);
		
		$this->session->set_userdata($year_make_model_style_selections);
		$this->session->set_userdata($any_accidents_value);
		
		$this->load->model('data_model');

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('year', 'Year', 'required|numeric');
		$this->form_validation->set_rules('make', 'Make', 'required');
		$this->form_validation->set_rules('model', 'Model', 'required');
		$this->form_validation->set_rules('style', 'Style', 'required');
		$this->form_validation->set_rules('drive_type', 'Drive Type', 'required');
		$this->form_validation->set_rules('vin', 'VIN', 'required|exact_length[17]|alpha_numeric');
		$this->form_validation->set_rules('upholstery_type', 'Upholstery Type', 'required');
		$this->form_validation->set_rules('number_of_cylinders', 'Number of Cylinders', 'required');
		$this->form_validation->set_rules('transmission_type', 'Transmission Type', 'required');
		$this->form_validation->set_rules('number_of_speeds', 'Number of Speeds', 'required');
		$this->form_validation->set_rules('fuel_type', 'Fuel Type', 'required');
		$this->form_validation->set_rules('exterior_color', 'Exterior Color', 'required');
		$this->form_validation->set_rules('interior_color', 'Interior Color', 'required');
        $this->form_validation->set_rules('mileage', 'Mileage', 'required');
		$this->form_validation->set_rules('is_actual_mileage', 'Is Mileage Actual', 'required');
        if ($this->input->post('is_actual_mileage') == 'No') {
            $this->form_validation->set_rules('mileage_notes', 'Mileage Notes', 'required');    
        }
		$this->form_validation->set_rules('original_owner', 'Original Owner', 'required');
		$this->form_validation->set_rules('any_accidents', 'Any Accidents', 'required');
		if ($this->input->post('any_accidents') == 'Yes') {
			$this->form_validation->set_rules('accident_repair_history', 'Accident Repair History', 'required');	
		}
		$this->form_validation->set_rules('any_repainting', 'Any Repainting', 'required');
		$this->form_validation->set_rules('vehicle_location_street', 'Vehicle Street Location', 'required');
		$this->form_validation->set_rules('vehicle_location_city', 'Vehicle Location City', 'required');
		$this->form_validation->set_rules('vehicle_location_state', 'Vehcile Location State', 'required');
		$this->form_validation->set_rules('vehicle_location_zip', 'Vehicle Location Zip', 'required');
		$this->form_validation->set_rules('license_plate_number', 'License Plate Number', 'required');
		$this->form_validation->set_rules('state_of_registration', 'State of Registration', 'required');
		$this->form_validation->set_rules('registration_expiration_month', 'Registration Month', 'required');
		$this->form_validation->set_rules('registration_expiration_year', 'Registration Year', 'required');
		$this->form_validation->set_rules('power_steering', 'Power Steering', 'required');
		$this->form_validation->set_rules('air_conditioning', 'Air Conditioning', 'required');
		$this->form_validation->set_rules('power_windows', 'Power Windows', 'required');
		$this->form_validation->set_rules('power_door_locks', 'Power Door Locks', 'required');
		$this->form_validation->set_rules('cruise_control', 'Cruise Control', 'required');
		$this->form_validation->set_rules('cd_player_changer', 'CD Player/Changer', 'required');
		$this->form_validation->set_rules('premium_sound', 'Premium Sound', 'required');
		$this->form_validation->set_rules('integrated_phone', 'Integrated Phone', 'required');
		$this->form_validation->set_rules('dual_airbags', 'Dual Airbags', 'required');
		$this->form_validation->set_rules('four_wheel_abs_brakes', 'Four Wheel ABS Brakes', 'required');
		$this->form_validation->set_rules('traction_control', 'Traction Control', 'required');
		$this->form_validation->set_rules('power_seat', 'Power Seat', 'required');
		$this->form_validation->set_rules('dual_power_seats', 'Dual Power Seat', 'required');
		$this->form_validation->set_rules('flip_up_moon_roof', 'Flip-up Moon Roof', 'required');
		$this->form_validation->set_rules('privacy_glass', 'Privacy Glass', 'required');
		$this->form_validation->set_rules('navigation', 'Navigation', 'required');
		$this->form_validation->set_rules('entertainment_system_dvd', 'Entertainment System/DVD', 'required');
		$this->form_validation->set_rules('oversized_off_road_tires', 'Oversized/Off Road Tires', 'required');
		$this->form_validation->set_rules('roof_rack', 'Roof Rack', 'required');
		$this->form_validation->set_rules('running_boards', 'Running Boards', 'required');
		$this->form_validation->set_rules('sliding_rear_window', 'Sliding Rear Window', 'required');
		$this->form_validation->set_rules('bed_liner', 'Bed Liner', 'required');
		$this->form_validation->set_rules('canopy_shell', 'Canopy Shell', 'required');
		$this->form_validation->set_rules('quad_seating', 'Quad Seating', 'required');
		$this->form_validation->set_rules('tilt_steering_wheel', 'Tilt Steering Wheel', 'required');
		$this->form_validation->set_rules('all_wheel_drive', 'All Wheel Drive', 'required');
		$this->form_validation->set_rules('alloy_wheels', 'Alloy Wheels', 'required');
		$this->form_validation->set_rules('towing_package', 'Towing Package', 'required');
		$this->form_validation->set_rules('custom_bumper', 'Custom Bumper', 'required');
		$this->form_validation->set_rules('grill_guard', 'Grill Guard', 'required');
		$this->form_validation->set_rules('third_row_seat', 'Third Row Seat', 'required');
		$this->form_validation->set_rules('paint_body_condition', 'Paint/Body Condition', 'required');
		$this->form_validation->set_rules('glass_condition', 'Glass Condition', 'required');
		$this->form_validation->set_rules('tires_condition', 'Tires Condition', 'required');
		$this->form_validation->set_rules('brakes_condition', 'Brakes Condition', 'required');
		$this->form_validation->set_rules('transmission_condition', 'Transmission Condition', 'required');
		$this->form_validation->set_rules('clutch_condition', 'Clutch Condition', 'required');
		$this->form_validation->set_rules('carpet_condition', 'Carpet Condition', 'required');
		$this->form_validation->set_rules('upholstery_condition', 'Upholstery Condition', 'required');
		$this->form_validation->set_rules('engine_condition', 'Engine Condition', 'required');
		$this->form_validation->set_rules('exhaust_condition', 'Exhaust Condition', 'required');
		$this->form_validation->set_rules('shocks_condition', 'Shocks Condition', 'required');
		$this->form_validation->set_rules('air_conditioning_condition', 'Air Conditioning Condition', 'required');
		$this->form_validation->set_rules('vehicle_smoked_in', 'Vehicle Smoked In', 'required');
		$this->form_validation->set_rules('salvage', 'Salvage', 'required');
		$this->form_validation->set_rules('lemon_law_buyback', 'Lemon Law/Buyback', 'required');
		$this->form_validation->set_rules('warranty_return', 'Warranty Return', 'required');
		$this->form_validation->set_rules('frame_damage', 'Frame Damage', 'required');
		$this->form_validation->set_rules('flood_damage', 'Flood Damage', 'required');
		$this->form_validation->set_rules('general_overall_condition', 'General Overall Condition', 'required');
		$this->form_validation->set_rules('additional_condition_information', 'Additional Condition Information', 'required');
		$this->form_validation->set_rules('terms_of_use', 'Terms of Use', 'required');
		
		/* Need to build registration date? */
		
		$vin_exists = $this->data_model->check_for_exisitng_vin($this->input->post('vin'));
        
		
		if ($this->form_validation->run() == FALSE) { // FALSE FOR PRODUCTION
			$this->load->model('data_model');
			$data['model_years'] = $this->data_model->get_model_years();
			$this->load->view('sellers_account_list_vehicle_view', $data);
		} elseif ($vin_exists) {
		    $this->session->set_flashdata('message', 'Sorry, that VIN is in use.');
            $this->load->model('data_model');
            $data['model_years'] = $this->data_model->get_model_years();
            $data['vehicle_data'] = $vin_exists;
            $this->load->view('sellers_account_list_vehicle_view', $data);
		} else {
			$year_make_model_style_selections = array(
				'year'  => '',
				'make'	=> '',
				'model' => '',
				'style' => ''
			);
			
			$any_accidents_value = array(
				'any_accidents' => ''
			);
			
			$this->session->unset_userdata($year_make_model_style_selections);
			$this->session->unset_userdata($any_accidents_value);
		
		$data = array(
			'user_id' 						=> $this->session->userdata('user_id'),
			'year' 							=> $this->input->post('year'),
			'make' 							=> $this->input->post('make'),
			'model' 						=> $this->input->post('model'),
			'style' 						=> $this->input->post('style'),
			'vin' 							=> $this->input->post('vin'),
			'exterior_color' 				=> $this->input->post('exterior_color'),
			'interior_color' 				=> $this->input->post('interior_color'),
			'upholstery_type' 				=> $this->input->post('upholstery_type'),
			'number_of_cylinders' 			=> $this->input->post('number_of_cylinders'),
			'transmission_type' 			=> $this->input->post('transmission_type'),
			'number_of_speeds' 				=> $this->input->post('number_of_speeds'),
			'fuel_type' 					=> $this->input->post('fuel_type'),
			'drive_type' 					=> $this->input->post('drive_type'),
            'mileage'                       => str_replace (',', '', $this->input->post('mileage')),
            'is_actual_mileage'             => $this->input->post('is_actual_mileage'),
			'mileage_notes' 				=> $this->input->post('mileage_notes'),
			'original_owner' 				=> $this->input->post('original_owner'),
			'any_accidents' 				=> $this->input->post('any_accidents'),
			'any_repainting' 				=> $this->input->post('any_repainting'),
			'vehicle_location_street' 		=> $this->input->post('vehicle_location_street'),
			'vehicle_location_city' 		=> $this->input->post('vehicle_location_city'),
			'vehicle_location_state' 		=> $this->input->post('vehicle_location_state'),
			'vehicle_location_zip' 			=> $this->input->post('vehicle_location_zip'),
			'license_plate_number' 			=> $this->input->post('license_plate_number'),
			'state_of_registration' 		=> $this->input->post('state_of_registration'),
			'registration_expiration_month'	=> $this->input->post('registration_expiration_month'),
			'registration_expiration_year'	=> $this->input->post('registration_expiration_year'),
			'main_image_path'				=> $this->input->post('main_image_path'),
			'paint_body_condition'			=> $this->input->post('paint_body_condition'),
			'glass_condition'				=> $this->input->post('glass_condition'),
			'tires_condition'				=> $this->input->post('tires_condition'),
			'brakes_condition'				=> $this->input->post('brakes_condition'),
			'transmission_condition'		=> $this->input->post('transmission_condition'),
			'clutch_condition'				=> $this->input->post('clutch_condition'),
			'carpet_condition'				=> $this->input->post('carpet_condition'),
			'upholstery_condition'			=> $this->input->post('upholstery_condition'),
			'engine_condition'				=> $this->input->post('engine_condition'),
			'exhaust_condition'				=> $this->input->post('exhaust_condition'),
			'shocks_condition'				=> $this->input->post('shocks_condition'),
			'air_conditioning_condition'	=> $this->input->post('air_conditioning_condition'),
			'vehicle_smoked_in'				=> $this->input->post('vehicle_smoked_in'),
			'salvage'						=> $this->input->post('salvage'),
			'lemon_law_buyback'				=> $this->input->post('lemon_law_buyback'),
			'warranty_return'				=> $this->input->post('warranty_return'),
			'frame_damage'					=> $this->input->post('frame_damage'),
			'flood_damage'					=> $this->input->post('flood_damage'),
			'additional_condition_information'	=> $this->input->post('additional_condition_information'),
			'general_overall_condition'		=> $this->input->post('general_overall_condition'),
			'accident_repair_history'		=> $this->input->post('accident_repair_history'),
			'vehicle_type'					=> $this->input->post('vehicle_type'),
			'power_steering'				=> $this->input->post('power_steering'),
			'all_wheel_drive'				=> $this->input->post('all_wheel_drive'),
			'air_conditioning'				=> $this->input->post('air_conditioning'),
			'power_windows'					=> $this->input->post('power_windows'),
			'power_door_locks'				=> $this->input->post('power_door_locks'),
			'tilt_steering_wheel'			=> $this->input->post('tilt_steering_wheel'),
			'cruise_control'				=> $this->input->post('cruise_control'),
			'cd_player_changer'				=> $this->input->post('cd_player_changer'),
			'premium_sound'					=> $this->input->post('premium_sound'),
			'integrated_phone'				=> $this->input->post('integrated_phone'),
			'dual_airbags'					=> $this->input->post('dual_airbags'),
			'four_wheel_abs_brakes'			=> $this->input->post('four_wheel_abs_brakes'),
			'traction_control'				=> $this->input->post('traction_control'),
			'power_seat'					=> $this->input->post('power_seat'),
			'dual_power_seats'				=> $this->input->post('dual_power_seats'),
			'flip_up_moon_roof'				=> $this->input->post('flip_up_moon_roof'),
			'privacy_glass'					=> $this->input->post('privacy_glass'),
			'navigation'					=> $this->input->post('navigation'),
			'alloy_wheels'					=> $this->input->post('alloy_wheels'),
			'entertainment_system_dvd'		=> $this->input->post('entertainment_system_dvd'),
			'towing_package'				=> $this->input->post('towing_package'),
			'oversized_off_road_tires'		=> $this->input->post('oversized_off_road_tires'),
			'roof_rack'						=> $this->input->post('roof_rack'),
			'running_boards'				=> $this->input->post('running_boards'),
			'sliding_rear_window'			=> $this->input->post('sliding_rear_window'),
			'bed_liner'						=> $this->input->post('bed_liner'),
			'canopy_shell'					=> $this->input->post('canopy_shell'),
			'custom_bumper'					=> $this->input->post('custom_bumper'),
			'grill_guard'					=> $this->input->post('grill_guard'),
			'quad_seating'					=> $this->input->post('quad_seating'),
			'third_row_seat'				=> $this->input->post('third_row_seat'),
			'listing_status'				=> 'active_listing',
			'date_added'					=> date('Y-m-d H:i:s', time()),
			'bid_status'					=> 'open',
			'invoice_status'				=> 'not_invoiced', 
			'bid_session'                    => 0
			);
			
			$vehicle_id = $this->data_model->add_vehicle($data);

			if ($vehicle_id) {
				$all_dealers = $this->data_model->get_all_dealers(true);
				//$dealer_email_array = Array();
				foreach ($all_dealers as $dealer) {
					$vehicle_details 		= $this->data_model->get_vehicle_details($vehicle_id);
					$vehicle_year 			= $vehicle_details[0]->year; 
					$vehicle_make 			= $vehicle_details[0]->make; 
					$vehicle_model 			= $vehicle_details[0]->model; 
					$vehicle_style 			= $vehicle_details[0]->style;
                    $message = "A ".$vehicle_year." ".$vehicle_make." ".$vehicle_model." has been listed on eTradeInBids.com and is waiting for your bid. Please click here https://www.etradeinbids.com to submit your bid. Bidding will close in 48 hours or when the seller accepts a bid. Good luck!\n\n";
                    $from_email = $this->config->item('email_from_support');
                    $from_name = $this->config->item('email_name_from_alerts');
                    $bcc_email = $this->config->item('email_to_josh');
                    $this->load->library('email');
                    $this->email->clear();
                    $this->email->from($from_email, $from_name);
                    $this->email->to($dealer->email);
                    $this->email->bcc($bcc_email);
                    $this->email->subject('New Listing on eTradeInBids.com | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model);
                    $this->email->message($message);
                    $this->email->send();
					//array_push($dealer_email_array, $dealer->email);
				}
				
				redirect("site/vehicle_added/".$vehicle_id);
			} else {
				//$this->load->model('data_model');
				//$this->data_model->diplay_errors();
			}
		}
	}
	
	function vehicle_added($vehicle_id) {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		$this->session->set_userdata('vehicle_id', $vehicle_id);
		$this->load->model('data_model');
		$result = $this->data_model->get_vehicle_by_id($vehicle_id);
		$data['result'] = $result;
		if(!$result) {
			echo "Sorry, there was an error.";
		} else {
			$this->load->view('vehicle_added_view', $data);
		}
	}
//	
//	function accept_bid($vehicle_id, $buyer_id, $seller_id) {
//		
//		log_message('debug', 'URI: '.$this->uri->uri_string());
//		
//		if (!$this->ion_auth->logged_in()) {
//			redirect('site/login');
//		}
//		// Remove vehicle from results.
//		// Send seller an email confimring bid acceptance with buyer contact information
//		// Charge buyers credit card transaction fee.
//		// Send buyer an email with transaction confirmation and sellers contact information.
//
//		$this->load->model('data_model');
//		$buyer_details = $this->data_model->accept_bid($vehicle_id, $buyer_id);
//		
//		if (!$buyer_details) {
//			echo "Sorry, there was an error accepting the bid. Please try again later.";
//		} else {
//			
//			$buyer_name 			= $buyer_details[0]->first_name.' '.$buyer_details[0]->last_name; ; 
//			$buyer_dealer_name 		= $buyer_details[0]->dealer_name; 
//			$buyer_street_address 	= $buyer_details[0]->business_street_address; 
//			$buyer_city_state 		= $buyer_details[0]->business_city.', '.$buyer_details[0]->business_state.' '.$buyer_details[0]->business_zip_code;
//			$buyer_phone 			= $buyer_details[0]->business_telephone_number; 
//			$buyer_email 			= $buyer_details[0]->email;
//			$successful_buyer_id	= $buyer_details[0]->user_id;
//
//			$seller_details = $this->data_model->get_seller_details($seller_id);
//			$seller_name 			= $seller_details[0]->first_name.' '.$seller_details[0]->last_name; ; 
//			$seller_street_address 	= $seller_details[0]->business_street_address; 
//			$seller_city_state 		= $seller_details[0]->business_city.', '.$seller_details[0]->business_state.' '.$seller_details[0]->business_zip_code;
//			$seller_phone 			= $seller_details[0]->telephone_number; 
//			$seller_email 			= $seller_details[0]->email;
//			
//			$vehicle_details = $this->data_model->get_vehicle_details($vehicle_id);
//			$vehicle_year 			= $vehicle_details[0]->year; 
//			$vehicle_make 			= $vehicle_details[0]->make; 
//			$vehicle_model 			= $vehicle_details[0]->model; 
//			$vehicle_style 			= $vehicle_details[0]->style;
//			
//			$message = "Thank you for using eTradeInBids\n\n Below you will find contact information the parties involved in the purchase of the ".$vehicle_year." ".$vehicle_make." ".$vehicle_model."\n\n";
//			$message .= "Buyer\'s Name: ".$buyer_name."\n";
//			$message .= "Dealer Name: ".$buyer_dealer_name."\n";
//			$message .= "Buyer\'s Street Address: ".$buyer_street_address." ".$buyer_city_state."\n"; 
//			$message .= "Buyer\'s Phone: ".$buyer_phone."\n";
//			$message .= "Buyer\'s Email: ".$buyer_email."\n\n\n";
//			
//			$message .= "Seller\'s Name: ".$seller_name."\n";
//			$message .= "Seller\'s Street Address: ".$seller_street_address." ".$seller_city_state."\n"; 
//			$message .= "Seller\'s Phone: ".$seller_phone."\n";
//			$message .= "Seller\'s Email: ".$seller_email."\n\n\n";
//			
//			$this->load->library('email');
//			$this->email->from('no_reply@etradeinbids.com', 'eTradeInBids');
//			$this->email->to($buyer_email);
//			$this->email->subject('Vehicle Contact Information | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model.' '.$vehicle_style);
//			$this->email->message($message);
//			$this->email->send();
//			
//			$this->email->from('no_reply@etradeinbids.com', 'eTradeInBids');
//			$this->email->to($seller_email);
//			$this->email->subject('Vehicle Contact Information | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model.' '.$vehicle_style);
//			$this->email->message($message);
//			$this->email->send();
//			
//			// Send Email to Unsuccessful Bidders
//			
//			$bids = $this->data_model->get_vehicle_bid_history($vehicle_id);
//			
////			echo "<pre>";
////			print_r($bids);		
////			echo "</pre>";
//			
//			foreach($bids as $bid) {
//				
//				$bidder_id = $bid->buyer_id;
//				
//				echo "BID Buyer ID: ".$bidder_id."<br />";
//				echo "Successful BUYER ID: ".$successful_buyer_id."<br />";
//				
//				if ($bidder_id != $successful_buyer_id) {
//					
//					echo "Send Failed Email";
//					log_message('debug', 'BID Loop');
//					
//					$failed_bidder_details = $this->data_model->get_user_by_id($bidder_id);
//					$failed_bidder_email = $failed_bidder_details[0]->email;
//					$failed_bidder_message = "Sorry, the seller of the ".$vehicle_year." ".$vehicle_make." ".$vehicle_model." did not accept your bid. Please click here http://www.etradeinbids.com to bid on other vehicles. Thanks for using eTradeInBids\n\n";
//					$this->email->from('no_reply@etradeinbids.com', 'eTradeInBids');
//					$this->email->to($failed_bidder_email);
//					$this->email->subject('Information About Your Bid | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model);
//					$this->email->message($failed_bidder_message);
//					$this->email->send();
//				}
//			} 
//			
//			$data['buyer_details'] = $buyer_details;
//			$this->load->view('bid_accepted_confirmation_view', $data);
//		}
//	}
	
	function accept_bid($vehicle_id, $buyer_id, $seller_id, $bid_id) {
		
		//log_message('debug', 'URI: '.$this->uri->uri_string());
		
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		// Remove vehicle from results.
		// Send seller an email confirming bid acceptance with buyer contact information
		// Charge buyers credit card transaction fee.
		// Send buyer an email with transaction confirmation and sellers contact information.
		
		

		$this->load->model('data_model');
		$buyer_details = $this->data_model->accept_bid($vehicle_id, $buyer_id, $bid_id);

        $stripe_config = $this->config->item('stripe_config');
        $this->load->library('stripe', $stripe_config);
		
		//get customer_id; customer_id = stripe_id from user_table;
		
		$email 			= $buyer_details[0]->email;	
		$user_details 	= $this->data_model->get_user_details($email);
		$customer_id	= $user_details[0]->stripe_id;	
		
		//get accepted bid amount;
		$bid_amount = $this->data_model->get_accepted_bid_amount($vehicle_id, $buyer_id);
		$accepted_bid_amount = $bid_amount[0]->bid_amount;
		
		$desc = 'eTradeInBids Accepted Bid';
		
		if ($accepted_bid_amount <= 10000) {
			$charge_customer = $this->stripe->charge_customer(25000, $customer_id, $desc );
		}
			
		elseif ($accepted_bid_amount >= 10001 && $accepted_bid_amount < 20000) {
			$charge_customer = $this->stripe->charge_customer(30000, $customer_id, $desc );
		}
			
		elseif ($accepted_bid_amount >= 20000) {
			$charge_customer = $this->stripe->charge_customer(35000, $customer_id, $desc );
		}
        
        // TODO - If there's an error, we should let the transaction proceed, send an email to admin, and charge the dealer manually.
        
        $charge_customer = json_decode($charge_customer);
        if (property_exists($charge_customer, 'error')) {
            //redirect('site/credit_card_charge_failure');
            
            $error = print_r($charge_customer, TRUE);
            
            $from_email = $this->config->item('email_from_support');
            $from_name  = $this->config->item('email_name_from_alerts');
            $to_email   = $this->config->item('email_to_admin');
            
            $message = "There was a credit card error with the following transaction: Vehicle ID: $vehicle_id, Buyer ID: $buyer_id, Seller ID: $seller_id, Bid ID: $bid_id The error returned was: $error";
            $this->load->library('email');
            $this->email->from($from_email, $from_name);
            $this->email->to($to_email);
            $this->email->subject('Credit Card Error');
            $this->email->message($message);
            $this->email->send();
            
        }
			
		if (!$buyer_details) {
		    
            $from_email = $this->config->item('email_from_support');
            $from_name  = $this->config->item('email_name_from_alerts');
            $to_email   = $this->config->item('email_to_admin');
            
            $message = "There was an error with the following transaction: Vehicle ID: $vehicle_id, Buyer ID: $buyer_id, Seller ID: $seller_id, Bid ID: $bid_id The variable buyer_details was not defined.";
            $this->load->library('email');
            $this->email->from($from_email, $from_name);
            $this->email->to($to_email);
            $this->email->subject('Credit Card Error');
            $this->email->message($message);
            $this->email->send();
	
			echo "Sorry, there was an error accepting the bid. Please try again later.";
			
		} else {
				
			$buyer_name 			= $buyer_details[0]->first_name.' '.$buyer_details[0]->last_name; ; 
			$buyer_dealer_name 		= $buyer_details[0]->dealer_name; 
			$buyer_street_address 	= $buyer_details[0]->business_street_address; 
			$buyer_city_state 		= $buyer_details[0]->business_city.', '.$buyer_details[0]->business_state.' '.$buyer_details[0]->business_zip_code;
			$buyer_phone 			= $buyer_details[0]->business_telephone_number; 
			$buyer_email 			= $buyer_details[0]->email;
			$successful_buyer_id	= $buyer_details[0]->user_id;
	
			$seller_details = $this->data_model->get_seller_details($seller_id);
			$seller_name 			= $seller_details[0]->first_name.' '.$seller_details[0]->last_name; ; 
			$seller_street_address 	= $seller_details[0]->business_street_address; 
			$seller_city_state 		= $seller_details[0]->business_city.', '.$seller_details[0]->business_state.' '.$seller_details[0]->business_zip_code;
			$seller_phone 			= $seller_details[0]->telephone_number; 
			$seller_email 			= $seller_details[0]->email;
				
			$vehicle_details = $this->data_model->get_vehicle_details($vehicle_id);
			$vehicle_year 			= $vehicle_details[0]->year; 
			$vehicle_make 			= $vehicle_details[0]->make; 
			$vehicle_model 			= $vehicle_details[0]->model; 
			$vehicle_style 			= $vehicle_details[0]->style;
			$vehicle_location_street= $vehicle_details[0]->vehicle_location_street;
			$vehicle_location_city 	= $vehicle_details[0]->vehicle_location_city;
			$vehicle_location_state = $vehicle_details[0]->vehicle_location_state;
			$vehicle_location_zip 	= $vehicle_details[0]->vehicle_location_zip;
            $bid_session            = $vehicle_details[0]->bid_session;
				
			$message = "Thank you for using eTradeInBids\n\n Below you will find contact information the parties involved in the purchase of the ".$vehicle_year." ".$vehicle_make." ".$vehicle_model."\n\n";
			$message .= "Buyer\'s Name: ".$buyer_name."\n";
			$message .= "Dealer Name: ".$buyer_dealer_name."\n";
			$message .= "Buyer\'s Street Address: ".$buyer_street_address." ".$buyer_city_state."\n"; 
			$message .= "Buyer\'s Phone: ".$buyer_phone."\n";
			$message .= "Buyer\'s Email: ".$buyer_email."\n\n\n";
				
			$message .= "Seller\'s Name: ".$seller_name."\n";
			$message .= "Seller\'s Street Address: ".$seller_street_address." ".$seller_city_state."\n"; 
			$message .= "Seller\'s Phone: ".$seller_phone."\n";
			$message .= "Seller\'s Email: ".$seller_email."\n\n\n";
				
			$message .= "The vehicle is located at: \n";
			$message .= $vehicle_location_street."\n";
			$message .= $vehicle_location_city.", ".$vehicle_location_state."\n";
			$message .= $vehicle_location_zip."\n";
				
			$path = getcwd()."/dompdf/dompdf_config.inc.php";
			require_once($path);
				
			$bid_details = $this->data_model->get_bid_details($bid_id);
				
			$data['vehicle_details'] = $vehicle_details;
			$data['buyer_details'] = $buyer_details;
			$data['seller_details'] = $seller_details;
			$data['bid_details'] = $bid_details;
				
			$html = $this->load->view('purchase_order_view', $data, true);
			$dompdf = new DOMPDF();
			$dompdf->load_html($html);
			$dompdf->render();
			$pdf = $dompdf->output();
			$file_path = './_attachments/'.now().'.pdf';
			file_put_contents($file_path, $pdf);
		    
            $from_email = $this->config->item('email_from_support');
            $from_name = $this->config->item('email_name_from_alerts');
            $bcc_email = $this->config->item('email_to_josh');
            
			$email_to_array = Array($buyer_email, $seller_email);
			$this->load->library('email');
			$this->email->from($from_email, $from_name);
			$this->email->to($email_to_array);
            $this->email->bcc($bcc_email);
			$this->email->subject('Vehicle Contact Information | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model.' '.$vehicle_style);
			$this->email->message($message);
			$this->email->attach($file_path);
			$this->email->send();
				//unlink($file_path);
				
				// Send Email to Unsuccessful Bidders
				
			$bids = $this->data_model->get_vehicle_bid_history($vehicle_id, $bid_session);
			$previous_bidder_id = ""; // Used to prevent loop from sending to same bidder.
				
			foreach($bids as $bid) {
					
				$this->email->clear(TRUE);
					
				$bidder_id = $bid->buyer_id;
					
				if ($bidder_id != $successful_buyer_id && $bidder_id != $previous_bidder_id) {
						
					$failed_bidder_details = $this->data_model->get_user_by_id($bidder_id);
					$failed_bidder_email = $failed_bidder_details[0]->email;
					$failed_bidder_message = "Sorry, the seller of the ".$vehicle_year." ".$vehicle_make." ".$vehicle_model." did not accept your bid. Please click here https://www.etradeinbids.com to bid on other vehicles. Thanks for using eTradeInBids\n\n";
                    $from_email = $this->config->item('email_from_support');
                    $from_name = $this->config->item('email_name_from_alerts');
                    $bcc_email = $this->config->item('email_to_josh');
					$this->email->from($from_email, $from_name);
					$this->email->to($failed_bidder_email);
                    $this->email->bcc($bcc_email);
					$this->email->subject('Information About Your Bid | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model);
					$this->email->message($failed_bidder_message);
					$this->email->send();
						
					$previous_bidder_id = $bidder_id; // Used to prevent loop from sending to same bidder.
				}
			} 
		}
				$data['buyer_details'] = $buyer_details;
				$this->load->view('bid_accepted_confirmation_view', $data);
	}	

	function delete_vehicle($vehicle_id) {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		$this->load->model('data_model');
		$result = $this->data_model->delete_vehicle($vehicle_id);
		if (!$result) {
			echo "Sorry, there was an error.";
		} else {
			redirect('site/sellers_account_inactive_vehicles', 'refresh');
		}
	}

	function vin_decode() {
		$vin = $this->input->post('vin');
		$xml = simplexml_load_file('http://vindecode.autodatadirect.com/VinDecode.asp?company=ETB&vin='.$vin);
		if ($xml) {
			//print $xml->Countries->Record['CountryCode'];
			$data['xml'] = $xml;
			$this->load->view('vin_results_view', $data);
		} else {
			echo "There was an error with your VIN.";
		}
	}
    
	function activate_vehicle($vehicle_id) {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		$this->load->model('data_model');
        $vehicle_details = $this->data_model->get_vehicle_details($vehicle_id);
        $bid_session = $vehicle_details[0]->bid_session; 
		$result = $this->data_model->activate_vehicle($vehicle_id, $bid_session);
		if ($result) {
			$all_dealers = $this->data_model->get_all_dealers(true);
			//$dealer_email_array = Array();
            foreach ($all_dealers as $dealer) {
                //$vehicle_details        = $this->data_model->get_vehicle_details($vehicle_id);
                $vehicle_year           = $vehicle_details[0]->year; 
                $vehicle_make           = $vehicle_details[0]->make; 
                $vehicle_model          = $vehicle_details[0]->model; 
                $vehicle_style          = $vehicle_details[0]->style;
                $message = "A ".$vehicle_year." ".$vehicle_make." ".$vehicle_model." has been listed on eTradeInBids.com and is waiting for your bid. Please click here https://www.etradeinbids.com to submit your bid. Bidding will close in 48 hours or when the seller accepts a bid. Good luck!\n\n";
                $from_email = $this->config->item('email_from_support');
                $from_name = $this->config->item('email_name_from_alerts');
                $bcc_email = $this->config->item('email_to_josh');
                $this->load->library('email');
                $this->email->clear();
                $this->email->from($from_email, $from_name);
                $this->email->to($dealer->email);
                $this->email->bcc($bcc_email);
                $this->email->subject('New Listing on eTradeInBids.com | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model);
                $this->email->message($message);
                $this->email->send();
                //array_push($dealer_email_array, $dealer->email);
            }
            redirect('site/sellers_account_inactive_vehicles', 'refresh');
        } else {
            echo "Sorry, we could not activate that vehicle. Please try again later.";
        }
            
			// foreach ($all_dealers as $dealer) {
				// $vehicle_details 		= $this->data_model->get_vehicle_details($vehicle_id);
				// $vehicle_year 			= $vehicle_details[0]->year; 
				// $vehicle_make 			= $vehicle_details[0]->make; 
				// $vehicle_model 			= $vehicle_details[0]->model; 
				// $vehicle_style 			= $vehicle_details[0]->style;
				// array_push($dealer_email_array, $dealer->email);
			// }
            // $bcc_email = $this->config->item('email_to_josh');
            // $from_email = $this->config->item('email_from_support');
            // $from_name = $this->config->item('email_name_from_alerts');
			// $message = "A ".$vehicle_year." ".$vehicle_make." ".$vehicle_model." has been listed on eTradeInBids.com and is waiting for your bid. Please click here https://www.etradeinbids.com to submit your bid. Bidding will close in 48 hours or when the seller accepts a bid. Good luck!\n\n";
			// $this->load->library('email');
			// $this->email->from($from_email, $from_name);
			// $this->email->to($dealer_email_array);
			// $this->email->bcc($bcc_email);
			// $this->email->subject('New Listing on eTradeInBids.com | '.$vehicle_year.' '.$vehicle_make.' '.$vehicle_model);
			// $this->email->message($message);
			// $this->email->send();
			// redirect('site/sellers_account_inactive_vehicles', 'refresh');
		// } else {
			// echo "Sorry, we could not activate that vehicle. Please try again later.";
		// }
	}
	
	function deactivate_vehicle($vehicle_id) {
		if (!$this->ion_auth->logged_in()) {
			redirect('site/login');
		}
		$this->load->model('data_model');
		$result = $this->data_model->deactivate_vehicle($vehicle_id);
		if ($result) {
			redirect('site/sellers_account_active_vehicles', 'refresh');
		} else {
			echo "Sorry, we could not deactivate that vehicle. Please try again later.";
		}
	}
	
	function terms_of_service() {
		$this->load->view('terms_of_service_view');
	}
	
	function privacy_policy() {
		$this->load->view('privacy_policy_view');
	}
	
	function contact_us() {
		$data['status_message'] = "";
		$this->load->view('contact_us_view', $data);
	}
	
}

?>