let list = document.querySelectorAll(".navegacion li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
  
  // Store the selected item in local storage
  localStorage.setItem("activeNav", this.textContent);
}

// Function to apply the hovered class based on local storage
function applyActiveLink() {
  const activeNav = localStorage.getItem("activeNav");
  if (activeNav) {
    list.forEach((item) => {
      if (item.textContent === activeNav) {
        item.classList.add("hovered");
      }
    });
  }
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Apply the active link on page load
applyActiveLink();
