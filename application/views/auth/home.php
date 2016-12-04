<!DOCTYPE html>
<html lang="es">
  <head>
    <?php $this->load->view('overall/head') ?>
    <link rel="stylesheet" href="<?php echo base_url('overall/build/semantic.min.css') ?>" media="screen" title="no title">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <div class="x_content">
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
              <div class="row">
                <div class="col-md-7 col-md-offset-2 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">
                  <img class="ui fluid image" src="<?= base_url('overall/app/images/logo.png') ?>" alt="" />
                </div>
              </div>
              <h2 class="text-center">Iniciar Sesión</h2>
              <form class="ui form" id="form_user">
                <div class="field">
                  <label>Usuario:</label>
                  <input name="user" type="text" placeholder="Nombre de Usuario">
                </div>
                <div class="field">
                  <label>Contraseña:</label>
                  <input name="pass" type="password" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
              </form>
              <br>
              <div id="ajax_resp">
              </div>
              <noscript>
                <h2>Por favor, esta pagina necesita de javascript para funcionar, activalo.</h2>
              </noscript>
            </div>
          </div>

    <?php $this->load->view('overall/footer') ?>
    <script src="<?php echo base_url('overall/app/js/signin.js') ?>" charset="utf-8"></script>
  </body>
</html>
