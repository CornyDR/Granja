$(document).ready(function () {
    // Inicializar DataTable con el ID correcto #storage
    new DataTable('#storage', {
        ajax: {
            "url": "/Src/Php/get_inventario.php",
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'producto' },
            { data: 'categoria' },
            { data: 'cantidad' },
            { data: 'fecha' },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <button class="editBtn" data-id="${row.id}">✏️ Editar</button>
                        <button class="deleteBtn" data-id="${row.id}">🗑️ Eliminar</button>
                    `;
                }
            }
        ],
        language: {
            info: 'Mostrar _PAGE_ de _PAGES_',
            infoEmpty: 'No hay productos disponibles',
            infoFiltered: '(Filtrado de _MAX_ productos totales)',
            lengthMenu: 'Mostrar _MENU_ productos',
            zeroRecords: 'No existen productos',
            search: 'Buscar'
        }
    });


    // Evento para Editar
    $('#storage tbody').on('click', '.uniBtn', function () {
        let id = $(this).data('id');
        console.log("Editar ID:", id);
        openEditModal(id);
    });

    // Evento para Eliminar
    $('#storage tbody').on('click', '.uniBtn1', function () {
        let id = $(this).data('id');
        console.log("Eliminar ID:", id);
        eliminarRegistro(id);
    });
});

// Función para abrir el modal de edición
function openEditModal(id) {
    $.ajax({
        url: "/Src/Php/get_inventario.php",
        method: "POST",
        data: { accion: "obtener", id: id },
        success: function (data) {
            let registro = JSON.parse(data);
            $('#editProductName').val(registro.producto);
            $('#editCategoria').val(registro.categoria);
            $('#editCantidad').val(registro.cantidad);
            $('#editFecha').val(registro.fecha);
            $('#editModal').show();
        }
    });
}

// Función para eliminar un registro
function eliminarRegistro(id) {
    if (confirm("¿Estás seguro de que quieres eliminar este registro?")) {
        $.ajax({
            url: "/Src/Php/get_inventario.php",
            method: "POST",
            data: { accion: "eliminar", id: id },
            success: function () {
                alert("Registro eliminado correctamente");
                $('#storage').DataTable().ajax.reload(); // Actualiza la tabla después de eliminar
            },
            error: function () {
                alert("Error al eliminar el registro");
            }
        });
    }
}