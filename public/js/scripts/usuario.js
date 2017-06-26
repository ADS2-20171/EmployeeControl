function resetear(){
        document.forms['usuario'].reset();
        }

$(document).ready(function(){
    Carga();
});



$(function(){

        $('#usuario').on('submit',function(e){

            e.preventDefault(e);
            
                $.ajax({

                        type:"POST",
                        url:'usuario',
                        data:$(this).serialize(),
                        dataType: 'json',
                        success: function() {
                                $("#msj-success").fadeIn();
                                   Carga();
                                   resetear();
                        },
                        error: function( jqXHR, textStatus, errorThrown ) {
                            Carga();
                            resetear();
                            $("#msj-error").fadeIn();
                        }

                     });


            }); 
           
}); 


function Carga(){
    var tablaDatos = $("#datos");
    var route = "usuario";

    $("#datos").empty();
    $.get(route, function(res){
        $(res).each(function(key,value){
            tablaDatos.append("<tr><td>"+value.name+"</td><td>"+value.email+"</td><td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="+value.id+" OnClick='Eliminar(this);'>Eliminar</button></td></tr>");
        });
    });
}






function Mostrar(btn){
    var route = "usuario/"+btn.value+"/edit";

    $.get(route, function(res){
        $("#name").val(res.name);
        $("#email").val(res.email);
        $("#id").val(res.id);
    });
}



function Eliminar(btn){
    var route = "usuario/"+btn.value+"";
    var token = $("#token").val();
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(){
            Carga();
            $("#msj-delete").fadeIn();
        },
        error: function( jqXHR, textStatus, errorThrown ) {
            Carga();
            $("#msj-error").fadeIn();
            console.log(errorThrown);
        }


    });
}



$("#actualizar").click(function(){
    var value = $("#id").val();
    var user = $("#actualizar-usuario").serialize();
    var route = "usuario/"+value+"";
    

    $.ajax({
        url: route,
        type: 'PUT',
        dataType: 'json',
        data: user,
        success: function(){
            Carga();
            $("#myModal").modal('toggle');
            $("#msj-primary").fadeIn();
        },
        

    });
});