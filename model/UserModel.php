<?php
#EXTENSIÓN DE CLASE
require_once "model/conexion.php";
class datos extends conexion
{

    #REGISTRO DE USUARIO
    #----------------------------------------------------------------------------------
    public function registroUsuarioModel($datos, $tabla)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla(Usuario,password,Email)
VALUES(:usuario,:password,:email)");

        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindparam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindparam(":email", $datos["email"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "success";
        } else {
            return "error";
        }
        #$stmt->close();
    }
    #INGRESO USUARIO
    #---------------------------------------------------------------------------------- 
    public function ingresoUsuarioModel($datos, $tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE Usuario=:usuario");
        $stmt->bindparam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        #$stmt->close();
    }
    #VISTA USUARIO
    #----------------------------------------------------------------------------------
    public function vistaUsuarioModel($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT idUsuario,
         usuario, password, email FROM $tabla");
        $stmt->execute();
        return $stmt->fetchall();
        #$stmt->close();
    }
    #Editar USUARIO
    #----------------------------------------------------------------------------------
    public function EditarUsuarioModel($datos, $tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT idUsuario,
         usuario, password, email FROM $tabla where idUsuario=:id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        #$stmt->close();
    }
    #ACTUALIZAR USURIO
    #----------------------------------------------------------------------------------
    public function actualizarUsuarioModel($datos, $tabla)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET Usuario=:usuario, password=:password, Email=:email WHERE IdUsuario=:id");

        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "success";
        } else {
            return "error";
        }
        #$stmt=close();
    }
    #BORRAR USUARIO
    #----------------------------------------------------------------------------------
    public function borrarUsuarioModel($datos,$tabla){
        $stmt=conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario=:idBorrar");
        $stmt->bindParam(":idBorrar",$datos,PDO::PARAM_INT);
        IF($stmt->execute()){
            return "success";
        }
        else {
            return "error";
        }
        #$stmt->close();
    }
}
