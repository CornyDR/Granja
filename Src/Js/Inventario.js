$(document).ready(function () {
    // Inicializar DataTable con el ID correcto #storage
    new DataTable('#storage', {
        ajax: {
            "url": "/Src/Php/get_inventario.php",
            "type": "POST",
            "data": { accion: "listar" },
            dataSrc: 'data',
        },
        columns: [
            { data: 'ID' },
            { data: 'PRODUCTO' },
            { data: 'CATEGORIA' },
            { data: 'CANTIDAD' },
            { data: 'FECHA' },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <button class="editBtn" data-id="${row.ID}">✏️ Editar</button>
                        <button class="deleteBtn" data-id="${row.ID}">🗑️ Eliminar</button>
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
    $('#storage tbody').on('click', '.editBtn', function () {
        let id = $(this).data('id');
        console.log("Editar ID:", id);
        openEditModal(id);
    });

    // Evento para Eliminar
    $('#storage tbody').on('click', '.deleteBtn', function () {
        let id = $(this).data('id');
        console.log("Eliminar ID:", id);
        eliminarRegistro(id);
    });

    // Evento para Registrar
    $('.submitBtn').on('click', function (e) {
        e.preventDefault();
        insertarRegistro();
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
            $('#editProductName').val(registro.PRODUCTO);
            $('#editCategoria').val(registro.CATEGORIA);
            $('#editCantidad').val(registro.CANTIDAD);
            $('#editUnidad').val(registro.UNIDAD);
            $('#editFecha').val(registro.FECHA);
            $('#editModal').data('id', id).show();
            $('.dark_bg1').addClass('active');
            $('.popup1').addClass('active');
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

// Función para insertar un nuevo registro
function insertarRegistro() {
    const nombreProducto = $('#fName').val();
    const categoria = $('#categoria').val();
    const cantidad = $('#cifra').val();
    const unidad = $('#unidad').val();
    const fecha = $('#fecha').val();

    $.ajax({
        url: "/Src/Php/get_inventario.php",
        method: "POST",
        data: {
            accion: "insertar",
            nombreProducto: nombreProducto,
            categoria: categoria,
            cantidad: cantidad,
            unidad: unidad,
            fecha: fecha
        },
        success: function (response) {
            alert(response.message);
            if (response.success) {
                $('#myForm')[0].reset();
                closeBtn();
                $('#storage').DataTable().ajax.reload();
            }
        },
        error: function (xhr, status, error) {
            alert('Error: ' + error);
        }
    });
}

// Función para actualizar las opciones de productos según la categoría seleccionada
function updateP() {
    const categoria = document.getElementById("categoria").value;
    const productoSelect = document.getElementById("producto");

    // Limpiar las opciones del select de productos
    productoSelect.innerHTML = '<option value="" disabled selected>-- Selecciona una opción --</option>';

    // Obtener los productos según la categoría seleccionada
    const productosPorCategoria = {
        "Farmacos": ["Producto A", "Producto B"],
        "Alimentos": ["Producto C", "Producto D"],
        "Herramientas": ["Producto E", "Producto F"]
    };

    if (categoria) {
        const productos = productosPorCategoria[categoria];
        productos.forEach(producto => {
            const option = document.createElement("option");
            option.value = producto;
            option.textContent = producto;
            productoSelect.appendChild(option);
        });
    }
}

// Función para abrir el modal de ingreso
function openIngresar() {
    document.querySelector('.dark_bg').classList.add('active');
    document.querySelector('.popup').classList.add('active');
}

// Función para cerrar el modal de ingreso
function closeBtn() {
    document.querySelector('.dark_bg').classList.remove('active');
    document.querySelector('.popup').classList.remove('active');
    document.getElementById('myForm').reset();
}

// Función para cerrar el modal de edición
function closeEditModal() {
    $('.dark_bg1').removeClass('active');
    $('.popup1').removeClass('active');
    document.getElementById('editForm').reset();
}

// Función para guardar los cambios de edición
function saveChanges() {
    const id = $('#editModal').data('id');
    const nombreProducto = document.getElementById('editProductName').value;
    const categoria = document.getElementById('editCategoria').value;
    const cantidad = document.getElementById('editCantidad').value;
    const unidad = document.getElementById('editUnidad').value;
    const fecha = document.getElementById('editFecha').value;

    $.ajax({
        url: '/Src/Php/get_inventario.php',
        type: 'POST',
        data: {
            accion: "editar",
            id: id,
            nombreProducto: nombreProducto,
            categoria: categoria,
            cantidad: cantidad,
            unidad: unidad,
            fecha: fecha
        },
        dataType: 'json',
        success: function(response) {
            alert(response.message);
            if (response.success) {
                $('#editForm')[0].reset();
                closeEditModal();
                $('#storage').DataTable().ajax.reload();
            }
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
        }
    });
}