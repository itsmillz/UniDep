
function buscar_ahora(buscar) {
    var parametros = { "buscar": buscar };
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'buscador_filtros/buscador.php',
        success: function (data) {
            document.getElementById("datos_buscador").innerHTML = data;
        }
    });
}
buscar_ahora();
