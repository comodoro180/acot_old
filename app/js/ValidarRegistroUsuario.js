$(document).ready(function () {
  
  var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
  var error_incio = "<div id='error' class='alert alert-danger' role='alert'>";
  var error_fin = "</div>";

  $("#registrar").click(function () {

    $("#error").remove(); //Esto hace que el mensaje de error no se muestre desde el pricinpio

    if ($("#nombre").val() === "") {
      $("#nombre").focus().after(error_incio + "Debe ingresar un nombre" + error_fin);      
      return false;

    } else if ($("#email").val() === "" || !emailreg.test($("#email").val())) {
      $("#email").focus().after(error_incio + "Ingrese un email correcto" + error_fin);
      return false;

    } else if ($("#clave1").val() === "") {
      $("#clave1").focus().after(error_incio + "Debe ingresar una contraseña" + error_fin);
      return false;

    } else if ($("#clave2").val() === "") {
      $("#clave2").focus().after(error_incio + "Debe repetir la contraseña" + error_fin);
      return false;

    } else if ($("#clave1").val() !== $("#clave2").val()) {
      $("#clave2").focus().after(error_incio + "Las contraseñas deben ser iguales" + error_fin);
      return false;

    } else { // Datos de usuario validos             
    
      var url_regsitro = '../controles/UsuarioRegistro.php';
            
      $.ajax({
        type: "POST",
        url: url_regsitro,
        data: $("#FormularioUsuario").serialize(),
        success: function (data)
        {       
          if (data!==""){
            //alert("1Data: " + data + "\nStatus: " + status);
            $("#tituloMensaje").html("¡Error!");
            $("#textoMensaje").html(data);
            $("#enlaceMensaje").attr("href","#");
            $("#enlaceMensaje").attr("data-dismiss","modal");
            $("#enlaceInicio").hide();
            $("#enlaceActivar").hide();
            $("#mensaje").modal('show');
          } else {
            //alert("2Data: " + data + "\nStatus: " + status);
            $("#tituloMensaje").html("¡Usuario registrado correctamente!");
            $("#textoMensaje").html("Hemos enviado un correo a la dirección registrada con un código para que la cuenta sea activada.");            
            //$("#enlaceMensaje").attr("data-dismiss","modal");
            $("#enlaceMensaje").hide();
            $("#enlaceInicio").show();
            $("#enlaceActivar").show();
            $("#mensaje").modal('show');            
          }
        },
        error: function (data) {
            //alert("3Data: " + data.data + "\nStatus: " + status);
            $("#tituloMensaje").html("¡Error!");
            $("#textoMensaje").html(data);
            $("#enlaceMensaje").attr("href","#");
            $("#enlaceInicio").hide();
            $("#enlaceActivar").hide();
            $("#enlaceMensaje").attr("data-dismiss","modal");
            $("#mensaje").modal('show');  
        }
      });      
      return false;
    }    
  });
  
  $("#enlaceInicio").click(function () {
    window.location = 'index.php';
  });
  
  $("#enlaceActivar").click(function () {
    window.location = 'ActivarUsuario.php';
  });
});

