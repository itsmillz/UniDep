$(document).ready(()=>{
	$("#boton").click((e)=>{
		e.preventDefault();
		$("#direccion").text("");
		$("#precio").val("");
		$("#select_tipo").text("");
	})
});