<div id="loginModal" class="modal-overlay" style="display: none;">
    <div class="modal-container">
      <div class="modal-header">
        <h3><i class="fas fa-sign-in-alt"></i> Iniciar sesión</h3>
        <button class="modal-close" data-modal="login">&times;</button>
      </div>
      <div class="modal-body">
        <!-- IMPORTANTE: Agregar action y method -->
        <form id="loginForm" class="modal-form" action="<?php echo BASE_URL; ?>/auth/login" method="POST">
          <div class="form-group">
            <label for="loginUsuario">Nombre de usuario</label>
            <div class="input-icon">
              <i class="fas fa-user"></i>
              <!-- Cambiar name="email" a name="usuario" -->
              <input type="text" id="loginUsuario" name="usuario" placeholder="Tu nombre de usuario" required>
            </div>
          </div>
          <div class="form-group">
            <label for="loginPassword">Contraseña</label>
            <div class="input-icon">
              <i class="fas fa-lock"></i>
              <!-- Cambiar name="password" a name="clave" -->
              <input type="password" id="loginPassword" name="clave" placeholder="********" required>
            </div>
          </div>
          <div class="form-options">
            <label class="checkbox-label">
              <input type="checkbox" name="recordar"> Recordarme
            </label>
            <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
          </div>
          <button type="submit" class="btn-primary btn-full">Ingresar</button>
          <div class="modal-footer-text">
            <p>¿No tienes cuenta? <a href="#" id="switchToRegisterFromLogin">Regístrate aquí</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>