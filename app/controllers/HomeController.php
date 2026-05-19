<?php
// app/controllers/HomeController.php

class HomeController {
    
    public function index(): void {
        $this->landing();
    }
    
    public function landing(): void {
        $pageTitle = TITLE_BUSINESS . " - Gestión de Asistencias";
        require_once __DIR__ . '/../views/home/landing.php';
    }
}