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
const razasPorAnimal = {
    "pollos": ["Pollo Criollo", "Pollo de Engorde"],
    "borrego": ["Borrego Pelibuey", "Borrego Dorper"],
    "chivo": ["Chivo Boer", "Chivo Criollo"]
};

function updateRaza() {
    const tipoAnimalSelect = document.getElementById("tipoAnimal");
    const razaSelect = document.getElementById("raza");
    const selectedAnimal = tipoAnimalSelect.value;

    // Limpiar las opciones del select de RAZA
    razaSelect.innerHTML = '<option value="" disabled selected>-- Selecciona una opción --</option>';

    if (selectedAnimal) {
        // Habilitar el select de RAZA
        razaSelect.disabled = false;

        // Obtener las RAZA del tipo de animal seleccionado
        const RAZA = razasPorAnimal[selectedAnimal];

        // Agregar las nuevas opciones al select de RAZA
        RAZA.forEach(raza => {
            const option = document.createElement("option");
            option.value = raza;
            option.textContent = raza;
            razaSelect.appendChild(option);
        });
    } else {
        // Deshabilitar el select de RAZA si no hay selección
        razaSelect.disabled = true;
    }
}

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










