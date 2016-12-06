<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	protected $upload_path = 'overall/uploads/';
	protected $archivos = array();
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
		$this->load->view('noticias/agregar', array(
			'title' => 'Agregar Noticias'
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
	public function upload_port() {
		if (!empty($_FILES['port']['name'])) {

			/*
			$fichero_subido = $this->upload_path . basename($_FILES['port']['name']);

			if (move_uploaded_file($_FILES['port']['tmp_name'], $fichero_subido)) {

				$this->archivos[] = $_FILES['port']['tmp_name'];
			}
			*/

			$config['upload_path'] = $this->upload_path;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload("port")) {
				$data = array("upload_data" => $this->upload->data());
				$datos = array(
					'titulo' => 'Noticia de Prueba',
					'portada' => $data["upload_data"]["file_name"],
					'contenido' => 'Hola como estas',
					'fecha' => '2016-12-05',
					'estado' => 'OK',
				);
				$this->Noticia_model->add_test($datos);
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
				$data = $this->upload->data();
				$this->archivos = array('name ' => $data["raw_name"]);
			}
		}
	}
	public function remove_port() {
		$file = $this->input->post("port");
		if ($file && file_exists($this->upload_path . "/" . $file)) {
			unlink($this->upload_path . "/" . $file);
		}
	}
	public function remove_gall(){
		$file = $this->input->post("gall");
		if ($file && file_exists($this->upload_path . "/" . $file)) {
			unlink($this->upload_path . "/" . $file);
		}
	}
	public function add_nombres($data) {

	}
	public function news_add(){
		$data = $this->input->post();
		//$data['archivos'] = $this->archivos;
		//$res = $this->Noticia_model->news_add($data);
		echo json_encode($this->archivos);
	}

}
