<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct() {
			parent::__construct();
			$this->load->model('meta_model');
            $this->load->helper('url');
            $this->load->library('ion_auth');
            
            if (!$this->ion_auth->logged_in()) {
                redirect('auth/login');
            }
            
            //$this->output->enable_profiler(TRUE);	
            
    }
		
    public function index() {

        	
            $data['title'] = 'System Settings';
            $data['settings'] = $this->meta_model->get_all_settings();
            
            $this->load->view('templates/header', $data);
            $this->load->view('settings/index', $data);
            $this->load->view('templates/footer');

		    
		    //$this->output->enable_profiler(TRUE);
    }
        
    //update setting data        
    public function edit($id = NULL) {

        if (empty($id)) {
            redirect('settings');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('meta_value', 'Setting Value', 'trim|required');
        
        if ($this->form_validation->run() === FALSE) {
            
            $data['id'] = $id;
            $data['setting'] = $this->meta_model->get_setting_by_id($id);
            $data['title'] = 'Edit setting';
            
            $this->load->view('templates/header', $data);
            $this->load->view('settings/edit', $data);
            $this->load->view('templates/footer');

        }
        else {
            
            $meta_name = $this->input->post('meta_name');
            $meta_value = $this->input->post('meta_value');
                            
            $data = array(
                        //'meta_name' => $meta_name,
                        'meta_value' => $meta_value
                    );
            $this->meta_model->update_setting($id, $data);
            
            $data['id'] = $id;
            $data['setting'] = $this->meta_model->get_setting_by_id($id);
            $data['title'] = 'Edit setting';
            $data['alert_success'] = 'Setting updated.';
            
            $this->load->view('templates/header', $data);
            $this->load->view('settings/edit', $data);
            $this->load->view('templates/footer');
            
        }
        
    }        
    
}
