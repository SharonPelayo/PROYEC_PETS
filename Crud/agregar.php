<html>
<head>
<title>AGREGAR</title>
<link rel="stylesheet"type="text/css" href="crud.css">
</head>
<body>
    <?php
    if( isset($_POST['enviar'])){
        $Mascota=$_POST['Mascota'];
        $Representante=$_POST['Representante'];

        include("conexion.php");
        //insert into veterinaria(Mascota, Representante)
        //values($Mascota,$Representante);
        $sql="insert into pacientes(Mascota, Representante) 
        values('".$Mascota."', '".$Representante."')";

        $resultado=mysqli_query($conexion,$sql);

        if($resultado){
            //los datos ingresaron a la bd
               echo" <script languaje='JavaScript'>
            alert('Los datos fueron ingresados correctamente a la BD');
            location.assign('index.php');
            </script>";
        }else{
            //los datos NO se guardaron en la bd
            echo" <script languaje='JavaScript'>
            alert('ERROR: Los datos NO fueron ingresados correctamente a la BD');
            location.assign('index.php');
            </script>"; 
        }
        mysqli_close($conexion);

    }else{
        ?>
   
    <h1>Agregar Nuevo Paciente</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Mascota:</label>
        <input type="text" name="Mascota"> <br>
        <label>Representante</label> 
        <input type="text" name="Representante"> <br>
        <input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php">Regresar</a>
    </form>
    <?php
     }

    ?>

</body>
</html>