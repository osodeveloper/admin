<?php
class Auth_model extends CI_Model {

  function __construct() {
    // Call the CI_Model constructor
    parent::__construct();
    $this->load->database();
  }
  public function login($datos) {
    $datos['pass'] = md5($datos['pass']);
    $user = $datos['user'];
    $pass = $datos['pass'];
    $query = $this->db->query("select * from usuarios where username = '".$this->db->escape_str($user)."' and pass = '".$this->db->escape_str($pass)."' LIMIT 1");
    if ($query->num_rows() > 0) {
      return $query->result();
    }else {
      return false;
    }
  }
}
 ?>
