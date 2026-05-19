<!-- MODAL DE REGISTRO -->
<div id="registerModal" class="modal-overlay" style="display: none;">
  <div class="modal-container">
    <div class="modal-header">
      <h3><i class="fas fa-user-plus"></i> Crear cuenta nueva</h3>
      <button class="modal-close" data-modal="register">&times;</button>
    </div>
    <div class="modal-body">
      <form id="registerForm" class="modal-form" action="<?php echo BASE_URL; ?>/auth/registrar" method="POST">
        <div class="form-group">
          <label for="regName">Nombre de usuario</label>
          <div class="input-icon">
            <i class="fas fa-user"></i>
            <input type="text" id="regName" name="usuario" placeholder="Ej: juanperez" required>
          </div>
          <small style="color: #64748b; font-size: 0.75rem;">Mínimo 3 caracteres</small>
        </div>
       
        <div class="form-group">
          <label for="regPassword">Contraseña</label>
          <div class="input-icon">
            <i class="fas fa-lock"></i>
            <input type="password" id="regPassword" name="clave" placeholder="Mínimo 6 caracteres" required>
          </div>
          <small style="color: #64748b; font-size: 0.75rem;">Mínimo 6 caracteres</small>
        </div>
        
        <button type="submit" class="btn-primary btn-full">Registrarse</button>
        <div class="modal-footer-text">
          <p>¿Ya tienes cuenta? <a href="#" id="switchToLoginFromRegister">Inicia sesión aquí</a></p>
        </div>
      </form>
    </div>
  </div>
</div>