<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('video_model');
	}
        
	public function index()
	{
		$data['query'] = $this->video_model->get_entries(10);
		echo json_encode($data);
	}
	
	public function getVideos() {
		
		$data['videos'] = $this->video_model->get_entries(10);
		echo json_encode($data);
	}
}
