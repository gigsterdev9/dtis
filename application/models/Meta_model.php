<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class meta_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
        
    public function record_count() {
		return $this->db->count_all_results('meta');
    }

    public function get_all_settings($limit = 0, $start = 0) {
		
		$this->db->select("*");
		$this->db->from('meta');
		$this->db->order_by('meta_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }
    
    public function get_setting_by_id($id = FALSE) {
		if ($id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
        $this->db->from('meta');
        $this->db->where("meta_id = '$id'"); 
		$query = $this->db->get();		

		return $query->row_array();
	}
	
	public function update_setting($meta_id = NULL, $data = NULL) {
		$this->load->helper('url');
        
        if ($meta_id == NULL) {
            $meta_id = $this->input->post('meta_id');
        }
        
        if ($data == NULL) {
            $data = array(
                'meta_name' => $this->input->post('meta_name'),
                'meta_value' => $this->input->post('meta_value')
            );
        }
		
		$this->db->where('meta_id', $meta_id);
		$this->db->update('meta', $data);
		
		return;
	}

}
