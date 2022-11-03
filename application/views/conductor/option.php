<?php

if ($opcion == "listar") { ?>
  <table class="table table-bordered">
    <thead class="text-white bg-primary" style="border-bottom:none; background:#061B3D !important">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre Completo</th>
        <th scope="col">CI</th>
        <th scope="col">Cuenta</th>
        <th scope="col">contraseña</th>
        <th scope="col">Fecha de Creación</th>
        <th scope="col">Telefono</th>
        <th scope="col">Dirección</th>
        <th scope="col">Modificar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $indice = 0;
      foreach ($conductores->result() as $row) {
        $idConductor = $row->idConductor;
      ?>
        <tr>
          <th scope="row"><?php $indice++;
                          echo $indice;
                          ?></th>
          <td><?php echo $row->primerAp . ' ' . $row->segundoAp . ' ' . ' ' . $row->nombre;
              ?> </td>

          <td><?php echo $row->ci;
              ?></td>
          <td><?php echo $row->cuenta;
              ?></td>
          <td><?php echo $row->pass;
              ?></td>
          <td><?php echo $row->fechaCreacion;
              ?></td>
          <td><?php echo $row->telefono;
              ?></td>
          <td><?php echo $row->direccion;
              ?></td>
          <td scope="col">


            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $idConductor; ?>');">Editar</button>

          </td>
          <td scope="col">

            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $idConductor; ?>');">Eliminar</button>

            <!-- <button type="button" class="btn btn-outline-danger" onclick="btn_eliminar('<?php //echo $idConductor; 
                                                                                              ?>');"> -->
            <!-- </button> -->
          </td>


        </tr>

      <?php
      }

      ?>


    </tbody>
  </table>



  <?php }
