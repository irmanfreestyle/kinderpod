<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('UploadfileModel');
	}

	public function index() {

		if(!$this->session->has_userdata('loged_in')) {
            redirect(base_url().'admin/loginPage');
		}
		
		$data['title'] = 'List Podcast';	
		$data['content'] = "admin/dashboard";		

		$this->db->order_by('podcast_id', 'DESC');
		$data['podcasts'] = $this->db->get('podcasts')->result();
		$this->load->view('admin/template', $data);	
	}

	public function pageUpload() {
        $data['title'] = 'Upload Podcast';	
		$data['content'] = "admin/pageUpload";		

		$this->db->order_by('album_id', 'desc');
		$data['albums'] = $this->db->get('albums')->result();
		$this->load->view('admin/template', $data);	
	}

	public function pageAlbum() {
		$data['title'] = 'Album';	
		$data['content'] = "admin/pageAlbum";	

		$this->db->order_by('album_id', 'desc');
		$data['albums'] = $this->db->get('albums')->result();
		$this->load->view('admin/template', $data);	
	}
	
	public function loginPage() {
		$data['title'] = 'Upload Podcast';	
		$data['content'] = "admin/login";		
		$this->load->view("admin/login", $data);	
	}
	public function login() {
		$password = $this->input->post('password');						
        $this->db->where('password', $password);		
		$check = $this->db->get('admin');		

        if($check->num_rows() > 0) {
            $this->session->set_userdata('loged_in', true);
            redirect(base_url().'admin/');
        } else {            
            redirect(base_url().'admin/loginPage?password=wrong');
        }
	}
	function logout() {
        unset($_SESSION['loged_in']);
        redirect(base_url().'admin/loginPage');
    }    
	
	public function uploadPodcast() {		
		
		$podcast_title = $this->input->post('podcast_title');		
		$podcast_info = $this->input->post('podcast_info');		
		$podcast_announcer = $this->input->post('podcast_announcer');
		$album_id = explode(",", $this->input->post('podcast_album'))[0];
		$album_title = explode(",", $this->input->post('podcast_album'))[1];
		
		$podcast_file = "";						

		$config['upload_path'] = './upload/';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = true;                                    
		$this->load->library('upload', $config);		

		if ($this->upload->do_upload('podcast_file')) {
			$podcast_file = $this->upload->data("file_name");
		} else {
			die();
		}

		$insert = $this->db->insert('podcasts', [
			'podcast_id' => '',
			'podcast_title' => $podcast_title,
			'podcast_info' => $podcast_info,		
			'album_id_fk' => $album_id,
			'file' => $podcast_file,
			'album_title' => $album_title,
			'podcast_announcer' => $podcast_announcer
		]);	

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success_upload', "Berhasil upload Podcast"); 
			redirect(base_url().'admin/pageUpload');
		} else {
			$this->session->set_flashdata('error_upload', "Gagal upload Podcast"); 
			redirect(base_url().'admin/pageUpload');
		}
	}


	public function deletePodcast() {
		$podcast_id = $this->input->get('id');
		$file = $this->input->get('file');		

		$this->db->delete('podcasts', ['podcast_id' => $podcast_id]);
		
		unlink("./upload/".$file);				

		redirect(base_url().'admin/');
	}

}
