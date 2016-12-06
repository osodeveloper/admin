tinymce.init({
  selector: '#contenido',
  menubar: false,
  encoding: 'xml',
  mode : "specific_textareas",
  plugins: 'advlist autolink link image lists charmap print preview'
});

Dropzone.autoDiscover = false;
  var dropzone_port = new Dropzone("#port-dropzone", {
    paramName : 'port',
    url : nucleo('noticias/upload_port'),
    acceptedFiles : 'image/*',
    addRemoveLinks : true,
    removedfile : function(file) {
      var name = file.name
      $.ajax({
        type : "post",
        url : nucleo('noticias/remove_port'),
        data : {port : name},
        dataType: 'html'
      })
      var _ref;
      return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    maxFilesize : 2,
    maxFiles : 1,
    dictRemoveFile : 'Eliminar Archivo',
    dictMaxFilesExceeded : 'No puedes subir más archivos.',
    dictInvalidFileType : 'No puedes subir este tipo de archivo.'
  })

Dropzone.autoDiscover = false;
  var dropzone_gall = new Dropzone("#gall-dropzone", {
    paramName : 'gall',
    url : nucleo('noticias/upload_gall'),
    acceptedFiles : 'image/*',
    addRemoveLinks : true,
    removedfile : function(file) {
      var name = file.name
      $.ajax({
        type : "post",
        url : nucleo('noticias/remove_gall'),
        data : {gall : name},
        dataType: 'html'
      })
      var _ref;
      return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    maxFilesize : 2,
    dictRemoveFile : 'Eliminar Archivo',
    dictMaxFilesExceeded : 'No puedes subir más archivos.',
    dictInvalidFileType : 'No puedes subir este tipo de archivo.'
  })
