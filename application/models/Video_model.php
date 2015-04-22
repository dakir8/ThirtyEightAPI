<?php
class Video_model extends CI_Model {

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

        public function get_entries($page_size)
        {
                $query = $this->db->get('video', $page_size);
                return $query->result();
        }

        public function insert_entry()
        {
                $this->title    = $_POST['video_name']; // please read the below note
                $this->content  = $_POST['video_url'];

                $this->db->insert('video', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['video_name'];
                $this->content  = $_POST['video_url'];

                $this->db->update('video', $this, array('video_id' => $_POST['video_id']));
        }

}
?>