<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Src/Css/Home.css">
    <link rel="stylesheet" href="/Src/Css/Animales.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <script src="/Src/Js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <title>Los Santos</title>
</head>
<body>
    <header>
        <!-- ====== Menu ====== -->
        <div class="container">
            <div class="navegacion">
                <ul>
                    <li>
                        <a href="#">
                            <span class="logo">
                                <img src="/img/8pre.png" alt="Logo">
                            </span>
                            <span class="title1">Granja Los Santos</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Src/Php/Home.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Src/Php/Animale.php">
                            <span class="icon">
                                <ion-icon name="paw-outline"></ion-icon>      
                            </span>                     
                            <span class="title">Animales</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Src/Php/Inventario.php">
                            <span class="icon">
                                <ion-icon name="map-outline"></ion-icon>                            
                            </span>
                            <span class="title">Inventario</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Src/Php/seguimiento.php">
                            <span class="icon">
                                <ion-icon name="pulse-outline"></ion-icon>
                            </span>
                            <span class="title">Seguimiento</span>
                        </a>
                    </li>
                    <li>
                        <a href="/index.php" id="logoutBtn">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Salir</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
            <div class="container-nav">
                <div class="addMemberBtn">
                    <button onclick="openIngresar()">Ingresar</button>
                </div>
                <table id="storage" class="hover row-border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Producto</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Los datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>

            <div class="dark_bg">
                <div class="popup">
                    <header>
                        <h2 class="modalTitle">Ingresar Mercancia</h2>
                        <button class="closeBtn" onclick="closeBtn()">&times;</button>
                    </header>
                    <div class="body">
                        <form action="#" id="myForm">
                            <div class="inputFieldContainer">
                                <div class="nameField">
                                    <div class="form_control">
                                        <label>Nombre del Producto:</label>
                                        <input type="text" name="nombreProducto" id="fName" maxlength="20" required>
                                    </div>
                                    <div class="form_control">
                                        <label>Categoria:</label>
                                        <select id="categoria" name="categoria" required onchange="updateP()">
                                            <option value="" disabled selected>-- Selecciona una opción --</option>
                                            <option value="Farmacos">Farmacos</option>
                                            <option value="Alimentos">Alimentos</option>
                                            <option value="Herramientas">Herramientas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ageCityField">
                                    <div class="form_control">
                                        <label>Producto:</label>
                                        <select id="producto" name="producto" required>
                                            <option value="" disabled selected>-- Selecciona una opción --</option>
                                        </select>
                                    </div>
                                    <div class="form_control d-flex align-items-center">
                                        <label for="cantidad">Cifra:</label>
                                        <input type="number" id="cifra" name="cifra" required pattern="\d{1,3}" oninput="if(this.value.length > 3) this.value = this.value.slice(0, 3);">
                                    </div>
                                    <div class="form_control">
                                        <label for="unidad">Cantidad:</label>
                                        <select id="unidad" name="unidad" required>
                                            <option value="" disabled selected>-- Selecciona una opción --</option> 
                                            <option value="unidad">Unidad (U)</option>
                                            <option value="kg">Kilogramos (Kg)</option>
                                            <option value="gm">Gramos (Gm)</option>
                                        </select>
                                    </div>
                                    <div class="form_control">
                                        <label>Fecha:</label>
                                        <input type="date" name="fecha" id="fecha" required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <footer class="popupFooter">
                        <button form="myForm" class="submitBtn">Registrar</button>
                    </footer>
                </div>
            </div>

            <div class="dark_bg1" id="editModal">
                <div class="popup1">
                    <header>
                        <h2 class="modalTitle1">Editar Mercancía</h2>
                        <button class="closeBtn1" onclick="closeEditModal()">&times;</button>
                    </header>
                    <div class="body">
                        <form id="editForm">
                            <div class="inputFieldContainer">
                                <div class="form_control">
                                    <label>Nombre del Producto:</label>
                                    <input type="text" id="editProductName" maxlength="20" required>
                                </div>
                                <div class="form_control">
                                    <label>Categoria:</label>
                                    <select id="editCategoria" required>
                                        <option value="" disabled selected>-- Selecciona una opción --</option>
                                        <option value="Farmacos">Farmacos</option>
                                        <option value="Alimentos">Alimentos</option>
                                        <option value="Herramientas">Herramientas</option>
                                    </select>
                                </div>
                                <div class="form_control">
                                    <label>Cifra:</label>
                                    <input type="number" id="editCantidad" required pattern="\d{1,3}" oninput="if(this.value.length > 3) this.value = this.value.slice(0, 3);">
                                </div>
                                <div class="form_control">
                                    <label for="unidad">Cantidad:</label>
                                    <select id="editUnidad" name="unidad" required>
                                        <option value="" disabled selected>-- Selecciona una opción --</option>
                                        <option value="unidad">Unidad</option>
                                        <option value="kg">Kilogramos (Kg)</option>
                                        <option value="gm">Gramos (Gm)</option>
                                    </select>
                                </div>
                                <div class="form_control">
                                    <label>Fecha:</label>
                                    <input type="date" id="editFecha" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <footer class="popupFooter1">
                        <button class="submitBtn1" onclick="saveChanges()">Guardar Cambios</button>
                    </footer>
                </div>
            </div>
        </div>
    </header>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- =========== Scripts =========  -->
    <script src="/Src/Js/Home.js"></script>
    <script src="/Src/Js/Inventario.js"></script>
    <script src="/Src/Js/regis.js"></script>
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm('¿Estás seguro de que deseas salir?')) {
                // Limpiar la sesión o cualquier dato de autenticación
                sessionStorage.clear();
                localStorage.clear();
                // Redirigir al usuario a la página de inicio de sesión
                window.location.href = '/index.php';
            }
        });

        // Evitar que el usuario regrese a la página anterior después de cerrar sesión
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>