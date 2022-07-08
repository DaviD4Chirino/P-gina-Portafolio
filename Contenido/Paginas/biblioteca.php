<?php
include_once '..\header.php';
include_once '..\dbh.inc.php';
include_once '../Include/navbar.php';
include_once '../Include/functionBiblioteca.inc.php';
?>
<title>Bliblioteca</title>

</head>

<body class="w3-dark-gray text-black" id="biblioteca">

    <div w3-include-html="../Include/navbar.html"></div>

    <br><br><br>
    <div class="w3-border-top w3-border-bottom container  w3-black w3-round w3-container">
        <h1 class="w3-wide w3-center w3-padding-large">
            LA BIBLIOTECA DE DAVID
        </h1>
    </div>
    <br>
    <div class="container w3-white w3-round w3-text-black">
        <br><br>
        <div class=" row card-group row-cols-2 row-cols-md-4 g-4" >


          <?php bibliotecaCartas($conn) ?>
        </div>
        <br><br>
    </div>
<?php
include_once '../footer.php'
?>
