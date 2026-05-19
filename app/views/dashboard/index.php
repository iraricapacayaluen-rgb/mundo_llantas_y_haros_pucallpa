<?php


// Mostrar mensajes de sesión si existen
if (isset($_SESSION['mensaje'])): ?>
    <div class="toast-message <?php echo $_SESSION['tipo']; ?>">
        <i class="fas <?php echo $_SESSION['tipo'] === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?>"></i>
        <span><?php echo $_SESSION['mensaje']; ?></span>
        <button class="toast-close">&times;</button>
    </div>
    <?php 
    unset($_SESSION['mensaje']);
    unset($_SESSION['tipo']);
endif; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>LlanteraAsist | Dashboard de Asistencias</title>
  <!-- CSS externo -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css" />
  <!-- Google Fonts + íconos -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="dashboard-container">
  
    <?php include __DIR__ . '/../layouts/header.php' ?>

  <!-- ================= CONTENIDO PRINCIPAL ================= -->
  <main class="main-dash">
    <!-- Top bar (mobile toggle + título) -->
    <div class="top-bar">
      <button class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
      </button>
      <div class="page-title">
        <h1 id="mainTitle">Dashboard</h1>
      </div>
      <div class="top-actions">
        <i class="fas fa-bell"></i>
        <div class="user-badge">
          <span><?php echo $_SESSION['usuario_nombre'] ?? 'Admin'; ?></span>
          <i class="fas fa-user-circle"></i>
        </div>
      </div>
    </div>

    <!-- SECCIÓN DASHBOARD (principal) -->
    <div id="dashboardSection" class="section-content active-section">
      <!-- Tarjetas de estadísticas (KPIs) -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon">
            <i class="fas fa-user-hard-hat"></i>
          </div>
          <div class="stat-info">
            <h3>26</h3>
            <p>Total de empleados</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">
            <i class="fas fa-fingerprint"></i>
          </div>
          <div class="stat-info">
            <h3>1</h3>
            <p>Asistencias Hoy</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">
            <i class="fas fa-user-slash"></i>
          </div>
          <div class="stat-info">
            <h3>25</h3>
            <p>Ausentes Hoy</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">
            <i class="fas fa-clock"></i>
          </div>
          <div class="stat-info">
            <h3>1</h3>
            <p>Tardanzas Hoy</p>
          </div>
        </div>
      </div>

      <!-- Fila: Gráfico de asistencias semanales + % asistencia -->
      <div class="row-two-cols">
        <div class="card weekly-chart">
          <h3><i class="fas fa-chart-line"></i> Asistencias por semana</h3>
          <div class="week-bars">
            <div class="bar-item">
              <span>Lun</span>
              <div class="bar-bg"><div class="bar-fill" style="height: 40%;"></div></div>
              <span class="value">1</span>
            </div>
            <div class="bar-item">
              <span>Mar</span>
              <div class="bar-bg"><div class="bar-fill" style="height: 0%;"></div></div>
              <span class="value">0</span>
            </div>
            <div class="bar-item">
              <span>Mié</span>
              <div class="bar-bg"><div class="bar-fill" style="height: 0%;"></div></div>
              <span class="value">0</span>
            </div>
            <div class="bar-item">
              <span>Jue</span>
              <div class="bar-bg"><div class="bar-fill" style="height: 0%;"></div></div>
              <span class="value">0</span>
            </div>
            <div class="bar-item">
              <span>Vie</span>
              <div class="bar-bg"><div class="bar-fill" style="height: 0%;"></div></div>
              <span class="value">0</span>
            </div>
            <div class="bar-item">
              <span>Sáb</span>
              <div class="bar-bg"><div class="bar-fill" style="height: 0%;"></div></div>
              <span class="value">0</span>
            </div>
          </div>
        </div>
        <div class="card asistencia-circle">
          <div class="circle-stats">
            <div class="progress-circle">
              <svg viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="45" stroke="#e2e8f0" stroke-width="8" fill="none"/>
                <circle cx="50" cy="50" r="45" stroke="#2c5f2d" stroke-width="8" fill="none" stroke-dasharray="283" stroke-dashoffset="271" stroke-linecap="round" transform="rotate(-90 50 50)"/>
              </svg>
              <div class="circle-text">
                <span class="percent">4%</span>
                <span>Asistencias</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tabla de últimos registros -->
      <div class="card full-width">
        <div class="card-header">
          <h3><i class="fas fa-list-ul"></i> Últimos registros</h3>
          <button class="btn-sm">Ver todos</button>
        </div>
        <div class="table-responsive">
          <table class="records-table">
            <thead>
              <tr>
                <th>Empleado</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>carlos daniel marin panduro</td>
                <td>18 May 2026</td>
                <td>09:52 AM</td>
                <td><span class="badge tardy">Tardanza</span></td>
              </tr>
              <tr>
                <td>carlos daniel marin panduro</td>
                <td>17 May 2026</td>
                <td>08:43 AM</td>
                <td><span class="badge tardy">Tardanza</span></td>
              </tr>
              <tr>
                <td>Ricardo Jiménez</td>
                <td>17 May 2026</td>
                <td>08:00 AM</td>
                <td><span class="badge present">Presente</span></td>
              </tr>
              <tr>
                <td>María López</td>
                <td>16 May 2026</td>
                <td>09:15 AM</td>
                <td><span class="badge tardy">Tardanza</span></td>
              </tr>
              <tr>
                <td>Jorge Ramírez</td>
                <td>16 May 2026</td>
                <td>08:05 AM</td>
                <td><span class="badge present">Presente</span></td>
              </tr>
            </tbody>
           </table>
        </div>
      </div>
    </div>

    <!-- SECCIÓN VER EMPLEADOS -->
   <!-- SECCIÓN VER EMPLEADOS -->
