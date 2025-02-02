<!DOCTYPE html>
<html lang="es">
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
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Src/Php/Animale.php">
                            <span class="icon"><ion-icon name="paw-outline"></ion-icon></span>     
                            <span class="title">Animales</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Src/Php/Inventario.php">
                            <span class="icon"><ion-icon name="map-outline"></ion-icon></span>
                            <span class="title">Inventario</span>
                        </a>
                    </li>
                    <li>
                        <a href="/index.php">
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
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
                    <button id="openFormBtn">Ingresar</button>
                </div>

                <!-- Tabla de Animales -->
                <table id="example" class="hover row-border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre del Lote</th>
                            <th>Tipo de Animal</th>
                            <th>Raza</th>
                            <th>Etapa</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Se cargará dinámicamente con DataTables -->
                    </tbody>
                </table>
            </div>

            <!-- Modal para agregar/editar animales -->
            <div class="dark_bg" style="display: none;">
                <div class="popup">
                    <header>
                        <h2 class="modalTitle">Rellenar el Formulario</h2>
                        <button class="closeBtn">&times;</button>
                    </header>

                    <div class="body">
                        <form id="myForm">
                            <div class="inputFieldContainer">
                                <div class="form_control">
                                    <label>Nombre del Lote:</label>
                                    <input type="text" id="fName" required>
                                </div>

                                <div class="form_control">
                                    <label>Tipo de Animal:</label>
                                    <select id="tipoAnimal" name="tipoAnimal" required onchange="updateRaza()">
                                        <option value="" disabled selected>-- Selecciona una opción --</option>
                                        <option value="pollos">Pollos</option>
                                        <option value="borrego">Borrego</option>
                                        <option value="chivo">Chivo</option>
                                    </select>
                                </div>

                                <div class="form_control">
                                    <label>Raza:</label>
                                    <select id="raza" name="raza" required>
                                        <option value="" disabled selected>-- Selecciona una opción --</option>
                                    </select>
                                </div>

                                <div class="form_control">
                                    <label>Etapa:</label>
                                    <select id="etapa" name="etapa" required>
                                        <option value="" disabled selected>-- Selecciona una opción --</option>
                                        <option value="Crecimiento">Crecimiento</option>
                                        <option value="Desarrollo">Desarrollo</option>
                                        <option value="Venta">Venta</option>
                                    </select>
                                </div>

                                <div class="form_control">
                                    <label>Fecha:</label>
                                    <input type="date" id="fecha" required>
                                </div>
                            </div>
                        </form>
                    </div>

                    <footer class="popupFooter">
                        <button form="myForm" class="submitBtn">Registrar</button>
                    </footer>
                </div>
            </div>
        </div>  
    </header>

    <!-- Scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="/Src/Js/Home.js"></script>
    <script src="/Src/Js/DataTable.js"></script>

    <script>
        document.getElementById('openFormBtn').addEventListener('click', function() {
            document.querySelector('.dark_bg').style.display = 'flex';
        });

        document.querySelector('.closeBtn').addEventListener('click', function() {
            document.querySelector('.dark_bg').style.display = 'none';
        });

        function updateRaza() {
            let tipoAnimal = document.getElementById('tipoAnimal').value;
            let razaSelect = document.getElementById('raza');

            razaSelect.innerHTML = '<option value="" disabled selected>-- Selecciona una opción --</option>';

            if (tipoAnimal === 'pollos') {
                razaSelect.innerHTML += '<option value="Plymouth Rock">Plymouth Rock</option>';
                razaSelect.innerHTML += '<option value="Cornish">Cornish</option>';
            } else if (tipoAnimal === 'borrego') {
                razaSelect.innerHTML += '<option value="Dorper">Dorper</option>';
                razaSelect.innerHTML += '<option value="Suffolk">Suffolk</option>';
            } else if (tipoAnimal === 'chivo') {
                razaSelect.innerHTML += '<option value="Boer">Boer</option>';
                razaSelect.innerHTML += '<option value="Saanen">Saanen</option>';
            }
        }
    </script>
</body>
</html>
