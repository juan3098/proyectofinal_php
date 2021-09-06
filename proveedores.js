$(function(){

    actualizar();
    let edit = false;

    $('#buscar').keyup(function () {

        if ($('#buscar').val()){
        let buscar = $('#buscar').val();
        $.ajax({
            url: 'php/proveedores php/proveedores-buscar.php',
            type: 'POST',
            data: { buscar },
            success: function (response) {
                let proveedor = JSON.parse(response);
                let template = '';

                proveedor.forEach(proveedores => {
                    template += `
                    <tr>
                        <td>${proveedores.codigo}</td>
                        <td>${proveedores.nombre}</td>
                        <td>${proveedores.tipo}</td>
                        <td>${proveedores.telefono}</td>
                        <td><button class="btn btn-del">Eliminar</button></td>
                        <td><button class="btn btn-edit">Editar</button></td>
                    </tr>
                `
                });

                $('#llenar_prov').html(template);
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
            tipo: $('#tipo').val(),
            telefono: $('#telefono').val()
        };

        let url = edit === false ? 'php/proveedores php/proveedores-add.php' : 'php/proveedores php/proveedores-edit.php';
        console.log(url);
        $.post(url, postData, function (response) {

            actualizar();
            $('#agregar').trigger('reset');
        });

        e.preventDefault();
    });

    function actualizar() {
        $.ajax({
            url: 'php/proveedores php/proveedores-listar.php',
            type: 'GET',
            success: function (response) {
                let proveedor = JSON.parse(response);
                let template = '';

                proveedor.forEach(proveedores => {
                    template += `
                <tr IDprov="${proveedores.codigo}">
                    <td>${proveedores.codigo}</td>
                    <td>${proveedores.nombre}</td>
                    <td>${proveedores.tipo}</td>
                    <td>${proveedores.telefono}</td>
                    <td><button class="btn btn-del eliminar">Eliminar</button></td>
                    <td><button class="btn btn-edit editar">Editar</button></td>
                </tr>
                `
                });

                $('#llenar_prov').html(template);
            }
        })
    }

    $(document).on('click', '.eliminar', function () {
        if ( confirm('¿Seguro que desea eliminar el elemento?') ) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('IDprov');

            $.post('php/proveedores php/proveedores-delete.php', { id }, function (response) {
                actualizar();
            })
        }
    });

    $(document).on('click', '.editar', function () {

        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('IDprov');

        $.post('php/proveedores php/proveedores-single.php' , { id }, function (response) {
            const proveedores = JSON.parse(response);
            $('#oculto').val(proveedores.codigo);
            $('#nombre').val(proveedores.nombre);
            $('#tipo').val(proveedores.tipo);
            $('#telefono').val(proveedores.telefono);

            edit = true;
        })
    });

})