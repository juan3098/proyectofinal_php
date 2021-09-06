$(function(){

    actualizar();
    let edit = false;

    $('#buscar').keyup(function () {

        if ($('#buscar').val()){
        let buscar = $('#buscar').val();
        $.ajax({
            url: 'php/clientes php/clientes-buscar.php',
            type: 'POST',
            data: { buscar },
            success: function (response) {
                let cliente = JSON.parse(response);
                let template = '';

                cliente.forEach(clientes => {
                    template += `
                    <tr>
                        <td>${clientes.codigo}</td>
                        <td>${clientes.nombre}</td>
                        <td>${clientes.direccion}</td>
                        <td>${clientes.telefono}</td>
                        <td><button class="btn btn-del">Eliminar</button></td>
                        <td><button class="btn btn-edit">Editar</button></td>
                    </tr>
                `
                });

                $('#llenar').html(template);
            }
        })
    } else {
        actualizar();
    }
    })

    $('#agregar').submit(function (e) {
        const postData = {
            id: $('#oculto').val(),
            nombre: $('#nombre').val(),
            direccion: $('#direccion').val(),
            telefono: $('#telefono').val()
        };

        let url = edit === false ? 'php/clientes php/clientes-add.php' : 'php/clientes php/clientes-edit.php';
        console.log(url);
        $.post(url, postData, function (response) {
            actualizar();
            $('#agregar').trigger('reset');
        });

        e.preventDefault();
    });

    function actualizar() {
        $.ajax({
            url: 'php/clientes php/clientes-listar.php',
            type: 'GET',
            success: function (response) {
                let cliente = JSON.parse(response);
                let template = '';

                cliente.forEach(clientes => {
                    template += `
                <tr IDCliente="${clientes.codigo}">
                    <td>${clientes.codigo}</td>
                    <td>${clientes.nombre}</td>
                    <td>${clientes.direccion}</td>
                    <td>${clientes.telefono}</td>
                    <td><button class="btn btn-del">Eliminar</button></td>
                    <td><button class="btn btn-edit editar">Editar</button></td>
                </tr>
                `
                });

                $('#llenar').html(template);
            }
        })
    }

    $(document).on('click', '.btn-del', function () {
        if (confirm('¿Seguro que desea eliminar el elemento?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('IDCliente');

            $.post('php/clientes php/clientes-delete.php', { id }, function (response) {
                actualizar();
            })
        }
    });

    $(document).on('click', '.editar', function () {

        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('IDCliente');

        $.post('php/clientes php/clientes-single.php', { id }, function (response) {
            const clientes = JSON.parse(response);
            $('#oculto').val(clientes.codigo);
            $('#nombre').val(clientes.nombre);
            $('#direccion').val(clientes.direccion);
            $('#telefono').val(clientes.telefono);

            edit = true;
        })
    });

})