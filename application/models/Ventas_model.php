<?php
class Ventas_model extends CI_Model {

  function __construct() {
    // Call the CI_Model constructor
    parent::__construct();
    $this->load->database();
  }
  public function news_all() {
    $query = $this->db->query('select id, titulo, fecha, estado from Ventass');
    return $query->result();
  }
  public function user_del($id) {
    $this->db->where('id', $id);
    $this->db->delete('usuarios');
  }
  public function user_edit($id) {
    $query = $this->db->query("select * from usuarios where id = '$id'");
    if ($query->num_rows() > 0) {
      return $query->result();
    }else {
      redirect('usuarios');
    }
  }
  public function user_save($datos) {
    $array = array(
      'username' => $datos['username'],
      'pass' => md5($datos['pass']),
      'permisos' => $datos['permisos'],
      'estado' => $datos['estado']
    );
    $this->db->set($array);
    $this->db->where('id', $datos['id']);
    $this->db->update('usuarios');

    if ($this->db->affected_rows() == true OR $this->db->affected_rows() == 0) {
      return true;
    }else {
      return false;
    }
  }
  public function add_venta($datos) {
    $array = array(
      'user' => $datos['user'],
      'fecha' => $datos['fecha'],
      'nombre' => $datos['nombre'],
      'direccion' => $datos['direccion']
    );
    $this->db->insert('ventas', $array);
    if ($this->db->affected_rows()) {
      return true;
    }else {
      return false;
    }
  }
  public function news_add($datos) {

    $array = array(
      'titulo' => $datos['titulo'],
      'contenido' => $datos['Ventas'],
      'fecha' => $datos['fecha'],
      'estado' => $datos['estado']
    );
    $this->db->insert('Ventass', $array);
    if ($this->db->affected_rows()) {
      return true;
    }else {
      return false;
    }
  }
  public function add_test($datos) {
    $this->db->insert('Ventass', $datos);
    if ($this->db->affected_rows()) {
      return true;
    }else {
      return false;
    }
  }


}
 ?>
