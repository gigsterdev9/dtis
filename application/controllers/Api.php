<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct() {
			parent::__construct();
            $this->load->model('visitors_model');
            $this->load->model('meta_model');
            $this->load->helper('url');
            
            //$this->output->enable_profiler(TRUE);	
            
    }
		
    public function visitors($key = NULL) {
        
        //retrieve key from meta
        $meta = $this->meta_model->get_setting_by_id(2);
        $api_key = $meta['meta_value']; 

        //compare key 
        if ($key != $api_key) {
            show_404();
        }

        $this->load->helper('email');
        
        $visitors = $this->visitors_model->api_get_visitors();
        $data['json_visitors'] = json_encode($visitors);
               
        $this->load->view('api/index', $data);

        
    }
        
        
}
