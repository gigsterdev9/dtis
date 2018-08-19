<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Visits extends CI_Controller {

        public function __construct() {

				parent::__construct();
                $this->load->model('visits_model');
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

                $allowed_groups = array('encoder', 'supervisor', 'admin');
                if (!$this->ion_auth->in_group($allowed_groups)) {
                    show_error('Invalid access');
                }
				//debug
				//$this->output->enable_profiler(TRUE);	
				
        }

		public function index() {		
        
        	//if ($_SERVER['REMOTE_ADDR'] <> '125.212.122.21') die('Undergoing maintenance.');
			
			//set general pagination config
			$config = array();
			$config['base_url'] = base_url('visits');
			
			$config['per_page'] = 100;
			$config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<span>';
			$config['cur_tag_close'] = '</span>';
			$config['prev_link'] = '&laquo;';
			$config['next_link'] = '&raquo;';
			$config['reuse_query_string'] = TRUE; 
			$config["num_links"] = 9;

				if ($this->input->post('filter_by') != NULL) {

					$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
					$filter_by = $this->input->post('filter_by');
					switch ($filter_by) {
                        case 'nationality':
						    $nationality = $this->input->get('filter_by_nationality');
							$data['filterval'] = array('nationality',$nationality,''); //the '' is to factor in the 3rd element introduced by the age filter
							$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
							$data['visits'] = $this->visits_model->filter_visits($config["per_page"], $page, 'nationality',$nationality);
								$config['total_rows'] = $data['visits']['result_count'];
								$this->pagination->initialize($config);
							$data['links'] = $this->pagination->create_links();
							break;
						case 'date':
                            $date_operand = $this->input->get('filter_by_date_operand');
                            $date_value = $this->input->get('filter_by_date_value');

                            if ($date_operand == 'between' and stristr($date_value, 'and') == FALSE) {
                                $data['visits']['result_count'] = 0;
                                $data['links'] = '';
                                break;
                            }

                            $data['filterval'] = array('date',$date_operand, $date_value);
                            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                            $data['visits'] = $this->visits_model->filter_visits($config["per_page"], $page, 'age',$date_value, $date_operand);
                                $config['total_rows'] = $data['visits']['result_count'];
                                $this->pagination->initialize($config);
                            $data['links'] = $this->pagination->create_links();
                            break;
						default: 
							break;

					}
					$r_count = (!empty($data['r_visits'])) ? count($data['r_visits']) : 0;
					
						$config['total_rows'] = $r_count;
						$this->pagination->initialize($config);
					$data['links'] = $this->pagination->create_links();
					$data['total_result_count'] = $r_count + $n_count;

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
								$where_clause .= "lname like '$s_lname%' and fname like '%$s_fname%' ";
							}
							else{
								$where_clause .= '(';
								foreach ($params as $p) {
									$where_clause .= "lname like '$p%' or fname like '$p%' ";
									if ($p != end($params)) $where_clause .= 'or ';
								}
								$where_clause .= ')';
							}
						}
						elseif (!in_array('s_name', $s_key) && in_array('s_address', $s_key)) {
							
							$where_clause = "address like '%$search_param%'";		

						}
						elseif (in_array('s_name', $s_key) && in_array('s_address', $s_key)) {
							
							$where_clause .= '(';
							foreach ($params as $p) {
								$where_clause .= "lname like '$p%' or fname like '$p%' or address like '%$p%' ";
								if ($p != end($params)) $where_clause .= 'or ';
							}
							$where_clause .= ')';
							
						}
						else{
							//do nothing
						}
						//die($where_clause);
						
						$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
						//$data['nonvoters'] = $this->beneficiaries_model->search_beneficiaries($config["per_page"], $page, $search_param, $search_key);
						$data['r_visits'] = $this->visits_model->search_r_visits($config["per_page"], $page, $where_clause);
						$data['n_visits'] = $this->visits_model->search_n_visits($config["per_page"], $page, $where_clause);
						
						$r_count = (!empty($data['r_visits'])) ? count($data['r_visits']) : 0;
						$n_count = (!empty($data['n_visits'])) ? count($data['n_visits']) : 0;

							$config['total_rows'] = $r_count + $n_count;
							$this->pagination->initialize($config);
						$data['links'] = $this->pagination->create_links();
						$data['searchval'] = $search_param;
						$data['total_result_count'] = $r_count + $n_count;
					}
					else {
						$data['nonvoters']['result_count'] = 0;
						$data['links'] = '';
					}

				}
				else{

					//Display all
					//implement pagination
					$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
					$data['visits'] = $this->visits_model->get_visits($config["per_page"], $page);
					$data['visits']['result_count'] = $this->visits_model->record_count();
						$config['total_rows'] = $data['visits']['result_count'];
						$this->pagination->initialize($config);
					$data['links'] = $this->pagination->create_links();

				}
                
                $data['title'] = 'Visit Registry';

				$this->load->view('templates/header', $data);
				$this->load->view('visits/index', $data);
				$this->load->view('templates/footer');
				
				//$this->output->cache(1);
				//$this->output->delete_cache();
				
        }

        public function view($id = NULL) {

			//retrieve visit availment details
			$data['visit'] = $this->visits_model->get_visit_by_id($id);
			if ($data['visit'] == 0) {
				show_404();
			}
            
            if ($data['visit']['butanding']) 
                $data['visit_details']['butanding'] = $this->visits_model->get_visit_activity_details($id, 'butanding');
            if ($data['visit']['girawan']) 
                $data['visit_details']['girawan'] = $this->visits_model->get_visit_activity_details($id, 'girawan');
            if ($data['visit']['firefly']) 
                $data['visit_details']['firefly'] = $this->visits_model->get_visit_activity_details($id, 'firefly');
            if ($data['visit']['island_hop']) 
                $data['visit_details']['island_hop'] = $this->visits_model->get_visit_activity_details($id, 'island_hop');

            //retrieve audit trail
			$data['tracker'] = $this->tracker_model->get_activities($id, 'visits');

			$this->load->view('templates/header', $data);
			$this->load->view('visits/view', $data);
			$this->load->view('templates/footer');


		}
        
        
        public function add() {
			
			$data['title'] = 'New visit';
			
			$this->load->view('templates/header', $data);
			$this->load->view('visits/add');
			$this->load->view('templates/footer');

		}
		
        
        public function add_exist($visitor_id = FALSE) { 
        
            $this->load->helper('form');
			$this->load->library('form_validation');

            $data['title'] = 'New visit';
            $visitor_details = $this->visitors_model->get_visitor_by_id($visitor_id);
            $data['visitor_id'] = $visitor_id;
            $data['visitor_fullname'] = $visitor_details['fname'].' '.$visitor_details['mname'].' '.$visitor_details['lname'];
            
			//data validation
			$this->form_validation->set_rules('visit_date','Visit Date','required');
            $this->form_validation->set_rules('or_no','OR Number','required');
            $this->form_validation->set_rules('form_signed','Form signature','required');
            $this->form_validation->set_rules('butanding','Butanding','required');
            $this->form_validation->set_rules('girawan','Girawan','required');
            $this->form_validation->set_rules('firefly','Firefly','required');
            $this->form_validation->set_rules('island_hop','Island Hop','required');
			
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('visits/add_exist');
				$this->load->view('templates/footer');

			}
			else {
				
                //check if visit has already been recorded
                $visit_date =  $this->input->post('visit_date');
				$or_no = $this->input->post('or_no');
                
                $dupe = $this->visits_model->dupe_check($visitor_id, $visit_date, $or_no);

                if (empty($dupe)) {
                    //generate boarding pass code
                    $boarding_pass = 'XXXX';
                    
                    //prep data array
                    $data = array(
                            'visitor_id' => $visitor_id,
                            'visit_date' => $visit_date,
                            'boarding_pass' => $boarding_pass,
                            'or_no' => $or_no,
                            'form_signed' => $this->input->post('form_signed'),
                            'butanding' => $this->input->post('butanding'),
                            'girawan' => $this->input->post('girawan'),
                            'firefly' => $this->input->post('firefly'),
                            'island_hop' => $this->input->post('island_hop'),
                            'visit_remarks' => $this->input->post('visit_remarks'),
                            'trash' => 0
                            );

					//execute insert
                    $new_visit_id = $this->visits_model->set_visit($data);
                    
                    //audit trail
                    $this->tracker_model->log_event('visit_id', $new_visit_id, 'created', '');

                    $data['title'] = 'New entry';
					$data['alert_success'] = 'Entry successful.';
					
					$this->load->view('templates/header', $data);
					$this->load->view('visits/add_exist');
					$this->load->view('templates/footer');
				}
				else{

					$data['errors'] = "Entry already exists.";

					$this->load->view('templates/header', $data);
					$this->load->view('visits/add_exist');
					$this->load->view('templates/footer');

				}
			}
			
		}
        
		
		public function edit($visit_id = NULL) {
			
			$this->load->helper('form');
			$this->load->library('form_validation');

            $data['title'] = 'Edit visit';
            
            $data['visit_id'] = $visit_id;
            $data['visit'] = $this->visits_model->get_visit_by_id($visit_id);

            $data['visitor_id'] = $data['visit']['visitor_id'];
            $data['visitor_fullname'] = $data['visit']['fname'].' '.$data['visit']['mname'].' '.$data['visit']['lname'];
            
            $visitor_id = $data['visit']['visitor_id'];

            //data validation
            $this->form_validation->set_rules('visit_date','Visit Date','required');
            $this->form_validation->set_rules('or_no','OR Number','required');
            $this->form_validation->set_rules('boarding_pass','Boarding Pass','required');
            $this->form_validation->set_rules('form_signed','Form signature','required');
            $this->form_validation->set_rules('butanding','Butanding','required');
            $this->form_validation->set_rules('girawan','Girawan','required');
            $this->form_validation->set_rules('firefly','Firefly','required');
            $this->form_validation->set_rules('island_hop','Island Hop','required');
			
			//upon submission of edit action
			if ($this->input->post('action') == 1) {
				
				if ($this->form_validation->run() === FALSE) {
                    
                    $this->load->view('templates/header', $data);
					$this->load->view('visits/edit');
					$this->load->view('templates/footer');
	
				}
				else {

                    //echo '<pre>'; print_r($_POST); echo '</pre>'; die();

                    //prep data array
                    $data = array(
                        'visit_date' => $this->input->post('visit_date'),
                        'boarding_pass' => $this->input->post('boarding_pass'),
                        'or_no' => $this->input->post('or_no'),
                        'form_signed' => $this->input->post('form_signed'),
                        'butanding' => $this->input->post('butanding'),
                        'girawan' => $this->input->post('girawan'),
                        'firefly' => $this->input->post('firefly'),
                        'island_hop' => $this->input->post('island_hop'),
                        'visit_remarks' => $this->input->post('visit_remarks'),
                        'trash' => $this->input->post('trash')
                    );


                    //execute data update
					$this->visits_model->update_visit($data);
                    
                    //add audit trail
                    $altered = $this->input->post('altered'); //hidden field that tracks form edits; see form
                    if (strlen($altered) > 0) {
                        $this->tracker_model->log_event('visit_id', $visit_id, 'modified', $altered);
                    }

                    //retrieve updated data
                    $data['visit'] = $this->visits_model->get_visit_by_id($visit_id);
                    
					if ( $this->input->post('trash') == 1) {
                        $data['alert_trash'] = 'Marked for deletion. This is your last chance to undo by unchecking the "Delete" box below and clicking submit.<br />';
                        $this->tracker_model->log_event('visit_id', $visit_id, 'modified', 'entry marked as deleted');
					}
					else {
						$data['alert_success'] = 'Entry updated.';
					}
                    
                    $data['title'] = 'Edit visit';
                    $data['visit_id'] = $visit_id;
                    $data['visitor_id'] = $this->input->post('visitor_id');

					$this->load->view('templates/header', $data);
					$this->load->view('visits/edit');
					$this->load->view('templates/footer');
				}
				
			}
			else{
				
                //echo '<pre>'; print_r($data); echo '</pre>'; die();

				$this->load->view('templates/header', $data);
				$this->load->view('visits/edit');
				$this->load->view('templates/footer');
			}
		
		}


		public function delete($visit_id = FALSE, $ben_id = FALSE) {
			if (!$this->ion_auth->in_group('admin')) {
				redirect('visits'); 
			}
			$this->visits_model->trash_visit($visit_id, $ben_id);
			redirect('beneficiaries/view/'.$ben_id);

		}

		public function match_find() {
			//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
			$fname = $this->input->post('fname');
			$mname = $this->input->post('mname');
			$lname = $this->input->post('lname');
			$bdate = $this->input->post('bdate');

			$where_clause = "fname = '$fname' and lname = '$lname' and mname = '$mname' and bdate = '$bdate'";
            $visitor_match = $this->visitors_model->search_visitors('200', '0', $where_clause) ;
            //echo count($visitor_match); die();

            if (isset($visitor_match) && $visitor_match != NULL) {  
                if (count($visitor_match) > 1) {
                    echo '<br />Possible visitor data match.';
                    foreach($visitor_match as $vmatch) {
                        
                        if ($vmatch['visitor_id'] != NULL) {
                            echo '<div class="radio"><label>';
                            echo '<a href="'.base_url('visitors/view/'.$vmatch['visitor_id']).'" target="_blank">';
                            echo 'ID No. '.$vmatch['visitor_id'].'  &nbsp; | &nbsp; Address: '.$vmatch['h_address'].'  &nbsp; | &nbsp; Nationality: '.$vmatch['nationality'].'  &nbsp; | &nbsp; Email: '.$vmatch['email'];
                            echo '</a></label></div>';
                        
                            $v_ids[] = $vmatch['visitor_id'];
                        }
                    }
                    $show_last_radio = true;
                }
			}

			if (isset($show_last_radio)) {	
				echo '<br /><br />';
				echo 'If the above do not suffice, proceed to ' .
						'<a href="'.base_url('visitors/add').'?fname='.$fname.'&mname='.$mname.'&lname='.$lname.'&bdate='.$bdate.'">create a new visitor entry</a>. <br />';
			}
			else{
				echo 'No match found. &nbsp; ';
				echo '<a href="'.base_url('visitors/add').'?fname='.$fname.'&mname='.$mname.'&lname='.$lname.'&bdate='.$bdate.'">Create a new visitor entry</a>.';
			
			}
			
		}
		
        
        public function all_to_excel() {
        //export all data to Excel file
        
        	$this->load->library('export');
			$sql = $this->visits_model->get_visits();
			$this->export->to_excel($sql, 'allvisits'); 
	
			//$this->output->enable_profiler(TRUE);	
        }
        
        public function filtered_to_excel() {
        	$this->load->library('export');
        	
        	$filter = $this->uri->uri_to_assoc(3);
        	//echo '<pre>'; print_r($filter); echo '</pre>';
        	$field = key($filter);
        	$value = $filter[key($filter)];
        	$sql = $this->visits_model->filter_visits($field, $value);
			//echo '<pre>'; print_r($sql); echo '</pre>';
			$filename = 'filtered_'.$field.'_'.$value.'_'.date('Y-m-d-Hi');
			echo $filename;
			$this->export->to_excel($sql, $filename); 
	
			//$this->output->enable_profiler(TRUE);	
        }
        
        public function results_to_excel() {
        	$this->load->library('export');
        	
        	$search = $this->uri->segment(3);
			//echo $search;
        	$sql = $this->visits_model->search_visits($search);
			$filename = 'results_'.$search.'_'.date('Y-m-d-Hi');
			//echo $filename;
			$this->export->to_excel($sql, $filename); 
	
        }
		
			
}
