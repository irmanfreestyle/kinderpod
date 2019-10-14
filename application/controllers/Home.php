<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$data['title'] = 'Home | KinderPod';	
		$data['content'] = "client/home";		
		
		$this->db->order_by('podcast_id', 'desc');
		$data['podcasts'] = $this->db->get('podcasts')->result();

		$this->db->order_by('album_id');
		$data['albums'] = $this->db->get('albums')->result();

		foreach($data['albums'] as $index=>$album) {
			$data['albums'][$index]->podcasts = [$index];
			foreach($data['podcasts'] as $idx=>$podcast) {
				if($album->album_id == $podcast->album_id_fk) {
					array_push($data['albums'][$index]->podcasts, $podcast);
				}
			}
		}

		// echo json_encode($data['albums']); die();
		$this->load->view('client/template', $data);	
	}
}
