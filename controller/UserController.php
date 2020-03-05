<?php
class usuarioController
{

    public function visualizarTemplate()
    {
        include "view/templateVista.php";
    }

    public function enlacesPaginasController()
    {
        if (isset($_GET["action"])) {
            $enlaces = $_GET["action"];
        } else {
            $enlaces = "RecordView";
        }
    $respuesta = enlacesModel::enlacesPaginasModel($enlaces);
        include $respuesta;
    }
    #REGISTRO USUARIOS
    public function registroUsuarioController()
    {
        if (isset($_POST["registroUsuario"])) {
            $datos = array(
                "usuario" => $_POST["registroUsuario"],
                "password" => $_POST["registroPassword"],
                "email" => $_POST["registroEmail"]
            );
            $respuesta = datos::registroUsuarioModel($datos, "usuarios");
            
            if ($respuesta == "success") {
                header("location:index.php?action=ok");
            } else {
                header("location:index.php");
            }
        }
    }
    #INGRESO DE USUARIO
    #----------------------------------------
    public function ingresoUsuarioController()
    {
        if (isset($_POST["usuarioIngreso"])) {
            $datos = array(
                "usuario" => $_POST["usuarioIngreso"],
                "password" => $_POST["passwordIngreso"]
            );
            $respuesta = datos::ingresoUsuarioModel($datos, "usuarios");
            if (
                $respuesta["usuario"] == $_POST["usuarioIngreso"] &&
                $respuesta["password"] == $_POST["passwordIngreso"]
            ) {
                session_start();
                $_SESSION["validar"] = true;
                header("location:Index.php?action=InventoryView");
            } else {
                header("location:index.php?action=fallo");
            }
        }
    }

    # VISTA USUARIOS
    #---------------------------------------
    public function vistaUsuarioController()
    {
        $respuesta = datos::vistaUsuarioModel("usuarios");
        foreach ($respuesta as $row => $item) {
            echo '<tr>
                <td>' . $item["usuario"] . '</td>
                <td>' . $item["password"] . '</td>
                <td>' . $item["email"] . '</td>
                <td><a href="index.php?action=EditView&id=' . $item["idUsuario"] . '"><button>Editar</button></a></td>
                <td><a href="index.php?action=InventoryView&&idBorrar=' . $item["idUsuario"] . '"><button>Borrar</button></td>
             </tr>';
        }
    }
    public function editarUsuarioController()
    {
        $datos = $_GET["id"];
        $respuesta = datos::editarUsuarioModel($datos, "usuarios");

        echo '<input type="hidden" value="' . $respuesta["idUsuario"] . '" name="idEditar">
        <input type="text" value="' . $respuesta["usuario"] . '" name="usuarioEditar" require>
        <input type="text" value="' . $respuesta["password"] . '" name="passwordEditar" require>
        <input type="text" value="' . $respuesta["email"] . '" name="emailEditar" require>
        <input type="submit" value="Actualizar">';
    }
    public function actualizarUsuarioController()
    {
        if (isset($_POST["usuarioEditar"])) {
            $datos = array(
                "id" => $_POST["idEditar"],
                "usuario" => $_POST["usuarioEditar"],
                "password" => $_POST["passwordEditar"],
                "email" => $_POST["emailEditar"]
            );
            $respuesta = datos::actualizarUsuarioModel($datos, "usuarios");
            if ($respuesta == "success") {
                header("location:index.php?action=cambio");
            } else {
                echo "error";
            }
        }
    }
    #BORRAR USUARIO CONTROLLER
    public function borrarUsuarioController()
    {
        if (isset($_GET["idBorrar"])) {

            $datos = $_GET["idBorrar"];
            $respuesta=datos::borrarUsuarioModel($datos,"usuarios");
            if($respuesta=="success"){
                header("location.index.php?action=usuarios");
            }
        }
    }
}
