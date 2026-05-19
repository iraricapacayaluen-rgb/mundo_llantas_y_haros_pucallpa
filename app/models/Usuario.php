<?php


require_once __DIR__ . '/../core/Model.php';

class Usuario extends Model 
{
    public function registrar(string $usuario, string $clave): array 
    {
        // Validaciones
        if (empty($usuario) || empty($clave)) {
            return ['ok' => false, 'mensaje' => 'Todos los campos son obligatorios.'];
        }
        
        if (strlen($usuario) < 3) {
            return ['ok' => false, 'mensaje' => 'El usuario debe tener al menos 3 caracteres.'];
        }
        
        if (strlen($clave) < 6) {
            return ['ok' => false, 'mensaje' => 'La contraseña debe tener al menos 6 caracteres.'];
        }
        
        try {
            // Verificar si existe (usando nombre_usuario)
            $stmt = $this->pdo->prepare("SELECT id_usuario FROM usuario WHERE nombre_usuario = :nombre_usuario LIMIT 1");
            $stmt->execute(['nombre_usuario' => $usuario]);
            
            if ($stmt->fetch()) {
                return ['ok' => false, 'mensaje' => 'El usuario ya existe.'];
            }
            
            // Insertar (con roles por defecto 'admin')
            $claveHash = password_hash($clave, PASSWORD_BCRYPT);
            $stmt = $this->pdo->prepare("INSERT INTO usuario (nombre_usuario, clave, roles) VALUES (:nombre_usuario, :clave, 'admin')");
            $resultado = $stmt->execute([
                'nombre_usuario' => $usuario, 
                'clave' => $claveHash
            ]);
            
            if ($resultado) {
                return ['ok' => true, 'mensaje' => 'Usuario registrado correctamente.'];
            } else {
                return ['ok' => false, 'mensaje' => 'Error al registrar usuario.'];
            }
        } catch (PDOException $e) {
            return ['ok' => false, 'mensaje' => 'Error de base de datos: ' . $e->getMessage()];
        }
    }
    
    public function login(string $usuario, string $clave): array 
    {
        try {
            // Buscar por nombre_usuario
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE nombre_usuario = :nombre_usuario LIMIT 1");
            $stmt->execute(['nombre_usuario' => $usuario]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$user) {
                return ['ok' => false, 'mensaje' => 'Usuario no encontrado.'];
            }
            
            if (!password_verify($clave, $user['clave'])) {
                return ['ok' => false, 'mensaje' => 'Contraseña incorrecta.'];
            }
            
            return [
                'ok' => true, 
                'mensaje' => 'Inicio de sesión exitoso.', 
                'usuario' => [
                    'id_usuario' => $user['id_usuario'],
                    'nombre' => $user['nombre_usuario'],
                    'roles' => $user['roles']
                ]
            ];
        } catch (PDOException $e) {
            return ['ok' => false, 'mensaje' => 'Error de base de datos: ' . $e->getMessage()];
        }
    }
}