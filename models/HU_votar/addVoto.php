<?php 

require_once("../../database/db.php");

    if(isset($_POST['submit'])) {
        
        $id_opcion = $_POST["opcion"];
        $id_votacion = $_POST["votacion_id"];

        // Seleccionar la opción elegida por el usuario
        $opcionQuery = "SELECT * FROM opcion WHERE id = $id_opcion";
        $resOpcion = mysqli_query($con, $opcionQuery);

        // Obtener el número de votos de la opción elegida
        if (mysqli_num_rows($resOpcion) == 1) {
            $fila = mysqli_fetch_array($resOpcion);
            $votos = $fila["cantidad_votos"];
        }
        $votos += 1;    

        // Hacer la actualización de votos en la base de datos
        $updateOpcionQuery = "UPDATE opcion SET cantidad_votos = $votos WHERE id = $id_opcion";
        mysqli_query($con, $updateOpcionQuery);

        // Seleccionar votación elegida por el usuario
        $queryVotacion = "SELECT * FROM votacion WHERE id = $id_votacion";
        $resVotacion = mysqli_query($con, $queryVotacion);

        // Obtener cantidad de votos
        if (mysqli_num_rows($resVotacion) == 1) {
            $fila = mysqli_fetch_array($resVotacion);
            $votos = $fila["total_votos"];
        }
        $votos += 1;

        // Hacer la actualización de votos en la base de datos
        $updateOpcionQuery = "UPDATE votacion SET total_votos = $votos WHERE id = $id_votacion";
        mysqli_query($con, $updateOpcionQuery);
        
        // Mensaje de alerta
        $_SESSION['mensaje'] = 'Su voto ha sido guardado correctamente!';
        $_SESSION['sub_mensaje'] = 'Muchas gracias por votar.';
        $_SESSION['tipo'] = 'success';

        header("Location: ../../views/HU_listar_activas/activas.php");
    }
?>