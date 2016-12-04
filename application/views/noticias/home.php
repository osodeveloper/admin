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
            <table class="ui celled table">
              <thead>
                <tr>
                  <th>Titulo de la Noticia</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($news as $val): ?>
                  <tr>
                    <td><?= $val->titulo ?></td>
                    <td><?= $val->fecha ?></td>
                    <td class=""><?= strtoupper($val->estado) ?></td>
                    <td class="selectable center aligned">
                      <a href="<?= base_url('usuarios/editar/'.$val->id) ?>" class=""><i class="pencil icon" style="font-size:20px;"></i></a>
                    </td>
                    <td class="selectable center aligned">
                      <a href="<?= base_url('usuarios/borrar/'.$val->id) ?>" class=""><i class="remove user icon red" style="font-size:20px;"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

    <?php $this->load->view('overall/footer') ?>
  </body>
</html>
