<!-- ================= SIDEBAR (menú lateral) ================= -->
<aside class="sidebar-dash" id="sidebarDash">
    <div class="sidebar-header">
        <i class="fas fa-tools"></i>
        <h2>Llantera<span>Asist</span></h2>
    </div>
    <nav class="sidebar-nav-dash">
        <a href="#" class="nav-item active" data-section="dashboard">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
        
        <!-- Empleados con submenú -->
        <div class="nav-item has-submenu" id="empleadosMenu">
            <div class="nav-item-main">
                <i class="fas fa-users"></i>
                <span>Empleados</span>
                <i class="fas fa-chevron-right submenu-arrow"></i>
            </div>
            <div class="submenu" id="empleadosSubmenu">
                <a href="#" class="submenu-item" data-section="ver-empleados">
                    <i class="fas fa-eye"></i>
                    <span>Ver empleados</span>
                </a>
                <a href="#" class="submenu-item" data-section="registrar-empleado">
                    <i class="fas fa-user-plus"></i>
                    <span>Registrar empleado</span>
                </a>
            </div>
        </div>
        
        <a href="#" class="nav-item" data-section="asistencia">
            <i class="fas fa-calendar-check"></i>
            <span>Asistencia</span>
        </a>
        <a href="#" class="nav-item" data-section="historial">
            <i class="fas fa-history"></i>
            <span>Historial</span>
        </a>
        <a href="#" class="nav-item" data-section="reportes">
            <i class="fas fa-chart-bar"></i>
            <span>Reportes</span>
        </a>
    </nav>
    <div class="sidebar-footer-dash">
        <button class="logout-btn" id="logoutBtn">
            <i class="fas fa-sign-out-alt"></i>
            <span>Cerrar Sesión</span>
        </button>
    </div>
</aside>