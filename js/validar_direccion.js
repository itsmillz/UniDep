
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
                    // la info q m pasa la bd la envia al JSON aquí
                    let data = JSON.parse(response);
                    let data2 = e.target.value;
                    let sanitizar = data2.trim();
                    let sector = data.sector;
                    if (sector.includes(sanitizar)) {
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