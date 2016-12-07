<!DOCTYPE html>
<html lang="es">
  <head>
    <?php $this->load->view('overall/head') ?>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container" style="background: #2a3f54;">
        <?php $this->load->view('overall/menu') ?>
          <div class="x_content">
            <div class="row">
              <div class="col-md-12">
                <form class="ui form" id="form_venta" method="post">
                  <div class="col-md-2">
                    <div class="field">
                      <label for="">Fecha:</label>
                      <input type="date" name="fecha" value="">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="field">
                      <label for="">Nombres:</label>
                      <input type="text" name="nombre" value="" placeholder="Nombres">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="field">
                      <label for="">Direccion:</label>
                      <input type="text" name="direccion" value="" placeholder="Direccion">
                    </div>
                    <br>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="ui celled table">
                      <thead>
                        <tr>
                          <th width="10" colspan="2" onclick="agregar()" class="selectable" style="text-align:center;"><i class="fa fa-plus green"></i></th>
                          <th width="50">COD.</th>
                          <th width="50">CANT.</th>
                          <th>DESCRIPCIÓN</th>
                          <th width="80">P. UNT.</th>
                          <th width="80">IMPORTE</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">

                      </tbody>
                    </table>
                    </div>
                  </div>
                  <br>
                  <div class="field">
                    <button type="submit" class="ui button positive" name="button">Registrar Venta <i class="fa fa-check"></i></button>
                  </div>
                  <div id="ajax_resp"></div>
                </form>
              </div>
            </div>
          </div>

    <?php $this->load->view('overall/footer') ?>
    <script src="<?= base_url('overall/app/js/add_venta.js') ?>" charset="utf-8"></script>
  </body>
</html>
