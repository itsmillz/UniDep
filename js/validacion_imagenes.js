
$(document).ready(()=>{
    $("#validacion_imagenes").change(()=>{
        let valor = document.getElementById("validacion_imagenes").value;
    $("#boton_upload").prop("disabled",true);
    if(valor.includes("png") || valor.includes("jpg") || valor.includes("jpeg")){
        $("#boton_upload").prop("disabled",false);
    }else{

        let aviso = document.getElementById("prompt");
        let mensaje = document.createElement("p");
        mensaje.innerHTML = "<p class='w-75 alert alert-danger border-0' style='margin:25px auto'> Estimado usuario: Por favor, procure subir imágenes en los siguientes formatos: <strong>jpeg, jpg, png o webp,</strong> de lo contrario no se publicarán.</p>";
        aviso.appendChild(mensaje);
        $("#boton_upload").prop("disabled",true);
    }
    });
});