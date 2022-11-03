

function btn_guardar_datos()
{
    var nombre = $("#nombre").val();
    var primerAp = $("#primerAp").val();
    var  segundoAp = $("#segundoAp").val();
    var ci = $("#ci").val();
    var cuenta  = $("#cuenta").val();
    var pass = $("#pass").val();
    var fechaCreacion = $("#fechaCreacion").val();
    var telefono = $("#telefono").val();
    var direccion = $("#direccion").val();
    console.log(fechaCreacion);

    var ob= {nombre:nombre,primerAp:primerAp,segundoAp:segundoAp,ci:ci,cuenta:cuenta,pass:pass,fechaCreacion:fechaCreacion,telefono:telefono,direccion:direccion};
    $.ajax({
                //el protocolo
                type: "POST",

                //a donde quiero mandar el objeto
                url: "http://localhost/fipago/index.php/Conductor/agregar_bd",    

                data: ob,

                //que quieres mostrar como recargable al iniciar
                beforeSend: function(objeto){
                    $("#panel_respuesta").html("enviando...");
                },

                //al finalizar
                success: function(data)
                {
                    $("#panel_respuesta").html("");
                    btn_listar_datos();
                    //setTimeout(function(){ location.reload(); }, 2000);


                }
            });
}

function btn_listar_datos()
{
    // va vacio porque no es un formulario de registro
    var ob= "";
    $.ajax({
                //el protocolo
                type: "POST",
                //a donde quiero mandar el objeto
                url: "http://localhost/fipago/index.php/Conductor/listar_datos",    
                data: ob,

                //que quieres mostrar como recargable al iniciar
                beforeSend: function(objeto){
                    
                },

                //al finalizar
                success: function(data)
                {
                    $("#panel_listado").html(data);
                }
            });
}




function btn_eliminar(idConductor){
    var idConductor = Number(idConductor);
    console.log("eliminar",idConductor)
    var obj= {idConductor:idConductor};
    console.log(obj)
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/fipago/index.php/Conductor/traer_datos",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        console.log('success');
                        $("#panel_respuesta_eliminar").html(data);
                        // btn_listar_datos();
                        console.log('success');
                       
                    }
                });
}
function btnEliminar(){
    var idConductor = $('#idConductor_eli').val();;
    console.log("eliminar",idConductor)
    var obj= {idConductor:idConductor};
    console.log(obj)
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/fipago/index.php/Conductor/eliminar",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        console.log('success');
                        // $("#panel_respuesta_eliminar").html(data);
                        btn_listar_datos();
                        console.log('success');
                       
                    }
                });
}

function btn_guardar_edicion()
{

    var idConductor = $("#idConductor_edi").val();
    var nombre = $("#nombre_edi").val();
    var primerAp = $("#primerAp_edi").val();
    var  segundoAp = $("#segundoAp_edi").val();
    var ci = $("#ci_edi").val();
    var cuenta  = $("#cuenta_edi").val();
    var pass = $("#pass_edi").val();
    var fechaCreacion = $("#fechaCreacion_edi").val();
    var telefono = $("#telefono_edi").val();
    var direccion = $("#direccion_edi").val();
    console.log(fechaCreacion);

    var obj= {idConductor:idConductor,nombre:nombre,primerAp:primerAp,segundoAp:segundoAp,ci:ci,cuenta:cuenta,pass:pass,fechaCreacion:fechaCreacion,telefono:telefono,direccion:direccion};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/fipago/index.php/Conductor/guardar_datos",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_respuesta_edicion").html(data);
                        btn_listar_datos();
                       
                    }
                });
}


function btn_buscar()
{

    var palabra = $("#dato_buscado").val();
    console.log(palabra);
    var obj= {palabra:palabra};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: url_p+"Cmedicamento/buscar_en_bd",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_listado").html(data);
                       
                    }
                });
}


//modal para registrar

function btn_modal_para_ingresar(){
    
    console.log('click');
    var ob= "";
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/fipago/index.php/Conductor/subir_modal",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
    
                    //al finalizar
                    success: function(data)
                    {
                        
                        $("#panel_registrar").html(data);
                        document.querySelector('#guardar').disabled = true; 
                        document.querySelector('#direccion').addEventListener('blur',validarCampos);

                        function validarCampos(e){
                            if (e.target.value.length > 0) {
                                
                                document.querySelector('#guardar').disabled = false; 
                                
                                
                            }else{
                                document.querySelector('#guardar').disabled = true; 
                            }
                            
                            
                            
                            
                        }
                       
                    }
                });
}

// function btn_salir()
// {
//     console.log("intentando salir desde medicamento");

//     var obj= "";
//         $.ajax({
//                     //el protocolo
//                     type: "POST",
//                     //a donde quiero mandar el objeto
//                     url: url_p+"Cmedicamento/cerrar_session",    
//                     data: obj,
    
//                     // que quieres mostrar como recargable al iniciar
//                     beforeSend: function(objeto){
                        
//                     },
    
//                     //al finalizar
//                     success: function(data)
//                     {
//                         // $("#panel_listado").html(data);
                       
//                     }
//                 });
// }

function btn_editar(idConductor){
    // console.log(id_medicamento);

    var ob= {idConductor:idConductor};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/fipago/index.php/Conductor/editar_datos",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_editar").html(data);
                       
                    }
                });
}

function btn_mostrar_detalle(id_medicamento){
    console.log(id_medicamento);
    var ob= {id_medicamento:id_medicamento};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: url_p+"Cmedicamento/recuperar_datos_detalle",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_mostrar_detalle").html(data);
                       
                    }
                });
}