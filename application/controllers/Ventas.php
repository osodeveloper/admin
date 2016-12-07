<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
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
  public function __construct(){
    parent::__construct();
		$this->load->library('session');
		if ( ! $this->session->userdata('auth')){
      redirect('auth');
    }
		$this->load->model('Ventas_model');
  }
	public function index(){
		$this->load->view('ventas/home', array(
			'title' => 'Ventas'
		));
	}
  public function agregar(){
    $this->load->view('ventas/agregar', array(
			'title' => 'Agregar Venta'
		));
  }
	public function add_venta(){
		$data =  json_decode($this->input->post("info"), true);
		//$data['user'] = $this->session->userdata('username');
		//$res = $this->Ventas_model->add_venta($data);
		echo '{' . $data . '}';
		//json_encode(true);
	}

}
