<?php
require_once '../Controller/HabitacionController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $tipoHabitacion = $_POST['tipoHabitacion'];
    $maxInfantes = $_POST['maxInfantes'];
    $maxNinos = $_POST['maxNinos'];
    $maxAdultos = $_POST['maxAdultos'];
    $numero = $_POST['numero'];
    $estado = $_POST['estado'];

    $controller = new HabitacionController();
    $resultado = $controller->agregarHabitacion($nombre, $tipoHabitacion, $maxInfantes, $maxNinos, $maxAdultos, $numero, $estado);

    echo $resultado;
}
?>
