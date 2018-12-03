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
			
			$this->form_validation->set_rules('ab_name', 'Boat Name', 'trim|required');
			$this->form_validation->set_rules('ab_operator', 'Operator Name', 'trim|required');
			$this->form_validation->set_rules('ab_acc_no', 'Accredited No.', 'trim|required');
			$this->form_validation->set_rules('ab_acc_yr', 'Accreditation Yr.', 'trim|required');
			$this->form_validation->set_rules('ab_acc_expiry', 'Accreditation Expiry', 'trim|required');
			
			if ($this->form_validation->run() === FALSE) {
				$data['title'] = 'New boat';
				
				$this->load->view('templates/header', $data);
				$this->load->view('boats/add');
				$this->load->view('templates/footer');

			}
			else {
                
                $ab_name = $this->input->post('ab_name');
                $ab_operator = $this->input->post('ab_operator');
				$ab_acc_no = $this->input->post('ab_acc_no');
				$ab_acc_yr = $this->input->post('ab_acc_yr');
                $ab_acc_expiry = $this->input->post('ab_acc_expiry');
                $ab_remarks = $this->input->post('ab_remarks');
				$ab_status = $this->input->post('ab_status');
				
								
				$data = array(
                                'ab_name' => $ab_name,
                                'ab_operator' => $ab_operator,
								'ab_acc_no' => $ab_acc_no,
								'ab_acc_yr' => $ab_acc_yr,
                                'ab_acc_expiry' => $ab_acc_expiry,
                                'ab_remarks' => $ab_remarks,
                                'ab_status' => $ab_status
								);
				$this->boats_model->set_boat($data);
				
				$data['title'] = 'New boat';
				$data['alert_success'] = 'Entry added.';
				
				$this->load->view('templates/header', $data);
				$this->load->view('boats/add');
                $this->load->view('templates/footer');
                
			}


		}
		
		
		//update boat data        
		public function edit($id = NULL) {

            if (empty($id)) {
                redirect('boats');
            }
		
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('ab_name', 'Boat Name', 'trim|required');
			$this->form_validation->set_rules('ab_operator', 'Operator Name', 'trim|required');
			$this->form_validation->set_rules('ab_acc_no', 'Accredited No.', 'trim|required');
			$this->form_validation->set_rules('ab_acc_yr', 'Accreditation Yr.', 'trim|required');
			$this->form_validation->set_rules('ab_acc_expiry', 'Accreditation Expiry', 'trim|required');

			if ($this->form_validation->run() === FALSE) {
				
				$data['id'] = $id;
				$data['boat'] = $this->boats_model->get_boat_by_id($id);
                $data['title'] = 'Edit boat details';
                
				$this->load->view('templates/header', $data);
				$this->load->view('boats/edit', $data);
				$this->load->view('templates/footer');

			}
			else {
                
                $ab_name = $this->input->post('ab_name');
                $ab_operator = $this->input->post('ab_operator');
				$ab_acc_no = $this->input->post('ab_acc_no');
				$ab_acc_yr = $this->input->post('ab_acc_yr');
                $ab_acc_expiry = $this->input->post('ab_acc_expiry');
                $ab_remarks = $this->input->post('ab_remarks');
				$ab_status = $this->input->post('ab_status');
				
								
				$data = array(
                            'ab_name' => $ab_name,
                            'ab_operator' => $ab_operator,
							'ab_acc_no' => $ab_acc_no,
							'ab_acc_yr' => $ab_acc_yr,
                            'ab_acc_expiry' => $ab_acc_expiry,
                            'ab_remarks' => $ab_remarks,
                            'ab_status' => $ab_status
						);
				$this->boats_model->update_boat($id, $data);
                
                $data['id'] = $id;
                $data['boat'] = $this->boats_model->get_boat_by_id($id);
				$data['title'] = 'Edit boat details';
				$data['alert_success'] = 'Entry updated.';
				
				$this->load->view('templates/header', $data);
				$this->load->view('boats/edit', $data);
				$this->load->view('templates/footer');
				
			}
			
        }
        

    /** Export functions */

    public function all_to_excel() {
        //export all data to Excel file
            $this->load->library('export');
            $sql = $this->boats_model->get_all_boats();
            $filename = 'DTIS_all_boats_'.date('Y-m-d-Hi');
            $this->export->to_excel($sql, $filename); 
            
        }
		
}
