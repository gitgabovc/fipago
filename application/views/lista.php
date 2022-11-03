<div class="container-fluid">











  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Conductor Activos</h1>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-inline">

      <?php echo form_open_multipart('conductor/deshabilitados'); ?>
      <button type="submit" name="buton2" class="btn btn-warning d-inline " style="width:400px; display:inline;">VER CONDUCTORES DESHABILITADOS</button>
      <?php echo form_close(); ?>


      <?php echo form_open_multipart('conductor/agregar'); ?>
      <button type="submit" name="buton1" class="btn btn-primary d-inline" style="display:inline; width:400px;">AGREGAR CONDUCTOR</button>
      <?php echo form_close(); ?>

      <?php echo form_open_multipart('conductor/listapdf'); ?>
      <button type="submit" name="buton2" class="btn btn-success d-inline " style="width:400px; display:inline;">REPORTE PDF</button>
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
              <th>Modificar</th>
              <th>Eliminar</th>
              <th>Desahabilitar</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre Conductor</th>
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>
              <th>Ingreso</th>
              <th>Modificar</th>
              <th>Eliminar</th>
              <th>Desahabilitar</th>
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

                  <?php echo form_open_multipart("conductor/modificar"); ?>
                  <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
                  <input type="submit" name="buttony" value="Modificar" class="btn btn-success">
                  <?php echo form_close(); ?>

                </td>

                <td>

                  <?php echo form_open_multipart("conductor/eliminarbd"); ?>
                  <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
                  <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger">
                  <?php echo form_close(); ?>

                </td>

                <td>

                  <?php echo form_open_multipart("conductor/deshabilitarbd"); ?>
                  <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
                  <input type="submit" name="buttonz" value="Desahabilitar" class="btn btn-warning">
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