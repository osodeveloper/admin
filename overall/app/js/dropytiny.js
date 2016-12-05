tinymce.init({
  selector: '#contenido',
  menubar: false,
  encoding: 'xml',
  mode : "specific_textareas",
  plugins: 'advlist autolink link image lists charmap print preview'
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
