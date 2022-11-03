

function btn_guardar_datoss()
{
    var codigo = $("#codigo").val();
    var fechaVencimiento = $("#fechaVencimiento").val();
    

    var ob= {codigo:codigo,fechaVencimiento:fechaVencimiento};
    $.ajax({
                //el protocolo
                type: "POST",

                //a donde quiero mandar el objeto
                url: "http://localhost/fipago/index.php/Tarjeta/agregar_bd",    

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
                url: "http://localhost/fipago/index.php/Tarjeta/listar_datos",    
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




function btn_eliminara(idTarjeta){
    var idTarjeta = Number(idTarjeta);
    console.log("eliminar",idTarjeta)
    var obj= {idTarjeta:idTarjeta};
    console.log(obj)
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/fipago/index.php/Tarjeta/traer_datos",    
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
function btnEliminara(){
    var idTarjeta = $('#idTarjeta_eli').val();;
    console.log("eliminar",idTarjeta)
    var obj= {idTarjeta:idTarjeta};
    console.log(obj)
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/fipago/index.php/Tarjeta/eliminar",    
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

    var idTarjeta = $("#idTarjeta_edi").val();
    var codigo = $("#codigo_edi").val();
    var fechaVencimiento = $("#fechaVencimiento_edi").val();

    var obj= {idTarjeta:idTarjeta,codigo:codigo,fechaVencimiento:fechaVencimiento};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/fipago/index.php/Tarjeta/guardar_datos",    
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
                    url: "http://localhost/fipago/index.php/Tarjeta/subir_modal",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        console.log('success');
                        $("#panel_registrar").html(data);
                       
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

function btn_editar(idTarjeta){
    // console.log(id_medicamento);

    var ob= {idTarjeta:idTarjeta};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/fipago/index.php/Tarjeta/editar_datos",    
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
// window.addEventListener("afterprint", function(event) {
//     console.log(event);
//   });
// window.matchMedia('print').addListener((evento)=>{console.log(evento);});
