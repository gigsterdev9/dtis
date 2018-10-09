<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Photoid extends CI_Controller {

        public function __construct() {
                parent::__construct();
				$this->load->model('photoid_model');
				$this->load->model('tracker_model');
                $this->load->helper('url');
                $this->load->helper('form');
				$this->load->library('ion_auth');
				$this->load->library('pagination');
                
                if (!$this->ion_auth->logged_in()) {
					redirect('auth/login');
				}
                
                //debug
				//$this->output->enable_profiler(TRUE);
								
        }

        //list reports
        public function index() {
            
            $allowed_groups = array('wwf','admin');
            if (!$this->ion_auth->in_group($allowed_groups)) {
                show_error('Invalid access');
            }

            $data['title'] = 'WS PhotoID Stats';
			$data['ws_pid'] = $this->photoid_model->get_reports();
			
		    $this->load->view('templates/header', $data);
		    $this->load->view('photoid/index', $data);
		    $this->load->view('templates/footer', $data);
		    
        }

        //add report
        public function add() {

            $allowed_groups = array('wwf','admin');
            if (!$this->ion_auth->in_group($allowed_groups)) {
                show_error('Invalid access');
            }

            $this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'New report';

			//validation rules
			$this->form_validation->set_rules('report_date', 'Report Date', 'required');
			$this->form_validation->set_rules('season', 'Season', 'required');
			$this->form_validation->set_rules('total_ph_ws', 'Total Ph WS', 'required');
            $this->form_validation->set_rules('total_donsol_ws', 'Total Donsol WS', 'required');
            $this->form_validation->set_rules('season_total', 'Season Total', 'required');
			$this->form_validation->set_rules('new_sighting_count', 'New Sighting Count', 'required');
			$this->form_validation->set_rules('resighting_count', 'Resighting Count', 'required');
			
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('photoid/add');
				$this->load->view('templates/footer');

			}
			else {
				//execute insert
                $new_report_id = $this->photoid_model->set_report();
                
                //audit trail
                $this->tracker_model->log_event('report_id', $new_report_id, 'created', '');
				
				$data['title'] = 'New report';
				$data['alert_success'] = 'Entry successful.';
				
				$this->load->view('templates/header', $data);
				$this->load->view('photoid/add');
				$this->load->view('templates/footer');
			}
        }
        
        //edit report
        public function edit($id = NULL) {

            $allowed_groups = array('wwf','admin');
            if (!$this->ion_auth->in_group($allowed_groups)) {
                show_error('Invalid access');
            }

			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Edit report';
			$data['id'] = $id;

			//validation rules, only if entry is not for 'trashing'
			if ($this->input->post('trash_flag') == 0) {
				$this->form_validation->set_rules('report_date', 'Report Date', 'required');
                $this->form_validation->set_rules('season', 'Season', 'required');
                $this->form_validation->set_rules('total_ph_ws', 'Total Ph WS', 'required');
                $this->form_validation->set_rules('total_donsol_ws', 'Total Donsol WS', 'required');
                $this->form_validation->set_rules('season_total', 'Season Total', 'required');
                $this->form_validation->set_rules('new_sighting_count', 'New Sighting Count', 'required');
                $this->form_validation->set_rules('resighting_count', 'Resighting Count', 'required');
			}
			else{
				$this->form_validation->set_rules('trash_flag', 'Delete', 'required');
			}

			//upon submission of edit action
			if ($this->input->post('action') == 1) {
				
				if ($this->form_validation->run() === FALSE) {
					
					$data['ws_pid'] = $this->photoid_model->get_report_by_id($id);
					
					$this->load->view('templates/header', $data);
					$this->load->view('photoid/edit');
					$this->load->view('templates/footer');
	
				}
				else {
					//execute data update
                    $this->photoid_model->update_report();
                    
                    //audit trail
                    $altered = $this->input->post('altered'); //hidden field that tracks form edits; see form
                    if (strlen($altered) > 0) {
                        $mod_details = $altered;
                    }
                    else{

                        if ($this->input->post('trash_flag') == 1) {
                            $mod_details = 'entry marked as deleted';
                        }
                        else {
                            $mod_details = 'no evident changes';
                        }

                    }
                    $this->tracker_model->log_event('report_id', $id, 'modified', $mod_details);

					//retrieve updated data
					$data['ws_pid'] = $this->photoid_model->get_report_by_id($this->input->post('id'));
					
					if ( $this->input->post('trash_flag') == 1) {
						$data['alert_trash'] = 'Marked for deletion.'; //This is your last chance to undo by unchecking the "Delete this entry" box below and clicking submit.<br />';
					}
					else {
						$data['alert_success'] = 'Entry updated.';
					}
					
					$this->load->view('templates/header', $data);
					$this->load->view('photoid/edit');
					$this->load->view('templates/footer');
				}
				
			}
			else{
				$data['ws_pid'] = $this->photoid_model->get_report_by_id($id);
				
				if (empty($data['ws_pid'])) {
					show_404();
				}

				$this->load->view('templates/header', $data);
				$this->load->view('photoid/edit');
				$this->load->view('templates/footer');
			}
			
		}
        
        public function latest() {

            $data['title'] = 'WS PhotoID Stats';
            $data['ws_pid'] = $this->photoid_model->get_most_recent_report();
            
            $this->load->view('templates/header', $data);
			$this->load->view('photoid/latest');
            $this->load->view('templates/footer');
            
        }

        /** excel reports */

		public function all_to_excel() {
        //export all data to Excel file
            $this->load->library('export');
            $sql = $this->photoid->get_reports();
            $filename = 'DTIS_all_photoid_'.date('Y-m-d-Hi');
			$this->export->to_excel($sql, $filename); 
			
        }
        
        public function filtered_to_excel() {
        //export filter results to Excel file
            $this->load->library('export');
        	
        	$filter = $this->uri->uri_to_assoc(3);
        	$field = key($filter);
        	$value = $filter[key($filter)];
        	$sql = $this->photoid_model->filter_reports(0, 0, $field, $value);
			$filename = 'DTIS_filtered_'.$field.'_'.$value.'_'.date('Y-m-d-Hi');
			echo $filename;
			$this->export->to_excel($sql, $filename); 
	
			
        }
        
        public function results_to_excel() {
        //export search results to Excel file
        	$this->load->library('export');
        	
        	$search = $this->uri->segment(3);
			//echo $search;
        	$sql = $this->photoid_model->search_reports($search);
			$filename = 'DTIS_search_'.$search.'_'.date('Y-m-d-Hi');
			//echo $filename;
			$this->export->to_excel($sql, $filename); 
	
        }
	
	
}
