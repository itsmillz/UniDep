function verificarFoto(){
    let valor = document.getElementById("validacion_imagenes").value;
    console.log(valor);
    if((valor.includes("png") || valor.includes("jpg") || valor.includes("jpeg")) && valor.length > 0){
        document.getElementById('form-imagen').submit();
    }else{
        document.getElementById("validacion_imagenes").value = '';
        let aviso = document.getElementById("prompt");
        let mensaje = document.createElement("p");
        mensaje.innerHTML = "<p class='w-75 alert alert-danger border-0 titulo-filtro-individual' style='margin:25px auto'> Estimado usuario: Por favor, procure subir imágenes en los siguientes formatos: <strong>jpeg, jpg, png o webp,</strong> de lo contrario no se publicarán.</p>";
        aviso.appendChild(mensaje);
        setTimeout(function(){
            document.getElementById("prompt").style.display = "none";
        }, 8000);
    }
}

let completar = document.getElementById("completar");
function verificarEnviar(totalImagenes){
    let valor = document.getElementById("validacion_imagenes").value;
    if(valor.length > 0 || totalImagenes > 0){
        completar.href = "../index.php";
    }else{
        let aviso = document.getElementById("prompt");
        let mensaje = document.createElement("p");
        mensaje.innerHTML = "<p class='w-75 alert alert-danger border-0 titulo-filtro-individual' style='margin:25px auto; text-align:center;'>Por favor, para continuar debe subir al menos una foto de su propiedad.</p>";
        aviso.appendChild(mensaje);
        setTimeout(function(){
            document.getElementById("prompt").style.display = "none";
            document.location.reload(true);
        }, 8000);
    }
}

