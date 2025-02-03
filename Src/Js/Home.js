// añadir clase hovered al elemento de lista seleccionado
let list = document.querySelectorAll(".navegacion li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navegacion");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

$(document).ready(function() {
  // Al hacer clic en el botón "Ingresar", mostrar el formulario
  $(".addMemberBtn button").click(function() {
      $(".dark_bg").css("display", "flex"); // Mostrar el formulario
  });

  // Al hacer clic en el botón de cerrar (X), ocultar el formulario
  $(".closeBtn").click(function() {
      $(".dark_bg").css("display", "none"); // Ocultar el formulario
  });
});

