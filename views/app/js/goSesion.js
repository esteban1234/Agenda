function goLogin(){
	var connect, form, responde, result, user, pass;
	user = __('UserName').value;
	pass = __('Passwod').value;
	// sesion = __('session_login').checked ? true : false;
	form = 'user=' +user+ '&pass=' +pass;
	connect =  window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	connect.onreadystatechange = function(){
		if(connect.readyState == 4 && connect.status == 200){
			if (connect.responseText == 1){
				location.reload();
			}
			else{
				__('_AJAX_LOGIN_').innerHTML = connect.responseText;
			}
		}
	}

	connect.open('POST','ajax.php?mode=login',true);
	connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	connect.send(form);
}

function runScriptLogin(e){
	if(e.keyCode == 13){
		goLogin();
	}
}
