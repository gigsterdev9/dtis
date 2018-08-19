<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

		public function __construct()
        {
			parent::__construct();
			$this->load->model('visits_model');
            $this->load->model('visitors_model');
            $this->load->model('activities_model');
            $this->load->model('photoid_model');
			$this->load->helper('url');
            $this->load->library('ion_auth');
            
            //$this->output->enable_profiler(TRUE);	
            
            if (!$this->ion_auth->logged_in())
			{
				redirect('auth/login');
            }
            
            if ($this->ion_auth->in_group('wwf')) {
                redirect('/photoid');
            }
            
            if ($this->ion_auth->in_group('partner')) {
                redirect('/visitors/add');
            }

        }
		
        public function view($page = 'dashboard') {

        	if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')) {
				show_404();
		    }
			
			$this->load->helper('email');
					
		    if ($page == 'dashboard') {

                /* charts section */

                /* summaries section */

                /* ws photoid season data */
                $data['ws_pid'] = $this->photoid_model->get_most_recent_report();
                //echo '<pre>'; print_r($data['ws_pid']); echo '</pre>';

                /* figures section */
                $data['total_visitors'] =  $this->visitors_model->record_count();
                $data['total_visits'] =  $this->visits_model->record_count();

                /* updates section */
                $data['latest_visitors'] = $this->visitors_model->get_visitors(20, 0);
                $data['recent_visits'] = $this->visits_model->get_visits(20, 0);
                

		    }
		    $data['title'] = ucfirst($page); // Capitalize the first letter

		    $this->load->view('templates/header', $data);
		    $this->load->view('pages/'.$page, $data);
		    $this->load->view('templates/footer', $data);
		    
		    //$this->output->enable_profiler(TRUE);
        }
        
        
}
