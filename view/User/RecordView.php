<h1>registro de usuario</h1>

<form method="post">
    <input type="text" placeholder="usuario" name="registroUsuario" required>
    <input type="password" placeholder="contraseña" name="registroPassword" required>
    <input type="email" placeholder="email" name="registroEmail" required>
    <input type="submit" value="Enviar">
</form>


<?php

$registro = new usuarioController();
$registro->registroUsuarioController();
if (isset($_GET["action"])) {
    if ($_GET["action"] =="ok") {
        echo "registro exitoso";
    }
}

?>