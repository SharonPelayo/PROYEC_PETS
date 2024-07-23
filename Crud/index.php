<html>
<head>
<title>Lista de Pacientes</title>
<script type="text/javascript">
    function confirmar(){
        return confirm('¿Estas seguro?, se eliminarán los datos');
    }
</script>
<link rel="stylesheet"type="text/css" href="crud.css">
</head>
<body>
<?php
    include("Conexion.php");
    //select * from Paciente
    $sql="select * from pacientes";
    $resultado=mysqli_query($conexion,$sql);
?>
    <h1>Lista de Pacientes</h1>
    <a href="agregar.php">Nuevo Paciente</a><br><br>
    <table>
        <thead>
            <tr>
                <th>Id.</th>
                <th>Mascota.</th>
                <th>Representante</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas=mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td> <?php echo $filas['Id']?> </td>
                <td><?php echo $filas['Mascota']?></td>
                <td><?php echo $filas['Representante']?></td>
                <td>
                    <?php echo "<a href='editar.php?Id=".$filas['Id']."'>EDITAR</a>"; ?>
                    -
                    <?php echo "<a href='eliminar.php?Id=".$filas['Id']."'
                    onclick='return confirmar()'>ELIMINAR</a>"; ?>

                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php
        mysqli_close($conexion);
    ?>
</body>
</html>