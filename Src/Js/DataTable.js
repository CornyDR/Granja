new DataTable('#example', {

    language: {
        info: 'Mostrar _PAGE_ de _PAGES_',
        infoEmpty: 'No records available',
        infoFiltered: '(filtered from _MAX_ total records)',
        lengthMenu: 'Mostrar _MENU_ paginas',
        zeroRecords: 'No existe el registros',
        search: 'Buscar',
    },

    layout: {
        topStart: null,
        topEnd: {
            search: {
                placeholder: '???...'
            }
        },
        bottomEnd: {
            paging: {
                buttons: 4
            }
        }
        
    },
    
});



  