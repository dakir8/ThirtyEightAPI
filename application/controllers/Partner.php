<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('partner_model');
	}
	
	public function getPartners() {
		
		$data['partners'] = $this->partner_model->get_partners();
		echo json_encode($data);
	}
}
