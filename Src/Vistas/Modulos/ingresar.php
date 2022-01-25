<div class="login-box">
  <div class="login-logo">
    <h1>Restaurante</h1>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Inisio de Sesión</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="clave" placeholder="Contraseña" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-14">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
         <?php

      $inicio = new UsuariosC();
      $inicio -> IniciarSesionC();

      ?>
      
      </div>
    </form>

  </div>
</div>