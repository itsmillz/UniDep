
function buscar_ahora(buscar) {
    var parametros = { "buscar": buscar };
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'buscador_filtros_listado/buscador.php',
        success: function (data) {
            document.getElementById("datos_buscador").innerHTML = data;
        }
    });
    document.getElementById("todos_datos").style.display = "none";
    document.getElementById("datos_filtros").style.display = "none";
}