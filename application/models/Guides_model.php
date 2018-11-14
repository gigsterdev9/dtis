<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class guides_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
        
    public function record_count() {
		$this->db->where('ag_trash = 0');
        return $this->db->count_all_results('accredited_guides');
    }

    public function get_all_guides($limit = 0, $start = 0) {
		
		$this->db->select("*");
		$this->db->from('accredited_guides');
		$this->db->where('ag_trash = 0');
		$this->db->order_by('ag_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_guide_by_id($id = FALSE, $include_trashed = TRUE) {
		if ($id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('accredited_guides');
		if ($include_trashed === TRUE) {
			$this->db->where("ag_id = '$id'"); //omit trash_flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("ag_id = '$id' and ag_trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}
	
	public function set_guide($data = NULL) { //new entry
        //echo '<pre>'; print_r($_POST); echo '</pre>'; die();
        $this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
                    'ag_name' => $this->input->post('ag_name'),
                    'ag_acc_no' => $this->input->post('ag_acc_no'),
                    'ag_acc_yr' => $this->input->post('ag_acc_yr'),
                    'ag_acc_expiry' => $this->input->post('ag_acc_expiry'),
                    'ag_remarks' => $this->input->post('ag_remarks'),
                    'ag_trash' => 0
			);
		}
		//insert new entry
		$this->db->insert('accredited_guides', $data);
		$report_id = $this->db->insert_id();
		
		return $report_id;
	}
	
	public function update_guide($ag_id = NULL, $data = NULL) {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
        
        if ($ag_id == NULL) {
            $ag_id = $this->input->post('ag_id');
        }
        
        if ($data == NULL) {
            $data = array(
                'ag_name' => $this->input->post('ag_name'),
                'ag_acc_no' => $this->input->post('ag_acc_no'),
                'ag_acc_yr' => $this->input->post('ag_acc_yr'),
                'ag_acc_expiry' => $this->input->post('ag_acc_expiry'),
                'ag_remarks' => $this->input->post('ag_remarks'),
                'ag_trash' => $this->input->post('ag_trash')
            );
        }
		
		$this->db->where('ag_id', $ag_id);
		$this->db->update('accredited_guides', $data);
		
		return;
	}

}
