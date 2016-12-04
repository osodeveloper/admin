<!DOCTYPE html>
<html lang="es">
  <head>
    <?php $this->load->view('overall/head') ?>
    <link rel="stylesheet" href="<?php echo base_url('overall/build/semantic.min.css') ?>" media="screen" title="no title">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view('overall/menu') ?>

          <div class="x_content">
            <div class="col-md-4 col-md-offset-4 text-center">
              <div class="row">
                <div class="text-center">
                  <img class="img" src="<?= base_url('overall/app/images/logo.png') ?>" alt="" />
                </div>
                <h3>Panel Administrativo</h3>
              </div>
            </div>
          </div>

    <?php $this->load->view('overall/footer') ?>
  </body>
</html>