if ($opcion == "editar") {
  foreach ($conductoress->result() as $row) {
  ?>





    <div class="container">


      <!-- <div class="col-md-4 col-xs-12"> -->
      <div class="row">
        <input type="hidden" class="form-control" id="idConductor_edi" aria-describedby="emailHelp" value="<?php echo $row->idConductor ?>">
        <div class="col-12">
          <label for="exampleInputEmail1" class="form-label">Nombre</label>
          <input type="text" class="form-control" required name="nombre" id="nombre_edi" aria-describedby="emailHelp" value="<?php echo $row->nombre; ?>">
        </div>

        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Primer Apellido</label>
          <input type="text" class="form-control" required name="primerAp" id="primerAp_edi" aria-describedby="emailHelp" value="<?php echo $row->primerAp; ?>">
        </div>
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">Segundo Apellido</label>
          <input type="text" class="form-control" name="segundoAp" id="segundoAp_edi" aria-describedby="emailHelp" value="<?php echo $row->segundoAp; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">C.I.</label>
          <input type="text" class="form-control" required name="ci" id="ci_edi" aria-describedby="emailHelp" value="<?php echo $row->ci; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Telefono</label>
          <input type="text" class="form-control" required name="telefono" id="telefono_edi" aria-describedby="emailHelp" value="<?php echo $row->telefono; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Cuenta</label>
          <input type="text" class="form-control" required name="cuenta" id="cuenta_edi" aria-describedby="emailHelp" value="<?php echo $row->cuenta; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Password</label>
          <input type="text" class="form-control" required name="pass" id="pass_edi" aria-describedby="emailHelp" value="<?php echo $row->pass; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Dirección</label>
          <input type="text" class="form-control" required name="direccion_edi" id="direccion_edi" aria-describedby="emailHelp" value="<?php echo $row->direccion; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Fecha_Registro</label>
          <input type="date" class="form-control" id="fechaCreacion_edi" required name="fechaCreacion" value="<?php echo $row->fechaCreacion; ?>" disabled aria-describedby="emailHelp">
        </div>



      </div>





    <?php
  }
}
if ($opcion == "buscador") {
    ?>


    <table class="table table-bordered">
      <thead style="background:#337ccb;" class="text-white">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Medicamento</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Precio</th>
          <th scope="col">Precio_2</th>
          <th scope="col">Precio_3</th>
          <th scope="col">Fecha_venc</th>
          <th scope="col">Tipo</th>
          <th scope="col">Ver</th>
          <?php if ($this->session->userdata['id_cargo_session']  == 1) { ?>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
          <?php } ?>

        </tr>
      </thead>
      <tbody>

        <?php
        $indice = 0;
        foreach ($medicamentos->result() as $row) {
          $id_medicamento = $row->id_medicamento;
        ?>
          <tr>
            <th scope="row"><?php $indice++;
                            echo $indice;
                            ?></th>
            <td><?php echo $row->medicamento;
                ?> </td>

            <td><?php echo $row->cantidad;
                ?></td>
            <td><?php echo $row->precio;
                ?></td>
            <td><?php echo $row->precio_2;
                ?></td>
            <td><?php echo $row->precio_3;
                ?></td>
            <td><?php echo $row->fecha_venc;
                ?></td>
            <td><?php echo $row->categoria;
                ?></td>
            <td scope="col">

              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal_detalle" onclick="btn_mostrar_detalle('<?php echo $id_medicamento; ?>');">
                Ver
              </button>
            </td>
            <?php if ($this->session->userdata['id_cargo_session']  == 1) { ?>

              <td scope="col">

                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#myModal_editar" onclick="btn_editar('<?php echo $id_medicamento;
                                                                                                                                                    ?>');">
                  Editar
                </button>
              </td>
              <td scope="col">

                <button type="button" class="btn btn-outline-danger" onclick="btn_eliminar('<?php echo $id_medicamento;
                                                                                            ?>');">
                  Eliminar
                </button>
              </td>
            <?php } ?>


          </tr>

        <?php
        }

        ?>


      </tbody>
    </table>


    <!-- Paginacion  -->
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <?php
        for ($i = 1; $i <= $last_pag; $i++) {
        ?>
          <li class="page-item"><a class="page-link" href="<?php echo base_url();
                                                            ?>Cmedicamento/index/<?php echo $i
                                                                                  ?>"><?php echo $i
                                                                                      ?></a></li>
        <?php
        }
        ?>

        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
    <!-- End Paginacion  -->


  <?php
}
if ($opcion == "formulario") {
  ?>
    <div class="container">


      <!-- <div class="col-md-4 col-xs-12"> -->
      <div class="row">
        <div class="col-12">
          <label for="exampleInputEmail1" class="form-label">Nombre</label>
          <input type="text" class="form-control" required name="nombre" id="nombre" aria-describedby="emailHelp">
        </div>

        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Primer Apellido</label>
          <input type="text" class="form-control" required name="primerAp" id="primerAp" aria-describedby="emailHelp">
        </div>
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">Segundo Apellido</label>
          <input type="text" class="form-control" name="segundoAp" id="segundoAp" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">C.I.</label>
          <input type="text" class="form-control" required name="ci" id="ci" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Telefono</label>
          <input type="text" class="form-control" required name="telefono" id="telefono" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Cuenta</label>
          <input type="text" class="form-control" required name="cuenta" id="cuenta" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Password</label>
          <input type="text" class="form-control" required name="pass" id="pass" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Dirección</label>
          <input type="text" class="form-control" required name="direccion" id="direccion" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">Fecha_Registro</label>
          <input type="date" class="form-control" id="fechaCreacion" required name="fechaCreacion" value="<?php echo date("Y-m-d"); ?>" disabled id="fechaRegistro" aria-describedby="emailHelp">
        </div>



      </div>
    </div>


    <!-- </div> -->

    <?php
  }
  if ($opcion == "detalle") {
    foreach ($medicament->result() as $row) {
    ?>

      <h2><?php echo $row->medicamento ?></h2>


      <table class="table table-bordered">
        <thead class="text-white bg-primary">
          <tr>
            <th scope="col">Concepto</th>
            <th scope="col">Datos</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="col">Cantidad</th>
            <td scope="col"><?php echo $row->cantidad; ?></th>
          </tr>
          <tr>
            <td scope="col">Precio</th>
            <td scope="col"><?php echo $row->precio; ?></th>
          </tr>
          <tr>
            <td scope="col">Precio_2</th>
            <td scope="col"><?php echo $row->precio_2; ?></th>
          </tr>
          <tr>
            <td scope="col">Precio_3</th>
            <td scope="col"><?php echo $row->precio_3; ?></th>
          </tr>
          <tr>
            <td scope="col">Fecha_venc</th>
            <td scope="col"><?php echo $row->fecha_venc; ?></th>
          </tr>
          <tr>
            <td scope="col">Categoria</th>
            <td scope="col"><?php echo $row->categoria; ?></th>
          </tr>
          <tr>
            <td scope="col">Descripcion</th>
            <td scope="col"><?php echo $row->descripcion; ?></th>
          </tr>
        </tbody>

      </table>




    <?php
    }
  }
  if ($opcion == "eliminar") {
    foreach ($conductoresss->result() as $row) {

    ?>





      <div class="container">


        <!-- <div class="col-md-4 col-xs-12"> -->
        <div class="row">
          <input type="hidden" class="form-control" id="idConductor_eli" aria-describedby="emailHelp" value="<?php echo $row->idConductor ?>">






        </div>





    <?php
    }
  }
