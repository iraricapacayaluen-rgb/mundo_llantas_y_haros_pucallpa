<?php
// Mostrar mensajes de sesión
if (isset($_SESSION['mensaje'])): ?>
    <div class="toast-message <?php echo $_SESSION['tipo']; ?>">
        <i class="fas <?php echo $_SESSION['tipo'] === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?>"></i>
        <span><?php echo $_SESSION['mensaje']; ?></span>
        <button class="toast-close">&times;</button>
    </div>
    <?php 
    unset($_SESSION['mensaje']);
    unset($_SESSION['tipo']);
endif; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>LlanteraAsist | Gestión de Asistencias</title>
  <!-- CSS externo -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/style.css" />
  <!-- Fuente simple y moderna -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <!-- Font Awesome 6 (gratuito, iconos simples) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

  <!-- ================= SIDEBAR ================= -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <i class="fas fa-tools"></i>
      <span>Mundo-llantas</span>
    </div>
    <nav class="sidebar-nav">
      <!-- Solo dos botones: Iniciar sesión y Registrarse -->
      <button class="sidebar-btn btn-login" id="btnLoginSidebar">
        <i class="fas fa-sign-in-alt"></i> Iniciar sesión
      </button>
      <button class="sidebar-btn btn-register" id="btnRegisterSidebar">
        <i class="fas fa-user-plus"></i> Registrarse
      </button>
    </nav>
    <div class="sidebar-footer">
      <small>© 2025 LlanteraAsist</small>
    </div>
  </aside>

  <!-- ================= CONTENIDO PRINCIPAL ================= -->
  <main class="main-content">
    <!-- HERO / SECCIÓN PRINCIPAL -->
    <section class="hero">
      <div class="hero-text">
        <h1>Control de Asistencias <br>para la gestion de tu Llantería</h1>
        <p>Registra horarios, turnos y presencia de tu equipo de trabajo. Optimiza la gestión de personal en tu taller o llantera con una herramienta simple y eficaz.</p>
        <div class="hero-buttons">
          <button class="btn-primary" id="heroLoginBtn">Iniciar sesión</button>
          <button class="btn-secondary" id="heroRegisterBtn">Crear cuenta</button>
        </div>
      </div>
      <div class="hero-image">
        <!-- icono ilustrativo simple (solo FontAwesome) -->
        <i class="fas fa-clipboard-list"></i>
      </div>
    </section>

    <!-- SECCIÓN DE CARACTERÍSTICAS (features) -->
    <section class="features">
      <h2>¿Por qué gestionar asistencias?</h2>
      <div class="features-grid">
        <div class="feature-card">
          <i class="fas fa-calendar-check"></i>
          <h3>Registro preciso</h3>
          <p>Control de entrada, salida y turnos. Datos claros y accesibles desde cualquier dispositivo.</p>
        </div>
        <div class="feature-card">
          <i class="fas fa-chart-line"></i>
          <h3>Reportes automáticos</h3>
          <p>Visualiza asistencias, retardos y horas extra con estadísticas sencillas.</p>
        </div>
        <div class="feature-card">
          <i class="fas fa-mobile-alt"></i>
          <h3>Acceso móvil</h3>
          <p>Diseño responsive, funciona perfecto en celulares, tablets y computadoras.</p>
        </div>
        <div class="feature-card">
          <i class="fas fa-shield-alt"></i>
          <h3>Seguridad de datos</h3>
          <p>Tus registros protegidos con roles de empleados y administrador.</p>
        </div>
      </div>
    </section>

    <!-- SECCIÓN CÓMO FUNCIONA (simple) -->
    <section class="how-it-works">
      <h2>Gestión simple en 3 pasos</h2>
      <div class="steps">
        <div class="step">
          <div class="step-number">1</div>
          <h3>Registra tu equipo</h3>
          <p>Añade empleados y asigna horarios fácilmente.</p>
        </div>
        <div class="step">
          <div class="step-number">2</div>
          <h3>Marca asistencia</h3>
          <p>Registro rápido con botón o desde la app móvil.</p>
        </div>
        <div class="step">
          <div class="step-number">3</div>
          <h3>Revisa reportes</h3>
          <p>Consulta históricos y optimiza la productividad.</p>
        </div>
      </div>
    </section>

    <!-- LLAMADA A LA ACCIÓN FINAL (opcional) -->
    <section class="cta-section">
      <div class="cta-card">
        <h2>¿Listo para optimizar tu llantería?</h2>
        <p>Únete a cientos de talleres que usan LlanteraAsist para controlar asistencias sin complicaciones.</p>
        <button class="btn-primary cta-btn" id="ctaRegisterBtn">Regístrate ahora</button>
      </div>
    </section>
  </main>

  <!-- ================= MODAL DE INICIO DE SESIÓN ================= -->
  <?php include __DIR__ . '/../auth/login.php' ?>
  <!-- MODAL REGISTRO -->
  <?php include __DIR__ . '/../auth/registrar.php' ?>

  <!-- Script para manejar apertura/cierre de modales y envío de formularios -->
  <script>
    (function() {
      // Elementos de los modales
      const loginModal = document.getElementById('loginModal');
      const registerModal = document.getElementById('registerModal');
      
      // Botones que abren modales
      const btnLoginSide = document.getElementById('btnLoginSidebar');
      const btnRegisterSide = document.getElementById('btnRegisterSidebar');
      const heroLoginBtn = document.getElementById('heroLoginBtn');
      const heroRegisterBtn = document.getElementById('heroRegisterBtn');
      const ctaRegisterBtn = document.getElementById('ctaRegisterBtn');
      
      // Botones de cerrar (data-modal)
      const closeButtons = document.querySelectorAll('.modal-close');
      
      // Enlaces para cambiar entre modales
      const switchToRegister = document.getElementById('switchToRegisterFromLogin');
      const switchToLogin = document.getElementById('switchToLoginFromRegister');
      
      // Función para abrir modal específico y cerrar el otro
      function openModal(modalToOpen, modalToClose) {
        if (modalToClose) modalToClose.style.display = 'none';
        if (modalToOpen) {
          modalToOpen.style.display = 'flex';
          document.body.style.overflow = 'hidden';
        }
      }
      
      // Función para cerrar un modal específico
      function closeModal(modal) {
        if (modal) {
          modal.style.display = 'none';
          document.body.style.overflow = 'auto';
        }
      }
      
      // Cerrar cualquier modal abierto
      function closeAllModals() {
        if (loginModal) loginModal.style.display = 'none';
        if (registerModal) registerModal.style.display = 'none';
        document.body.style.overflow = 'auto';
      }
      
      // Eventos para abrir Login
      if (btnLoginSide) {
        btnLoginSide.addEventListener('click', function(e) {
          e.preventDefault();
          openModal(loginModal, registerModal);
        });
      }
      if (heroLoginBtn) {
        heroLoginBtn.addEventListener('click', function(e) {
          e.preventDefault();
          openModal(loginModal, registerModal);
        });
      }
      
      // Eventos para abrir Registro
      if (btnRegisterSide) {
        btnRegisterSide.addEventListener('click', function(e) {
          e.preventDefault();
          openModal(registerModal, loginModal);
        });
      }
      if (heroRegisterBtn) {
        heroRegisterBtn.addEventListener('click', function(e) {
          e.preventDefault();
          openModal(registerModal, loginModal);
        });
      }
      if (ctaRegisterBtn) {
        ctaRegisterBtn.addEventListener('click', function(e) {
          e.preventDefault();
          openModal(registerModal, loginModal);
        });
      }
      
      // Cerrar modales con botón X
      closeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
          const modalAttr = this.getAttribute('data-modal');
          if (modalAttr === 'login') closeModal(loginModal);
          if (modalAttr === 'register') closeModal(registerModal);
        });
      });
      
      // Cambio de login a registro
      if (switchToRegister) {
        switchToRegister.addEventListener('click', function(e) {
          e.preventDefault();
          openModal(registerModal, loginModal);
        });
      }
      
      // Cambio de registro a login
      if (switchToLogin) {
        switchToLogin.addEventListener('click', function(e) {
          e.preventDefault();
          openModal(loginModal, registerModal);
        });
      }
      
      // Cerrar modal al hacer clic en el fondo
      if (loginModal) {
        loginModal.addEventListener('click', function(e) {
          if (e.target === loginModal) closeModal(loginModal);
        });
      }
      if (registerModal) {
        registerModal.addEventListener('click', function(e) {
          if (e.target === registerModal) closeModal(registerModal);
        });
      }
      
      // Tecla ESC para cerrar cualquier modal
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          if (loginModal && loginModal.style.display === 'flex') closeModal(loginModal);
          if (registerModal && registerModal.style.display === 'flex') closeModal(registerModal);
        }
      });
      
      // Auto-cerrar toast message después de 4 segundos
      const toastMessage = document.querySelector('.toast-message');
      if (toastMessage) {
        setTimeout(function() {
          toastMessage.style.opacity = '0';
          setTimeout(function() {
            if (toastMessage && toastMessage.remove) toastMessage.remove();
          }, 300);
        }, 4000);
        
        const toastClose = toastMessage.querySelector('.toast-close');
        if (toastClose) {
          toastClose.addEventListener('click', function() {
            toastMessage.remove();
          });
        }
      }
      
      // IMPORTANTE: NO interceptamos el envío de los formularios
      // Los formularios se envían normalmente al action configurado
      // Solo validamos campos vacíos antes de enviar
      
      const loginForm = document.getElementById('loginForm');
      const registerForm = document.getElementById('registerForm');
      
      // Validación para login antes de enviar
      if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
          const usuario = document.getElementById('loginUsuario')?.value;
          const clave = document.getElementById('loginPassword')?.value;
          
          if (!usuario || usuario.trim() === '') {
            e.preventDefault();
            alert('Por favor ingresa tu nombre de usuario.');
            return false;
          }
          if (!clave || clave.trim() === '') {
            e.preventDefault();
            alert('Por favor ingresa tu contraseña.');
            return false;
          }
          // Si pasa validación, el formulario se envía normalmente
        });
      }
      
      // Validación para registro antes de enviar
      if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
          const usuario = document.getElementById('regName')?.value;
          const clave = document.getElementById('regPassword')?.value;
          
          if (!usuario || usuario.trim() === '') {
            e.preventDefault();
            alert('Por favor ingresa un nombre de usuario.');
            return false;
          }
          if (usuario.length < 3) {
            e.preventDefault();
            alert('El usuario debe tener al menos 3 caracteres.');
            return false;
          }
          if (!clave || clave.trim() === '') {
            e.preventDefault();
            alert('Por favor ingresa una contraseña.');
            return false;
          }
          if (clave.length < 6) {
            e.preventDefault();
            alert('La contraseña debe tener al menos 6 caracteres.');
            return false;
          }
          // Si pasa validación, el formulario se envía normalmente a AuthController->registrar()
        });
      }
    })();
  </script>
</body>
</html>