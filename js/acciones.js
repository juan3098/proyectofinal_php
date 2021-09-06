// funcion para cambiar entre pantallas de manera dinamica

function abrir(url,contenedor){
    $.get(url,{},function (data){
        $("#" + contenedor).html(data);
    });
}