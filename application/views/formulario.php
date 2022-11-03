<div class="container">
  <div class="row">
    <div class="col-md-12">

      <center>
        <h2>Agregar Conductor</h2>
        <?php
        echo validation_errors();
        ?>
        <br>
        <form id="formulario" action="destino.php" class="formularioestilo"></form>

        <br>


        <?php
        $atributos = array('class' => 'form-control', 'id' => 'formulario');
        echo form_open_multipart('conductor/agregarbd', $atributos);
        ?>

        <input type="text" name="nombre" placeholder="Ingrese el nombre del conductor" style="width:50%;" class="form-control" value="<?php echo set_value('nombre'); ?>">
        <br>
        <br>
        <br>
        <input type="text" name="primerApellido" placeholder="Ingrese el primer apellido" style="width:50%;" class="form-control">
        <br>
        <br>
        <br>
        <input type="text" name="segundoApellido" placeholder="Ingrese el segundo apellido" style="width:50%;" class="form-control">
        <br>
        <br>
        <br>
        <input type="text" name="ingreso" placeholder="Ingrese cual es su monto de ingreso" style="width:50%;" class="form-control">
        <br>
        <br>
        <br>

        <button type="submit" class="btn btn-primary">AGREGAR CONDUCTOR</button>
      </center>
      <?php form_close(); ?>



    </div>
  </div>
</div>