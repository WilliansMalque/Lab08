<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApPaterno"]) || empty($_POST["txtApMaterno"]) || empty($_POST["txtFechaNacimiento"]) || empty($_POST["txtCelular"]) || empty($_POST["txtHabitacion"])|| empty($_POST["txtfechaReserva"])|| empty($_POST["txtNumerodePersonas"])){
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombres = $_POST["txtNombres"];
$ap_paterno = $_POST["txtApPaterno"];
$ap_materno = $_POST["txtApMaterno"];
$fecha_nacimiento = $_POST["txtFechaNacimiento"];
$celular = $_POST["txtCelular"];
$hab = $_POST["txtHabitacion"];
$fecha_reserva = $_POST["txtfechaReserva"];
$numero_personas = $_POST["txtNumerodePersonas"];

$sentencia = $bd->prepare("INSERT INTO persona(nombres,apellido_paterno,apellido_materno,fecha_nacimiento,celular,Habitacion,fechaReserva,NumerodePersonas) VALUES (?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nombres, $ap_paterno, $ap_materno, $fecha_nacimiento, $celular, $hab, $fecha_reserva, $numero_personas]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}