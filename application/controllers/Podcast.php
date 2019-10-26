<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Podcast extends CI_Controller {

	public function index($id='') {
		// $data['title'] = 'Judul Podcast | KinderPod';	
		// $data['content'] = "client/podcast";		
		// $this->load->view('client/template', $data);	
	}

	public function album($album_id, $podcast_id) {		

		// GET REVIEWS
		$this->db->where('podcast_id', $podcast_id);
		$this->db->order_by('id', 'desc');
		$data['reviews'] = $this->db->get('rating')->result();
		

		// GET ALBUM
		$this->db->where('album_id', $album_id);
		$data['album'] = $this->db->get('albums')->result()[0];

		// GET PODCASTS 
		$this->db->where('album_id_fk', $album_id);
		$this->db->order_by('podcast_id', 'desc');
		$data['podcasts'] = $this->db->get('podcasts')->result();
		$data['podcast_id'] = $podcast_id;		

		// GET CURRENT PODCAST
		$this->db->where('podcast_id', $podcast_id);
		$data['current_podcast'] = $this->db->get('podcasts')->result()[0];

		$data['title'] = $data['current_podcast']->podcast_title.' | KinderPod';	
		$data['content'] = "client/podcast";		
		
		$this->load->view('client/template', $data);
	}

	public function review($album_id, $podcast_id) {
		$this->db->insert('rating', [
			'id' => '',
			'podcast_id' => $podcast_id,
			'reviewer' => htmlspecialchars($this->input->post('reviewer_name')),
			'rate' => $this->input->post('rating'),
			'message' => htmlspecialchars($this->input->post('message'))
		]);

		redirect(base_url().'podcast/album/'.$album_id.'/'.$podcast_id);
	}

	public function addAlbum() {
		$album_title = $this->input->post('album_title');
		$album_image = "";								

		$config['upload_path'] = './upload/';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = true;                                    
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('album_image')) {
			$album_image = $this->upload->data("file_name");
		} else {
			die();
		}

		$this->db->insert('albums', [
			'album_id' => '',
			'title' => $album_title,
			'image' => $album_image
		]);

		redirect(base_url().'admin/pageAlbum');
	}
	public function deleteAlbum() {
		$album_id = $this->input->get('album_id');
		$image = $this->input->get('image');
		
		$this->db->delete('albums', array('album_id' => $album_id));
		unlink("./upload/".$image);
		redirect(base_url().'admin/pageAlbum');
	}
}
