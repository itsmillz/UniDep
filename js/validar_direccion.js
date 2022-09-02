// esto ejecuta el js cuando el html este cargado completamente (ready)
$(document).ready(function () {

    $("#mensaje").hide();
    $("#direccion").keyup(function (e) {
        // console.log(e.target.value);
        let data = e.target.value;
        // console.log (data);
        let sanitizado = data.trim();
        console.log(sanitizado);
        $.ajax({
            url: "validar_direccion.php",
            type: "POST",
            async: true, 
            data: "direccion=" + sanitizado,
            success: function (response) {
                if(response.length > 10) {
                    // la info q m pasa la base de datos la envia al JSON aquí
                    let data = JSON.parse(response); //Viene desde la base de datos, JSON(parse) transforma a JSON para extraer informacion
                    // console.log(data);
                    let data2 = e.target.value;//captura x teclado al momento de escribir la direccion
                    data2 = data2.replace(/[&\/\\,+()$~%.'":*?<>{}]/g, '');
                    let sanitizar = data2.trim();//lo mandas por teclado, con trim elimino espacios
                    let data2_mayuscula = sanitizar.toUpperCase();//lo q viene del teclado se pasa a MAYUS
                    // console.log("Teclado = "+data2_mayuscula);
                    let sector = data.sector; //extraigo la data de mi response JSON a la variable sector para manejarlo con string facilmente
                    let data_mayuscula = sector.toUpperCase();//lo q viene de la BD lo paso a MAYUS
                    // console.log("BD = "+data_mayuscula) 
                    if (data_mayuscula.includes(data2_mayuscula)) {//pregunto si lo q mando x teclado coincide por lo q mando desde la base de datos
                        console.log("Esta dirección ya está registrada");
                        console.log(response);
                        $("#mensaje").show();
                        $("#mensaje").text("Esta dirección ya está registrada");
                        $("#mensaje").removeClass("alerta2");
                        $("#boton").attr("disabled",true);
                        $("#mensaje").addClass("alerta");
                    }
                } else {
                    // $("#mensaje").hide();
                    $("#mensaje").text("Dirección válida");
                    $("#mensaje").removeClass("alerta");
                    $("#mensaje").addClass("alerta2");
                    $("#boton").attr("disabled",false);
                }
            }
        });
    });
});