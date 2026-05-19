<?php

require_once __DIR__ . '/../core/Model.php';

class Cargo extends Model 
{
    // Obtener todos los cargos
    public function obtenerTodos(): array 
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM cargo ORDER BY nombre_cargo");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}