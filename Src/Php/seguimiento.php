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
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="pulse-outline"></ion-icon>
                            </span>
                            <span class="title">Seguimiento</span>
                        </a>
                    </li>
                    <!-- ------- PROXIMAMENTE ------- -->

                    <!-- <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="trending-up-outline"></ion-icon>                            
                            </span>
                            <span class="title">Inversión</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title">Ajustes</span>
                        </a>
                    </li> -->
    
                    <li>
                        <a href="/index.php">
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
            <table id="example" class=" hover row-border" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre del Lote</th>
                        <th>Tipo de Animal</th>
                        <th>Cifra</th>
                        <th>Raza</th>
                        <th>Etapa</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                    <tbody id="tableBody">
                        <!-- <td>1</td>
                        <td>200</td>
                        <td>Secretary</td>
                        <td>Pollo</td>
                        <td>Engorde</td>
                        <td>Crecimiento</td>
                        <td>2010-02-12</td>
                        <td>
                            <button class="uniBtn" onclick="openEditModal()">Editar</button>
                            <button class="uniBtn1">Eliminar</button>
                        </td> -->
                    </tbody>
            </table>
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
                                    <label>Cifra:</label>
                                    <input type="number" id="editCantidad" required placeholder="Ingrese la cantidad">
                                </div>

                                <div class="form_control">
                                        <label>Etapa:</label>
                                        <select id="Etapa" name="Etapa" required>
                                            <option value="" disabled selected>-- Selecciona una opción --</option>
                                            <option value="Etapa">Crecimiento</option>
                                            <option value="Etapa">Desarollo</option>
                                            <option value="Etapa">Venta</option>
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
    <script>
        function openEditModal() {
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function saveChanges() {
            // Logic to save changes goes here
            // For example, you might want to gather data from the form and send it to the server
            const cantidad = document.getElementById('editCantidad').value;
            const etapa = document.getElementById('Etapa').value;
            const fecha = document.getElementById('editFecha').value;

            // Here you would typically send this data to the server via AJAX or a form submission
            console.log('Saving changes:', { cantidad, etapa, fecha });

            // Close the modal after saving
            closeEditModal();
        }
    </script>
    <script src="/Src/Js/Home.js"></script>
    <script src="/Src/Js/DataTable.js"></script>
    <script src="/Src/Js/regis.js"></script>
     

</body>
</html>
