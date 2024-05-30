<?php
require_once '../Model/Database.php';
require_once '../Model/Habitacion.php';

class HabitacionController {
    private $db;
    private $habitacion;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->habitacion = new Habitacion($this->db);
    }

    public function mostrarHabitaciones() {
        $stmt = $this->habitacion->leerHabitaciones();
        $habitaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $habitaciones;
    }

    public function agregarHabitacion($nombre, $tipoHabitacion, $maxInfantes, $maxNinos, $maxAdultos, $numero, $estado) {
        $this->habitacion->Nombre = $nombre;
        $this->habitacion->IdTipoHabitacion = $tipoHabitacion;
        $this->habitacion->MaxInfantes = $maxInfantes;
        $this->habitacion->MaxNinos = $maxNinos;
        $this->habitacion->MaxAdultos = $maxAdultos;
        $this->habitacion->NumHabitacion = $numero;
       

        if ($this->habitacion->agregarHabitacion()) {
            return "Habitación agregada exitosamente.";
        } else {
            return "Error al agregar la habitación.";
        }
    }
}
?>
