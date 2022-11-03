<div class="container-fluid">





  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Conductor Desahabilitados</h1>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-inline">

      <?php echo form_open_multipart('conductor/index'); ?>
      <button type="submit" name="buton2" class="btn btn-warning d-inline " style="width:400px; display:inline;">VER CONDUCTORES HABILITADOS</button>
      <?php echo form_close(); ?>

      <br>
      <br>
      <h6 class="m-0 font-weight-bold text-primary ">Tabla de Conductores</h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre Conductor</th>
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>
              <th>Ingreso</th>
              <th>Habilitar</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>#</th>
              <th>Nombre Conductor</th>
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>
              <th>Ingreso</th>
              <th>Habilitar</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $indice = 1;
            foreach ($conductores->result() as $row) {
            ?>
              <tr>
                <th scope="row"><?php echo $indice; ?></th>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->primerApellido; ?></td>
                <td><?php echo $row->segundoApellido; ?></td>
                <td><?php echo $row->ingreso; ?></td>


                <td>

                  <?php echo form_open_multipart("conductor/habilitarbd"); ?>
                  <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
                  <input type="submit" name="buttonz" value="Habilitar" class="btn btn-warning">
                  <?php echo form_close(); ?>

                </td>

              </tr>
            <?php
              $indice++;
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->



