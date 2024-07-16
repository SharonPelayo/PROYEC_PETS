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
    $password = $_POST["password"];

$query = mysqli_query($conn,"select * FROM usuario WHERE email ='".$nombre."' and clave ='".$password."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
//    header("location: chat4.html"); // sirve para recargar la pagina inicial
    echo "<script> alert('Bienvenido! ingreso exitoso.');window.location= 'chat4.html' </script>";
}
else if ($nr == 0)
{
  //  echo "No ingreso los Datos Correctos por favor Valide.";
    echo "<script> alert('Error: No ingreso los Datos Correctos por favor Valide.');window.location= 'chat2.html' </script>";
    
}
// Cerrar la conexión
mysqli_close($conn);
?>



<!-- INSERT INTO `usuario` (`NOMBRE_COMPLETO`, `EMAIL`, `CLAVE`) VALUES ('sharon', 'sharon@gmail.com', '12345'); -->