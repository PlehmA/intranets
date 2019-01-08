@extends('layouts.app')
@section('css')
<style>
.content{
  margin-top: 8vh;
}
textarea{
  width: 100%;
    height: 10rem;
    background-color: whitesmoke;
}
::placeholder {
    color: gray;
    opacity: 1; /* Firefox */
}
.alert{
  background-color: #bdbdbd;
  opacity: 0.5;
  display: none;
  color: black;
  font-weight: 700;
}
</style>
@endsection
@section('header')
<script src='https://www.google.com/recaptcha/api.js?render=6Leo43gUAAAAAA06TbHMoINO8oWyfKNOlxQRLJBo'></script>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <h4 class="center-align">Envío de ticket a Sistemas</h4>
  </div>
    <form>
        <div class="input-field col-md-6 col-md-offset-2">

            <input placeholder="Asunto..." id="subject" type="text" class="validate">

          </div>
          
                  <div class="input-field col-md-8 col-md-offset-2">

                    <textarea id="description" rows="4" cols="50" class="browser-default" placeholder="Descripción..."></textarea>
                    
                  </div>

                  <div class="input-field col-md-8 col-md-offset-2">

                      <input type='file' id='myFile' />
                      
                    </div>
                  
            </div>
    <div class="center">
        <button class="btn grey">enviar ticket</button>
    </div>
    </form>
    <div class="alert col-md-offset-3 col-md-6 hoverable center-align" id="alert" role="alert"></div>
   
  {{-- <div id="result"></div>
  <div id="code"></div>
  <div id="response"></div> --}}

</div>

@endsection
@section('javascript')
<script>
  $(document).ready(function(){
    $("button").click(
      function(e) {
        e.preventDefault();

        var yourdomain = 'odontopraxis'; // Your freshdesk domain name. Ex., yourcompany
        var api_key = 'hMkNHBcvlLb0c1QwMPBj'; // Ref: https://support.freshdesk.com/support/solutions/articles/215517-how-to-find-your-api-key
        var email = "{{ Auth::user()->email }}";
        var subject = $('#subject').val();
        var description = $('#description').val();
        var file = $('#myFile')[0].files;
        
        if(subject == ""){
          return false;
        }
        if(description == ""){
          return false;
        }
        if(file.length == 0){
          var formdata = new FormData();
          formdata.append('description', description);
          formdata.append('email', email);
          formdata.append('subject', subject);
          formdata.append('priority', '1');
          formdata.append('status', '2');
        }
        if(file.length >= 1){
          var formdata = new FormData();
          formdata.append('description', description);
          formdata.append('email', email);
          formdata.append('subject', subject);
          formdata.append('priority', '1');
          formdata.append('status', '2');
          formdata.append('attachments[]', $('#myFile')[0].files[0]);
        }
      
        console.log(file.length);
        $.ajax(
          {
            url: "https://"+yourdomain+".freshdesk.com/api/v2/tickets",
            type: 'POST',
            contentType: false,
            processData: false,
            headers: {
              "Authorization": "Basic " + btoa(api_key + ":x")
            },
            data: formdata,
            success: function(data, textStatus, jqXHR) {
         /*      $('#result').text('Success');
              $('#code').text(jqXHR.status);
              $('#response').html(JSON.stringify(data, null, "<br/>")); */
              $('#alert').css('display', 'block');
              $('#alert').text('Ticket enviado correctamente.');
              // $('#code').text(jqXHR.status);
              // $('#response').html(JSON.stringify(data, null, "<br/>"));
              $('#subject').val('');
              $('#description').val('');
            },
            error: function(jqXHR, tranStatus) {
              $('#result').text('Error');
              $('#code').text(jqXHR.status);
              x_request_id = jqXHR.getResponseHeader('X-Request-Id');
              response_text = jqXHR.responseText;
              $('#response').html(" Error Message : <b style='color: red'>"+response_text+"</b>.<br/> Your X-Request-Id is : <b>" + x_request_id + "</b>. Please contact support@freshdesk.com with this id for more information.");
            },
            always: function (data, textStatus, jqXHR) { 

              }
          }
        );
      }
    );
});
 

  $(document).ready(function () {
    $('#alert').click(function (e) { 
      e.preventDefault();
      $('#alert').hide();
    });
  });
    </script>
  <script>
      grecaptcha.ready(function() {
      grecaptcha.execute('6Leo43gUAAAAAA06TbHMoINO8oWyfKNOlxQRLJBo', {action: 'tickets'})
      .then(function(token) {
      // Verify the token on the server.
      });
      });
  </script>


<script>
$(document).ready(function () {
  var user_email = "{{ Auth::user()->email }}";
  var yourdomain = 'odontopraxis';
   var api_key = 'hMkNHBcvlLb0c1QwMPBj';
        $.ajax(
          {
            url: "https://"+yourdomain+".freshdesk.com/api/v2/contacts?email="+user_email,
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            headers: {
              "Authorization": "Basic " + btoa(api_key + ":x")
            },
            success: function(data, textStatus, jqXHR) {
              console.log(data[0]);
              $('#code').text(jqXHR.status);
              $('#response').html(JSON.stringify(data, null, "<br/>"));
            },
            error: function(jqXHR, tranStatus) {
              $('#result').text('Error');
              $('#code').text(jqXHR.status);
              x_request_id = jqXHR.getResponseHeader('X-Request-Id');
              response_text = jqXHR.responseText;
              $('#response').html(" Error Message : <b style='color: red'>"+response_text+"</b>.<br/> Your X-Request-Id is : <b>" + x_request_id + "</b>. Please contact support@freshdesk.com with this id for more information.");
            }
          }
        );
});
  
    /*  $(document).ready(function(){
            var email = "{{ Auth::user()->email }}";
        
        $("button").click(
          function(e) {
            e.preventDefault();
            
            var file = $('#myFile')[0].files[0];
            if(subject == ""){
              return false;
            }
            if(description == ""){
              return false;
            }
            var yourdomain = 'odontopraxis'; // Your freshdesk domain name. Ex., yourcompany
            var api_key = 'hMkNHBcvlLb0c1QwMPBj'; // Ref: https://support.freshdesk.com/support/solutions/articles/215517-how-to-find-your-api-key
            ticket_data = '{ "description": "'+description+'", "subject": "'+subject+'", "email": "'+email+'", "priority": 1, "status": 2, "attachments": ["'+file+'"] }';
            $.ajax(
              {
                url: "https://"+yourdomain+".freshdesk.com/api/v2/tickets",
                type: 'POST',
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                headers: {
                  "Authorization": "Basic " + btoa(api_key + ":x")
                },
                data: ticket_data,
                success: function(data, textStatus, jqXHR) {
                  $('#alert').css('display', 'block');
                   $('#alert').text('Ticket enviado correctamente.');
                  $('#code').text(jqXHR.status);
                 $('#response').html(JSON.stringify(data, null, "<br/>"));
                  $('#subject').val('');
                  $('#description').val('');
                },
                error: function(jqXHR, tranStatus) {
                  $('#alert').text('Error enviando el ticket. Contacte con el departamento de sistemas.');
                  $('#alert').text(jqXHR.status);
                  x_request_id = jqXHR.getResponseHeader('X-Request-Id');
                  response_text = jqXHR.responseText;
                  $('#response').html(" Error Message : <b style='color: red'>"+response_text+"</b>.<br/> Your X-Request-Id is : <b>" + x_request_id + "</b>. Please contact support@freshdesk.com with this id for more information.");
                },
                always: function (data, textStatus, jqXHR) { 

                 }
              }
            );
          });// función de click
    }); */
</script>
@endsection