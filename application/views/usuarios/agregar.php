<!DOCTYPE html>
<html lang="es">
  <head>
    <?php $this->load->view('overall/head') ?>

  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view('overall/menu') ?>
          <div class="x_content">
            <div class="col-md-5 col-sm-12 col-xs-12">
              <form class="ui form" id="form_user">
                <div class="field">
                  <label>Nombre de Usuario:</label>
                  <input name="username" type="text" placeholder="Nombre de Usuario">
                </div>
                <div class="field">
                  <label>Contraseña:</label>
                  <input name="pass" type="text" placeholder="Contraseña">
                </div>
                <div class="field">
                  <label>Permisos:</label>
                  <select class="ui dropdown" name="permisos">
                    <option value="">Seleccionar...</option>
                    <option value="0">Administrador</option>
                    <option value="1">Noticias</option>
                    <option value="2">Obras</option>
                  </select>
                </div>
                <button class="ui button primary" type="submit">Enviar</button>
              </form>
              <br>
              <div id="ajax_resp">
              </div>
            </div>
          </div>
        <!--fin container-->
    <?php $this->load->view('overall/footer') ?>

    <script src="<?php echo base_url('overall/app/js/add_user.js') ?>" charset="utf-8"></script>
  </body>
</html>
