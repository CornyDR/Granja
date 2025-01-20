<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Css/Home.css">
    <link rel="stylesheet" href="/Css/Animales.css">
    <title>Document</title>
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
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
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
            <div class="container-nav" >
                    <div class="filterEntries">
                        <div class="entries">
                            Show <select name="" id="table_size">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries
                        </div>
        
                        <div class="filter">
                            <label for="search">Search:</label>
                            <input type="search" name="" id="search" placeholder="Enter name/city/post">
                        </div>
                    </div>
                    <div class="addMemberBtn">
                        <button>New member</button>
                    </div>
                <table>
                    <thead>
                        <tr class="heading">
                            <th>N Lote</th>
                            <th>Cantidad Lote</th>
                            <th>Animale</th>
                            <th>Raza</th>
                            <th>Fecha</th>

                        </tr>
                    </thead>
        
        
                    <tbody class="userInfo">
                         <tr><td class="empty" colspan="11" align="center">No data available in table</td></tr> -->
                         <tr>
                            <td>1</td>
                            <td><img src="./img/pic1.png" alt="" width="40" height="40"></td>
                            <td>John Doe</td>
                            <td>30</td>
                            <td>New York</td>
                            <td>Front-End Developer</td>
                            <td>$25000</td>
                            <td>03-08-2010</td>
                            <td>jhondoe.net111@gmail.com</td>
                            <td>924157812</td>
                            <td>
                                <button><i class="fa-regular fa-eye"></i></button>
                                <button><i class="fa-regular fa-pen-to-square"></i></button>
                                <button><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        <!-- </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="./img/pic1.png" alt="" width="40" height="40"></td>
                            <td>John Doe</td>
                            <td>30</td>
                            <td>New York</td>
                            <td>Front-End Developer</td>
                            <td>$25000</td>
                            <td>03-08-2010</td>
                            <td>jhondoe.net111@gmail.com</td>
                            <td>924157812</td>
                            <td>
                                <button><i class="fa-regular fa-eye"></i></button>
                                <button><i class="fa-regular fa-pen-to-square"></i></button>
                                <button><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr> -->
                    </tbody>
        
                </table>
        
        
                <footer>
                    <span class="showEntries">Showing 1 to 10 of 50 entries</span>
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
        
        
            <!--Popup Form-->
        
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
                                        <label for="fName">First Name:</label>
                                        <input type="text" name="" id="fName" required>
                                    </div>
        
                                    <div class="form_control">
                                        <label for="lName">Last Name:</label>
                                        <input type="text" name="" id="lName" required>
                                    </div>
                                </div>
        
                                <div class="ageCityField">
                                    <div class="form_control">
                                        <label for="age">Age:</label>
                                        <input type="number" name="" id="age" required>
                                    </div>
        
                                    <div class="form_control">
                                        <label for="city">City:</label>
                                        <input type="text" name="" id="city" required>
                                    </div>
                                </div>
        
                                <div class="postSalary">
                                    <div class="form_control">
                                        <label for="position">Position:</label>
                                        <input type="text" name="" id="position" required>
                                    </div>
        
                                    <div class="form_control">
                                        <label for="salary">Salary:</label>
                                        <input type="text" name="" id="salary" required>
                                    </div>
                                </div>
        
                                <div class="form_control">
                                    <label for="sDate">Start Date:</label>
                                    <input type="date" name="" id="sDate" required>
                                </div>
        
                                <div class="form_control">
                                    <label for="email">Email:</label>
                                    <input type="email" name="" id="email" required>
                                </div>
        
                                <div class="form_control">
                                    <label for="phone">Phone:</label>
                                    <input type="number" name="" id="phone" required>
                                </div>
                            </div>
                        </form>
                     </div>
        
                     <footer class="popupFooter">
                        <button form="myForm" class="submitBtn">Submit</button>
                     </footer>
                </div>
        
            </div>
        
        </div>
            
    </header>
        <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- =========== Scripts =========  -->
            <script src="Home.js"></script>
</body>
</html>