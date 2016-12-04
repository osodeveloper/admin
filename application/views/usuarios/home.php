<!DOCTYPE html>
<html lang="es">
  <head>
    <?php $this->load->view('overall/head') ?>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view('overall/menu') ?>
          <div class="x_content">
            <table class="ui celled table">
              <thead>
                <tr>
                  <th>Nombre Usuario</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($us as $val): ?>
                  <tr>
                    <td><?= $val->username ?></td>
                    <?php if (strtoupper($val->estado) == 'APROBADO'): ?>
                      <td class="positive"><?= strtoupper($val->estado) ?></td>
                    <?php elseif(strtoupper($val->estado) == 'DENEGADO'): ?>
                      <td class="negative"><?= strtoupper($val->estado) ?></td>
                    <?php else: ?>
                      <td class=""><?= strtoupper($val->estado) ?></td>
                    <?php endif; ?>
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
