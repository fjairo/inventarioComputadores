<?php
session_start();
if(!$_SESSION["validar"]){
    header("location:index.php?action=EntranceView");
    exit();
}
?>

<h1>Página de inventario</h1>
<table border="1">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $ingreso = new usuarioController();
        $ingreso->vistaUsuarioController();
        $ingreso->borrarUsuarioController();
        ?>
    </tbody>
</table>
<?php
if(isset($_GET["action"])){
    if($_GET["action"]=="cambio"){
        echo "cambio exitoso";
    }
}
?>