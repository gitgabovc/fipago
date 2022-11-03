<div class="col py-3">
    <div class="" style="width:100% ;">
        <p>System / Tarjetas</p>

    </div>
    <input type="text" class="form-control border border-dark " name="" id="dato_buscado" aria-describedby="emailHelp" onkeyup="btn_buscar();" style="width:60%;display:inline;margin-top:.1em; margin-bottom:15px;">
    <button type="button" class="btn border border-dark " data-toggle="modal" onclick="btn_buscar();"> Buscar</button>
    <button type="button" class="btn border border-dark" data-toggle="modal" data-target="#myModal_registrar" onclick="btn_modal_para_ingresar()">Registrar</button>

    <div id="panel_listado">
        <table class="table table-bordered">
            <thead class="text-white " style="border-bottom:none; background:#061B3D; border-color:#061B3D !important">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Código</th>
                    <th scope="col">Fecha de Vencimiento</th>
                    <th scope="col">Saldo Monetario</th>
                    <th scope="col">imprimir</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>


    </div>


</div>
</div>
</div>




<div class="modal fade" id="myModal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header " style="background:#061B3D">
                <h5 class="modal-title text-white">Editar Tarjeta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" class="form-control" id="t_edi" aria-describedby="emailHelp">
                    <div class="col-12">
                        <label for="exampleInputEmail1" class="form-label">Código</label>
                        <input type="text" class="form-control" required name="codigo" id="c_edi" aria-describedby="emailHelp">
                    </div>

                    <div class="col-lg-12">
                        <label for="exampleInputEmail1" class="form-label">Fecha De Vencimiento</label>
                        <input type="date" class="form-control" required name="fechaVencimiento" id="fv_edi" aria-describedby="emailHelp">
                    </div>
                    <div class="col-lg-12">
                        <label for="exampleInputEmail1" class="form-label">Saldo Monetario</label>
                        <input type="number" class="form-control" required name="fechaVencimiento" id="sm_edi" aria-describedby="emailHelp">
                    </div>

                </div>
                <div id="panel_respuesta_edicion"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id='confirmarEdi' class="btnUpdate btn btn-primary" data-dismiss="modal">Editar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal_registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#061B3D">
                    <h5 class="modal-title text-white">Registrar Tarjeta</h4>
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
                    <button type="submit" class="btn btn-primary" id="guardar" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Button trigger modal -->
<div class="modal fade" id="myModal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header " style="background:#061B3D">
                <h5 class="modal-title text-white">?Estas seguro de eliminar?</h4>
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
                <button type="button" id='confirmarDelete' data-eliminar="" class="btn btn-primary" data-dismiss="modal">Si</button>
            </div>
        </div>
    </div>


</div>
<script src="<?php echo base_url(); ?>scripts/control_tarjeta.js"></script>

