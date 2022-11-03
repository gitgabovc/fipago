<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Clientes Habilitados</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Tabla Cliente</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabla de clientes habilitados en el Sistema</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>Nombre Cliente</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>Saldo</th>
                  <th>Nro de Viajes</th>
                  <?php
                  if ($this->session->userdata('tipo') == 'adm') {
                  ?>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>desahabilitar</th>
                  <?php
                  }
                  ?>
                </tr>
              </thead>
              <tbody>

                <?php
                $indice = 1;
                foreach ($clientes->result() as $row) {
                ?>
                  <tr>
                    <th scope="row"><?php echo $indice; ?></th>
                    <td>
                      <?php
                      $foto = $row->foto;
                      if ($foto == "") { ?>
                        <img src="<?php echo base_url(); ?>/uploads/user.jpg" style="width:50px; heigth: 50px;">
                      <?php
                      } else {
                      ?>
                        <img src="<?php echo base_url(); ?>/uploads/<?php echo $foto; ?>" style="width:50px; heigth: 50px;">
                      <?php

                      }
                      ?>
                    </td>
                    <td><?php echo $row->nombre; ?></td>
                    <td><?php echo $row->primerApellido; ?></td>
                    <td><?php echo $row->segundoApellido; ?></td>
                    <td><?php echo $row->saldo; ?></td>
                    <td><?php echo numeroViajes($row->saldo); ?></td>
                    <?php
                    if ($this->session->userdata('tipo') == 'adm') {
                    ?>
                      <td>

                        <?php echo form_open_multipart("cliente/modificar"); ?>
                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                        <input type="submit" name="buttony" value="Modificar" class="btn btn-success">
                        <?php echo form_close(); ?>

                      </td>

                      <td>

                        <?php echo form_open_multipart("cliente/eliminarbd"); ?>
                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                        <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger">
                        <?php echo form_close(); ?>

                      </td>

                      <td>

                        <?php echo form_open_multipart("cliente/deshabilitarbd"); ?>
                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                        <input type="submit" name="buttonz" value="Desahabilitar" class="btn btn-warning">
                        <?php echo form_close(); ?>

                      </td>
                    <?php
                    }
                    ?>
                  </tr>
                <?php
                  $indice++;
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nombre Cliente</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>Saldo</th>
                  <th>Nro de viajes</th>
                  <?php
                  if ($this->session->userdata('tipo') == 'adm') {
                  ?>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>desahabilitar</th>
                  <?php
                  }
                  ?>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>