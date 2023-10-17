<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$idcompra = $_POST["idcompra"];

$estado = $_POST["estado_ingreso"];

$usuario = $_POST["Usu_registro"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Update_CompraRealizada_Estado(?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("iis", $idcompra, $estado, $usuario);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>