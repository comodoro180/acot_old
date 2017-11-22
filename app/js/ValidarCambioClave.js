$(document).ready(function () {
  var error_incio = "<div id='error' class='alert alert-danger' role='alert'>";
  var error_fin = "</div>";

  $("#mensaje").hide();

  $("#cambiarClave").click(function () {
    $("#error").remove(); //Esto hace que el mensaje de error no se muestre desde el pricinpio
    if ($("#nuevaClave1").val()===''){
      $("#nuevaClave1").focus().after(error_incio + "Debes ingresar una nueva contraseña" + error_fin);
      return false;
    }
    
    if ($("#nuevaClave1").val() !== $("#nuevaClave2").val()) {
      $("#nuevaClave2").focus().after(error_incio + "Las contraseñas deben ser iguales" + error_fin);
      return false;
      
    } else { // Datos de usuario validos   
      var url_regsitro = '../controles/UsuarioCambioClave.php';
      
      $.ajax({
        type: "POST",
        url: url_regsitro,
        data: $("#formularioCambioClave").serialize(),
        success: function (data)
        {       
          if (data!==""){
            //alert("1Data: " + data + "\nStatus: " + status);
            $("#mensaje").show();
            $("#mensaje").attr("class","alert alert-danger text-center");
            $("#mensaje").html(data);
            /*
            $("#tituloMensaje").html("¡Error!");
            $("#textoMensaje").html(data);
            $("#enlaceMensaje").attr("href","#");
            $("#enlaceMensaje").attr("data-dismiss","modal");
            $("#enlaceInicio").hide();
            $("#enlaceActivar").hide();
            $("#mensaje").modal('show');
            */
          } else {
            //alert("2Data: " + data + "\nStatus: " + status);
            $("#mensaje").show();
            $("#mensaje").attr("class","alert alert-success text-center");
            $("#mensaje").html("Clave cambiada correctamente");            
            /*
            $("#tituloMensaje").html("¡Usuario registrado correctamente!");
            $("#textoMensaje").html("Hemos enviado un correo a la dirección registrada con un código para que la cuenta sea activada.");            
            //$("#enlaceMensaje").attr("data-dismiss","modal");
            $("#enlaceMensaje").hide();
            $("#enlaceInicio").show();
            $("#enlaceActivar").show();
            $("#mensaje").modal('show');  
            */
          }
        },
        error: function (data,status) {
            alert("3Data: " + data.data + "\nStatus: " + status);
            /*
            $("#tituloMensaje").html("¡Error!");
            $("#textoMensaje").html(data);
            $("#enlaceMensaje").attr("href","#");
            $("#enlaceInicio").hide();
            $("#enlaceActivar").hide();
            $("#enlaceMensaje").attr("data-dismiss","modal");
            $("#mensaje").modal('show');
            */
        }
      });      
      return false;      
    }
  });
});


