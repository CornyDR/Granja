var newMemberAddBtn = document.querySelector('.addMemberBtn'),
darkBg = document.querySelector('.dark_bg'),
popupForm = document.querySelector('.popup'),
crossBtn = document.querySelector('.closeBtn'),
submitBtn = document.querySelector('.submitBtn'),
 modalTitle = document.querySelector('.modalTitle'),
 popupFooter = document.querySelector('.popupFooter'),
 form = document.querySelector('form'),
 formInputFields = document.querySelectorAll('form input'),
  uploadimg = document.querySelector("#uploadimg");

// Datos de ejemplo: RAZA por tipo de animal
const inventario = {
    "Farmacos": ["A", "B"],
    "Alimentos": ["C", "D"],
    "Herramientas": ["F", "H"]
};

function updateP() {
    const categoria = document.getElementById("categoria");
    const PSelect = document.getElementById("producto");
    const selectedcategoria = categoria.value;

    PSelect.innerHTML = '<option value="" disabled selected>-- Selecciona una opción --</option>';

    if (selectedcategoria) {
        
        PSelect.disabled = false;

        
        const producto = inventario[selectedcategoria];

        
        producto.forEach( producto => {
            const option = document.createElement("option");
            option.value = producto;
            option.textContent = producto;
            PSelect.appendChild(option);
        });
    } else {
        
        PSelect.disabled = true;
    }
}

newMemberAddBtn.addEventListener('click', ()=> {
    darkBg.classList.add('active')
    popupForm.classList.add('active')
})

crossBtn.addEventListener('click', ()=>{
    darkBg.classList.remove('active')
    popupForm.classList.remove('active')
    form.reset()
})

// $(document).ready(function() {
//     $('#dmlModal').on('hidden.bs.modal', function () {
//         // Reiniciar el formulario
//         $('#myForm')[0].reset();
        
//         // Limpiar cualquier contenido dinámico si es necesario
//         $('#raza').empty().append('<option value="" disabled selected>-- Selecciona una opción --</option>');
//         $('#raza').prop('disabled', true); // Deshabilitar el select de RAZA
//     });
// });










