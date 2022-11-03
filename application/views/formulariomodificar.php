<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2>Modificar conductor</h2>

      <?php
      foreach ($infoconductor->result() as $row) {
        echo form_open_multipart('conductor/modificarbd');
      ?>
        <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
        <label for="">Conductor</label><br>
        <input type="text" name="nombre" placeholder="Ingrese el nombre del conductor" value="<?php echo $row->nombre; ?>" style="width:50%;" required>
        <br>
        <br>
        <label for="">Primer Apellido</label><br>
        <input type="text" name="primerApellido" placeholder="Ingrese el primer apellido" value="<?php echo $row->primerApellido; ?>" style="width:50%;" required>
        <br>
        <br>
        <label for="">Segundo Apellido</label><br>
        <input type="text" name="segundoApellido" placeholder="Ingrese el segundo Apellido" value="<?php echo $row->segundoApellido; ?>" style="width:50%;" >
        <br>
        <br>
        <label for="">Ingreso</label><br>
        <input type="text" name="ingreso" placeholder="Ingreso del conductor" value="<?php echo $row->ingreso; ?>" style="width:50%;" required>
        <br>
        <br>

        <button type="submit" class="btn btn-success">MODIFICAR CONDUCTOR</button>
      <?php
        echo  form_close();
      }

      ?>
    </div>
  </div>
</div>