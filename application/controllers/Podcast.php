<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Podcast extends CI_Controller {

	public function index($id='') {
		// $data['title'] = 'Judul Podcast | KinderPod';	
		// $data['content'] = "client/podcast";		
		// $this->load->view('client/template', $data);	
	}

	public function detail($id='') {
		$this->db->where('podcast_id', $id);
		$data['podcast'] = $this->db->get('podcasts')->result()[0];

		$data['title'] = 'Judul Podcast | KinderPod';	
		$data['content'] = "client/podcast";		
		
		$this->load->view('client/template', $data);
	}

	public function review($podcast_id) {
		echo $podcast_id;
	}
}
