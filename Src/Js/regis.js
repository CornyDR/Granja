document.addEventListener("DOMContentLoaded", function () {
    const registrarBtn = document.getElementById("registrarBtn");

    registrarBtn.addEventListener("click", function () {
        const nombreLote = document.getElementById("nombreLote").value;
        const tipoAnimal = document.getElementById("tipoAnimal").value;
        const cantidad = document.getElementById("cantidad").value;
        const raza = document.getElementById("raza").value;
        const etapa = document.getElementById("etapa").value;
        const fecha = document.getElementById("fecha").value;
        

        if (!nombreLote || !tipoAnimal ||!cantidad ||!raza || !etapa || !fecha  ) {
            alert("Todos los campos son obligatorios");
            return;
        }

        // Enviar datos al servidor con AJAX
        $.ajax({
            url: "/Src/Php/insertar_animal.php",
            type: "POST",
            data: {
                nombreLote: nombreLote,
                tipoAnimal: tipoAnimal,
                cantidad: cantidad,
                raza: raza,
                etapa: etapa,
                fecha: fecha,
                
            },
            success: function (response) {
                alert("Registro exitoso");
                agregarFilaTabla(nombreLote, tipoAnimal, cantidad, raza, etapa, fecha );
                document.getElementById("myForm").reset();
            },
            error: function () {
                alert("Error al registrar");
            }
        });
    });

    function agregarFilaTabla(nombreLote, tipoAnimal, cantidad, raza, etapa, fecha ) {
        let table = $("#example").DataTable();
        table.row.add([
            table.rows().count() + 1,
            nombreLote,
            tipoAnimal,
            cantidad,
            raza,
            etapa,
            fecha
            
        ]).draw(false);
    }

    document.getElementById("tipoAnimal").addEventListener("change", function () {
        const etapaSelect = document.getElementById("etapa");
        const tipoAnimal = this.value;

        const etapas = {
            pollos: ["Cría", "Crecimiento", "Engorde"],
            borrego: ["Lactante", "Crecimiento", "Adulto"],
            chivo: ["Leche", "Desarrollo", "Engorde"]
        };

        etapaSelect.innerHTML = "<option value='' disabled selected>-- Selecciona una opción --</option>";
        if (etapas[tipoAnimal]) {
            etapas[tipoAnimal].forEach(etapa => {
                let option = document.createElement("option");
                option.value = etapa;
                option.textContent = etapa;
                etapaSelect.appendChild(option);
            });
        }
    });
});
