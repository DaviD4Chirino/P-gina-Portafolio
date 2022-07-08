<?php
include_once 'header.php';
include_once './Include/navbar.php';
?>
<title>Portafolio de David</title>
</head>

<body class=" w3-theme-d4 w3-container">
  <br>
    <div class="w3-center">
        <img src="./img/misterio.jpg" alt="David Misterioso"
            class=" rounded-1 animate__animated animate__fadeIn" style="width: 22%">
        <h1 class="w3-wide text-center">DAVID CHIRINO</h1>
        <p class="text-center">Algo más, otra cosa, y otra más</p>
        <footer class="container">
        </footer>
    </div><br>
    <div class="container">
        <div class="row align-items-start">
            <div class="col w3-center">
                <a href="./Paginas/biblioteca.php" class="text-white btn hvr-underline-from-center" type="button">
                    <img src="./svg/white/book-open.svg" alt="" style="height: 80px;">
                    <footer>
                        <h4 class="w3-center w3-margin-top">
                            Biblioteca
                        </h4>
                    </footer>
                </a>
            </div>
            <div class="col w3-center w3-disabled">
                <a href="./Paginas/blog.html" class="text-white btn w3-ripple hvr-underline-from-center">
                    <img src="./svg/white/pen-tool.svg" alt="" style="height: 80px;">
                    <footer>
                        <h4 class="w3-center w3-margin-top">
                            Blog Personal
                        </h4>
                    </footer>
                </a>
            </div>
            <div class="col w3-center w3-disabled">
                <a href="./Paginas/about.html" class="text-white btn w3-ripple hvr-underline-from-center ">
                    <img src="./svg/white/user.svg" alt="" style="height: 80px;">
                    <footer>
                        <h4 class="w3-center w3-margin-top">
                            Acerca de mi
                        </h4>
                    </footer>
                </a>
            </div>
        </div>
    </div>
    <?php
include_once 'footer.php'
?>
