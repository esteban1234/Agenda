  
  function goLogin(){
  var connect, form, responde, result, user, pass;
  user = ('UserName').value;
  pass = ('Passwod').value;
  // sesion = __('session_login').checked ? true : false;
  form = 'user=' +user+ '&pass=' +pass;
  connect =  window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function(){
    if(connect.readyState == 4 && connect.status == 200){
      if (connect.responseText == 1){
        location.reload();
      }
      else{
        ('_AJAX_LOGIN_').innerHTML = connect.responseText;
      }
    }
  }

  connect.open('POST','../vistas/validar.php',true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
}

function runScriptLogin(e){
  if(e.keyCode == 13){
    goLogin();
  }
}

  // $(document).ready(function(){
  //       $('.log-btn').click(function(){
  //           $('.log-status').addClass('wrong-entry');
  //          $('.alert').fadeIn(500);
  //          setTimeout( "$('.alert').fadeOut(1500);",3000 );
  //       });
  //       $('.form-control').keypress(function(){
  //           $('.log-status').removeClass('wrong-entry');
  //       });

  //   });

