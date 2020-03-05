<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>template</title>
    <LINK href="view/estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <h1>logotipo</h1>
    </header>
    <?php

    include "User/NavigationView.php";
    ?>
    <section>
        <?php
        $nombrePaginas = new usuarioController();
        $nombrePaginas->enlacesPaginasController();
        ?>
    </section>
</body>

</html>