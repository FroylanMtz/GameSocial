var $txtUsuarioInicio = $('#txtUsuarioInicio');
var $txtContrasenaInicio = $('#txtContrsenaInicio');

var $txtNombre = $('#txtNombreRegistro');
var $txtApellidos = $('#txtApellidosRegistro');
var $txtCorreo = $('#txtCorreoRegistro');
var $txtUsuario = $('#txtUsuarioRegistro');
var $txtContrasena = $('#txtContrasenaRegistro');
var $txtRepetirContrasena = $('#txtContrasenaReRegistro');

var $btnIniciarSesion = $('#btnIniciarSesion');
var $btnRegistrarUsuario = $('#btnRegistrarUsuario');

function btnRegistrarUsuario_click(e){

    if($txtContrasena.val() !== $txtRepetirContrasena.val() ||
        $txtNombre.val() === '' || $txtApellidos.val() === '' ||
        $txtCorreo.val() === '' || $txtUsuario.val() === '' ||
        $txtContrasena.val() === ''){

        $txtNombre.css('border-color', 'gray');
        $txtApellidos.css('border-color', 'gray');
        $txtCorreo.css('border-color', 'gray');
        $txtUsuario.css('border-color', 'gray');
        $txtContrasena.css('border-color', 'gray');
        $txtRepetirContrasena.css('border-color', 'gray');
        
        if($txtContrasena.val() !== $txtRepetirContrasena.val()){
            $txtContrasena.css('border-color', 'red');
            $txtRepetirContrasena.css('border-color', 'red'); 
        }

        if($txtNombre.val() === ''){
            $txtNombre.css('border-color', 'red');
        }

        if($txtApellidos.val() === ''){
            $txtApellidos.css('border-color', 'red');
        }

        if($txtCorreo.val() === ''){
            $txtCorreo.css('border-color', 'red');
        }

        if($txtUsuario.val() === ''){
            $txtUsuario.css('border-color', 'red');
        }

        if($txtContrasena.val() === ''){
            $txtContrasena.css('border-color', 'red');
        }

        if($txtRepetirContrasena.val() === ''){
            $txtRepetirContrasena.css('border-color', 'red');
        }

        alert('Datos invalidos');

    }else{

        alert('Datos validos');

        var params = {nombre: $txtNombre.val(),apellidos: $txtApellidos.val(),correo:$txtCorreo.val(),usuario: $txtUsuario.val(),contrasena: $txtContrasena.val() };

        console.log('Antes de entrar al post ajax');

        $.post('ajax/registro.php',params,function(data){
            console.log('llamada completada');
            if(!data.error){
                $txtNombre.val('');
                $txtApellidos.val('');
                $txtCorreo.val('');
                $txtUsuario.val('');
                $txtContrasena.val('');
                $txtRepetirContrasena.val('');
                alert('Registro realizado correctamente');
            }else{
                console.log('Error: ' + data.error);
            }

            
            console.log('Despues de entrar al post ajax');
        });


        
        

    }
    
    //alert('Algo')

}

function btnIniciarSesion_click(e){



}

$btnIniciarSesion.on('click', btnIniciarSesion_click);
$btnRegistrarUsuario.on('click', btnRegistrarUsuario_click);