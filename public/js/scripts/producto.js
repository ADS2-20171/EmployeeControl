$(document).ready(function(){
    CargaProducto();
});


function buscarProducto() {
    var tableReg = document.getElementById('listaproducto');
    var searchText = document.getElementById('searchTerm').value.toLowerCase();
    for (var i = 1; i < tableReg.rows.length; i++) {
        var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        var found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                found = true;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            tableReg.rows[i].style.display = 'none';
        }
    }
}




$("#registro").click(function(){
    
   $.ajax({
        url: "producto",
        type: 'POST',
        dataType: 'json',
        data: $("#producto").serialize(),
        success: function(){
            CargaProducto();
            $("#modalregistro").modal('toggle');
            $("#msj-success").fadeIn();
        },
        error: function( jqXHR, textStatus, errorThrown ) {
            CargaProducto();
            $("#msj-error").fadeIn();
        }


    });
});




function CargaProducto(){
    var tablaDatos = $("#productos");
    var route = "producto";

    $("#productos").empty();
    $.get(route, function(res){
        $(res).each(function(key,value){
            tablaDatos.append("<tr><td>"+value.nombre_producto+"</td><td>"+value.precio+"</td><td>"+value.caducidad+"</td><td>"+value.existencia+"</td><td>"+value.descripcion+"</td><td>"+value.especificaciones+"</td><td>"+value.laboratorio+"</td><td><button value="+value.id+" OnClick='MostrarProducto(this);' class='btn btn-primary' data-toggle='modal' data-target='#modalactualizar'>Editar</button><button class='btn btn-danger' value="+value.id+" OnClick='EliminarProducto(this);'>Eliminar</button></td></tr>");

        });
    });
}



function MostrarProducto(btn) {
    var route = "producto/"+btn.value+"/edit";

    $.get(route, function(respuesta){
        console.log(respuesta);
        var producto = respuesta[0];
        console.log(producto);
        console.log(producto.nombre_producto);
        $("#nombre_producto").val(producto.nombre_producto);
        $("#precio").val(respuesta.precio);
        $("#caducidad").val(respuesta.caducidad);
        $("#existencia").val(respuesta.existencia);
        $("#descripcion").val(respuesta.descripcion);
        $("#especificaciones").val(respuesta.especificaciones);
        $("#laboratorio").val(respuesta.laboratorio);
        $("#id").val(respuesta.id);
    });
}



function EliminarProducto(btn){
    var route = "producto/"+btn.value+"";
    var token = $("#token").val();
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(){
            CargaProducto();
            $("#msj-delete").fadeIn();
        },
        error: function( jqXHR, textStatus, errorThrown ) {
            CargaProducto();
            $("#msj-error").fadeIn();
            console.log(errorThrown);
        }


    });
}



$("#actualizar").click(function(){
    var value = $("#id").val();
    var pro = $("#actualizar_producto").serialize();
    var route = "producto/"+value+"";
    

    $.ajax({
        url: route,
        type: 'PUT',
        dataType: 'json',
        data: pro,
        success: function(){
            CargaProducto();
            $("#modalactualizar").modal('toggle');
            $("#msj-primary").fadeIn();
        },
        

    });
});