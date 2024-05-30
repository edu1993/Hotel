<?php
class Habitacion {
    private $conn;
    private $table_name = "Habitacion";

    public $IdHabitacion;
    public $NumHabitacion;
    public $MaxAdultos;
    public $MaxNinos;
    public $MaxInfantes;
    public $IdTipoHabitacion;
    public $Nombre;
  

    public function __construct($db) {
        $this->conn = $db;
    }

    public function leerHabitaciones() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function agregarHabitacion() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (Nombre, IdTipoHabitacion, MaxInfantes, MaxNinos, MaxAdultos, NumHabitacion)
                  VALUES (:nombre, :tipoHabitacion, :maxInfantes, :maxNinos, :maxAdultos, :numero)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $this->Nombre);
        $stmt->bindParam(':tipoHabitacion', $this->IdTipoHabitacion);
        $stmt->bindParam(':maxInfantes', $this->MaxInfantes);
        $stmt->bindParam(':maxNinos', $this->MaxNinos);
        $stmt->bindParam(':maxAdultos', $this->MaxAdultos);
        $stmt->bindParam(':numero', $this->NumHabitacion);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
