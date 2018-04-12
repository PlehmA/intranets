$(document).ready(function() {
function enviarMensaje(){
  var mensaje =
  $.ajax({
    url: '{{ route('chats.create') }}',
    type: 'POST',
    dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {param1: 'value1'}
  })
  .done(function() {
    alert('Resulto!');
  })
  .fail(function() {
    alert('No resulto!');
  })

}
});
