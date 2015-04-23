<?php
class Picture_model extends CI_Model {

        public $video_id;
        public $video_name;
        public $video_url;
        public $collection_id;
        public $thumbnail_url;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                
                $this->load->database();
        }

        public function get_collections()
        {
                $query = $this->db->get('picture_collection');
                return $query->result();
        }
        
        public function get_pictures_by_collection_id($collection_id) 
        {
        		$query = $this->db->get_where('picture', array('collection_id' => $collection_id));
        		return $query->result();
        }

}
?>