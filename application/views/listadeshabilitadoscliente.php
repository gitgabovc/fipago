<div class="container-fluid">





  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Clientes Desahabilitados</h1>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-inline">

      <br>
      <br>
      <h6 class="m-0 font-weight-bold text-primary ">Tabla de Clientes</h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>
              <th>Saldo</th>
              <th>Habilitar</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>
              <th>Saldo</th>
              <th>Habilitar</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $indice = 1;
            foreach ($clientes->result() as $row) {
            ?>
              <tr>
                <th scope="row"><?php echo $indice; ?></th>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->primerApellido; ?></td>
                <td><?php echo $row->segundoApellido; ?></td>
                <td><?php echo $row->saldo; ?></td>


                <td>

                  <?php echo form_open_multipart("cliente/habilitarbd"); ?>
                  <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
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



<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/datatables-demo.js"></script>