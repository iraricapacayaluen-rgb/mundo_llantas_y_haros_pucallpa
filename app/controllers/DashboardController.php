<?php
// app/controllers/DashboardController.php

class DashboardController extends Controller 
{
    public function __construct() 
    {
        // Iniciar sesión - IMPORTANTE: Esto faltaba
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Verificar si el usuario está logueado
        if (!isset($_SESSION['usuario_id'])) {
            $_SESSION['mensaje'] = 'Debes iniciar sesión primero.';
            $_SESSION['tipo'] = 'error';
            header('Location: ' . BASE_URL);
            exit;
        }
    }
    
    public function index(): void 
    {
        // Preparar datos para la vista
        $data = [
            'titulo' => 'Dashboard - Sistema de Asistencias',
            'usuario_nombre' => $_SESSION['usuario_nombre'] ?? 'Usuario',
            'usuario_rol' => $_SESSION['usuario_rol'] ?? 'admin'
        ];
        
        // Cargar tu vista del dashboard
        $vistaPath = __DIR__ . '/../views/dashboard/index.php';
        
        if (file_exists($vistaPath)) {
            require_once $vistaPath;
        } else {
            echo "Error: No se encuentra la vista en: " . $vistaPath;
        }
    }
}