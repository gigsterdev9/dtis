<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Boats extends CI_Controller {

        public function __construct() {
        	parent::__construct();
        	$this->load->helper('url');
        	$this->load->helper('form');
            $this->load->library('ion_auth');
            $this->load->model('boats_model');
            $this->load->library('pagination');
            
            if (!$this->ion_auth->logged_in()) {
				redirect('auth/login');
			}
            
            //debug
			//$this->output->enable_profiler(TRUE);
        }
		
		//list accredited boats
        public function index() {
            
            //set general pagination config
			$config = array();
			$config['base_url'] = base_url('boats');
			
			$config['per_page'] = 100;
			$config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<span>';
			$config['cur_tag_close'] = '</span>';
			$config['prev_link'] = '&laquo;';
			$config['next_link'] = '&raquo;';
			$config['reuse_query_string'] = TRUE; 
            $config["num_links"] = 9;
            
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
				$data['boats'] = $this->boats_model->get_all_boats($config["per_page"], $page);
				$data['boats']['result_count'] = $this->boats_model->record_count();
					$config['total_rows'] = $data['boats']['result_count'];
					$this->pagination->initialize($config);
				$data['links'] = $this->pagination->create_links();

            $data['title'] = 'Accredited Boats';
            
		    $this->load->view('templates/header', $data);
		    $this->load->view('boats/index', $data);
		    $this->load->view('templates/footer', $data);
		    
        }
        
		//add accredited boat
		public function add() {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('email'); //use to email logins
			
			$this->form_validation->set_rules('ab_name', 'Boat Name', 'trim|required');
			$this->form_validation->set_rules('ab_operator', 'Operator Name', 'trim|required');
			$this->form_validation->set_rules('ab_acc_no', 'Accredited No.', 'trim|required');
			$this->form_validation->set_rules('ab_acc_yr', 'Accreditation Yr.', 'trim|required');
			$this->form_validation->set_rules('ab_acc_expiry', 'Accreditation Expiry', 'trim|required');
			

			if ($this->form_validation->run() === FALSE)
			{
				$data['title'] = 'User Management - Add user';
				
				$this->load->view('templates/header', $data);
				$this->load->view('users/add');
				$this->load->view('templates/footer');

			}
			else
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$organization = $this->input->post('organization');
				$status = $this->input->post('user_status');
				
								
				$additional_data = array(
								'first_name' => $firstname,
								'last_name' => $lastname,
								'active' => $status,
								'company' => $organization
								);
				$group = array('2'); // Sets user to admin.
				$this->ion_auth->register($username, $password, $email, $additional_data, $group);
				
				$data['title'] = 'User Management';
				$data['alert_success'] = TRUE;
				
				$this->load->view('templates/header', $data);
				$this->load->view('users/add');
				$this->load->view('templates/footer');
			}


		}
		
		
		//update user data        
		public function edit($id = NULL) 
		{
		
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('email'); //use to email logins
			
			$this->form_validation->set_rules('firstname', 'First name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last name', 'trim|required');
			$this->form_validation->set_rules('organization', 'Organization/Affiliation', 'trim|required');

			if ($this->form_validation->run() === FALSE)
			{
				if (empty($id))
				{
					redirect('users');
				}
				
				$data['title'] = 'User Management - Edit User';
				$data['user'] = $this->users_model->get_user_by_id($id);
				
				$this->load->view('templates/header', $data);
				$this->load->view('users/edit', $data);
				$this->load->view('templates/footer');

			}
			else
			{
				$password = $this->input->post('password');
				$passconf = $this->input->post('passconf');
				$email = $this->input->post('email');
				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$organization = $this->input->post('organization');
				$status = $this->input->post('user_status');
				$user_id = $this->input->post('user_id');
								
				$newdata = array(
								'email' => $email,
								'first_name' => $firstname,
								'last_name' => $lastname,
								'company' => $organization,
								'active' => $status
								);
								
				if ($password <> '') 
				{
					if ($password == $passconf)
					{
						$newdata['password'] = $password;
						$data['alert_fail'] = FALSE;
					}
					else
					{
						$data['alert_fail'] = TRUE;
						$data['messages'] = 'Passwords do not match';
					}
				}
				else
				{
					$data['alert_fail'] = FALSE;
				}
				
				//echo '<pre>';
				//echo 'POST: '; print_r($_POST);
				//echo 'newdata: ';print_r($newdata);
				//echo 'data: ';print_r($data);
				//echo 'user_id: '.$user_id;
				//echo '</pre>';

				if (!$data['alert_fail']) 
				{
				
					if ($this->ion_auth->update($user_id, $newdata)) 
					{
						unset($data);
						$data['title'] = 'User Management - Edit User';
						$data['alert_success'] = TRUE;
						$data['user'] = $this->users_model->get_user_by_id($user_id);				
					}
					else
					{
						$data['messages'] = $this->ion_auth->messages();
					}
					
				}
				else
				{
					$data['title'] = 'User Management - Edit User';
					$data['user'] = $this->users_model->get_user_by_id($user_id);
					
				}
				//echo '<pre>'; echo 'data: ';print_r($data); echo '</pre>';
				//die();
				
				$this->load->view('templates/header', $data);
				$this->load->view('users/edit', $data);
				$this->load->view('templates/footer');
				
			}
			
		}
		
}
