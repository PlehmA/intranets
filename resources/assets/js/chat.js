$(document).ready(function() {

  function showUser(id){
    document.location.href = 'chats.show?id=' + id;
  }
  function newMessage() {
  	message = $(".message-input input").val();
  	if($.trim(message) == '') {
  		return false;
  	}

  $.ajax({
    url: 'chats.store',
    type: 'POST',
    dataType: 'json',
    data: {param1: 'value1'}
  });
  .done(function() {
    console.log("success");
  });
  $('.submit').click(function() {
    newMessage();
  });
});
