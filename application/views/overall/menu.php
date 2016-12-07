<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?php echo base_url('home')?>" class="site_title"><i class="fa fa-pie-chart"></i><span> Tutupaca</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <img src="<?php echo base_url('overall\app\images\user.jpg')?>" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Bienvenido,</span>
        <h2><?= strtoupper($this->session->userdata('username')) ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->
    <br />
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>MENu</h3>
        <ul class="nav side-menu">
          <li class=""><a href="<?php echo base_url('home') ?>"><i class="fa fa-home"></i> Inicio</a></li>
          <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('usuarios/agregar') ?>">Agregar</a></li>
              <li><a href="<?php echo base_url('usuarios') ?>">Listar</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-newspaper-o"></i> Noticias <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('noticias/agregar') ?>">Agregar</a></li>
              <li><a href="<?php echo base_url('noticias') ?>">Listar</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-home"></i> Obras <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('obras/agregar') ?>">Agregar</a></li>
              <li><a href="<?php echo base_url('obras') ?>">Listar</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-money"></i> Ventas <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('ventas/agregar') ?>">Agregar</a></li>
              <li><a href="<?php echo base_url('ventas') ?>">Listar</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>


<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url('overall\app\images\user.jpg')?>" alt=""><?= strtoupper($this->session->userdata('username'))?> <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">999</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
              <a>
                <span class="image"><img src="<?php echo base_url('overall\app\images\user.jpg')?>" alt="Profile Image" /></span>
                <span>
                  <span>Administrador</span>
                  <span class="time">2016-12-03</span>
                </span>
                <span class="message">
                  Hola, espero que leas este mensaje.
                </span>
              </a>
            </li>

            <li>
              <div class="text-center">
                <a>
                  <strong>Mirar todas las Alertas </strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->
<!--VARIACIONES-->
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= $title ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
