<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picture extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('picture_model');
	}
	
	public function getPictureCollections() {
		
		$data['picture_collections'] = $this->picture_model->get_collections();
		echo json_encode($data);
	}
	
	public function getPicturesByCollectionId() 
	{
		$data['pictures'] = $this->picture_model->get_pictures_by_collection_id($_GET['collection_id']);
		echo json_encode($data);	
	}
	
	public function getAllPictures() 
	{
		$data['picture_collections'] = $this->picture_model->get_collections();
		foreach($data['picture_collections'] as $collection)
		{
			$collection->pictures = $this->picture_model->get_pictures_by_collection_id($collection->collection_id);
		}
		echo json_encode($data);
	}
}
