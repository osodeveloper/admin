function fracaso(e) {
  return '<div class="ui error message"><i class="close icon"></i><div class="header">Error: </div><p>'+ e +'</p></div>'
}
function exito(e) {
  return '<div class="ui success message"><i class="close icon"></i><div class="header">Inicio Exitoso: </div><p>'+ e +'</p></div>'
}
function advertencia(){
  return '<div class="ui warning message"><i class="close icon"></i><div class="header">Advertencia: </div><p>'+ e +'</p></div>'
}

$('select.dropdown')
  .dropdown()
;
$('input')
  .popup({
    on: 'hover'
  })
;
function nucleo (p) {
  if (p === undefined) {
    p = ''
  }
  var location = (window.location.origin + '/admin/' + p).toString();
  return location
}


$(document).on('click', "div.message i.close", function() {
  $(this).closest('.message').transition('fade');
});
