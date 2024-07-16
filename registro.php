<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "petsfriend";

// Crear la conexión
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Verificar la conexión
if (!$conn) 
{
    die("La conexión ha fallado: " .mysqli_connect_error());
}

    $nombre = $_POST["username"];
    $correo= $_POST["email"];
    $password = $_POST["password"];

    
$query = mysqli_query($conn,"INSERT INTO usuario (Nombre_Completo, email, clave) VALUES ( '".$nombre."','".$correo."','".$password."')");

echo "<script> alert('Bienvenido: Su Registro ha sido Exitoso!!!');window.location= 'chat2.html' </script>";


// Cerrar la conexión
mysqli_close($conn);

?>



<!-- INSERT INTO `usuario` (`NOMBRE_COMPLETO`, `EMAIL`, `CLAVE`) VALUES ('sharon', 'sharon@gmail.com', '12345'); -->