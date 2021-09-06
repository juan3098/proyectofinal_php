$(function(){

    actualizar();
    let edit = false;

    $('#buscar').keyup(function () {

        if ($('#buscar').val()){
        let buscar = $('#buscar').val();
        $.ajax({
            url: 'php/productos php/productos-buscar.php',
            type: 'POST',
            data: { buscar },
            success: function (response) {
                let product = JSON.parse(response);
                let template = '';

                product.forEach(productos => {
                    template += `
                    <tr>
                        <td>${productos.codigo}</td>
                        <td>${productos.nombre}</td>
                        <td>${productos.proveedor}</td>
                        <td><button class="btn btn-edit">Editar</button></td>
                        <td><button class="btn btn-del">Eliminar</button></td>
                    </tr>
                `
                });

                $('#llenar_inventario').html(template);
            }
        })
    } else {
        actualizar();
    }
    })
    
    $('#agregar').submit(function (e) {
        const postData = {
            id: $('#oculto').val(),
            codigo: $('#codigo').val(),
            nombre: $('#nombre').val(),
            proveedor: $('#proveedor').val()
        };

        let url = edit === false ? 'php/productos php/productos-add.php' : 'php/productos php/productos-edit.php';
        console.log(url);
        $.post(url, postData, function (response) {
            actualizar();
            $('#agregar').trigger('reset');
        });

        e.preventDefault();
    });

    function actualizar() {
        $.ajax({
            url: 'php/productos php/productos-listar.php',
            type: 'GET',
            success: function (response) {
                let product = JSON.parse(response);
                let template = '';

                product.forEach(productos => {
                    template += `
                    <tr IDProducto="${productos.id}">
                        <td>${productos.codigo}</td>
                        <td>${productos.nombre}</td>
                        <td>${productos.proveedor}</td>
                        <td><button class="btn btn-edit editar">Editar</button></td>
                        <td><button class="btn btn-del">Eliminar</button></td>
                    </tr>
                `
                });

                $('#llenar_inventario').html(template);
            }
        })
    }

    $(document).on('click', '.btn-del', function () {
        if (confirm('¿Seguro que desea eliminar el elemento?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('IDProducto');

            $.post('php/productos php/productos-delete.php', { id }, function (response) {
                actualizar();
            })
        }
    });

    $(document).on('click', '.editar', function () {

        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('IDProducto');

        $.post('php/productos php/productos-single.php', { id }, function (response) {
            const productos = JSON.parse(response);
            $('#oculto').val(productos.id);
            $('#codigo').val(productos.codigo);
            $('#nombre').val(productos.nombre);
            $('#proveedor').val(productos.proveedor);

            edit = true;
        })
    });

})