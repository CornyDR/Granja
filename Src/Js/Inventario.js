$(document).ready(function () {
    // Inicializar DataTable con el ID correcto #example
    let table = new DataTable('#storage', {  // Mantener '#example'
        ajax: {
            "url": "/Src/Php/get_inventario.php",
            "type": "POST",
            "data": { accion: "listar" }
        },
        "columns": [
            { "data": "id" },
            { "data": "categoria" },
            { "data": "producto" },
            { "data": "cantidad" },
            { "data": "fecha" },
            { 
                "data": null,
                "render": function (data, type, row) {
                    return `
                        <button class="btn-editar" data-id="${row.id}">✏️ Editar</button>
                        <button class="btn-eliminar" data-id="${row.id}">🗑️ Eliminar</button>
                    `;
                }
            }
        ]
    });

    // Evento para Editar
    $('#storage tbody').on('click', '.btn-editar', function () {
        let id = $(this).data('id');
        console.log("Editar ID:", id);
        openEditModal(id);
    });

    // Evento para Eliminar
    $('#storage tbody').on('click', '.btn-eliminar', function () {
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
            success: function (response) {
                alert("Registro eliminado correctamente");
                $('#storage').DataTable().ajax.reload(); // Actualiza la tabla después de eliminar
            }
        });
    }
}

