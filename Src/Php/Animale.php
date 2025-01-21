<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Src/Css/Home.css">
    <link rel="stylesheet" href="/Src/Css/Animales.css">
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
                        <a href="/Src/Home.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="/Src/Animale.php">
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
                        <a href="#">
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
                <div class="filterEntries">
                    <div class="filter">
                        <label for="search">Buscar:</label>
                        <input type="search" name="" id="search" placeholder="Fecha">
                    </div>
                </div>
                <div class="addMemberBtn">
                    <button id="newMemberBtn" style="margin-bottom: 30px;">Registrar</button>
                </div>
                <table>
                    <thead>
                        <tr class="heading">
                            <th>N Lote</th>
                            <th>Nombre Lote</th>
                            <th>Cantidad Lote</th>
                            <th>Animale</th>
                            <th>Raza</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="userInfo">
                        <tr>
                            <td>1</td>
                            <td>20
                                <!-- <select name="cantidad_lote">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> -->
                            </td>
                            <td>John Doe</td>
                            <td>30</td>
                            <td>New York</td>
                            <td>
                                <button><i class="fa-regular fa-eye"></i></button>
                                <button><i class="fa-regular fa-pen-to-square"></i></button>
                                <button><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
        
                <footer>
                    <div class="pagination">
                        <button>Prev</button>
                        <button class="active">1</button>
                        <button>2</button>
                        <button>3</button>
                        <button>4</button>
                        <button>5</button>
                        <button>Next</button> 
                    </div>
                </footer>
            </div>

            <!-- Popup Form for Adding New Member -->
            <div class="dark_bg" id="addMemberPopup">
                <div class="popup">
                    <header>
                        <h2 class="modalTitle">info</h2>
                        <button class="closeBtn" onclick="closePopup('addMemberPopup')">&times;</button>
                    </header>
                    <div class="body">
                        <form action="#" id="addMemberForm">
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
                                        <label for="fName">Nombre Lote:</label>
                                        <input type="text" name="" id="fName" required>
                                    </div>
                                </div>
                                <div class="postSalary">
                                    <div class="form_control">
                                        <label for="position">
                                            Cantidad Lote:
                                        </label>
                                            <select name="cantidad_lote">
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="25">25</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                    </div>
                                    <div class="form_control">
                                        <label for="salary">Animal:</label>
                                        <select name="">
                                            <option value="Pollo">Pollo</option>
                                            <option value="Borrego">Borrego</option>
                                            <option value="Chivos">Chivos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_control">
                                    <label for="sDate">Fecha:</label>
                                    <input type="date" name="" id="sDate" required>
                                </div>
                            </div>
                            <footer class="popupFooter">
                                <button type="submit" class="submitBtn">Registrar</button>
                            </footer>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- =========== Scripts =========  -->
    <script src="/Src/Js/Home.js"></script>
    <script src="/Src/Js/Table.js"></script>
</body>
</html>
