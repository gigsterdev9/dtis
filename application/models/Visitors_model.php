<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class visitors_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
        
    public function record_count() {
		$this->db->where('trash = 0');
        return $this->db->count_all_results('visitors');
    }

	public function get_visitors($limit = 0, $start = 0, $ob = 'ASC') {
		
		$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(bdate, '%Y-%m-%d'))/365)) as age");
		$this->db->from('visitors');
		$this->db->where('trash = 0');
		$this->db->order_by('lname', $ob);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }
    
    public function get_visitor_by_id($id = FALSE, $include_trashed = TRUE) {
		if ($id === FALSE) {
			return 0;
		}
		
		$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(bdate, '%Y-%m-%d'))/365)) as age");
		$this->db->from('visitors');
		if ($include_trashed === TRUE) {
			$this->db->where("visitor_id = '$id'"); //omit trash = 0 to be able to 'undo' trash one last time
		}
		else{
			$this->db->where("visitor_id = '$id' and trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}
	
	public function filter_visitors($limit, $start, $filter_param1 = FALSE, $filter_param2 = FALSE, $filter_operand = FALSE) {
		if ($filter_param1 === FALSE)
		{
			return 0;
		}
		
		if ($filter_param1 == 'age') {
			switch ($filter_operand) {
				case 'above':
					$conditions = "age > '$filter_param2'";
					break;
				case 'below':
					$conditions = "age < '$filter_param2'";
					break;
				case 'between':
					$conditions = "age between $filter_param2";
					break;
				default:
					break;
			}

			$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(bdate, '%Y-%m-%d'))/365)) as age");
			$this->db->from('visitors');
			$this->db->having("$conditions");
			$this->db->where("trash = 0");
			$query = $this->db->get();
			$result_count = $query->num_rows();
			
			$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(bdate, '%Y-%m-%d'))/365)) as age");
			$this->db->from('visitors');
			$this->db->having("$conditions");
			$this->db->where("trash = 0");
			$this->db->limit($limit, $start);
			$this->db->order_by('age, lname', 'ASC');
			$query = $this->db->get();		
		}
		else{
			$this->db->select('*');
			$this->db->from('visitors');
			$this->db->where("$filter_param1 = '$filter_param2' and trash = 0");
			$query = $this->db->get();
			$result_count = $query->num_rows();
			
			$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(bdate, '%Y-%m-%d'))/365)) as age");
			$this->db->from('visitors');
			$this->db->where("$filter_param1 = '$filter_param2' and trash = 0");
			$this->db->limit($limit, $start);
			$this->db->order_by('lname', 'ASC');
			$query = $this->db->get();		
		}

		$result_array = $query->result_array();
		$result_array['result_count'] = $result_count;

		return $result_array;
		
	}
    
    public function search_visitors($limit, $start, $where_clause = false) {
        
        //total possible results
		$this->db->select('*');
		$this->db->from('visitors');

		if ($where_clause === false) {
			$this->db->where('trash = 0');
		}
		else{
			$this->db->where($where_clause);
		}
		$query = $this->db->get();
		$result_count = $query->num_rows();
        
        //results bounded by limits
		$this->db->select("*, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(bdate, '%Y-%m-%d'))/365)) as age");
		$this->db->from('visitors');
		
		if ($where_clause === false) {
			$this->db->where('trash = 0');
		}
		else{
			$this->db->where($where_clause);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('lname', 'ASC');
		$query = $this->db->get();		
        
        $result_array = $query->result_array();
		$result_array['result_count'] = $result_count;

		return $result_array;
		
	}
	
	
	public function set_visitor($data = NULL) { //new entry
    
        $this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
                    'first_visit_year' => date('Y'),
                    'fname' => $this->input->post('fname'),
                    'mname' => $this->input->post('mname'),
                    'lname' => $this->input->post('lname'),
                    'h_address' => $this->input->post('h_address'),
                    'nationality' => $this->input->post('nationality'),
                    'bdate' => $this->input->post('bdate'),
                    'gender' => $this->input->post('gender'),
                    'civil_status' => $this->input->post('civil_status'),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'email' => $this->input->post('email'),
                    'occupation' => $this->input->post('occupation'),
                    'b_address' => $this->input->post('b_address'),
                    'b_contact_no' => $this->input->post('b_contact_no'),
                    'swimmer' => $this->input->post('swimmer'),
                    'diver' => $this->input->post('diver'),
                    'ice_fullname' => $this->input->post('ice_fullname'),
                    'ice_address' => $this->input->post('ice_address'),
                    'ice_relationship' => $this->input->post('ice_relationship'),
                    'ice_contact_nos' => $this->input->post('ice_contact_nos'),
                    'status' => $this->input->post('status'),
                    'remarks' => $this->input->post('remarks'),	
                    'trash' => 0
			);
		}
		//insert new entry
		$this->db->insert('visitors', $data);
		$visitor_id = $this->db->insert_id();
		
		return $visitor_id;
	}
    
    //update individual visitor
	public function update_visitor() {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
		
		$visitor_id = $this->input->post('visitor_id');
				
		
		$data = array(
                'first_visit_year' => $this->input->post('first_visit_year'),
                'fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname'),
                'h_address' => $this->input->post('h_address'),
                'nationality' => $this->input->post('nationality'),
                'bdate' => $this->input->post('bdate'),
                'gender' => $this->input->post('gender'),
                'civil_status' => $this->input->post('civil_status'),
                'mobile_no' => $this->input->post('mobile_no'),
                'email' => $this->input->post('email'),
                'occupation' => $this->input->post('occupation'),
                'b_address' => $this->input->post('b_address'),
                'b_contact_no' => $this->input->post('b_contact_no'),
                'swimmer' => $this->input->post('swimmer'),
                'diver' => $this->input->post('diver'),
                'ice_fullname' => $this->input->post('ice_fullname'),
                'ice_address' => $this->input->post('ice_address'),
                'ice_relationship' => $this->input->post('ice_relationship'),
                'ice_contact_nos' => $this->input->post('ice_contact_nos'),
				'status' => $this->input->post('status'),
				'remarks' => $this->input->post('remarks'),
				'trash' => $this->input->post('trash')
		);
		
		$this->db->where('visitor_id', $visitor_id);
		$this->db->update('visitors', $data);
		
		return;
	}

    /** Partner Entries */

    public function partner_entries_count() {
		$this->db->where('checked = 0 and trash = 0');
        return $this->db->count_all_results('visitors_viapartners');
    }

    public function get_partner_entries($limit = 0, $start = 0, $ob = 'DESC') {
		
		$this->db->select("*");
		$this->db->from('visitors_viapartners');
		$this->db->where('checked = 0 and trash = 0');
		$this->db->order_by('visitor_id', $ob);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }

    public function get_p_entry_by_id($id = FALSE) {
		if ($id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('visitors_viapartners');
		$this->db->where("visitor_id = '$id' and trash = 0"); 
		$query = $this->db->get();		

		return $query->row_array();
	}

    public function set_partner_add($data = NULL) { //new entry via partner
    
        $this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
                    'first_visit_year' => date('Y'),
                    'fname' => $this->input->post('fname'),
                    'mname' => $this->input->post('mname'),
                    'lname' => $this->input->post('lname'),
                    'h_address' => $this->input->post('h_address'),
                    'nationality' => $this->input->post('nationality'),
                    'bdate' => $this->input->post('bdate'),
                    'gender' => $this->input->post('gender'),
                    'civil_status' => $this->input->post('civil_status'),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'email' => $this->input->post('email'),
                    'occupation' => $this->input->post('occupation'),
                    'b_address' => $this->input->post('b_address'),
                    'b_contact_no' => $this->input->post('b_contact_no'),
                    'swimmer' => $this->input->post('swimmer'),
                    'diver' => $this->input->post('diver'),
                    'ice_fullname' => $this->input->post('ice_fullname'),
                    'ice_address' => $this->input->post('ice_address'),
                    'ice_relationship' => $this->input->post('ice_relationship'),
                    'ice_contact_nos' => $this->input->post('ice_contact_nos'),
                    'status' => $this->input->post('status'),
                    'remarks' => $this->input->post('remarks'),	
                    'trash' => 0
			);
		}
		//insert new entry
		$this->db->insert('visitors_viapartners', $data);
		$temp_visitor_id = $this->db->insert_id();
		
		return $temp_visitor_id;
	}

    //update individual partner entry
	public function update_p_entry() {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
		
		$visitor_id = $this->input->post('visitor_id');
		
		$data = array(
                'first_visit_year' => $this->input->post('first_visit_year'),
                'fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname'),
                'h_address' => $this->input->post('h_address'),
                'nationality' => $this->input->post('nationality'),
                'bdate' => $this->input->post('bdate'),
                'gender' => $this->input->post('gender'),
                'civil_status' => $this->input->post('civil_status'),
                'mobile_no' => $this->input->post('mobile_no'),
                'email' => $this->input->post('email'),
                'occupation' => $this->input->post('occupation'),
                'b_address' => $this->input->post('b_address'),
                'b_contact_no' => $this->input->post('b_contact_no'),
                'swimmer' => $this->input->post('swimmer'),
                'diver' => $this->input->post('diver'),
                'ice_fullname' => $this->input->post('ice_fullname'),
                'ice_address' => $this->input->post('ice_address'),
                'ice_relationship' => $this->input->post('ice_relationship'),
                'ice_contact_nos' => $this->input->post('ice_contact_nos'),
				'status' => $this->input->post('status'),
				'remarks' => $this->input->post('remarks'),
				'trash' => $this->input->post('trash')
		);
		
		$this->db->where('visitor_id', $visitor_id);
		$this->db->update('visitors', $data);
		
		return;
	}

    //batch update partner entries
	public function update_p_entries() {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
        
        $add_ctr = 0;
        $trash_ctr = 0;
        foreach ($this->input->post('action') as $key => $a) {
            //echo $key .'-'. $val.'<br />';
            $visitor_id = $key;

            switch ($a) {
                case 1: //add
                    //retrieve full entry
                    $entry = $this->get_p_entry_by_id($visitor_id);
                    //echo '<pre>'; print_r($entry); echo '</pre>'; die();
                    //assign values
                    $data = array(
                            'first_visit_year' => $entry['first_visit_year'],
                            'fname' => $entry['fname'],
                            'mname' => $entry['mname'],
                            'lname' => $entry['lname'],
                            'h_address' => $entry['h_address'],
                            'nationality' => $entry['nationality'],
                            'bdate' => $entry['bdate'],
                            'gender' => $entry['gender'],
                            'civil_status' => $entry['civil_status'],
                            'mobile_no' => $entry['mobile_no'],
                            'email' => $entry['email'],
                            'occupation' => $entry['occupation'],
                            'b_address' => $entry['b_address'],
                            'b_contact_no' => $entry['b_contact_no'],
                            'swimmer' => $entry['swimmer'],
                            'diver' => $entry['diver'],
                            'ice_fullname' => $entry['ice_fullname'],
                            'ice_address' => $entry['ice_address'],
                            'ice_relationship' => $entry['ice_relationship'],
                            'ice_contact_nos' => $entry['ice_contact_nos'],
                            'status' => $entry['status'],
                            'remarks' => $entry['remarks'].' (submitted by partner)',
                            'trash' => 0
                    );
                    //execute insert
                    $result = $this->set_visitor($data);

                    //tag as checked
                    $data1 = array(
                        'checked' => '1'
                    );
                    $this->db->where('visitor_id', $visitor_id);
                    $this->db->update('visitors_viapartners', $data1);
                    $add_ctr++;
                    break;

                case 2: //dupe, mark as trash
                    $data = array(
                            'checked' => '1',
                            'trash' => '1'
                    );
                    $this->db->where('visitor_id', $visitor_id);
                    $this->db->update('visitors_viapartners', $data);
                    
                    $trash_ctr++;
                    break;

                default:
                    //do nothing
            }
        }
        
		return;
	}

}
