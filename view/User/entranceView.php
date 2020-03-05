<h1>pagina ingreso</h1>
<form method="post">
    <input type="text" placeholder="usuario" name="usuarioIngreso" require>
    <input type="password" placeholder="password" name="passwordIngreso" require>
    <input type="submit" value="enviar">
</form>

<?php

$ingreso = new usuarioController();
$ingreso->ingresoUsuarioController();
if (isset($_GET["action"])) {
    if ($_GET["action"] =="fallo") {
        echo "fallo al ingresar";
    }
}

?>