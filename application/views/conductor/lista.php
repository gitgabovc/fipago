<div class="col py-3">
    <div class="" style="width:100% ;">
        <p>System / Conductores</p>

    </div>
    <input type="text" class="form-control border border-dark " name="" id="dato_buscado" aria-describedby="emailHelp" onkeyup="btn_buscar();" style="width:60%;display:inline;margin-top:.1em; margin-bottom:15px;">
    <button type="button" class="btn border border-dark " data-toggle="modal" onclick="btn_buscar();"> Buscar</button>
    <button type="button" class="btn border border-dark" data-toggle="modal" data-target="#myModal_registrar" onclick="btn_modal_para_ingresar()">Registrar</button>
    <!-- <button type="button" class="btn btn-primary " onclick="btn_listar_datos();"> Listar</button> -->

    <!-- <button type="button" class="btn border border-dark" data-bs-toggle="modal" data-target="#myModal_registrars" onclick="btn_modal_para_ingresar()" style="display:inline;">Agregar</button> -->


    <!-- Tabla de medicamentos -->
    <!-- Start panael listado -->
    <div id="panel_listado">
        <table class="table table-bordered" style="border-color:#061B3D !important">
            <thead class="text-white " style="border-bottom:none; background:#061B3D;">
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
                foreach ($conductor->result() as $row) {
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
        <!-- <div id="pagination"><? // $this->pagination->create_links(); 
                                    ?></div> -->
        <!-- Paginacion  -->

    </div>

    <!-- End panel listado -->
</div>
</div>
</div>



<!-- Agregar medicamento -->

<!-- The Modal guardar -->
<!-- <div class="modal fade" id="myModal_registrars">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #084B8A; color:white">
                <h4 class="modal-title">Registrar Conductor</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <div class="modal-body">
                
                <div id="panel_registrar"></div>
                <div id="panel_respuesta_registrar"></div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal" onclick="btn_guardar_datos();">Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
    </div>
    
</div> -->


<!-- The Modal -->
<!-- <div class="modal fade" id="myModal_editars">
    <div class="modal-dialog">
        <div class="modal-content">

            Modal Header
            <div class="modal-header" style="background-color: #084B8A; color:white">
                <h4 class="modal-title">Editar Conductor</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            Modal body
            <div class="modal-body">

                <div id="panel_editar"></div>
                <div id="panel_respuesta_edicion"></div>
            </div>

            Modal footer
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal" onclick="btn_guardar_edicion()">Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div> -->

<!-- Modal -->

<div class="modal fade" id="myModal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header " style=" background:#061B3D">
                <h5 class="modal-title text-white">Editar Conductor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div id="panel_editar"></div>
                <div id="panel_respuesta_edicion"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="btn_guardar_edicion()" data-dismiss="modal">Editar</button>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->

<div class="modal fade" id="myModal_registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header " style=" background:#061B3D">
                    <h5 class="modal-title text-white">Registrar Conductor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div id="panel_registrar"></div>
                    <div id="panel_respuesta_registrar"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="guardar" onclick="btn_guardar_datos();" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Button trigger modal -->
<div class="modal fade" id="myModal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header " style=" background:#061B3D">
                <h5 class="modal-title text-white">Estas seguro de eliminar?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div id="panel_editar"></div>
                <div id="panel_respuesta_eliminar"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="eliminar" data-id="" onclick="btnEliminar()" class="btn btn-primary" data-dismiss="modal">Si</button>
            </div>
        </div>
    </div>

</div>
<script src="<?php echo base_url(); ?>scripts/control_conductor.js"></script>