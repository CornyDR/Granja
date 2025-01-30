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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <a href="#">
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
            <div class="addMemberBtn">
                <button>Ingresar</button>
            </div>
            <table id="example" class=" hover row-border" style="width:90%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoria</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
    
                <tr>
                    <td>1</td>
                    <td>Hope Fuentes</td>
                    <td>Secretary</td>
                    <td>San Francisco</td>
                    <td>2010-02-12</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Vivian Harrell</td>
                    <td>Financial Controller</td>
                    <td>San Francisco</td>
                    <td>2009-02-14</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Timothy Mooney</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>2008-12-11</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Jackson Bradshaw</td>
                    <td>Director</td>
                    <td>New York</td>
                    <td>2008-09-26</td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>2011-01-25</td>
                </tr>
                </tbody>
            </table>
            </div>

            <div class="dark_bg">
        
                <div class="popup">
                     <header>
                        <h2 class="modalTitle"></h2>
                        <button class="closeBtn">&times;</button>
                     </header>
        
                     <div class="body">
                        <form action="#" id="myForm">
                            <div class="inputFieldContainer">
        
                                <div class="nameField">
                                    <div class="form_control">
                                    <label>Categoria:</label>
                                        <select id="categoria" name="categoria" required onchange="updateP()">
                                            <option value="" disabled selected>-- Selecciona una opción --</option>
                                            <option value="Farmacos">Farmacos</option>
                                            <option value="Alimentos">Alimentos</option>
                                            <option value="Herramientas">Herramientas</option>
                                        </select>
                                    </div>
        
                                    <div class="form_control">
                                        <label>Producto:</label>
                                        <select id="producto" name="producto" requireds>
                                            <option value="" disabled selected>-- Selecciona una opción --</option>
                                        </select>
                                        
                                    </div>
                                </div>
        
                                <div class="ageCityField">
                                    <div class="form_control">
                                        <label>Cantidad:</label>
                                        <select id="raza" name="raza" required>
                                            <option value="" disabled selected>-- Selecciona una opción --</option>
                                        </select>
                                    </div>
        
                                    <div class="form_control">
                                        <label>Fecha:</label>
                                        <input type="date" name="" id="fecha" required>
                                    </div>
                                </div>
                            </div>
                        </form>
                     </div>
        
                     <footer action="#" class="popupFooter" id="myForm">
                        <button form="myForm" class="submitBtn">Registrar</button>
                     </footer>
                </div>
        
            </div>
                
        </div>  
    </header>

        <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- =========== Scripts =========  -->
    <script src="/Src/Js/Home.js"></script>
    <script src="/Src/Js/DataTable.js"></script>
    <script src="/Src/Js/regisP.js"></script>
</body>
</html>