<script type="module">
    // Import the functions you need from the SDKs you need
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    document.addEventListener('DOMContentLoaded', () => {

        listarDatos();
    });


    // Your web app's Firebase configuration
    const firebaseConfig = {
        apiKey: "AIzaSyCePIm74yylN9oO14T1cmHlbLq60FkXCGw",
        authDomain: "fipagoapp.firebaseapp.com",
        databaseURL: "https://fipagoapp-default-rtdb.firebaseio.com",
        projectId: "fipagoapp",
        storageBucket: "fipagoapp.appspot.com",
        messagingSenderId: "126828297371",
        appId: "1:126828297371:web:f45b6c0cd49771f460da3e"
    };

    // Initialize Firebase
    var firebase = initializeApp(firebaseConfig);
    import {
        getDatabase,
        ref,
        set,
        child,
        update,
        push,
        get,
        remove
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";

    const db = getDatabase();


    var gd = document.querySelector('#guardar');
    gd.addEventListener('click', () => {

        var codigo = document.querySelector('#codigo').value;
        var fechaVencimiento = document.querySelector('#fechaVencimiento').value;
        var saldoTarjeta = document.querySelector('#saldoTarjeta').value;



        set(push(ref(db, 'tarjeta')), {
            codigo: codigo,
            fechaVencimiento: fechaVencimiento,
            saldoMonetario: saldoTarjeta,
            estado: 1
        });
        listarDatos();

    });

    function listarDatos() {
        // console.log("Listar Datos");
        const dbRef = ref(getDatabase());
        get(child(dbRef, `tarjeta`)).then((snapshot) => {
            if (snapshot.exists()) {
                console.log(Object.entries(snapshot.val()));
                const tabla = document.querySelector('table tbody');
                let contenido = '';
                let num = 1;
                // console.log(tabla);
                Object.entries(snapshot.val()).forEach((a) => {
                    if(a[1].estado == 1){


                        contenido += `
                        <tr>
                        <th scope="row">${num}</th>
                        <td>${a[1].codigo}</td>
    
                        <td>${a[1].fechaVencimiento}</td>
                        <td>${a[1].saldoMonetario}</td>
                        <td scope="col">
    
    
                            <a type="button" class="btn btn-outline-warning" href="<?php echo base_url() . 'index.php/tarjeta/imprimir/' ?>${a[1].codigo}/${a[1].saldoMonetario}">Imprimir</a>
    
                        </td>
                        <td scope="col">
    
    
                            <button type="button" data-actualizar='${a[0]}' data-c='${a[1].codigo}' data-fv='${a[1].fechaVencimiento}' data-sm='${a[1].saldoMonetario}' class="update btn btn-outline-warning" data-toggle="modal" data-target="#myModal_editar">Editar</button>
    
                        </td>
                        <td scope="col">
    
                            <button type="button"  data-eliminar='${a[0]}'  class="delete btn btn-outline-danger" data-toggle="modal" data-target="#myModal_eliminar">Eliminar</button>
    
                            
                        </td>
    
    
                        </tr>
                        `;
                        num++;
                    }
                })


                tabla.innerHTML = contenido;

            } else {
                console.log("No data available");
            }
        }).catch((error) => {
            console.error(error);
        });
    }

    var table = document.querySelector('.table');
    table.addEventListener('click', btn_eliminar);




    function btn_eliminar(e) {
        if (e.target.type == 'button' && e.target.classList.contains('delete')) {
            // console.log('es boton');
            var idEliminar = e.target.dataset.eliminar;
            var btnConfirmarEliminar = document.querySelector('#confirmarDelete');

            btnConfirmarEliminar.dataset.eliminar = idEliminar;
        }
        if (e.target.type == 'button' && e.target.classList.contains('update')) {
            // console.log('es boton');
            var idUpdate = e.target.dataset.actualizar;
            var codigo = e.target.dataset.c;
            var fechaVencimiento = e.target.dataset.fv;
            var saldoMonetario = e.target.dataset.sm;
            var btnConfirmarEdi = document.querySelector('#confirmarEdi');

            btnConfirmarEdi.dataset.idEditar = idUpdate;

            var c = document.querySelector('#c_edi');
            var fv = document.querySelector('#fv_edi');
            var sm = document.querySelector('#sm_edi');

            c.value = codigo;
            fv.value = fechaVencimiento;
            sm.value = saldoMonetario;



            btnConfirmarEliminar.dataset.eliminar = idEliminar;
        }
    }

    var confirmarDelete = document.querySelector('#confirmarDelete');
    confirmarDelete.addEventListener('click', confimoEliminacion);

    function confimoEliminacion(e) {
        var key = e.target.dataset.eliminar;
        // console.log(id);


        update((ref(db, 'tarjeta/' + key)), {

            estado: 0
        });
        listarDatos();
    }
    var btnConfirmarEdi = document.querySelector('#confirmarEdi');
    btnConfirmarEdi.addEventListener('click', confirmarEdicion);

    function confirmarEdicion(e) {
        var c = document.querySelector('#c_edi').value;
        var fv = document.querySelector('#fv_edi').value;
        var sm = document.querySelector('#sm_edi').value;

        var key = e.target.dataset.idEditar;
        // console.log(id);


        update((ref(db, 'tarjeta/' + key)), {

            codigo:c,
            fechaVencimiento:fv,
            saldoMonetario:sm
        });
        listarDatos();
    }
</script>