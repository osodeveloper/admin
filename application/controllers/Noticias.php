<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	protected $upload_path = 'overall/uploads/';
	protected $archivos = array();
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
			redirect('usuarios');
		}else {
			redirect('usuarios');
		}
	}

	public function uploadimg(){

		if (!empty($_FILES)) {

				$config['upload_path'] = $this->upload_path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload("file")) {
					echo $this->upload->display_errors();
				}else {
					$data = $this->upload->data();
					array_push($this->archivos, $this->upload->data());
				}
			}
	}
	public function remove(){
		$file = $this->input->post("file");
		if ($file && file_exists($this->upload_path . "/" . $file)) {
			unlink($this->upload_path . "/" . $file);
		}
	}
	public function news_add(){
		$data = $this->input->post();
		$res = $this->Noticia_model->news_add($data);
		echo json_encode($res);
	}

}
