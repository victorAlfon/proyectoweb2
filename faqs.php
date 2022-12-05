<?php
session_start();
if(isset($_SESSION['mat'])){
    if($_SESSION['puesto']=="admin"){
        header("Location: inicio.php");
    }else{
        if($_SESSION['puesto']=="pfsr"){
            header("Location: inicioprofe.php");
        }else{
            if($_SESSION['puesto']=="almo"){
                header("Location: inicioalu.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/773b4a8b32.js" crossorigin="anonymous"></script>
        <title>Login</title>
        <link rel="stylesheet" href="main.css">
        <style type="text/css">
            body {
            width: 100%;
            height: 100vh;
            
            background-size: 300% 300%;
            background-image: linear-gradient(
                    -45deg, 
                    #023064, #FFFFFF, #e08005, #023064);
            
            animation: AnimateBG 20s ease infinite;
            }
            
            @keyframes AnimateBG { 
            0%{background-position:0% 50%}
            50%{background-position:100% 50%}
            100%{background-position:0% 50%}
            }
            </style>
    </head>
    <body>
        <header>
            <nav>
                <a href="index.html"><img class="logo" src="logo.jpg" alt="logo"></a>

                <ul class="enlaces-menu">
                    <li><a href="index.php"><i class="fa-solid fa-house"></i>&nbsp;Inicio</a></li>
                    <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;Iniciar Sesión</a></li>
                    <!-- <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Buscar</a></li> -->
                    <li><a href="faqs.php"><i class="fa-solid fa-question"></i>&nbsp;FAQ's</a></li>
                    <li><a href="contacto.php"><i class="fa-solid fa-comment"></i>&nbsp;Contacto</a></li>
                </ul>

                <button class="ham" type="button">   
                    <span class="br-1"></span>
                    <span class="br-2"></span>
                    <span class="br-3"></span>
                </button>                       
            </nav>
        </header>
        <div class="faqs">
            <details>
                <summary>Here is the question</summary>
                    <div class="faqs-content">
                        <p class="faqs-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sapiente tenetur ullam ad harum esse aperiam. Sit recusandae praesentium odit dignissimos blanditiis, eos doloribus dolorem doloremque, ipsa aperiam amet provident.</p>
                    </div>
            </details>
            <details>
                <summary>Here is the question</summary>
                    <div class="faqs-content">
                        <p class="faqs-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sapiente tenetur ullam ad harum esse aperiam. Sit recusandae praesentium odit dignissimos blanditiis, eos doloribus dolorem doloremque, ipsa aperiam amet provident.</p>
                    </div>
            </details>
            <details>
                <summary>Here is the question</summary>
                    <div class="faqs-content">
                        <p class="faqs-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sapiente tenetur ullam ad harum esse aperiam. Sit recusandae praesentium odit dignissimos blanditiis, eos doloribus dolorem doloremque, ipsa aperiam amet provident.</p>
                    </div>
            </details>
        </div>
        <script src="main.js"></script>
    </body>
    </html>