<div id="verEmpleadosSection" class="section-content">
    <div class="placeholder-card">
        <i class="fas fa-users fa-3x"></i>
        <h2>Lista de Empleados</h2>
        <p>Aquí se mostrarán todos los empleados registrados en la llantería.</p>
        <div class="table-responsive">
            <table class="records-table" id="empleadosTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>DNI</th>
                        <th>Cargo</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="empleadosTableBody">
                    <tr>
                        <td colspan="8" style="text-align: center;">Cargando empleados...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

   <!-- SECCIÓN REGISTRAR EMPLEADO -->
<div id="registrarEmpleadoSection" class="section-content">
    <div class="placeholder-card">
        <i class="fas fa-user-plus fa-3x"></i>
        <h2>Registrar Nuevo Empleado</h2>
        <p>Complete el formulario para agregar un nuevo empleado al sistema.</p>
        <form id="registrarEmpleadoForm" class="employee-form" action="<?php echo BASE_URL; ?>/empleado/registrar" method="POST" style="text-align: left; max-width: 500px; margin: 0 auto;">
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nombre *</label>
                <input type="text" name="nombre" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;" required>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Apellido *</label>
                <input type="text" name="apellido" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;" required>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">DNI *</label>
                <input type="text" name="dni" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;" maxlength="8" pattern="[0-9]{8}" required>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Celular</label>
                <input type="tel" name="celular" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Correo electrónico *</label>
                <input type="email" name="correo" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;" required>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Cargo *</label>
                <select name="id_cargo" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;" required>
                    <option value="">Seleccionar cargo</option>
                    <?php
                    // Cargar cargos desde la base de datos
                    require_once __DIR__ . '/../../models/Cargo.php';
                    $cargoModel = new Cargo();
                    $cargos = $cargoModel->obtenerTodos();
                    foreach ($cargos as $cargo): ?>
                        <option value="<?php echo $cargo['id_cargo']; ?>"><?php echo htmlspecialchars($cargo['nombre_cargo']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn-primary" style="width: 100%;">Registrar Empleado</button>
        </form>
    </div>
</div>
    <div id="asistenciaSection" class="section-content">
      <div class="placeholder-card">
        <i class="fas fa-calendar-check fa-3x"></i>
        <h2>Registro de Asistencia</h2>
        <p>Marca entradas, salidas y visualiza el parte diario del personal.</p>
        <button class="btn-primary">Registrar asistencia</button>
      </div>
    </div>
    
    <div id="historialSection" class="section-content">
      <div class="placeholder-card">
        <i class="fas fa-history fa-3x"></i>
        <h2>Historial Completo</h2>
        <p>Consulta asistencias pasadas, filtros por fecha y empleado.</p>
        <button class="btn-secondary">Filtrar historial</button>
      </div>
    </div>
    
    <div id="reportesSection" class="section-content">
      <div class="placeholder-card">
        <i class="fas fa-chart-pie fa-3x"></i>
        <h2>Reportes Estadísticos</h2>
        <p>Genera reportes de rendimiento, ausentismo y horas extra.</p>
        <button class="btn-secondary">Exportar reporte</button>
      </div>
    </div>

  </main>
</div>

<!-- Modal de cierre de sesión -->
<div id="logoutModal" class="modal-logout" style="display: none;">
  <div class="modal-logout-content">
    <i class="fas fa-sign-out-alt"></i>
    <h3>Cerrar sesión</h3>
    <p>¿Estás seguro de que deseas salir del sistema?</p>
    <div class="modal-actions">
      <button id="confirmLogoutBtn">Sí, cerrar</button>
      <button id="cancelLogoutBtn">Cancelar</button>
    </div>
  </div>
</div>

<script>
  (function() {
    // Elementos del sidebar y secciones
    const navItems = document.querySelectorAll('.nav-item:not(.has-submenu)');
    const submenuItems = document.querySelectorAll('.submenu-item');
    const sections = {
      dashboard: document.getElementById('dashboardSection'),
      'ver-empleados': document.getElementById('verEmpleadosSection'),
      'registrar-empleado': document.getElementById('registrarEmpleadoSection'),
      asistencia: document.getElementById('asistenciaSection'),
      historial: document.getElementById('historialSection'),
      reportes: document.getElementById('reportesSection')
    };
    const mainTitle = document.getElementById('mainTitle');
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebarDash');
    
    // Manejo del submenú de empleados
    const empleadosMenu = document.getElementById('empleadosMenu');
    const empleadosMain = document.querySelector('#empleadosMenu .nav-item-main');
    
    if (empleadosMain) {
      empleadosMain.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        empleadosMenu.classList.toggle('open');
      });
    }

    // Función para cambiar sección activa
    function setActiveSection(sectionId, title) {
      // Ocultar todas las secciones
      Object.values(sections).forEach(section => {
        if (section) section.classList.remove('active-section');
      });
      // Mostrar la seleccionada
      if (sections[sectionId]) sections[sectionId].classList.add('active-section');
      // Actualizar título
      if (mainTitle) mainTitle.textContent = title;
      
      // Actualizar clase active en el menú principal (excluyendo has-submenu)
      document.querySelectorAll('.nav-item:not(.has-submenu)').forEach(item => {
        const itemSection = item.getAttribute('data-section');
        if (itemSection === sectionId) {
          item.classList.add('active');
        } else {
          item.classList.remove('active');
        }
      });
      
      // Actualizar clase active en submenú
      document.querySelectorAll('.submenu-item').forEach(item => {
        const itemSection = item.getAttribute('data-section');
        if (itemSection === sectionId) {
          item.classList.add('active');
          // Si un submenu item está activo, abrir el submenú padre
          if (empleadosMenu) empleadosMenu.classList.add('open');
        } else {
          item.classList.remove('active');
        }
      });
    }

    // Eventos de navegación para items normales
    navItems.forEach(item => {
      item.addEventListener('click', (e) => {
        e.preventDefault();
        const section = item.getAttribute('data-section');
        let title = '';
        switch(section) {
          case 'dashboard': title = 'Dashboard'; break;
          case 'asistencia': title = 'Asistencia'; break;
          case 'historial': title = 'Historial'; break;
          case 'reportes': title = 'Reportes'; break;
          default: title = 'Dashboard';
        }
        setActiveSection(section, title);
        if (window.innerWidth <= 768) {
          sidebar.classList.remove('sidebar-open');
        }
      });
    });
    
    // Eventos de navegación para submenu items
    submenuItems.forEach(item => {
      item.addEventListener('click', (e) => {
        e.preventDefault();
        const section = item.getAttribute('data-section');
        let title = '';
        switch(section) {
          case 'ver-empleados': title = 'Ver Empleados'; break;
          case 'registrar-empleado': title = 'Registrar Empleado'; break;
          default: title = 'Empleados';
        }
        setActiveSection(section, title);
        if (window.innerWidth <= 768) {
          sidebar.classList.remove('sidebar-open');
        }
      });
    });

    // Toggle menú responsive (mobile)
    if (menuToggle) {
      menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('sidebar-open');
      });
    }

    // Cerrar sidebar al hacer click fuera (en mobile)
    document.addEventListener('click', (e) => {
      if (window.innerWidth <= 768) {
        if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
          sidebar.classList.remove('sidebar-open');
        }
      }
    });

    // LÓGICA DEL MODAL DE CERRAR SESIÓN
    const logoutBtn = document.getElementById('logoutBtn');
    const logoutModal = document.getElementById('logoutModal');
    const confirmBtn = document.getElementById('confirmLogoutBtn');
    const cancelBtn = document.getElementById('cancelLogoutBtn');

    function openModal() {
      logoutModal.style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }
    function closeModal() {
      logoutModal.style.display = 'none';
      document.body.style.overflow = 'auto';
    }
    if (logoutBtn) logoutBtn.addEventListener('click', openModal);
    if (confirmBtn) confirmBtn.addEventListener('click', () => {
      window.location.href = "<?php echo BASE_URL; ?>";
    });
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
    logoutModal.addEventListener('click', (e) => {
      if (e.target === logoutModal) closeModal();
    });

    console.log("Dashboard listo, sidebar navegable con submenú.");
  })();

  // Función para cargar empleados
