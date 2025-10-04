<?php
session_start();
require_once '../config.php';
include "cconsultas.php";

$res = new Controler;
$path = "imagenes/" . basename($_FILES['foto']['name']);
if (move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {
    $response = $res->login($_POST["username"], $path);
    // echo $response["nombre"];
    $_SESSION['nombre'] = $response["nombre"];
    $_SESSION['email'] = $response["email"];
    $_SESSION['usuario'] = $response["usuario"];
    $_SESSION['tipo'] = $response["tipo"];
    $_SESSION['foto'] = $response["imagen"]["secure_url"];
    $_SESSION['fechainidash'] = '2023-01-01';
    $_SESSION['fechafindash'] = '2023-12-30';
    header("Location: ".$ServidorName."/home.php");
} else {
    echo "El archivo no se ha subido correctamente";
}