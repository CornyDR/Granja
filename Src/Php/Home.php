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
    
                    <!-- <li>
                        <a href="/Src/Php/Inventario.php">
                            <span class="icon">
                                <ion-icon name="map-outline"></ion-icon>                            
                            </span>
                            <span class="title">Inventario</span>
                        </a>
                    </li> -->

                    <li>
                        <a href="/Src/Php/seguimiento.php">
                            <span class="icon">
                                <ion-icon name="pulse-outline"></ion-icon>
                            </span>
                            <span class="title">Seguimiento</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="#" id="logoutBtn">
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
        </div>

        <!-- ======================= Tarjetas ================== -->
        <div class="cardBox">
            <div class="card">
                <div class="iconBx">
                    <a href="/Src/Php/Animale.php">
                        <div class="cardName">Animales</div>
                    </a>
                    
                </div>

                <div class="iconBx">
                    <a href="/Src/Php/Animale.php">
                        <ion-icon name="paw-outline"></ion-icon>
                    </a>
                </div>

            </div>

            <div class="card">
                <div class="iconBx">
                    <a href="/Src/Php/seguimiento.php">
                        <div class="cardName">Seguimiento</div>
                    </a>
                </div>

                <div class="iconBx">
                    <a href="/Src/Php/seguimiento.php">
                    <ion-icon name="pulse-outline"></ion-icon>

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