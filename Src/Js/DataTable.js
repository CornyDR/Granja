$(document).ready(function() { 
    function openEditModal() {
        $('.dark_bg1').fadeIn();
    }

    function closeEditModal() {
        $('.dark_bg1').fadeOut();
    }

    function saveChanges(isNewRecord = false) {
        let id = $('#myForm').data('edit-id');

        if (id) {
            let formData = {
                editar_id: id,
                nom_lote: $('#fName').val(),
                tipo_animal: $('#tipoAnimal').val(),
                cantidad: $('#cantidad').val(),
                RAZA: $('#raza').val(),
                etapa: $('#etapa').val(),
                fecha: $('#fecha').val()
            };

            $.post('/Src/Php/BD_Animales.php', formData, function(response) {
                if (response.success) {
                    alert('Registro actualizado correctamente');
                    table.ajax.reload();
                    closeEditModal();
                } else {
                    alert('Error al actualizar el registro');
                }
            }, 'json');
        }
    }
    let table = new DataTable('#example', {
        ajax: {
            url: '/Src/Php/BD_Animales.php',
            dataSrc: ''
        },
        columns: [
            { data: 'ID_LOTE' },     // Columna ID
            { data: 'NOM_LOTE' },    // Nombre del Lote
            { data: 'TIPO_ANIMAL' }, // Tipo de Animal
            { data: 'CANTIDAD' },     // Nombre del Animal
            { data: 'RAZA' },       // Raza
            { data: 'ETAPA' },       // Etapa
            { data: 'FECHA' },       // Fecha
            { 
                data: null, 
                render: function(data, type, row) {
                    return `
                        <button class="editBtn" data-id="${row.ID_LOTE}">Editar</button>
                        <button class="deleteBtn" data-id="${row.ID_LOTE}">Eliminar</button>
                    `;
                } 
            }
        ],
        language: {
            info: 'Mostrar _PAGE_ de _PAGES_',
            infoEmpty: 'No hay registros disponibles',
            infoFiltered: '(Filtrado de _MAX_ registros totales)',
            lengthMenu: 'Mostrar _MENU_ registros',
            zeroRecords: 'No existen registros',
            search: 'Buscar'
        }
    });

    // Evento para eliminar registro
    $('#example tbody').on('click', '.deleteBtn', function() {
        let id = $(this).data('id');

        if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
            $.post('/Src/Php/BD_Animales.php', { eliminar_id: id }, function(response) {
                if (response.success) {
                    alert('Registro eliminado correctamente');
                    table.ajax.reload();
                } else {
                    alert('Error al eliminar el registro');
                }
            }, 'json');
        }
    });

    // Evento para editar registro (Ejemplo: puedes mostrar un modal con datos)
    $('#example tbody').on('click', '.editBtn', function() {
        let id = $(this).data('id');

        // Obtener datos del registro seleccionado
        let rowData = table.row($(this).parents('tr')).data();

        // Llenar formulario con datos
        $('#fName').val(rowData.NOM_LOTE);
        $('#tipoAnimal').val(rowData.TIPO_ANIMAL);
        $('#cantidad').val(rowData.CANTIDAD);
        $('#raza').val(rowData.RAZAS);
        $('#etapa').val(rowData.ETAPA);
        $('#fecha').val(rowData.FECHA);
        $('#myForm').data('edit-id', id);

        // Mostrar modal de edición
        $('.dark_bg').fadeIn();
    });

    // Evento para guardar cambios de edición
    $('.submitBtn').on('click', function(e) {
        e.preventDefault();
        let id = $('#myForm').data('edit-id');

        if (id) {
            let formData = {
                editar_id: id,
                nom_lote: $('#fName').val(),
                tipo_animal: $('#tipoAnimal').val(),
                cantidad: $('#cantidad').val(),
                RAZA: $('#raza').val(),
                etapa: $('#etapa').val(),
                fecha: $('#fecha').val()
            };

            $.post('/Src/Php/BD_Animales.php', formData, function(response) {
                if (response.success) {
                    alert('Registro actualizado correctamente');
                    table.ajax.reload();
                    $('.dark_bg').fadeOut();
                } else {
                    alert('Error al actualizar el registro');
                }
            }, 'json');
        }
    });
});
