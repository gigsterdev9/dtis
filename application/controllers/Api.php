<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct() {
			parent::__construct();
			$this->load->model('visitors_model');
            $this->load->helper('url');
            
            //$this->output->enable_profiler(TRUE);	
            
    }
		
    public function visitors($key = NULL) {

        $this->load->helper('email');
        
        $visitors = $this->visitors_model->api_get_visitors();
        $data['json_visitors'] = json_encode($visitors);
        $data['key'] = $key;
        
        $this->load->view('api/index', $data);
        
    }
        
        
}
