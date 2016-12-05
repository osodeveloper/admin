<!DOCTYPE html>
<html lang="es">
  <head>
    <?php $this->load->view('overall/head') ?>
    <link rel="stylesheet" href="<?= base_url('overall/vendors/dropzone4/dist/min/dropzone.min.css')?>" media="screen" title="no title">
    <style media="screen">
      .dropzone {
        background: #fff;
        border: 4px dashed rgb(32, 141, 187);
      }
      .dropzone:hover {
        background: #fff;
        border: 4px dashed rgb(50, 111, 136);
      }
    </style>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container" style="background: #2a3f54;">
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
                  <input type="file" name="portada" value="">
                </div>
                <div class="field">
                  <label>Contenido:</label>
                  <textarea id="contenido" name="name" rows="20"></textarea>
                </div>
                <div class="field">
                  <label>Estado:</label>
                  <select class="ui dropdown" name="estado">
                    <option value="">Seleccionar...</option>
                    <option value="OK">Mostrar</option>
                    <option value="NOOK">No Mostrar</option>
                  </select>
                </div>
                <label>Galeria de Imagenes:</label>
                <div id="my-dropzone" class="dropzone">
                  <div class="dz-message">
                    <h4>Suelta los archivos aquí o <strong> pulsa aquí para subir.</strong></h4>
                  </div>
                </div>
                <br>
                <button class="ui button primary" type="submit">Guardar Noticia</button>
              </form>

              <br>
              <div id="ajax_resp">
              </div>
            </div>
          </div>
        <!--fin container-->
    <?php $this->load->view('overall/footer') ?>
    <script src="<?php echo base_url('overall/vendors/tinymce/tinymce.min.js') ?>" charset="utf-8"></script>
    <script src="<?php echo base_url('overall/vendors/dropzone4/dist/min/dropzone.min.js') ?>" charset="utf-8"></script>

    <script type="text/javascript">
    tinymce.init({
      selector: '#contenido',
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
      ]
    });

    Dropzone.autoDiscover = false;
      var myDropzone = new Dropzone("#my-dropzone", {
        paramName : 'file',
        url : "<?= base_url('noticias/uploadimg') ?>",
        acceptedFiles : 'image/*',
        addRemoveLinks : true,
        removedfile : function(file) {
          var name = file.name
          $.ajax({
            type : "post",
            url : "<?= base_url('noticias/remove') ?>",
            data : {file : name},
            dataType: 'html'
          })
          var _ref;
          return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        maxFilesize : 2,
        maxFiles : 2,
        dictRemoveFile : 'Eliminar Archivo',
        dictMaxFilesExceeded : 'No puedes subir más archivos.',
        dictInvalidFileType : 'No puedes subir este tipo de archivo.'
      })
    </script>
  </body>
</html>
