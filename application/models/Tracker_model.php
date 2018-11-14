<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class tracker_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
    
    
    public function record_count() {
        return $this->db->count_all('audit_trail');
    }

    
    public function log_event($id_type, $id, $activity, $mod_details) {

        $user = $this->ion_auth->user()->row();
		$data = array(
                    'user' => $user->username,
                    'activity' => $activity,
					'mod_details' => $mod_details
                );
        switch ($id_type) {
            case 'visitor_id': 
                $data['visitor_id'] = $id;
                break;
            case 'visit_id':
                $data['visit_id'] = $id;
                break;
            default:
                break;
        }
        $this->db->insert('audit_trail', $data);
        
        return;
    }
    

	public function get_activities($id, $module = NULL) {
        //echo $module; echo $id;
        switch ($module) {
            
            case 'visitors':
                $this->db->select('*');
                $this->db->from('audit_trail');
                $this->db->order_by('timestamp', 'desc');
                $this->db->where("visitor_id = '$id' and activity = 'modified'");
                $this->db->limit(5);
                $query = $this->db->get();		
                
                $tracker['modified'] = $query->result_array();	
                
                $this->db->select('*');
                $this->db->from('audit_trail');
                $this->db->where("visitor_id = '$id' and activity = 'created'");
                $query = $this->db->get();		
                
                $tracker['created'] = $query->row_array();	

                break;
            
            case 'visits':
                $this->db->select('*');
                $this->db->from('audit_trail');
                $this->db->order_by('timestamp', 'desc');
                $this->db->where("visitor_id = '$id' and activity = 'modified'");
                $this->db->limit(5);
                $query = $this->db->get();		
                
                $tracker['modified'] = $query->result_array();	
                
                $this->db->select('*');
                $this->db->from('audit_trail');
                $this->db->where("visitor_id = '$id' and activity = 'created'");
                $query = $this->db->get();		
                
                $tracker['created'] = $query->row_array();	

                break;

          default: 

                break;
        }

        return $tracker;

	}
	
	
}
