<!DOCTYPE html>
<html lang="es">
  <head>
    <?php $this->load->view('overall/head') ?>
    <link rel="stylesheet" href="<?= base_url('overall/vendors/dropzone4/dist/min/dropzone.min.css')?>" media="screen" title="no title">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view('overall/menu') ?>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <form class="ui form" id="form_user">
                <div class="field">
                  <label>Titulo:</label>
                  <input name="titulo" type="text" placeholder="Titulo de la Noticia">
                </div>
                <div class="field">
                  <label>Fecha:</label>
                  <input name="fecha" type="date" placeholder="Fecha">
                </div>
                <div class="field">
                  <label>Portada:</label>
                  <input name="portada" type="file" placeholder="">
                </div>
                <div class="field">
                  <label>Contenido:</label>
                  <textarea name="name" rows="8" cols="40"></textarea>
                </div>
                <div class="field">
                  <label>Estado:</label>
                  <select class="ui dropdown" name="estado">
                    <option value="">Seleccionar...</option>
                    <option value="OK">Mostrar</option>
                    <option value="NOOK">No Mostrar</option>
                  </select>
                </div>
                <button class="ui button primary" type="submit">Guardar Noticia</button>
              </form>

              <h3>Galeria de Imagenes:</h3>
              <?= form_open('noticias/uploadimg', array("class" => 'dropzone')) ?>
              <?= form_close() ?>
              <br>
              <div id="ajax_resp">
              </div>
            </div>
          </div>
        <!--fin container-->
    <?php $this->load->view('overall/footer') ?>
    <script src="<?php echo base_url('overall/vendors/dropzone4/dist/min/dropzone.min.js') ?>" charset="utf-8"></script>
  </body>
</html>
