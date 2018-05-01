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
            
            $data['title'] = 'Butanding Interaction';

			$this->load->view('templates/header', $data);
			$this->load->view('activities/butanding', $data);
			$this->load->view('templates/footer');

        }

        public function girawan() {
            
            $data['title'] = 'Girawan Tour';

			$this->load->view('templates/header', $data);
			$this->load->view('activities/girawan', $data);
            $this->load->view('templates/footer');
            
        }

        public function firefly() {
            
            $data['title'] = 'River Cruise and Firefly Watching';

			$this->load->view('templates/header', $data);
			$this->load->view('activities/firefly', $data);
            $this->load->view('templates/footer');
            
        }

        public function islandhop() {
            
            $data['title'] = 'Island Hopping';

			$this->load->view('templates/header', $data);
			$this->load->view('activities/islandhop', $data);
            $this->load->view('templates/footer');
            
        }

}