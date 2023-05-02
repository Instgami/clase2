<?php
include_once "modelo/User.php";
// incluimos el modelo
$oUsuario= new User();
// creamos el objeto Usuario primero el nombre del objeto despues el igual seguido de la palabra new y despues el nombre que tiene la clase en el modelo

if(isset($_POST['cc'])&&isset($_POST['fullname'])&&isset($_POST['password'])&&isset($_POST['email'])){
    // validamos que el formulario haya sido enviado

    $doc=Conexion::limpiar($_POST['cc']);
    $nom=Conexion::limpiar($_POST['fullname']);
    $email=Conexion::limpiar($_POST['email']);
    $clave=Conexion::limpiar($_POST['password']);
    $tel=Conexion::limpiar($_POST['phonenumber']);
    $fec_nac=Conexion::limpiar($_POST['birthdate']);
    $sexo=Conexion::limpiar($_POST['genre']);   
    $tipo= "Paciente";
    // capturamos los valores del formulario en variables
    $claveencriptada = password_hash($clave, PASSWORD_DEFAULT);
    // encriptamos la clave

    $oUsuario->nuevoUsuario($email,$claveencriptada,$tipo,$nom);
    // registramos el usuario llamando a la funcion nuevoUsuario
    $oUsuario->nuevoPaciente($doc,$nom,$tel,$fec_nac,$sexo);
    // registrarmos el paciente llamando a la funcion o metodo nuevoPaciente


}
?>