
function btn_guardar_datos_categoria()
{
    var categoria = $("#categoria").val();
    var descripcion_categoria = $("#descripcion_categoria").val();
    console.log(categoria);
    console.log(descripcion_categoria);
    

    var ob= {categoria:categoria,descripcion_categoria:descripcion_categoria};
    $.ajax({
                //el protocolo
                type: "POST",

                //a donde quiero mandar el objeto
                url: url_p+"Ccategoria/agregar_bd",    

                data: ob,

                //que quieres mostrar como recargable al iniciar
                beforeSend: function(objeto){
                    $("#panel_respuesta_categoria").html("enviando...");
                },

                //al finalizar
                success: function(data)
                {
                    $("#panel_respuesta_categoria").html("");
                    btn_listar_datos_categoria();
                    //setTimeout(function(){ location.reload(); }, 2000);


                }
            });
}

function btn_listar_datos_categoria()
{
    // va vacio porque no es un formulario de registro
    var ob= "";
    $.ajax({
                //el protocolo
                type: "POST",
                //a donde quiero mandar el objeto
                url: url_p+"Ccategoria/listar_datos",    
                data: ob,

                //que quieres mostrar como recargable al iniciar
                beforeSend: function(objeto){
                    
                },

                //al finalizar
                success: function(data)
                {
                    $("#panel_listado_categoria").html(data);
                }
            });
}


function btn_eliminar_categoria(id_categoria)
{
    console.log("id => "+id_categoria);

    var opcion = confirm("DESEA ELIMIAR EL DATO");
    if (opcion == true) 
    {

        var ob= {id_categoria:id_categoria};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: url_p+"Ccategoria/eliminar",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                       // $("#panel_listado").html(data);
                       btn_listar_datos_categoria();

                    }
                });

	}  

}


function btn_guardar_edicion_categoria()
{

    var id_categ = $("#id_categorias").val();
    var categoria = $("#categoria_editarr").val();
    var descripcion_categoria = $("#descripcion_editarr").val();
    console.log(id_categ+" del js");
    console.log(categoria+" del js");
    console.log(descripcion_categoria+" del js");

    var obj= {id_categ:id_categ,categoria:categoria,descripcion_categoria:descripcion_categoria};
    $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: url_p+"Ccategoria/guardar_datos",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_respuesta_edicion_categoria").html(data);
                        btn_listar_datos_categoria();
                       
                    }
            });
}


function btn_buscar_categoria()
{

    var palabra_categoria = $("#dato_buscado_categoria").val();
    console.log(palabra_categoria);
    var obj= {palabra_categoria:palabra_categoria};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: url_p+"Ccategoria/buscar_en_bd",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_listado_categoria").html(data);
                       
                    }
                });
}


//modal para registrar

function btn_modal_para_registrar(){
    

    var ob= "";
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: url_p+"Ccategoria/subir_modal",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_registrar_categoria").html(data);
                       
                    }
                });
}

// function btn_salir()
// {
//     console.log("intentando salir desde categoria");

//     var obj= "";
//         $.ajax({
//                     //el protocolo
//                     type: "POST",
//                     //a donde quiero mandar el objeto
//                     url: url_p+"Ccategoria/cerrar_session",    
//                     data: obj,
    
//                     //que quieres mostrar como recargable al iniciar
//                     beforeSend: function(objeto){
                        
//                     },
    
//                     //al finalizar
//                     success: function(data)
//                     {
//                         $("#panel_listado_categoria").html(data);
                       
//                     }
//                 });
// }

function btn_editar_categoria(id_categoria){
    console.log(id_categoria);

    var ob= {id_categoria:id_categoria};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: url_p+"Ccategoria/editar_datos",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_editar_categoria").html(data);
                       
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