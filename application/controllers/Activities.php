<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Activities extends CI_Controller {

        public function __construct() {

				parent::__construct();
				$this->load->model('activities_model');
                $this->load->model('visits_model');
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

        public function butanding() {
            
            //set general pagination config
			$config = array();
			$config['base_url'] = base_url('activities');
			
			$config['per_page'] = 100;
			$config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<span>';
			$config['cur_tag_close'] = '</span>';
			$config['prev_link'] = '&laquo;';
			$config['next_link'] = '&raquo;';
			$config['reuse_query_string'] = TRUE; 
			$config["num_links"] = 9;

            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $data['butanding'] = $this->activities_model->get_all_butanding($config["per_page"], $page);
            
            $data['butanding']['result_count'] = $data['butanding']['result_count'];
            $config['total_rows'] = $data['butanding']['result_count'];

            $this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();

            $data['title'] = 'Butanding Interaction';

            $this->load->view('templates/header', $data);
			$this->load->view('activities/butanding', $data);
			$this->load->view('templates/footer');

        }

        public function girawan() {
            
            //set general pagination config
			$config = array();
			$config['base_url'] = base_url('activities');
			
			$config['per_page'] = 100;
			$config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<span>';
			$config['cur_tag_close'] = '</span>';
			$config['prev_link'] = '&laquo;';
			$config['next_link'] = '&raquo;';
			$config['reuse_query_string'] = TRUE; 
			$config["num_links"] = 9;

            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $data['butanding'] = $this->activities_model->get_all_girawan($config["per_page"], $page);
            $data['butanding']['result_count'] = count($data['butanding']);
            $config['total_rows'] = $data['butanding']['result_count'];

            $this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();

            $data['title'] = 'Girawan Tour';

			$this->load->view('templates/header', $data);
			$this->load->view('activities/girawan', $data);
            $this->load->view('templates/footer');
            
        }

        public function firefly() {
            
            //set general pagination config
			$config = array();
			$config['base_url'] = base_url('activities');
			
			$config['per_page'] = 100;
			$config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<span>';
			$config['cur_tag_close'] = '</span>';
			$config['prev_link'] = '&laquo;';
			$config['next_link'] = '&raquo;';
			$config['reuse_query_string'] = TRUE; 
			$config["num_links"] = 9;

            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $data['butanding'] = $this->activities_model->get_all_firefly($config["per_page"], $page);
            $data['butanding']['result_count'] = count($data['butanding']);
            $config['total_rows'] = $data['butanding']['result_count'];

            $this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();

            $data['title'] = 'River Cruise and Firefly Watching';

			$this->load->view('templates/header', $data);
			$this->load->view('activities/firefly', $data);
            $this->load->view('templates/footer');
            
        }

        public function islandhop() {
            
            //set general pagination config
			$config = array();
			$config['base_url'] = base_url('activities');
			
			$config['per_page'] = 100;
			$config['uri_segment'] = 2;
			$config['cur_tag_open'] = '<span>';
			$config['cur_tag_close'] = '</span>';
			$config['prev_link'] = '&laquo;';
			$config['next_link'] = '&raquo;';
			$config['reuse_query_string'] = TRUE; 
			$config["num_links"] = 9;

            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $data['butanding'] = $this->activities_model->get_all_islandhop($config["per_page"], $page);
            $data['butanding']['result_count'] = count($data['butanding']);
            $config['total_rows'] = $data['butanding']['result_count'];

            $this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();

            $data['title'] = 'Island Hopping';

			$this->load->view('templates/header', $data);
			$this->load->view('activities/islandhop', $data);
            $this->load->view('templates/footer');
            
        }

}