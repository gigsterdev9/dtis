<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class visits_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
		
	public function record_count() {
		$this->db->where('trash = 0');
        return $this->db->count_all_results('visits');
    }

	public function get_visits($limit = 0, $start = 0, $ob = 'ASC') {
		
		$this->db->select("*");
        $this->db->from('visits a');
        $this->db->join('visitors b', 'a.visitor_id = b.visitor_id');
        $this->db->where('a.trash = 0 and b.trash = 0'); //both entries must not be trashed
		$this->db->order_by('visit_date', $ob);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

	}

    public function get_visit_by_id($id = FALSE, $include_trashed = TRUE) { //retrieve visit detail by its own id
		if ($id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
        $this->db->from('visits a');
        $this->db->join('visitors b', 'b.visitor_id = a.visitor_id');
        
        if ($include_trashed === TRUE) {
			$this->db->where("a.visit_id = '$id'"); 
		}
		else{
			$this->db->where("a.visit_id = '$id' and (a.trash = 0 and b.trash = 0)"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
    
    }

	public function get_visits_by_visitor_id($id = FALSE) { //retrieve all records related to one visitor
		
		$this->db->select("*");
		$this->db->from('visits');
		$this->db->where("visitor_id = '$id' and trash = '0'");
		$q = $this->db->get();
				
		$related_visits = $q->result_array();
		
		if (empty($related_visits)) {
			return 0;
		}
		else{
			return $related_visits;
		}

	}

    public function get_visit_activity_details($id = FALSE, $activity = FALSE) {

        if ($id === FALSE || $activity === FALSE) {
            return 0;
        }

        /*
        $this->db->select('*');
        switch ($activity) {
            case 'butanding':
                    $this->db->from('butanding_interaction');
                break;
            case 'girawan':
                    $this->db->from('girawan_tour');
                break;
            case 'firefly':
                    $this->db->from('firefly_watching');
                break;
            case 'island_hop':
                    $this->db->from('island_hopping');
                break;
            default: 
                break;
        }
        $this->db->where("visit_id = $id");
        */

        $this->db->select("*");
        $this->db->from('visit_activities');
        $this->db->join('accredited_guides', 'visit_activities.ag_id = accredited_guides.ag_id');
        $this->db->join('accredited_boats', 'visit_activities.ab_id = accredited_boats.ab_id');
        $this->db->where("visit_id = $id and activity_id = $activity");
        $query = $this->db->get();

        return $query->row_array();

    }


	public function filter_visits($filter_param1 = FALSE, $filter_param2 = FALSE, $limit = 0, $start = 0) {
		
		if ($filter_param1 === FALSE) {
			return 0;
		}
		
		$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(rvoters.dob, '%Y-%m-%d'))/365)) as age");
		$this->db->from('visits');
		$this->db->join('beneficiaries', 'beneficiaries.ben_id = visits.ben_id');
		$this->db->join('rvoters', 'beneficiaries.id_no_comelec = rvoters.id_no_comelec');
		//$this->db->where("$filter_param1 = '$filter_param2' and beneficiaries.trash = 0");
		$this->db->limit($limit, $start);
		$query = $this->db->get();		
		$result1 =  $query->result_array();
		
		//echo $this->db->last_query(); die();

		foreach ($result1 as $r) {
			$ben_id = $r['ben_id'];
			$this->db->select('*');
			$this->db->from('visits');
			$this->db->where("ben_id = '$ben_id'");
			$this->db->limit(1);
			$result2 = $this->db->get();
			
			if ($result2->num_rows() == 1) {
				$rs[] = array_merge($r, $result2->row_array());
			}
		}

		if (isset($rs)) {
			
			foreach($rs as $r) {
				
				if ($r != '') {
	
					$x = $this->visits_model->get_beneficiary_by_id($r['req_ben_id']);
						$r['req_fname'] = $x['fname'];
						$r['req_mname'] = $x['mname'];
						$r['req_lname'] = $x['lname'];
				}
				$r_visits[] = $r;
			}
			return $r_visits; 
		}
		else{
			return 0;
		}
		
	}

	public function search_visits($limit, $start, $where_clause = FALSE) { 
        
        //total possible results
		$this->db->select('*');
		$this->db->from('visits');

		if ($where_clause === false) {
			$this->db->where('trash = 0');
		}
		else{
			$this->db->where($where_clause);
		}
		$query = $this->db->get();
		$result_count = $query->num_rows();
        
        //results bounded by limits
		$this->db->select("*");
		$this->db->from('visits');
		
		if ($where_clause === false) {
			$this->db->where('trash = 0');
		}
		else{
			$this->db->where($where_clause);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('visit_id', 'DESC');
		$query = $this->db->get();		
        
        $result_array = $query->result_array();
		$result_array['result_count'] = $result_count;

		return $result_array;

	}
	
	public function set_visit($data = NULL) { //new visit
        
        $this->load->helper('url');
        
        if ($data == NULL) {
			$data = array(
                    'visitor_id' => $this->input->post('visitor_id'),
                    'visit_date' => $this->input->post('visit_date'),
					'boarding_pass' => 'XXX',
                    'or_no' => $this->input->post('or_no'),
                    'form_signed' => $this->input->post('form_signed'),
                    'butanding' => $this->input->post('butanding'),
                    'girawan' => $this->input->post('girawan'),
                    'firefly' => $this->input->post('firefly'),
                    'island_hop' => $this->input->post('island_hop'),
                    'visit_reason' => $this->input->post('visit_reason'),
                    'visit_remarks' => $this->input->post('visit_remarks'),
                    'trash' => 0
			);
		}
		//insert new visit
		$this->db->insert('visits', $data);
		
        $visit_id = $this->db->insert_id();
        
        return $visit_id; 
    }
    
    public function set_visit_activity($data = NULL, $activity_id = NULL)   {

        $this->load->helper('url');
        
        if ($activity_id == NULL) {
            $activity_id = $this->input->post('activity_id');
        }

        if ($data == NULL) {
			$data = array(
                    'visit_id' => $this->input->post('visit_id'),
                    'activity_id' => $activity_id,
                    'ag_id' => $this->input->post('ag_id'),
                    'ab_id' => $this->input->post('ab_id'),
                    'va_trash' => 0
			);
		}
		//insert new visit
		$this->db->insert('visit_activities', $data);
		
        $va_id = $this->db->insert_id();
        
        return $va_id; 

    }
	
	//check for dupes
	public function dupe_check($visitor_id = NULL, $visit_date = NULL, $or_no = NULL) {
		
		if ($visit_date == NULL || $visitor_id == NULL || $or_no == NULL) {
			return 0;
		}

		$this->db->select("visit_id");
		$this->db->from('visits');
		$this->db->where("visitor_id = '$visitor_id' and visit_date = '$visit_date' and or_no = '$or_no' and trash = '0'");
		$query = $this->db->get();
		//echo $this->db->last_query(); die();

		return $query->row_array();

	}
	
	//update visit details
	public function update_visit($visit_id = NULL, $data = NULL) {
		
		$this->load->helper('url');
        
        if ($visit_id == NULL) {
            $visit_id = $this->input->post('visit_id');
        }
        
        if ($data == NULL) {
			$data = array(
                    'visitor_id' => $this->input->post('visitor_id'),
                    'visit_date' => $this->input->post('visit_date'),
					//'boarding_pass' => $this->input->post('visit_date'), //lock editing of boarding pass
                    'or_no' => $this->input->post('or_no'),
                    'form_signed' => $this->input->post('form_signed'),
                    'butanding' => $this->input->post('butanding'),
                    'girawan' => $this->input->post('girawan'),
                    'firefly' => $this->input->post('firefly'),
                    'island_hop' => $this->input->post('island_hop'),
                    'visit_reason' => $this->input->post('visit_reason'),
                    'visit_remarks' => $this->input->post('visit_remarks'),
                    'trash' => $this->input->post('trash')
			);
		}
		
		$this->db->where('visit_id', $visit_id);
        $this->db->update('visits', $data);
        
		return;
    }
    
    public function update_visit_activity($va_id = NULL, $data = NULL) {
		
		$this->load->helper('url');
		
        if ($va_id == NULL) {
            return 0;
        }
        
        if ($data == NULL) {
			$data = array(
                'visit_id' => $this->input->post('visit_id'),
                'activity_id' => $this->input->post('activity_id'),
                'ag_id' => $this->input->post('ag_id'),
                'ab_id' => $this->input->post('ab_id'),
                'va_trash' => $this->input->post('trash')
			);
		}
		
		$this->db->where('va_id', $va_id);
        $this->db->update('visit_activities', $data);
        
		return;
	}

	public function trash_visit($s_id = FALSE, $b_id = FALSE) {

		if ($s_id === FALSE || $b_id === FALSE) {
			return 0;
		}

		$data = array(
				'trash' => 1
			);
		
		$this->db->where('visit_id', $s_id);
		$this->db->update('visits', $data);

		//add audit trail
		$user = $this->ion_auth->user()->row();
		$data = array(
					'visit_id' => $s_id,
					'ben_id' =>$b_id,
					'user' => $user->username,
					'activity' => 'modified',
					'mod_details' => 'trashed visit record with ID '.$s_id
				);
		$this->db->insert('audit_trail', $data);
		
		return;
	}

    //use in dashboard charts
	public function get_by_servtype($type = false) {

		$this->db->select('*');
		$this->db->from('visits');
		if ($type == false) {
			$this->db->where('1');
		}
		else{
			$this->db->where("visit_type = '$type'");
		}
		$query = $this->db->get();

		return $query->result_array(); 

	}

	public function total_visits_amount($year = null) {

		$this->db->select('sum(amount) as total');
		$this->db->from('visits');
		if ($year == false) {
			$this->db->where('trash = 0');
		}
		else{
			$this->db->where("year(req_date) = '$year'");
		}
		$query = $this->db->get();
		//$last_query = $this->db->last_query();
		//die($last_query);

		return $query->row_array(); 

	}
	
}
