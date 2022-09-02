const boton = document.getElementById('burger-button');
const opcionesmenu = document.getElementById("menu-opciones");

boton.addEventListener('click', function(e){
    e.preventDefault();
    const estado = e.currentTarget.dataset.estado;
    if (estado === "abierto") {
        opcionesmenu.style.display = 'none';
        boton.dataset.estado ="cerrado"
    }else{
        // En caso de que esté cerrado
        boton.dataset.estado ="abierto"
        opcionesmenu.style.display = 'block';
        boton.classList.add('checked');   
    }
});

document.addEventListener('mouseup', function(e) {
    e.preventDefault();
    if (!opcionesmenu.contains(e.target) || boton.contains(e.target)    )
     {
        console.log("Estoy en el boton o menu")
        opcionesmenu.style.display = 'none';
        if(boton.classList.has("abierto")){
            boton.dataset.estado="cerrado";
        }
    }
});