function cargarEmpleados() {
    fetch('<?php echo BASE_URL; ?>/empleado/listar')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('empleadosTableBody');
            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="8" style="text-align: center;">No hay empleados registrados</td></tr>';
                return;
            }
            
            tbody.innerHTML = '';
            data.forEach(empleado => {
                const row = tbody.insertRow();
                row.innerHTML = `
                    <td>${empleado.id_empleado}</td>
                    <td>${empleado.nombre} ${empleado.apellido}</td>
                    <td>${empleado.dni}</td>
                    <td>${empleado.nombre_cargo || 'N/A'}</td>
                    <td>${empleado.celular || 'N/A'}</td>
                    <td>${empleado.correo}</td>
                    <td>${empleado.fecha_registro}</td>
                    <td>
                        <button class="btn-sm" onclick="editarEmpleado(${empleado.id_empleado})">Editar</button>
                        <button class="btn-sm" style="background-color: #fee2e2; border-color: #fecaca;" onclick="eliminarEmpleado(${empleado.id_empleado})">Eliminar</button>
                    </td>
                `;
            });
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('empleadosTableBody').innerHTML = '<tr><td colspan="8" style="text-align: center;">Error al cargar empleados</td></tr>';
        });
}

// Función para eliminar empleado (opcional)
function eliminarEmpleado(id) {
    if (confirm('¿Estás seguro de eliminar este empleado?')) {
        fetch('<?php echo BASE_URL; ?>/empleado/eliminar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + id
        })
        .then(response => response.json())
        .then(data => {
            alert(data.mensaje);
            if (data.ok) cargarEmpleados();
        });
    }
}

// Cargar empleados cuando se abre la sección
document.querySelector('[data-section="ver-empleados"]').addEventListener('click', function() {
    cargarEmpleados();
});
</script>
</body>
</html>