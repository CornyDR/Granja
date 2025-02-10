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
            <table id="example" class="hover row-border" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre del Lote</th>
                        <th>Tipo de Animal</th>
                        <th>Cifra</th>
                        <th>Raza</th>
                        <th>Fecha Entrada</th>
                        <th>Fecha Salida</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                    <tbody id="tableBody">
                        <tr>
                            <td>1</td>
                            <td>200</td>
                            <td>Secretary</td>
                            <td>Pollo</td>
                            <td>Engorde</td>
                            <td>2010-02-12</td>
                            <td>2010-02-20</td>
                            <td>
                                <button class="uniBtn" onclick="openEditModal()">Editar</button>
                                <button class="uniBtn1" onclick="deleteRecord(1)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
            </table>
            </div>
            <div class="dark_bg1" id="editModal">
                <div class="popup1">
                    <header>
                        <h2 class="modalTitle1">Agregar/Editar Mercancía</h2>
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
            const cantidad = document.getElementById('editCantidad').value;
            const fecha = document.getElementById('editFecha').value;

            // Aquí enviarías los datos al servidor mediante AJAX
            $.ajax({
                url: '/Src/Php/BD_Animales.php',
                type: 'POST',
                data: {
                    cantidad: cantidad,
                    fecha: fecha
                },
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                    if (response.success) {
                        $('#editForm')[0].reset();
                        closeEditModal();
                        $('#example').DataTable().ajax.reload();
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        }

        function deleteRecord(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
                $.ajax({
                    url: '/Src/Php/BD_Animales.php',
                    type: 'POST',
                    data: { eliminar_id: id },
                    dataType: 'json',
                    success: function(response) {
                        alert(response.message);
                        if (response.success) {
                            $('#example').DataTable().ajax.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            }
        }
    </script>
    <script src="/Src/Js/Home.js"></script>
    <script src="/Src/Js/Seguimiento.js"></script>
    <script src="/Src/Js/regis.js"></script>
     

</body>
</html>
