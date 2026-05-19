<?php
// app/controllers/EmpleadoController.php

class EmpleadoController extends Controller 
{
    private Empleado $empleadoModel;
    private Cargo $cargoModel;
    
    public function __construct() 
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        require_once __DIR__ . '/../models/Empleado.php';
        require_once __DIR__ . '/../models/Cargo.php';
        $this->empleadoModel = new Empleado();
        $this->cargoModel = new Cargo();
    }
    
    public function registrar(): void 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'nombre' => $_POST['nombre'] ?? '',
                'apellido' => $_POST['apellido'] ?? '',
                'dni' => $_POST['dni'] ?? '',
                'celular' => $_POST['celular'] ?? '',
                'correo' => $_POST['correo'] ?? '',
                'id_cargo' => $_POST['id_cargo'] ?? ''
            ];
            
            $resultado = $this->empleadoModel->registrar($datos);
            
            $_SESSION['mensaje'] = $resultado['mensaje'];
            $_SESSION['tipo'] = $resultado['ok'] ? 'success' : 'error';
            
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        }
    }
    
    public function listar(): void 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            header('Content-Type: application/json');
            $empleados = $this->empleadoModel->obtenerTodos();
            echo json_encode($empleados);
            exit;
        }
    }
    
    public function obtenerCargos(): void 
    {
        header('Content-Type: application/json');
        $cargos = $this->cargoModel->obtenerTodos();
        echo json_encode($cargos);
        exit;
    }
}