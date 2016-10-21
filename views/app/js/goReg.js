function goReg(){
	var connect, form, result, asunto, hora_r, fec_alt, fec_rea, addTarea;
	asunto = __('asunto').value;
	hora_r = __('hora_realizarla').value;
	fec_alt = __('fecha_alta').value;
	fec_rea = __('fecha_realizar').value;
	addTarea = $('textarea#agregar_tarea').val();


	if (asunto != '' && hora_r != '' && fec_alt !='' && fec_rea !='' && addTarea !=''){
		form = 'asunto=' + asunto + '&hora_realizarla=' + hora_r + '&fecha_alta=' + fec_alt +'&fecha_realizar=' +fec_rea
			+ '&agregar_tarea=' +addTarea;
		connect =  window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		connect.onreadystatechange = function(){
			if(connect.readyState == 4 && connect.status == 200){
				if (connect.responseText == 1){
					location.reload();
				}
				else{
					$('#_AJAX_REG_').fadeIn(500);
					__('_AJAX_REG_').innerHTML = connect.responseText;
					setTimeout(deleteMSJ,4000);
				}
			}
			//else if (connect.readyState != 4){
			//window.location.reload();
			//}
		}

		connect.open('POST','ajax.php?mode=registro',true);
		connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		connect.send(form);
	}

	else
	{
		$('#_AJAX_REG_').fadeIn(500);
		result = '<div class="alert alert-dismissible alert-danger">';
		result +='<h4>Error!</h4>';
		result +='<p><strong> Todos los campos deben estar llenos</strong></p>';
		result +='</div>';
		__('_AJAX_REG_').innerHTML = result;
		setTimeout(deleteMSJ,4000);
	}
}

function deleteMSJ() {
	$('#_AJAX_REG_').fadeOut(1500);
}


