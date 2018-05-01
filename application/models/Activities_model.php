<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class activities_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
    
    
    public function record_count() {
        return $this->db->count_all('activities');
    }

}