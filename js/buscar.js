var $txtBusqueda = $('#txtBuscar');
var $btnBusqueda = $('#btnBuscar');
var $txtError = $('#errorBuscar');
var $divResultadoBusqueda = $('#resultadoBusqueda');

var $pp = $('#fotoPerfil');

function btnBusqueda_click(e){

    if($txtBusqueda.val() === ''){
        $txtError.text('Ingresa un nombre');
    }else{
        $txtError.text('');
    
        var param = {usuario: $txtBusqueda.val()};

        $.post('ajax/buscar_contactos.php',param,function(data){

            if(!data.error){
                
                var div = $('<div class="card-body mt-2"> ' +
                            '<img id="pp" style="width:70px; height:70px;" src="files/pps/'+ data.foto +' "> ' + 
                            '<a href="cuenta.php?usuario=' + data.username +'" style="font-size: 30px;" > ' + data.nombre + ' ' + data.apellidos + ' </a> </div>');

                div.appendTo($divResultadoBusqueda);

            }else{
                $txtError.text(data.mensaje);
            }
            
        });


    }

}

$btnBusqueda.on('click', btnBusqueda_click);