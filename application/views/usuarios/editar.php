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
            <div class="col-md-5">
              <form class="ui form" id="form_user">
                <?php foreach ($us as $val): ?>
                  <div class="field" id="user" data-id="<?= $val->id ?>">
                    <label>Nombre de Usuario:</label>
                    <input name="username" value="<?= $val->username ?>" type="text" placeholder="Nombre de Usuario">
                  </div>
                  <div class="field">
                    <label>Contraseña:</label>
                    <input name="pass" data-content="La Contraseña esta encriptada." value="<?= $val->pass ?>" type="password" placeholder="Contraseña">
                  </div>
                  <div class="field">
                    <label>Permisos:</label>
                    <select class="ui dropdown" name="permisos" value="<?= $val->permisos ?>">
                      <option value="">Seleccionar...</option>
                      <?php if ($val->permisos == 0): ?>
                        <option value="0" selected="selected">Administrador</option>
                        <?php else: ?>
                          <option value="0">Administrador</option>
                      <?php endif; ?>
                      <?php if ($val->permisos == 1): ?>
                        <option value="1" selected="selected">Noticias</option>
                        <?php else: ?>
                          <option value="1">Noticias</option>
                      <?php endif; ?>
                      <?php if ($val->permisos == 2): ?>
                        <option value="2" selected="selected">Obras</option>
                        <?php else: ?>
                          <option value="2">Obras</option>
                      <?php endif; ?>
                    </select>
                  </div>
                  <div class="field">
                    <label>Estado:</label>
                    <select class="ui dropdown" name="estado" value="<?= $val->estado ?>">
                      <option value="">Seleccionar...</option>
                      <?php if ($val->estado == 'aprobado'): ?>
                        <option value="aprobado" selected="selected">Aprobado</option>
                        <?php else: ?>
                          <option value="aprobado">Aprobado</option>
                      <?php endif; ?>
                      <?php if ($val->estado == 'denegado'): ?>
                        <option value="denegado" selected="selected">Denegado</option>
                        <?php else: ?>
                          <option value="denegado">Denegado</option>
                      <?php endif; ?>
                      <?php if ($val->estado == 'pendiente'): ?>
                        <option value="pendiente" selected="selected">Pendiente</option>
                        <?php else: ?>
                          <option value="pendiente">Pendiente</option>
                      <?php endif; ?>
                    </select>
                  </div>
                <?php endforeach; ?>
                <button class="ui button primary" type="submit">Guardar</button>
              </form>
              <br>
              <div id="ajax_resp">
              </div>
            </div>
          </div>
        <!--fin container-->
    <?php $this->load->view('overall/footer') ?>

    <script src="<?php echo base_url('overall/app/js/edit_user.js') ?>" charset="utf-8"></script>
  </body>
</html>
