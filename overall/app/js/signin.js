
$(document).on('ready', function(){
  $("#form_user").submit(function(e) {
    e.preventDefault()
  }).form({
    fields: {
        user: {
            identifier : "user",
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
        }
    },
    onSuccess: function() {
      $("#form_user").addClass('loading')
      $.ajax({
        type : "POST",
        url : nucleo('auth/login'),
        data : $('#form_user').serialize(),
        success : function(json) {
          console.log(json);
          var obj = jQuery.parseJSON(json);
          if (!obj) {
            $("#form_user").removeClass('loading')
            $('#ajax_resp').html(fracaso('Datos Incorrectos.'))
          }else {
            window.location.href = (nucleo('home'));
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
