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
