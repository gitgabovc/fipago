<div class="container">
  <div class="row">
    <div class="col-md-12">

      <center>
        <h2>Agregar Cliente</h2>
        <br>

        <br>


        <?php echo form_open_multipart('cliente/agregarbd');  ?>

        <input type="text" name="nombre" placeholder="Ingrese el nombre del cliente" style="width:50%;" required>
        <br>
        <br>
        <br>
        <input type="text" name="primerApellido" placeholder="Ingrese el epellido paterno del cliente" style="width:50%;" required>
        <br>
        <br>
        <br>
        <input type="text" name="segundoApellido" placeholder="Ingrese el apellido materno del cliente" style="width:50%;">
        <br>
        <br>
        <br>
        <input type="text" name="saldo" placeholder="Ingrese el saldo del cliente" style="width:50%;" required>
        <br>
        <br>
        <br>

        <button type="submit" class="btn btn-primary">AGREGAR CLIENTE</button>
      </center>
      <?php echo form_close(); ?>



    </div>
  </div>
</div>