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

    <!-- <link rel="stylesheet" href="/Src/Css/Animales.css"> -->


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
                            <span class="title">Habitad</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="restaurant-outline"></ion-icon>
                            </span>
                            <span class="title">Alimentos</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="pulse-outline"></ion-icon>
                            </span>
                            <span class="title">Salud</span>
                        </a>
                    </li>

                    <li>
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
                    </li>
    
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
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
    
                <tr>
                    <td>Hope Fuentes</td>
                    <td>Secretary</td>
                    <td>San Francisco</td>
                    <td>41</td>
                    <td>2010-02-12</td>
                    <td>$109,850</td>
                </tr>
                <tr>
                    <td>Vivian Harrell</td>
                    <td>Financial Controller</td>
                    <td>San Francisco</td>
                    <td>62</td>
                    <td>2009-02-14</td>
                    <td>$452,500</td>
                </tr>
                <tr>
                    <td>Timothy Mooney</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>37</td>
                    <td>2008-12-11</td>
                    <td>$136,200</td>
                </tr>
                <tr>
                    <td>Jackson Bradshaw</td>
                    <td>Director</td>
                    <td>New York</td>
                    <td>65</td>
                    <td>2008-09-26</td>
                    <td>$645,750</td>
                </tr>

                <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011-01-25</td>
                    <td>$112,000</td>
                </tr>
                </tbody>
            </table>
            </div>

            <div class="dark_bg">
        
                <div class="popup">
                     <header>
                        <h2 class="modalTitle">Fill the Form</h2>
                        <button class="closeBtn">&times;</button>
                     </header>
        
                     <div class="body">
                        <form action="#" id="myForm">
                            <div class="imgholder">
                                <label for="uploadimg" class="upload">
                                    <input type="file" name="" id="uploadimg" class="picture">
                                    <i class="fa-solid fa-plus"></i>
                                </label>
                                <img src="./img/pic1.png" alt="" width="150" height="150" class="img">
                            </div>
        
                            <div class="inputFieldContainer">
        
                                <div class="nameField">
                                    <div class="form_control">
                                        <label for="fName">Nombre del Lote:</label>
                                        <input type="text" name="" id="fName" required>
                                    </div>
        
                                    <div class="form_control">
                                        <label for="lName">Tipo de Animal:</label>
                                        <select id="opciones" name="opciones" required>
                                            <option value="" disabled selected>-- Selecciona una opción --</option>
                                            <option value="1">Pollos</option>
                                            <option value="2">Borrego</option>
                                            <option value="3">Chivo</option>
                                        </select>
                                        
                                    </div>
                                </div>
        
                                <div class="ageCityField">
                                    <div class="form_control">
                                        <label for="age">Raza:</label>
                                        <select id="opciones" name="opciones" required>
                                            <option value="" disabled selected>-- Selecciona una opción --</option>
                                            <option value="1"></option>
                                            <option value="2"></option>
                                            <option value="3"></option>
                                        </select>
                                    </div>
        
                                    <div class="form_control">
                                        <label for="city">Fecha:</label>
                                        <input type="date" name="" id="city" required>
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
                
        </div>  
    </header>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- =========== Scripts =========  -->
    <script src="/Src/Js/Home.js"></script>
    <script src="/Src/Js/DataTable.js"></script>
    <script src="/Src/Js/regis.js"></script>
     

</body>
</html>
