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
                    'status_code' => 1,
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
	public function update_visitor($visitor_id = NULL, $data = NULL) {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
        
        if ($visitor_id == NULL) {
		    $visitor_id = $this->input->post('visitor_id');
        }
        
        if ($data == NULL) {
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
                    'status_code' => $this->input->post('status_code'),
                    'remarks' => $this->input->post('remarks'),
                    'trash' => $this->input->post('trash')
            );
        }
        
		$this->db->where('visitor_id', $visitor_id);
		$this->db->update('visitors', $data);
		
		return;
	}


    /** Entry edits by encoder */

    //count entries for review
    public function for_review_count() {
		$this->db->where('checked = 0 and trash = 0');
        return $this->db->count_all_results('visitors_datamod');
    }

    //retrieve all entries for review
    public function get_visitors_datamod($limit = 0, $start = 0, $ob = 'ASC') {
		
		$this->db->select("*");
		$this->db->from('visitors_datamod');
		$this->db->where('checked = 0 and trash = 0');
		$this->db->order_by('lname', $ob);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }
    
    //retrieve one particular entry for review by mod_id
    public function get_visitor_datamod_by_id($id = FALSE, $include_trashed = TRUE) {
		if ($id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('visitors_datamod');
		if ($include_trashed === TRUE) {
			$this->db->where("mod_id = '$id'"); //omit trash = 0 to be able to 'undo' trash one last time
		}
		else{
			$this->db->where("mod_id = '$id' and trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}

    //include for review
    public function set_visitor_datamod($data = NULL) { //new datamod entry
    
        $this->load->helper('url');
		
		if ($data == NULL) {

            $trash = ($this->input->post('trash') == NULL) ? 0 : 1;

            $user = $this->ion_auth->user()->row();
            $username = $user->username;

			$data = array(
                    'visitor_id' => $this->input->post('visitor_id'),
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
                    'status_code' => $this->input->post('status_code'),
                    'remarks' => $this->input->post('remarks'),	
                    'trash' => $trash,
                    'mod_reason' => $this->input->post('mod_reason'), //unique to encoder forms
                    'mod_fields' => $this->input->post('mod_fields'), //unique to encoder forms; hidden
                    'mod_details' => $this->input->post('altered'), //hidden, also used for tracking
                    'checked' => 0,
                    'encoder' => $username
			);
		}
		//insert new entry
		$this->db->insert('visitors_datamod', $data);
		$visitor_id = $this->db->insert_id();
		
		return $visitor_id;
    }
    
    public function update_visitor_datamod($mod_id = NULL, $data = NULL) { //update datamod entry
    
        $this->load->helper('url');
        
        if ($mod_id == NULL) {
            $mod_id = $this->input->post('mod_id');
        }

		if ($data == NULL) {

            $trash = ($this->input->post('trash') == NULL) ? 0 : 1;

            $user = $this->ion_auth->user()->row();
            $username = $user->username;

			$data = array(
                    'visitor_id' => $this->input->post('visitor_id'),
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
                    'status_code' => $this->input->post('status_code'),
                    'remarks' => $this->input->post('remarks'),	
                    'trash' => $this->input->post('trash'),	
                    'mod_reason' => $this->input->post('mod_reason'), //unique to encoder forms
                    'mod_fields' => $this->input->post('mod_fields'), //unique to encoder forms; hidden
                    'mod_details' => $this->input->post('altered'), //hidden, also used for tracking
                    'checked' => $this->input->post('checked'),	
                    'checker' => $username
			);
        }
        
        if ($mod_id == NULL) {
            return 0;
        }
        //update entry
        $this->db->where('mod_id', $mod_id);
		$this->db->update('visitors_datamod', $data);
        
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
                    //'status_code' => $this->input->post('status_code'),
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
	public function update_p_entry($visitor_id = NULL, $data = NULL) {
        //echo '<pre>'; print_r($_POST); echo '</pre>'; die();
        //echo $visitor_id;  
        //print_r($data);
        //die();

		$this->load->helper('url');
        
        if ($visitor_id == NULL) {
            $visitor_id = $this->input->post('visitor_id');
        }
        
        if ($data == NULL) {
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
                    //'status_code' => $this->input->post('status_code'),
                    'remarks' => $this->input->post('remarks'),
                    'trash' => $this->input->post('trash')
            );
        }
		
		$this->db->where('visitor_id', $visitor_id);
		$this->db->update('visitors_viapartners', $data);
        //echo $this->db->last_query(); die();
        
		return;
    }
    

    //API-related query
    public function api_get_visitors() {
		
		$this->db->select("concat(lname, ' ', fname) as fullname, nationality, floor((DATEDIFF(CURRENT_DATE, STR_TO_DATE(bdate, '%Y-%m-%d'))/365)) as age");
		$this->db->from('visitors');
		$this->db->where('trash = 0');
		$this->db->order_by('fullname', 'asc');
		$query = $this->db->get();

		return $query->result_array();

    }


}
