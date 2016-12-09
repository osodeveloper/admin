<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
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
    $this->load->model('Auth_model');
    $this->load->library('session');

  }
	public function index(){
    if ($this->session->userdata('auth') == true or $this->session->userdata('auth') == 1) {
        redirect('home');
    }
		$this->load->view('auth/home', array(
      'title' => 'Iniciar Sesión'
    ));
	}
	public function login() {

    $datos = $this->input->post();
    $res = $this->Auth_model->login($datos);
    if (!$res) {
      echo json_encode(false);
    }else {
      $data = array(
        'auth' => true,
        'num' => $res[0]->id,
        'username'  => $res[0]->username,
				'galeria' => array()
      );
      $this->session->set_userdata($data);
      echo json_encode(true);
    }
	}
	public function logout () {
    $this->session->unset_userdata('auth');
    $this->session->unset_userdata('num');
    $this->session->unset_userdata('username');
    redirect('auth');
	}
}
