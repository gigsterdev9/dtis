<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Visitors extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
				$this->load->model('visitors_model');
				$this->load->model('tracker_model');
                $this->load->helper('url');
                $this->load->helper('form');
				$this->load->library('ion_auth');
				$this->load->library('pagination');
                
                if (!$this->ion_auth->logged_in())
				{
					redirect('auth/login');
				}
				
				//debug
				//$this->output->enable_profiler(TRUE);
								
        }

        public function index() {		
		
			//if ($_SERVER['REMOTE_ADDR'] <> '125.212.122.21') die('Undergoing maintenance.');

			//set general pagination config
			$config = array();
			$config['base_url'] = base_url('visitors');
			
			$config['per_page'] = 100;
			$config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<span>';
			$config['cur_tag_close'] = '</span>';
			$config['prev_link'] = '&laquo;';
			$config['next_link'] = '&raquo;';
			$config['reuse_query_string'] = TRUE; 
			$config["num_links"] = 9;
			

				if ($this->input->get('filter_by') != NULL) {
					$filter_by = $this->input->get('filter_by');
					switch ($filter_by) 
					{
						case 'nationality': 
							$nationality = $this->input->get('filter_by_nationality');
							$data['filterval'] = array('nationality',$nationality,''); //the '' is to factor in the 3rd element introduced by the age filter
							$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
							$data['visitors'] = $this->visitors_model->filter_visitors($config["per_page"], $page, 'nationality',$nationality);
								$config['total_rows'] = $data['visitors']['result_count'];
								$this->pagination->initialize($config);
							$data['links'] = $this->pagination->create_links();
							break;
						case 'gender':
							$gender = $this->input->get('filter_by_gender');
							$data['filterval'] = array('gender',$gender,''); //the '' is to factor in the 3rd element introduced by the age filter
							$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
							$data['visitors'] = $this->visitors_model->filter_visitors($config["per_page"], $page, 'gender',$gender);
								$config['total_rows'] = $data['visitors']['result_count'];
								$this->pagination->initialize($config);
							$data['links'] = $this->pagination->create_links();
							break;
						case 'age':
							$age_operand = $this->input->get('filter_by_age_operand');
							$age_value = $this->input->get('filter_by_age_value');

							if ($age_operand == 'between' and stristr($age_value, 'and') == FALSE) {
								$data['visitors']['result_count'] = 0;
								$data['visitors']['result_count'] = 0;
								$data['links'] = '';
								break;
							}

							$data['filterval'] = array('age',$age_operand, $age_value);
							$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
							$data['visitors'] = $this->visitors_model->filter_visitors($config["per_page"], $page, 'age',$age_value, $age_operand);
								$config['total_rows'] = $data['visitors']['result_count'];
								$this->pagination->initialize($config);
							$data['links'] = $this->pagination->create_links();
							break;
						default: 
							break;
					}
					
				}
				elseif ($this->input->get('search_param') != NULL) {
					
					$search_param = $this->input->get('search_param');
					$s_key = $this->input->get('s_key'); 
					$s_fullname = FALSE;

					if (strpos($search_param, ',')) {
						$params = explode(',', $search_param);
						$s_lname = $params[0];
						$s_fname = trim($params[1]);
						$s_fullname = TRUE;
					}
					else{
						$params = explode(' ',$search_param);
					}

					if (!empty($s_key)) {

						//initialize var
						$where_clause = '';

						//sort the search key and values
						if (in_array('s_name', $s_key) && !in_array('s_address', $s_key)) {
							if ($s_fullname == TRUE) {
								$where_clause .= "lname like '$s_lname%' and fname like '%$s_fname%' and trash = 0";
							}
							else{
								$where_clause .= '( ';
								foreach ($params as $p) {
									$where_clause .= "lname like '$p%' or fname like '$p%' ";
									if ($p != end($params)) $where_clause .= ' or ';
								}
								$where_clause .= ') and trash = 0';
							}
						}
						elseif (!in_array('s_name', $s_key) && in_array('s_address', $s_key)) {
							$where_clause = "( h_address like '%$search_param%' or b_address like '%$search_param%' ) and trash = 0";
							/*
							foreach ($params as $p) {
								$where_clause .= "address like '%$p%' ";
								if ($p != end($params)) $where_clause .= 'or ';
							}
							$where_clause .= 'and trash = 0';
							*/
						}
						elseif (in_array('s_name', $s_key) && in_array('s_address', $s_key)) {
							$where_clause .= '( ';
							foreach ($params as $p) {
								$where_clause .= "lname like '$p%' or fname like '$p%' or address like '%$p%' ";
								if ($p != end($params)) $where_clause .= 'or ';
							}
							$where_clause .= ') and trash = 0';
						}
						else{
							$where_clause = '1';
						}
						//die($where_clause);

						$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
						$data['visitors'] = $this->visitors_model->search_visitors($config["per_page"], $page, $where_clause);
							$config['total_rows'] = $data['visitors']['result_count'];
							$this->pagination->initialize($config);
						$data['links'] = $this->pagination->create_links();
						$data['searchval'] = $search_param;
					}
					else {
						$data['visitors']['result_count'] = 0;
						$data['links'] = '';
					}
				}
				else{
					//Display all
					//implement pagination
					$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
					$data['visitors'] = $this->visitors_model->get_visitors($config["per_page"], $page);
					$data['visitors']['result_count'] = $this->visitors_model->record_count();
						$config['total_rows'] = $data['visitors']['result_count'];
						$this->pagination->initialize($config);
					$data['links'] = $this->pagination->create_links();
				}
				
                $data['title'] = 'Master List';
				//echo '<pre>'; print_r($data); echo '</pre>';
				$this->load->view('templates/header', $data);
				$this->load->view('visitors/index', $data);
				$this->load->view('templates/footer');
				
        }

        public function view($id = NULL) {

				$data['visitor'] = $this->visitors_model->get_visitor_by_id($id);
		        if (empty($data['visitor'])) {
				    show_404();
                }
                $data['tracker'] = $this->tracker_model->get_activities($id, 'visitors');
				
				$this->load->view('templates/header', $data);
				$this->load->view('visitors/view', $data);
				$this->load->view('templates/footer');
				
        }
        
        
        public function add() {
			if (!$this->ion_auth->in_group('admin')) {
				redirect('visitors');
			}
			
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'New entry';

			//validation rules
			$this->form_validation->set_rules('fname', 'First Name', 'required');
			$this->form_validation->set_rules('lname', 'Last Name', 'required');
			$this->form_validation->set_rules('bdate', 'Birthdate', 'required');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('h_address', 'Home Address', 'required');
			$this->form_validation->set_rules('nationality', 'Nationality', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');
			
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('visitors/add');
				$this->load->view('templates/footer');

			}
			else
			{
				//execute insert
                $new_visitor_id = $this->visitors_model->set_visitor();
                
                //audit trail
                $this->tracker_model->log_event('visitor_id', $new_visitor_id, 'created', '');
				
				$data['title'] = 'New entry';
				$data['alert_success'] = 'Entry successful.';
				
				$this->load->view('templates/header', $data);
				$this->load->view('visitors/add');
				$this->load->view('templates/footer');
			}
		}
		
		
		
		public function edit($id = NULL) {

			if (!$this->ion_auth->in_group('admin')) {
				redirect('visitors');
			}
			
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Edit details';
			$data['id'] = $id;

			//validation rules, only if entry is not for 'trashing'
			if ($this->input->post('trash') == 0) {
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('lname', 'Last Name', 'required');
				$this->form_validation->set_rules('bdate', 'Birthdate', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('h_address', 'Home Address', 'required');
				$this->form_validation->set_rules('nationality', 'Nationality', 'required');
				$this->form_validation->set_rules('email', 'Email', 'valid_email');
			}
			else{
				$this->form_validation->set_rules('trash', 'trash', 'required');
			}

			//upon submission of edit action
			if ($this->input->post('action') == 1) {
				
				if ($this->form_validation->run() === FALSE) {
					
					$data['visitor'] = $this->visitors_model->get_visitor_by_id($id);
					
					$this->load->view('templates/header', $data);
					$this->load->view('visitors/edit');
					$this->load->view('templates/footer');
	
				}
				else {
					//execute data update
                    $this->visitors_model->update_visitor();
                    
                    //audit trail
                    $altered = $this->input->post('altered'); //hidden field that tracks form edits; see form
                    if (strlen($altered) > 0) {
                        $mod_details = $altered;
                    }
                    else{

                        if ($this->input->post('trash') == 1) {
                            $mod_details = 'entry marked as deleted';
                        }
                        else {
                            $mod_details = 'no evident changes';
                        }

                    }
                    $this->tracker_model->log_event('visitor_id', $id, 'modified', $mod_details);

					//retrieve updated data
					$data['visitor'] = $this->visitors_model->get_visitor_by_id($this->input->post('id'));
					
					if ( $this->input->post('trash') == 1) {
						$data['alert_trash'] = 'Marked for deletion.'; //This is your last chance to undo by unchecking the "Delete this entry" box below and clicking submit.<br />';
					}
					else {
						$data['alert_success'] = 'Entry updated.';
					}
					
					$this->load->view('templates/header', $data);
					$this->load->view('visitors/edit');
					$this->load->view('templates/footer');
				}
				
			}
			else{
				$data['visitor'] = $this->visitors_model->get_visitor_by_id($id);
				
				if (empty($data['visitor'])) {
					show_404();
				}

				$this->load->view('templates/header', $data);
				$this->load->view('visitors/edit');
				$this->load->view('templates/footer');
			}
			
		}
		
		
		public function all_to_excel() {
        //export all data to Excel file
            $this->load->library('export');
            $sql = $this->visitors_model->get_visitors();
            $filename = 'DTIS_all_visitors_'.date('Y-m-d-Hi');
			$this->export->to_excel($sql, $filename); 
			
        }
        
        public function filtered_to_excel() {
        //export filter results to Excel file
            $this->load->library('export');
        	
        	$filter = $this->uri->uri_to_assoc(3);
        	$field = key($filter);
        	$value = $filter[key($filter)];
        	$sql = $this->visitors_model->filter_visitors(0, 0, $field, $value);
			$filename = 'DTIS_filtered_'.$field.'_'.$value.'_'.date('Y-m-d-Hi');
			echo $filename;
			$this->export->to_excel($sql, $filename); 
	
			
        }
        
        public function results_to_excel() {
        //export search results to Excel file
        	$this->load->library('export');
        	
        	$search = $this->uri->segment(3);
			//echo $search;
        	$sql = $this->visitors_model->search_visitors($search);
			$filename = 'DTIS_search_'.$search.'_'.date('Y-m-d-Hi');
			//echo $filename;
			$this->export->to_excel($sql, $filename); 
	
        }
	
	
}
