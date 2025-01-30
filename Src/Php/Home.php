<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Los Santos</title>
    <link rel="stylesheet" href="/Src/Css/Home.css">
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
    </header>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <!-- <div class="user">
                <ion-icon name="person-outline"></ion-icon>
            </div> -->
        </div>

        <!-- ======================= Tarjetas ================== -->
        <div class="cardBox">
            <div class="card">
                <div class="iconBx">
                    <a href="/Animale.php">
                        <div class="cardName">Animales</div>
                    </a>
                    
                </div>

                <div class="iconBx">
                    <a href="/Animale.php">
                        <ion-icon name="paw-outline"></ion-icon>
                    </a>
                </div>

            </div>

            <div class="card">
                <div class="iconBx">
                    <a href="/Salud.php">
                        <div class="cardName">Alimentos</div>
                    </a>
                </div>

                <div class="iconBx">
                    <a href="/">
                        <ion-icon name="restaurant-outline"></ion-icon>
                    </a>
                </div>

            </div>
        </div>
        
            <div class="container">
                <div class="chart">
                    <canvas id="barchart" ></canvas>
                </div>
                <div class="chart">
                    <canvas id="doughnut"  ></canvas>
                </div>
            </div>
    </div>


    <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>

    <!-- =========== Scripts =========  -->
        <script src="/Src/Js/Home.js"></script>
        <script src="/Src/Js/prueba2.js"></script>
        <script src="/Src/Js/prueba22.js"></script>

</body>
</html>