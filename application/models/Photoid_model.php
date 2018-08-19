<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class photoid_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
        
    public function record_count() {
		$this->db->where('trash = 0');
        return $this->db->count_all_results('ws_photoid');
    }

    public function get_most_recent_report() {
		
		$this->db->select("*");
		$this->db->from('ws_photoid');
		$this->db->where('trash_flag = 0');
		$this->db->order_by('report_id', 'DESC');
		$query = $this->db->get();

		return $query->row_array();

	}

    public function get_reports($limit = 0, $start = 0) {
		
		$this->db->select("*");
		$this->db->from('ws_photoid');
		$this->db->where('trash_flag = 0');
		$this->db->order_by('report_id', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_report_by_id($id = FALSE, $include_trashed = TRUE) {
		if ($id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('ws_photoid');
		if ($include_trashed === TRUE) {
			$this->db->where("report_id = '$id'"); //omit trash_flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("report_id = '$id' and trash_flag = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}
	
	public function set_report($data = NULL) { //new entry
        //echo '<pre>'; print_r($_POST); echo '</pre>'; die();
        $this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
                    'report_date' => $this->input->post('report_date'),
                    'season' => $this->input->post('season'),
                    'total_ph_ws' => $this->input->post('total_ph_ws'),
                    'total_donsol_ws' => $this->input->post('total_donsol_ws'),
                    'season_total' => $this->input->post('season_total'),
                    'new_sighting_count' => $this->input->post('new_sighting_count'),
                    'resighting_count' => $this->input->post('resighting_count'),
                    'ws_remarks' => $this->input->post('ws_remarks'),
                    'trash_flag' => 0
			);
		}
		//insert new entry
		$this->db->insert('ws_photoid', $data);
		$report_id = $this->db->insert_id();
		
		return $report_id;
	}
	
	//update report
	public function update_report($data = NULL) {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
		
		$report_id = $this->input->post('report_id');
        
        if ($data == NULL) {
            $data = array(
                    'report_date' => $this->input->post('report_date'),
                    'season' => $this->input->post('season'),
                    'total_ph_ws' => $this->input->post('total_ph_ws'),
                    'total_donsol_ws' => $this->input->post('total_donsol_ws'),
                    'season_total' => $this->input->post('season_total'),
                    'new_sighting_count' => $this->input->post('new_sighting_count'),
                    'resighting_count' => $this->input->post('resighting_count'),
                    'ws_remarks' => $this->input->post('ws_remarks'),
                    'trash_flag' => $this->input->post('trash')
            );
        }
		
		$this->db->where('report_id', $report_id);
		$this->db->update('ws_photoid', $data);
		
		return;
	}

}
