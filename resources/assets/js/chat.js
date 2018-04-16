function mostrarUser(id){
$.ajax({
  url: 'chats.show',
  type: 'POST',
  dataType: 'json',
  data: {param1: 'value1'}
})
.done(function() {
  console.log("success");
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});

}
