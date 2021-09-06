$(function(){
    actualizar();

    $('#agg_solicitud').submit(function (e) {
        const postData = {
            producto: $('#nombre').val(),
            descripcion: $('#descripcion').val(),
            fecha: $('#fecha').val(),
            usuario: $('#oculto').val()
        };

        $.post('php/solicitudes php/solicitudes-add.php', postData, function (response) {
            
            $('#agg_solicitud').trigger('reset');
        });

        e.preventDefault();
    });

    function actualizar() {

        $.ajax({
            url: 'php/solicitudes php/solicitudes-listar.php',
            type: 'GET',
            success: function (response) {
                let solicitud = JSON.parse(response);
                let template = '';

                solicitud.forEach(solicitudes => {
                    template += `
                    <strong class="producto"> ${solicitudes.producto}</strong>
                    <p> <mark> ${solicitudes.descripcion} </mark></p>
                    <p class="fecha">${solicitudes.fecha}</p>
                    <strong> ${solicitudes.usuario} </strong>
                    <br><hr><br>
                `
                });

                $('#solicitudes').html(template);
            }
        })
    }

})