<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$data['title'] = 'Home | KinderPod';	
		$data['content'] = "client/home";		
		$this->db->order_by('podcast_id', 'desc');
		$data['podcasts'] = $this->db->get('podcasts')->result();
		$this->load->view('client/template', $data);	
	}
}
