<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	protected $upload_path = 'overall/uploads/';
	//######################################################
  function __construct(){
    parent::__construct();
		$this->load->library('session');
    $this->load->model('Noticia_model');
		if ( ! $this->session->userdata('auth')){
      redirect('auth');
    }
  }
	public function index(){
		$this->load->view('noticias/home', array(
			'title' => 'Noticias',
      'news' => $this->Noticia_model->news_all()
		));
	}
	public function agregar() {
		$this->session->unset_userdata('portada');
		$this->session->unset_userdata('galeria');
		$this->load->view('noticias/agregar', array(
			'title' => 'Agregar Noticias',
			'galeria' => $this->session->userdata("galeria"),
			'portada' => $this->session->userdata("portada"),
		));
	}
	public function borrar($id = NULL) {
		if ($id != NULL) {
			$res = $this->Usuario_model->user_del($id);
			redirect('noticias');
		}else {
			redirect('noticias');
		}
	}

	public function news_add(){
		$data = $this->input->post();
		$data['portada'] = (string) $this->session->userdata("portada");
		$data['user'] = (string)  $this->session->userdata("username");
		$res = $this->Noticia_model->news_add($data);
		echo json_encode($res);
	}


	public function upload_port() {
		if (!empty($_FILES['port']['name'])) {

			$config['upload_path'] = $this->upload_path;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload("port")) {
				$data = array("upload_data" => $this->upload->data());
				$imagenes = array(
					'portada' => $data["upload_data"]["file_name"]
				);
				$this->session->set_userdata($imagenes);
			}else {
				echo $this->upload->display_errors();
			}
		}
	}
	public function upload_gall(){

		if (!empty($_FILES)) {

			$config['upload_path'] = $this->upload_path;
			$config['file_name'] = $_FILES['gall']['name'];
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("gall")) {

				echo $this->upload->display_errors();
			}else {
				$imagenes = $this->session->userdata("galeria");

				$actual = array("upload_data" => $this->upload->data());
				$imagenes[] = $actual["upload_data"]["file_name"];

				$array = array(
					'galeria' => $imagenes
				);
				$this->session->set_userdata($array);
			}
		}
	}
	public function remove_port() {
		$file = $this->input->post("port");
		if ($file && file_exists($this->upload_path . "/" . $file)) {
			unlink($this->upload_path . "/" . $file);
			$this->session->unset_userdata('portada');
		}
	}
	public function remove_gall(){
		$file = $this->input->post("gall");
		$data = $this->session->userdata("galeria");

		if ($file && file_exists($this->upload_path . "/" . $file)) {

			if (($key = array_search($file, $data)) !== false) {
			  unset($data[$key]);
			}
			unlink($this->upload_path . "/" . $file);
			$array = array(
				'galeria' => $data
			);
			$this->session->unset_userdata("galeria");
			$this->session->set_userdata($array);
		}
	}


}
