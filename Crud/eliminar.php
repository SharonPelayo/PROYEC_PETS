<?php
$Id = $_GET['Id'];
include("conexion.php");

//delete from Mascota where Id=$Id
$sql="delete from pacientes where Id ='".$Id."'";
$resultado=mysqli_query($conexion,$sql);

if($resultado){
    echo "<script languaje='JavaScript'>
    alert('Los datos se eliminaron correctamente de la BD');
    location.assign('index.php');</script>";
}else{
    echo "<script languaje='JavaScript'>
    alert('Los datos NO se eliminaron de la BD');
    location.assign('index.php');</script>";

}