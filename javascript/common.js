$(document).ready(function(){

	$("#subtitle").html($("#app-subtitle").val())

	//Deshabiltar Menu Contextual
	 $(document).bind("contextmenu",function(e){
              return false;
     }); 

	
	$(".list tr:odd").addClass("none"); // filas impares
    $(".list tr:even").addClass("pare"); // filas pares
	$(".list tr:hover").addClass("sobre"); // filas pares
	
    $('#login-form').submit(function(){

    var username = $('input[name="username"]');
    var password = $('input[name="password"]');

        if(username.val()==''){
          $("#username-error").html("El campo <b>Usuario</b> es obligatorio");
          $("#username-error").css("display","block");
          $("#username-error").addClass("error");
          return false;
        }else{

           if(username.val().length < 5){

             $("#username-error").html("El campo <b>Usuario</b> debe poseer al menos 8 caracteres");
             $("#username-error").css("display","block");
             $("#username-error").addClass("error");
             return false;
           }

        }

         if(password.val()==''){

             $("#password-error").html("El campo <b>Contrase&ntilde;a</b> es obligatorio");
             $("#password-error").css("display","block");
             $("#password-error").addClass("error");
             return false;

         }else{
             if(password.val().length < 8){
             $("#password-error").html("El campo <b>Contrase&ntilde;a</b> debe poseer al menos 8 caracteres");
             $("#password-error").css("display","block");
             $("#password-error").addClass("error");
             return false;
             }
         }

         return true;

    });

    
    
    $('.action').click(function(){

        var url = $(this).val();
        document.location.href=url;

    });
    
    
    // Abrir POPUP
    $('.pdf').click(function(){

        var url = $(this).val();
        
        window.open(url,"PDF","width=800,height=600");

    });

    $('button[name="popup"]').click(function(){

        var file = $(this).val();
        var options =$(this).attr("title");
        window.open("popup/"+file,"Titulo",options);

    });

    $('#salir').click(function(){
		if(confirm("Desea cerrar la sesion.? \n Nota; se perderan los datos no guardados")){
			
			return true;
			
		}else{
			
			return false;
		}
    });

         
   
    
})

