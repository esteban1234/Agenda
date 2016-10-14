function __(id){
	return document.getElementById(id);
}

function Cancela(contenido,url){
	var action = window.confirm(contenido);
	if (action) {
		window.location = url;
	}
}

function Elimina(contenido,url){
	var action = window.confirm(contenido);
	if (action) {
		window.location = url;		
	}
}

function confirmCan(){
			var msj = confirm("¿Realmente desea CANCELAR?");
			if (msj) return true;
			else
				return false;
	}