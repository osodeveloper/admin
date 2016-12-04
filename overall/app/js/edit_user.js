
$(document).on('ready', function(){
  $("#form_user").submit(function(e) {
    e.preventDefault()
  }).form({
    fields: {
        username: {
            identifier : "username",
            rules: [{
                type : "empty"
            }]
        },
        pass : {
          identifier : 'pass',
          rules : [
            {
            type: 'empty'
            }
          ]
        },
        permisos : {
          identifier : 'permisos',
          rules : [
            {
            type: 'empty'
            }
          ]
        },
        estado : {
          identifier : 'estado',
          rules : [
            {
            type: 'empty'
            }
          ]
        }
    },
    onSuccess: function() {
      $("#form_user").addClass('loading')
      $.ajax({
        type : "POST",
        url : nucleo('usuarios/user_save'),
        data : $('#form_user').serialize() + '&id=' + $("#user").attr('data-id'),
        success : function(json) {
          var obj = jQuery.parseJSON(json);
          if (obj) {
            $("#form_user").removeClass('loading')
            $('#ajax_resp').html(exito('Datos editados correctamente.'))
          }else {
            $("#form_user").removeClass('loading')
            $("#ajax_resp").html(fracaso('Error al editar los datos.'))
          }
        },
        error : function() {
          $("#form_user").removeClass('loading')
          $("#ajax_resp").html(fracaso('#ERROR 500 SERVIDOR'))
        }
      });
    }
  })
})
