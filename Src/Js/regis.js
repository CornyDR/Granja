// Selección de elementos del DOM
var newMemberAddBtn = document.querySelector('.addMemberBtn'),
darkBg = document.querySelector('.dark_bg'),
darkBg1 = document.querySelector('.dark_bg1'),
popupForm = document.querySelector('.popup'),
popupForm1 = document.querySelector('.popup1'),
crossBtn = document.querySelector('.closeBtn'),
crossBtn1 = document.querySelector('.closeBtn1'),
submitBtn = document.querySelector('.submitBtn'),
modalTitle = document.querySelector('.modalTitle'),
modalTitle1 = document.querySelector('.modalTitle1'),
popupFooter = document.querySelector('.popupFooter'),
popupFooter1 = document.querySelector('.popupFooter1'),
form = document.querySelector('form'),
form = document.querySelector('form1'),
formInputFields = document.querySelectorAll('form input');

// Datos de ejemplo: RAZA por tipo de animal
const razasPorAnimal = {
    "pollos": ["Pollo Criollo", "Pollo de Engorde"],
    "borrego": ["Borrego Pelibuey", "Borrego Dorper"],
    "chivo": ["Chivo Boer", "Chivo Criollo"]
};

// Función para actualizar las opciones de RAZA según el tipo de animal seleccionado
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

// Datos de ejemplo: Productos por categoría
const inventario = {
    "Farmacos": ["A", "B"],
    "Alimentos": ["C", "D"],
    "Herramientas": ["F", "H"]
};

// Función para actualizar las opciones de productos según la categoría seleccionada
function updateP() {
    const categoria = document.getElementById("categoria");
    const PSelect = document.getElementById("producto");
    const selectedcategoria = categoria.value;

    PSelect.innerHTML = '<option value="" disabled selected>-- Selecciona una opción --</option>';

    if (selectedcategoria) {
        PSelect.disabled = false;
        const producto = inventario[selectedcategoria];
        producto.forEach(producto => {
            const option = document.createElement("option");
            option.value = producto;
            option.textContent = producto;
            PSelect.appendChild(option);
        });
    } else {
        PSelect.disabled = true;
    }
}

// Evento para abrir el formulario de ingreso
newMemberAddBtn.addEventListener('click', () => {
    darkBg.classList.add('active');
    popupForm.classList.add('active');
});

// Evento para cerrar el formulario de ingreso
crossBtn.addEventListener('click', () => {
    darkBg.classList.remove('active');
    popupForm.classList.remove('active');
    form.reset();
});