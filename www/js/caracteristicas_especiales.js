// Modal de filtros.
const openModal = document.getElementById('filtros-btn');
const modal = document.querySelector('.contenedor-oscuro');


openModal.addEventListener('click', (e) => {
    e.preventDefault();
    modal.classList.add('mostrar-modal');
});
modal.addEventListener('click', (e) => {
    if (e.target.classList.contains('contenedor-oscuro')) 
        modal.classList.remove('mostrar-modal')
});

// Validar RUT
function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("form-filtro").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {
    evento.preventDefault();
    let desde = document.getElementById('desde').value;
    let hasta = document.getElementById('hasta').value;
    let gastoscomunesdesde = document.getElementById('gastoscomunesdesde').value;
    let gastoscomuneshasta = document.getElementById('gastoscomuneshasta').value;
    let mensajeprecio = document.getElementById('mensaje-precio');
    let mensajegasto = document.getElementById('mensaje-gasto');

    if(desde > hasta) {
        mensajeprecio.innerText = 'El precio inicio debe ser mayor al precio final';
      return;
    }
    if(gastoscomunesdesde > gastoscomuneshasta) {
        mensajegasto.innerText = 'El precio inicio debe ser mayor al precio final.';
        return;
      }
    this.submit();
}

// Validacion de numero
function seguridadNumero(){
    var numbers = /^(\+?56)?(\s?)(0?9)(\s?)[98765432]\d{7}$/;
    let tel = document.getElementById("numero");
    let formulario = document.getElementById('formulario');
    if (tel.value.match(numbers) || tel.value == " ") {
        console.log('jahsjdhasd');
        if (tel.value.length == 9 || tel.value.length == 11 || tel.value.length == 12) {
            document.getElementById('formulario').submit();
            // return true;
        }
    } else {
        console.log('ajshdjahsdjsahjdjsahd');
        let aviso = document.getElementById("mensajeNumero");
        let mensaje = document.createElement("p");
        mensaje.innerHTML = "<p class='alertas-mensajes' style='padding-left:15px;'>Por favor, ingrese un número valido.</p>";
        aviso.appendChild(mensaje);
        setTimeout(function(){
            document.getElementById("mensajeNumero").style.display = "none";
            // document.location.reload(true);
        }, 8000);
        tel.focus();
        return false;
    }
}


