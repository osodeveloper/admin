<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
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
    $this->load->model('Usuario_model');
		if ( ! $this->session->userdata('auth')){
      redirect('auth');
    }
  }
	public function index(){

		$this->load->view('usuarios/home', array(
			'title' => 'Usuarios',
			'us' => $this->Usuario_model->user_all()
		));
	}
	public function agregar() {
		$this->load->view('usuarios/agregar', array(
			'title' => 'Agregar Usuarios'
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
	public function editar($id = NULL) {
		if ($id != NULL) {
			$this->load->view('usuarios/editar', array(
				'title' => 'Editar Usuarios',
				'us' => $this->Usuario_model->user_edit($id)
			));

		}else {
			redirect('usuarios');
		}
	}
	public function user_save(){
		$datos = $this->input->post();
		$res = $this->Usuario_model->user_save($datos);
		echo json_encode($res);
	}

	public function user_add () {
		$datos = $this->input->post();
		$res = $this->Usuario_model->user_add($datos);
		echo json_encode($res);
	}
}
