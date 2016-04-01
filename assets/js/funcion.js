function eliminar(id, controler){
	if (confirm("Desea Eliminar el correo ?")) {
		window.location="?accion="+controler+"&id="+id;
	}

}