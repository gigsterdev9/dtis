<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class boats_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
        
    public function record_count() {
		$this->db->where('ab_trash = 0');
        return $this->db->count_all_results('accredited_boats');
    }

    public function get_all_boats($limit = 0, $start = 0) {
		
		$this->db->select("*");
		$this->db->from('accredited_boats');
		$this->db->where('ab_trash = 0');
		$this->db->order_by('ab_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }
    
    public function get_active_boats($limit = 0, $start = 0) {
		
		$this->db->select("*");
		$this->db->from('accredited_boats');
		$this->db->where('ab_status = 1 and ab_trash = 0');
		$this->db->order_by('ab_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_boat_by_id($id = FALSE, $include_trashed = TRUE) {
		if ($id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('accredited_boats');
		if ($include_trashed === TRUE) {
			$this->db->where("ab_id = '$id'"); //omit trash_flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("ab_id = '$id' and ab_trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}
	
	public function set_boat($data = NULL) { //new entry
        //echo '<pre>'; print_r($_POST); echo '</pre>'; die();
        $this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
                    'ab_name' => $this->input->post('ab_name'),
                    'ab_operator' => $this->input->post('ab_operator'),
                    'ab_status' => $this->input->post('ab_status'),
                    'ab_acc_no' => $this->input->post('ab_acc_no'),
                    'ab_acc_yr' => $this->input->post('ab_acc_yr'),
                    'ab_acc_expiry' => $this->input->post('ab_acc_expiry'),
                    'ab_remarks' => $this->input->post('ab_remarks'),
                    'ab_trash' => 0
			);
		}
		//insert new entry
		$this->db->insert('accredited_boats', $data);
		$report_id = $this->db->insert_id();
		
		return $report_id;
	}
	
	public function update_boat($ab_id = NULL, $data = NULL) {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
        
        if ($ab_id == NULL) {
            $ab_id = $this->input->post('ab_id');
        }
        
        if ($data == NULL) {
            $data = array(
                'ab_name' => $this->input->post('ab_name'),
                'ab_operator' => $this->input->post('ab_operator'),
                'ab_status' => $this->input->post('ab_status'),
                'ab_acc_no' => $this->input->post('ab_acc_no'),
                'ab_acc_yr' => $this->input->post('ab_acc_yr'),
                'ab_acc_expiry' => $this->input->post('ab_acc_expiry'),
                'ab_remarks' => $this->input->post('ab_remarks'),
                'ab_trash' => $this->input->post('ab_trash')
            );
        }
		
		$this->db->where('ab_id', $ab_id);
		$this->db->update('accredited_boats', $data);
		
		return;
	}

}
