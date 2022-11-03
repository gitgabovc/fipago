<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2>Modificar Cliente</h2>

      <?php
      foreach ($infocliente->result() as $row) {
        echo form_open_multipart('cliente/modificarbd');
      ?>
        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
        <label for="">Nombre</label><br>
        <input type="text" name="nombre" placeholder="Ingrese el nombre del cliente" value="<?php echo $row->nombre; ?>" style="width:50%;" required>
        <br>
        <br>
        <label for="">Primer Apellido</label><br>
        <input type="text" name="primerApellido" placeholder="Ingrese el primer apellido del cliente" value="<?php echo $row->primerApellido; ?>" style="width:50%;" required>
        <br>
        <br>
        <label for="">Segundo Apellido</label><br>
        <input type="text" name="segundoApellido" placeholder="Ingrese el segundo apellido del cliente" value="<?php echo $row->segundoApellido; ?>" style="width:50%;">
        <br>
        <br>
        <label for="">Codigo del cliente</label><br>
        <input type="text" name="saldo" placeholder="Ingrese el saldo del cliente" value="<?php echo $row->saldo; ?>" style="width:50%;" required>
        <br>
        <br>
        <input type="file" name="userfile"  >
        
        <br>
        <br>

        <button type="submit" class="btn btn-success">MODIFICAR CLIENTE</button>
      <?php
        echo  form_close();
      }

      ?>
    </div>
  </div>
</div>