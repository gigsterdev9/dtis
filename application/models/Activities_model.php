<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class activities_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
    
    public function get_all_butanding($limit = 0, $start = 0){
        $this->db->select("*");
        $this->db->from('butanding_interaction a');
        $this->db->join('visits b', 'b.visit_id = a.visit_id');
        $this->db->join('visitors c', 'c.visitor_id = b.visitor_id');
        $this->db->where('a.trash = 0 and b.trash = 0 and c.trash = 0');
		$this->db->order_by('interaction_id', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();
    }

    public function get_all_girawan($limit = 0, $start = 0){
        $this->db->select("*");
        $this->db->from('girawan_tour a');
        $this->db->join('visits b', 'b.visit_id = a.visit_id');
        $this->db->join('visitors c', 'c.visitor_id = b.visitor_id');
        $this->db->where('a.trash = 0 and b.trash = 0 and c.trash = 0');
		$this->db->order_by('trip_id', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();
    }

    public function get_all_firefly($limit = 0, $start = 0){
        $this->db->select("*");
        $this->db->from('firefly_watching a');
        $this->db->join('visits b', 'b.visit_id = a.visit_id');
        $this->db->join('visitors c', 'c.visitor_id = b.visitor_id');
        $this->db->where('a.trash = 0 and b.trash = 0 and c.trash = 0');
		$this->db->order_by('cruise_id', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();
    }

    public function get_all_islandhop($limit = 0, $start = 0){
        $this->db->select("*");
        $this->db->from('island_hopping a');
        $this->db->join('visits b', 'b.visit_id = a.visit_id');
        $this->db->join('visitors c', 'c.visitor_id = b.visitor_id');
        $this->db->where('a.trash = 0 and b.trash = 0 and c.trash = 0');
		$this->db->order_by('trip_id', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();
    }

}