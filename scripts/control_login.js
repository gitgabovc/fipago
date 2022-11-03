function login()
{
    var email = $('#email').val();
    var password = $('#password').val();

    var ob={email:email,password:password};

    $.ajax({
        //el protocolo
        type: "POST",

        //a donde quiero mandar el objeto
        url: url_p+"Clogin/ingresar",    

        data: ob,

        //que quieres mostrar como recargable al iniciar
        beforeSend: function(objeto){
            $("#panel_respuesta_ingreso").html("enviando...");
        },

        //al finalizar
        success: function(data)
        {
            $("#panel_respuesta_ingreso").html(data);
            
            //setTimeout(function(){ location.reload(); }, 2000);


        }
    });

}

function btn_salir()
{
    console.log("intentando salir desde medicamento");

    var obj= "";
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: url_p+"Clogin/cerrar_session",    
                    data: obj,
    
                    // que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        // $("#panel_listado").html(data);
                       
                    }
                });
}