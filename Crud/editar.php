<?php 
    include("conexion.php");
?>

<html>
<head>
<title>EDITAR</title>
<link rel="stylesheet"type="text/css" href="crud.css">
</head>
<body>
    <?php
    if(isset($_POST["enviar"])){
        //aqui entra cuando se presiona el boton de enviar
        $Id=$_POST['Id'];
        $Mascota=$_POST['Mascota'];
        $Representante=$_POST['Representante'];
        //update pacientes set Mascota=$Mascota,Representante=$Representante where Id=$Id
        $sql="update pacientes set Mascota='".$Mascota."',
        Representante='".$Representante."' where Id='".$Id."'";
        $resultado=mysqli_query($conexion,$sql);

        if($resultado){
            echo"<script languaje='JavaScript'>
            alert('Los datos se actualizaron correctamente');
            location.assign('index.php');
            </script>";
        }else{
            echo"<script languaje='JavaScript'>
            alert('Los datos NO se actualizaron');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{
    //aqui entra si NO se ha presionado el boton de enviar
       
        $Id=$_GET['Id'];
        $sql="select * from pacientes where Id='".$Id."'";
        $resultado=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_assoc($resultado);
        $Mascota=$fila["Mascota"];
        $Representante=$fila["Representante"];

        mysqli_close($conexion);
    ?>
    <h1>Editar Paciente</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>"method="post">
        <label>Mascota:</label>
        <input type="text" name="Mascota" 
        value="<?php echo $Mascota; ?>"> <br>

        <label>Representante</label>
        <input type="text" name="Representante" 
        value="<?php echo $Representante; ?>"> <br>

        <input type="hidden" name="Id" 
        value="<?php echo $Id; ?>">

        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php">Regresar</a>
    </form>
    <?php
        }
    ?>
</body>
</html>