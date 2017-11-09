$(document).ready(function () {

  var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
  var error_incio = "<div id='error' class='alert alert-danger' role='alert'>";
  var error_fin = "</div>";
  
  $("#mensaje").hide();
  
  $("#login").click(function () {
    //alert('login');
    $("#error").remove(); //Esto hace que el mensaje de error no se muestre desde el pricinpio

    if ($("#email").val() === "" || !emailreg.test($("#email").val())) {
      $("#email").focus().after(error_incio + "Ingrese un email correcto" + error_fin);
      return false;

    } else if ($("#clave").val() === "") {
      $("#clave").focus().after(error_incio + "Debe ingresar una contraseña" + error_fin);
      return false;
      
    } else {
      var url_regsitro = '../controles/UsuarioLogin.php';
      $.ajax({
        type: "POST",
        url: url_regsitro,
        data: $("#formularioLogin").serialize(),
        success: function (data,status)
        {       
          if (data!==""){
            //alert("1Data: " + data + "\nStatus: " + status);
            $("#mensaje").show();
            $("#mensaje").attr("class","alert alert-danger text-center");
            $("#mensaje").html(data);
            $("#mensaje").fadeOut(5000);
            /*
            $("#tituloMensaje").html("¡Error!");
            $("#textoMensaje").html(data);
            $("#enlaceMensaje").attr("href","#");
            $("#enlaceMensaje").attr("class","alert alert-danger text-center");
            $("#enlaceInicio").hide();
            $("#mensaje").modal('show');
            */
          } else {            
            //alert("2Data: " + data + "\nStatus: " + status);
            window.location = 'index.php';
            /*
            $("#tituloMensaje").html("¡Transacción exitosa!");
            $("#textoMensaje").html("Usuario registrado correctamente.");            
            //$("#enlaceMensaje").attr("data-dismiss","modal");
            $("#enlaceMensaje").hide();
            $("#enlaceInicio").show();
            $("#mensaje").modal('show');
            */
          }
        },
        error: function (data,status) {
            //alert("3Data: " + data.data + "\nStatus: " + status);
            $("#mensaje").show();
            $("#mensaje").attr("class","alert alert-danger text-center");
            $("#mensaje").html(data);
            $("#mensaje").fadeOut(5000);            
            /*
            $("#tituloMensaje").html("¡Error!");
            $("#textoMensaje").html(data);
            $("#enlaceMensaje").attr("href","#");
            $("#enlaceInicio").hide();
            $("#enlaceMensaje").attr("data-dismiss","modal");
            $("#mensaje").modal('show');
            */
        }
      }); 
      return false;
    }    
  });
});