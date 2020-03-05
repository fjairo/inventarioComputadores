  <?php
  session_start();
  if (!$_SESSION["validar"]) {
    header("location:index.php?action=vistaUsuarioIngreso");
    exit();
  }
  ?>
  <h1>editar</h1>

  <form method="post">
    <?php
    $editarUsuario = new usuarioController();
    $editarUsuario->editarUsuarioController();
    $editarUsuario->actualizarUsuarioController();
    ?>
  </form>
  
 