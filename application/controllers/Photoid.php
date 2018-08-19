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
                redirect('/');
            }

        	$data['title'] = 'WS PhotoID Stats';
			$data['ws_pid'] = $this->photoid_model->get_reports();
			
		    $this->load->view('templates/header', $data);
		    $this->load->view('photoid/index', $data);
		    $this->load->view('templates/footer', $data);
		    
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
