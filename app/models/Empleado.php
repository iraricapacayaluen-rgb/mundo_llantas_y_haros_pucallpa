<?php
// app/models/Empleado.php

require_once __DIR__ . '/../core/Model.php';

class Empleado extends Model 
{
    // Registrar un nuevo empleado
    public function registrar(array $datos): array 
    {
        // Validaciones
        if (empty($datos['nombre']) || empty($datos['apellido']) || empty($datos['dni']) || empty($datos['correo']) || empty($datos['id_cargo'])) {
            return ['ok' => false, 'mensaje' => 'Todos los campos obligatorios deben ser llenados.'];
        }
        
        if (strlen($datos['dni']) < 8 || strlen($datos['dni']) > 8) {
            return ['ok' => false, 'mensaje' => 'El DNI debe tener exactamente 8 dígitos.'];
        }
        
        if (!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
            return ['ok' => false, 'mensaje' => 'El correo electrónico no es válido.'];
        }
        
        try {
            // Verificar si el DNI ya existe
            $stmt = $this->pdo->prepare("SELECT id_empleado FROM empleado WHERE dni = :dni LIMIT 1");
            $stmt->execute(['dni' => $datos['dni']]);
            if ($stmt->fetch()) {
                return ['ok' => false, 'mensaje' => 'El DNI ya está registrado.'];
            }
            
            // Verificar si el correo ya existe
            $stmt = $this->pdo->prepare("SELECT id_empleado FROM empleado WHERE correo = :correo LIMIT 1");
            $stmt->execute(['correo' => $datos['correo']]);
            if ($stmt->fetch()) {
                return ['ok' => false, 'mensaje' => 'El correo ya está registrado.'];
            }
            
            // Insertar empleado
            $stmt = $this->pdo->prepare("INSERT INTO empleado (nombre, apellido, dni, celular, correo, id_cargo) 
                                        VALUES (:nombre, :apellido, :dni, :celular, :correo, :id_cargo)");
            $resultado = $stmt->execute([
                'nombre' => $datos['nombre'],
                'apellido' => $datos['apellido'],
                'dni' => $datos['dni'],
                'celular' => $datos['celular'] ?? null,
                'correo' => $datos['correo'],
                'id_cargo' => $datos['id_cargo']
            ]);
            
            if ($resultado) {
                return ['ok' => true, 'mensaje' => 'Empleado registrado correctamente.'];
            } else {
                return ['ok' => false, 'mensaje' => 'Error al registrar empleado.'];
            }
        } catch (PDOException $e) {
            return ['ok' => false, 'mensaje' => 'Error de base de datos: ' . $e->getMessage()];
        }
    }
    
    // Obtener todos los empleados
    public function obtenerTodos(): array 
    {
        try {
            $stmt = $this->pdo->query("SELECT e.*, c.nombre_cargo 
                                       FROM empleado e 
                                       LEFT JOIN cargo c ON e.id_cargo = c.id_cargo 
                                       ORDER BY e.fecha_registro DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    
    // Obtener empleado por ID
    public function obtenerPorId(int $id): ?array 
    {
        try {
            $stmt = $this->pdo->prepare("SELECT e.*, c.nombre_cargo 
                                        FROM empleado e 
                                        LEFT JOIN cargo c ON e.id_cargo = c.id_cargo 
                                        WHERE e.id_empleado = :id");
            $stmt->execute(['id' => $id]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado ?: null;
        } catch (PDOException $e) {
            return null;
        }
    }
    
    // Actualizar empleado
    public function actualizar(int $id, array $datos): array 
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE empleado 
                                        SET nombre = :nombre, apellido = :apellido, 
                                            dni = :dni, celular = :celular, 
                                            correo = :correo, id_cargo = :id_cargo 
                                        WHERE id_empleado = :id");
            $resultado = $stmt->execute([
                'id' => $id,
                'nombre' => $datos['nombre'],
                'apellido' => $datos['apellido'],
                'dni' => $datos['dni'],
                'celular' => $datos['celular'] ?? null,
                'correo' => $datos['correo'],
                'id_cargo' => $datos['id_cargo']
            ]);
            
            if ($resultado) {
                return ['ok' => true, 'mensaje' => 'Empleado actualizado correctamente.'];
            } else {
                return ['ok' => false, 'mensaje' => 'Error al actualizar empleado.'];
            }
        } catch (PDOException $e) {
            return ['ok' => false, 'mensaje' => 'Error de base de datos: ' . $e->getMessage()];
        }
    }
    
    // Eliminar empleado
    public function eliminar(int $id): array 
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM empleado WHERE id_empleado = :id");
            $resultado = $stmt->execute(['id' => $id]);
            
            if ($resultado) {
                return ['ok' => true, 'mensaje' => 'Empleado eliminado correctamente.'];
            } else {
                return ['ok' => false, 'mensaje' => 'Error al eliminar empleado.'];
            }
        } catch (PDOException $e) {
            return ['ok' => false, 'mensaje' => 'Error de base de datos: ' . $e->getMessage()];
        }
    }
}