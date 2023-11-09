<?php
//Información del grabador
$nvr_ip = $_POST["ip"];
$nvr_puerto = $_POST["puerto"];;
$fecha = date("Y/m/d", time());
$hora = date("G:i:s", time());

$cadena_inicio = $_POST["inicio"];
$id_usuario = $_POST["id"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

//Información de la conexión
$tiempo = 30;

//Se establece una conexión al NVR mediante TCP
$conexion = fsockopen($nvr_ip, $nvr_puerto, $errno, $errstr, $tiempo);

if (!$conexion) {
    //Si no hay conexión, imprime el error.
    echo "$errstr ($errno)<br />\n";
}else{
    //Se concatenan los datos a imprimir.        \r\n = ENTER
    $datos = "$cadena_inicio\r\n";
    $datos .= "Fecha: $fecha\r\n";
    $datos .= "Hora: $hora\r\n";
    $datos .= "ID: $id_usuario\r\n";
    $datos .= "Nombre: $nombre\r\n";
    $datos .= "Correo: $correo\r\n";
    $datos .= "Mensaje: $mensaje\r\n";
    $datos .= "---------------------------------------\r\n";

    //Se envían los datos al NVR
    fwrite($conexion, $datos);

    //Se cierra la conexión TCP con el grabador
    fclose($conexion);

    echo "OK";
}
?>