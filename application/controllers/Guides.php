<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class guides extends CI_Controller {

        public function __construct() {
        	parent::__construct();
        	$this->load->helper('url');
        	$this->load->helper('form');
            $this->load->library('ion_auth');
            $this->load->model('guides_model');
            $this->load->library('pagination');
            
            if (!$this->ion_auth->logged_in()) {
				redirect('auth/login');
			}
            
            //debug
			//$this->output->enable_profiler(TRUE);
        }
		
		//list accredited guides
        public function index() {
            
            //set general pagination config
			$config = array();
			$config['base_url'] = base_url('guides');
			
			$config['per_page'] = 100;
			$config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<span>';
			$config['cur_tag_close'] = '</span>';
			$config['prev_link'] = '&laquo;';
			$config['next_link'] = '&raquo;';
			$config['reuse_query_string'] = TRUE; 
            $config["num_links"] = 9;
            
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
				$data['guides'] = $this->guides_model->get_all_guides($config["per_page"], $page);
				$data['guides']['result_count'] = $this->guides_model->record_count();
					$config['total_rows'] = $data['guides']['result_count'];
					$this->pagination->initialize($config);
				$data['links'] = $this->pagination->create_links();

            $data['title'] = 'Accredited Guides';
            
		    $this->load->view('templates/header', $data);
		    $this->load->view('guides/index', $data);
		    $this->load->view('templates/footer', $data);
		    
        }
        
		//add accredited guide
		public function add() {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('ag_name', 'Guide Name', 'trim|required');
			$this->form_validation->set_rules('ag_acc_no', 'Accreditation No.', 'trim|required');
			$this->form_validation->set_rules('ag_acc_yr', 'Accreditation Yr.', 'trim|required');
			$this->form_validation->set_rules('ag_acc_expiry', 'Accreditation Expiry', 'trim|required');
			

			if ($this->form_validation->run() === FALSE) {
				$data['title'] = 'New guide';
				
				$this->load->view('templates/header', $data);
				$this->load->view('guides/add');
				$this->load->view('templates/footer');

			}
			else {
				
				$ag_name = $this->input->post('ag_name');
				$ag_acc_no = $this->input->post('ag_acc_no');
				$ag_acc_yr = $this->input->post('ag_acc_yr');
                $ag_acc_expiry = $this->input->post('ag_acc_expiry');
                $ag_remarks = $this->input->post('ag_remarks');
				$ag_status = $this->input->post('ag_status');
				
								
				$data = array(
								'ag_name' => $ag_name,
								'ag_acc_no' => $ag_acc_no,
								'ag_acc_yr' => $ag_acc_yr,
                                'ag_acc_expiry' => $ag_acc_expiry,
                                'ag_remarks' => $ag_remarks,
                                'ag_status' => $ag_status
								);
				$this->guides_model->set_guide($data);
				
				$data['title'] = 'New guide';
				$data['alert_success'] = 'Entry added.';
				
				$this->load->view('templates/header', $data);
				$this->load->view('guides/add');
				$this->load->view('templates/footer');
			}


		}
		
		
		//update user data        
		public function edit($id = NULL) {

            if (empty($id)) {
                redirect('guides');
            }

            $this->load->helper('form');
			$this->load->library('form_validation');
            
            $this->form_validation->set_rules('ag_name', 'Guide Name', 'trim|required');
			$this->form_validation->set_rules('ag_acc_no', 'Accreditation No.', 'trim|required');
			$this->form_validation->set_rules('ag_acc_yr', 'Accreditation Yr.', 'trim|required');
			$this->form_validation->set_rules('ag_acc_expiry', 'Accreditation Expiry', 'trim|required');

			if ($this->form_validation->run() === FALSE) {
				
                $data['id'] = $id;
                $data['guide'] = $this->guides_model->get_guide_by_id($id);
				$data['title'] = 'Edit guide details';
				
				$this->load->view('templates/header', $data);
				$this->load->view('guides/edit', $data);
				$this->load->view('templates/footer');

			}
			else {
                
                $ag_name = $this->input->post('ag_name');
				$ag_acc_no = $this->input->post('ag_acc_no');
				$ag_acc_yr = $this->input->post('ag_acc_yr');
                $ag_acc_expiry = $this->input->post('ag_acc_expiry');
                $ag_remarks = $this->input->post('ag_remarks');
				$ag_status = $this->input->post('ag_status');
								
				$data = array(
							'ag_name' => $ag_name,
							'ag_acc_no' => $ag_acc_no,
							'ag_acc_yr' => $ag_acc_yr,
                            'ag_acc_expiry' => $ag_acc_expiry,
                            'ag_remarks' => $ag_remarks,
                            'ag_status' => $ag_status
						);
				$this->guides_model->update_guide($id, $data);
                
                $data['id'] = $id;
                $data['guide'] = $this->guides_model->get_guide_by_id($id);
				$data['title'] = 'Edit guide details';
                $data['alert_success'] = 'Entry updated.';
                
				$this->load->view('templates/header', $data);
				$this->load->view('guides/edit', $data);
				$this->load->view('templates/footer');
				
			}
			
        }
        

    /** Export functions */

		public function all_to_excel() {
            //export all data to Excel file
                $this->load->library('export');
                $sql = $this->guides_model->get_all_guides();
                $filename = 'DTIS_all_guides_'.date('Y-m-d-Hi');
                $this->export->to_excel($sql, $filename); 
                
            }

		
}
