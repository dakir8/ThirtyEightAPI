<?php
class Partner_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                
                $this->load->database();
        }

        public function get_partners()
        {
                $query = $this->db->get('partner');
                return $query->result();
        }

}
?>