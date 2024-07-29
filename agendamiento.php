<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha = $_POST['date'];
    $hora = $_POST['time'];

    // Verificar si la fecha y hora están disponibles
    $sql = "SELECT * FROM citas WHERE fecha='$fecha' AND hora='$hora'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Registrar la cita
        $sql = "INSERT INTO citas (username, fecha, hora) VALUES ('$username', '$fecha', '$hora')";

        if ($conn->query($sql) === TRUE) {
            echo "Cita agendada exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "La fecha y hora seleccionadas no están disponibles";
    }

    $conn->close();
}
?>
