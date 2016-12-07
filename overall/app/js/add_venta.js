var cuerpo = $("#tbody")
var formulario = $("#form_venta")
var ant = 0

var datos = {
  fecha : '',
  nombre : '',
  direccion : '',
  boleta : {
    1 : {
      cod : '',
      cant : 0,
      desc :'',
      puni : 0,
      imp : 0
    }
  }
}
refrescar()

function refrescar () {
  cuerpo.html("");
  $.map(datos['boleta'], function(value, index) {
    cuerpo.append(`<tr>
      <td width="25" onclick="remover($(this).attr('data-id'))" data-id="${index}"><i class="fa fa-remove red" ></i></td>
      <td width="25"><i class="fa fa-barcode" data-id="${index}"></i></td>
      <td contenteditable="true" class="entradas" id="${index}cod" onkeyup="editar($(this).attr('data-id'))" data-id="${index}" style="text-align:center;">${value.cod}</td>
      <td contenteditable="true" class="entradas" id="${index}cant" onkeyup="editar($(this).attr('data-id'))"  data-id="${index}" style="text-align:center;">${value.cant}</td>
      <td contenteditable="true" class="entradas" id="${index}desc" onkeyup="editar($(this).attr('data-id'))"  data-id="${index}">${value.desc}</td>
      <td contenteditable="true" class="entradas" id="${index}puni" onkeyup="editar($(this).attr('data-id'))"  data-id="${index}" style="text-align:center;">${value.puni}</td>
      <td contenteditable="true" class="entradas" id="${index}imp" onkeyup="editar($(this).attr('data-id'))"  data-id="${index}" style="text-align:center;">${value.imp}</td>
    </tr>`)
  })
}
function editar(p) {
  var id = parseInt(p)
  datos['boleta'][id] = {
    cod : $("#" + id + "cod").html(),
    cant : $("#" + id + "cant").html(),
    desc : $("#" + id + "desc").html(),
    puni : parseInt($("#" + id + "puni").html()),
    imp : parseInt($("#" + id + "cant").html()) * parseInt($("#" + id + "puni").html())
  }
}

function remover(p) {
  delete datos['boleta'][p]
  refrescar()
}

function agregar() {
  var campos = Object.keys(datos['boleta'])
  var cant = parseInt(Object.keys(datos['boleta']).length);

  datos['boleta'][ant + 1] = {
    cod : "",
    cant : 0,
    desc : '',
    puni : 0,
    imp : 0
  }
  ant = parseInt(campos[cant - 1])
  refrescar();
}

$(document).on('keypress', "td.entradas", function(e) {
  var tecla = parseInt(e.keyCode)
  if (tecla == 13) {
    refrescar()
  }
});


$(document).on('ready', function(){
  formulario.submit(function(e) {
    e.preventDefault()
  }).form({
    fields: {
        fecha: {
            identifier : "fecha",
            rules: [{
                type : "empty"
            }]
        },
        nombre : {
          identifier : 'nombre',
          rules : [
            {
            type: 'empty'
            }
          ]
        },
        direccion : {
          identifier : 'direccion',
          rules : [
            {
            type: 'empty'
            }
          ]
        }
    },
    onSuccess: function() {
      formulario.addClass('loading')
      datos['fecha'] = $("input[name=fecha]").val()
      datos['nombre'] = $("input[name=nombre]").val()
      datos['direccion'] = $("input[name=direccion]").val()
      $.ajax({
        contentType: "application/json",
        type : "POST",
        url : nucleo('ventas/add_venta'),
        data: { info : JSON.stringify(datos)},
        success : function(json) {
          console.log(json);
          var obj = jQuery.parseJSON(json);
          console.log(obj);
          if (obj) {
            formulario.removeClass('loading')
            $('#ajax_resp').html(exito('Datos Ingresados Correctamente.'))
          }else {
            formulario.removeClass('loading')
            $("#ajax_resp").html(fracaso('Error al ingresar los datos.'))
          }
        },
        error : function() {
          formulario.removeClass('loading')
          $("#ajax_resp").html(fracaso('#ERROR 500 SERVIDOR'))
        }
      });
    }
  })
})
