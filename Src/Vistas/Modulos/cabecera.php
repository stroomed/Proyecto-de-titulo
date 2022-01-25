<header class="main-header">
    <!-- Logo -->
    <a href="http://localhost/restauranteTest/Inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class="fa fa-cutlery" style="font-size: 25px"></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><i class="fa fa-cutlery"></i><b>REST</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <?php

              echo '<span class="hidden-xs">'.$_SESSION["apellido"].' '.$_SESSION["nombre"].'</span>';

              ?>

              

            </a>

            <ul class="dropdown-menu">
             
              <li class="user-footer">
                <div class="pull-left">
                  <a href="http://localhost/restauranteTest/Perfil" class="btn btn-primary btn-flat">Mi Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="http://localhost/restauranteTest/Salir" class="btn btn-danger btn-flat">Salir</a>
                </div>
              </li>

            </ul>

          </li>
         
        </ul>
      </div>
    </nav>
  </header>