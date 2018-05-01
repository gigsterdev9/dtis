<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class visits_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
		
	public function record_count() {
		$this->db->where('trash = 0');
        return $this->db->count_all_results('visits');
    }

	public function get_visits($limit = 0, $start = 0) {
		
		$this->db->select("*");
        $this->db->from('visits a');
        $this->db->join('visitors b', 'a.visitor_id = b.visitor_id');
        $this->db->where('a.trash = 0 and b.trash = 0'); //both entries must not be trashed
		$this->db->order_by('visit_date', 'ASC');
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
        $this->db->join('visitors b', 'a.visitor_id = b.visitor_id');
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
		
		$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(n.dob, '%Y-%m-%d'))/365)) as age");
		$this->db->from('services s');
		$this->db->join('beneficiaries b', 'b.ben_id = s.ben_id');
		$this->db->join('non_voters n', 'n.nv_id = b.nv_id');
		$this->db->where("b.nv_id = '$nv_id' and s.trash = '0'");
		$q = $this->db->get();
				
		$ns = $q->result_array();
		
		if (empty($ns)) {
			return 0;
		}
		//echo '<pre>'; print_r($ns); echo '</pre>'; die();

		if (isset($ns)) {
			foreach($ns as $n) {
				
				if ($n != '') {
					
					$x = $this->visits_model->get_beneficiary_by_id($n['req_ben_id']);
						$n['req_fname'] = $x['fname'];
						$n['req_mname'] = $x['mname'];
						$n['req_lname'] = $x['lname'];
					
				}
				$n_services[] = $n;
			}

			return $n_services; 
		}
		else{

			return 0;
		}

	}

    public function get_visit_activity_details($id = FALSE, $activity = FALSE) {

        if ($id === FALSE || $activity === FALSE) {
            return 0;
        }

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
        $query = $this->db->get();

        return $query->row_array();

    }


	public function filter_visits($filter_param1 = FALSE, $filter_param2 = FALSE, $limit = 0, $start = 0) {
		
		if ($filter_param1 === FALSE) {
			return 0;
		}
		
		$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(rvoters.dob, '%Y-%m-%d'))/365)) as age");
		$this->db->from('services');
		$this->db->join('beneficiaries', 'beneficiaries.ben_id = services.ben_id');
		$this->db->join('rvoters', 'beneficiaries.id_no_comelec = rvoters.id_no_comelec');
		//$this->db->where("$filter_param1 = '$filter_param2' and beneficiaries.trash = 0");
		$this->db->limit($limit, $start);
		$query = $this->db->get();		
		$result1 =  $query->result_array();
		
		//echo $this->db->last_query(); die();

		foreach ($result1 as $r) {
			$ben_id = $r['ben_id'];
			$this->db->select('*');
			$this->db->from('services');
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
				$r_services[] = $r;
			}
			return $r_services; 
		}
		else{
			return 0;
		}
		
	}

	public function search_visits($limit, $start, $where_clause = FALSE) { 
		if ($where_clause === FALSE) {
			return 0;
		}
		$where_clause .= ' and (r.trash = 0 and b.trash = 0) ';
		//die($where_clause);
		
		$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(dob, '%Y-%m-%d'))/365)) as age");
		$this->db->from('rvoters r');
		$this->db->join('beneficiaries b', 'r.id_no_comelec = b.id_no_comelec');
		$this->db->where($where_clause);
		$this->db->limit($limit, $start);
		$this->db->order_by('lname', 'ASC');
		$query = $this->db->get();		
		$result1 = $query->result_array();
		
		foreach ($result1 as $r) {
			$ben_id = $r['ben_id'];
			$this->db->select('*');
			$this->db->from('services');
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
				$r_services[] = $r;
			}
			return $r_services; 
		}
		else{
			return 0;
		}

	}
	
	public function set_service($data = NULL) { //new service
		$this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
					'req_date' => $this->input->post('req_date'),
					'ben_id' => $this->input->post('ben_id'),
					'req_ben_id' => $this->input->post('req_ben_id'),
					'relationship' => $this->input->post('relationship'),
					'service_type' => $this->input->post('service_type'),
					'particulars' => $this->input->post('particulars'),
					'amount' => $this->input->post('amount'),
					's_status' => $this->input->post('s_status'),
					'action_officer' => $this->input->post('action_officer'),
					'recommendation' => $this->input->post('recommendation'),
					's_remarks' => $this->input->post('s_remarks'),
					'trash' => 0
			);
		}
		//insert new voter
		$this->db->insert('services', $data);
		
		$rvid = $this->db->insert_id();
		//add audit trail
		$user = $this->ion_auth->user()->row();
		$data1 = array(
					'ben_id' => $rvid,
					'user' => $user->username,
					'activity' => 'service availment created'
		);
		$this->db->insert('audit_trail', $data1);
		
		return;
	}
	
	//check for dupes
	public function dupe_check($req_date = NULL, $ben_id = NULL, $service_type = NULL, $particulars = NULL, $amount = NULL) {
		
		if ($req_date == NULL || $ben_id == NULL || $service_type == NULL) {
			return 0;
		}

		$this->db->select("service_id");
		$this->db->from('services');
		$this->db->where("ben_id = '$ben_id' and req_date = '$req_date' and service_type = '$service_type' and particulars = '$particulars' and amount = '$amount' and trash = '0'");
		$query = $this->db->get();
		//echo $this->db->last_query();

		return $query->row_array();

	}
	
	//update service details
	public function update_service() {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
		
		$service_id = $this->input->post('service_id');
		$ben_id = $this->input->post('ben_id');		
		
		$data = array(
				'req_date'=> $this->input->post('req_date'),
				'ben_id' => $ben_id,
				'req_ben_id' => $this->input->post('req_ben_id'),
				'relationship' => $this->input->post('relationship'),
				'service_type' => $this->input->post('service_type'),
				'particulars' => $this->input->post('particulars'),
				'amount' => $this->input->post('amount'),
				's_status' => $this->input->post('s_status'),
				'action_officer' => $this->input->post('action_officer'),
				'recommendation' => $this->input->post('recommendation'),
				's_remarks' => $this->input->post('s_remarks'),
				//'trash' => $this->input->post('trash')
		);
		
		$this->db->where('service_id', $service_id);
		$this->db->update('services', $data);
		
		//add audit trail
		$altered = $this->input->post('altered'); //hidden field that tracks form edits; see form
		if (strlen($altered) > 0) 
		{
			$user = $this->ion_auth->user()->row();
			$data3 = array(
						'ben_id' => $ben_id,
						'service_id' => $service_id,
						'user' => $user->username,
						'activity' => 'modified',
						'mod_details' => $altered
			);
			$this->db->insert('audit_trail', $data3);
		}
		
		return;
	}

	public function trash_service($s_id = FALSE, $b_id = FALSE) {

		if ($s_id === FALSE || $b_id === FALSE) {
			return 0;
		}

		$data = array(
				'trash' => 1
			);
		
		$this->db->where('service_id', $s_id);
		$this->db->update('services', $data);

		//add audit trail
		$user = $this->ion_auth->user()->row();
		$data = array(
					'service_id' => $s_id,
					'ben_id' =>$b_id,
					'user' => $user->username,
					'activity' => 'modified',
					'mod_details' => 'trashed service record with ID '.$s_id
				);
		$this->db->insert('audit_trail', $data);
		
		return;
	}

	//use in dashboard charts
	public function get_by_servtype($type = false) {

		$this->db->select('*');
		$this->db->from('services');
		if ($type == false) {
			$this->db->where('1');
		}
		else{
			$this->db->where("service_type = '$type'");
		}
		$query = $this->db->get();

		return $query->result_array(); 

	}

	public function total_services_amount($year = null) {

		$this->db->select('sum(amount) as total');
		$this->db->from('services');
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
