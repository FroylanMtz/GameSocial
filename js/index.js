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

var $errorRegistro = $('#errorRegistro');

function btnRegistrarUsuario_click(e){


    if($txtContrasena.val() !== $txtRepetirContrasena.val() ||
        $txtNombre.val() === '' || $txtApellidos.val() === '' ||
        $txtCorreo.val() === '' || $txtUsuario.val() === '' ||
        $txtContrasena.val() === ''){

        $txtNombre.css('border-color', '#e2e0e2');
        $txtApellidos.css('border-color', '#e2e0e2');
        $txtCorreo.css('border-color', '#e2e0e2');
        $txtUsuario.css('border-color', '#e2e0e2');
        $txtContrasena.css('border-color', '#e2e0e2');
        $txtRepetirContrasena.css('border-color', '#e2e0e2');
        
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


    }else{

        var params = {nombre: $txtNombre.val(),apellidos: $txtApellidos.val(),correo:$txtCorreo.val(),usuario: $txtUsuario.val(),contrasena: $txtContrasena.val() };

        $.post('ajax/registro.php',params,function(data){
            
            if(!data.error){
                console.log(data);
                $txtNombre.val('');
                $txtApellidos.val('');
                $txtCorreo.val('');
                $txtUsuario.val('');
                $txtContrasena.val('');
                $txtRepetirContrasena.val('');
                alert('Usuario registrado correctamente');
                $txtUsuario.css('border-color', '#e2e0e2');
                $txtCorreo.css('border-color', '#e2e0e2');
                $errorRegistro.text('');
            }else{
                if(data.mensaje === 'correo'){
                    $txtCorreo.css('border-color', 'red');
                    $txtUsuario.css('border-color', '#e2e0e2');
                    $errorRegistro.text('Ya existe un usuario con ese correo, elige otro' );
                }else{
                    $txtUsuario.css('border-color', 'red');
                    $txtCorreo.css('border-color', '#e2e0e2');
                    $errorRegistro.text('Ya existe un usuario con ese nickname, elige otro');
                }
            }
        });
    }
    

}

function btnIniciarSesion_click(e){

    alert('se pucho inisiar sesion');

    if($txtUsuarioInicio === '' || $txtContrasenaInicio === ''){

        if($txtUsuarioInicio === ''){
            $txtUsuarioInicio.css('border-color', 'red');
            $txtContrasenaInicio.css('border-color', '#e2e0e2');
        }else{
            $txtContrasenaInicio.css('border-color', 'red');
            $txtUsuarioInicio.css('border-color', '#e2e0e2');
        }

    }else{
        var params = {usuario: $txtUsuarioInicio.val(), contrasena: $txtContrasenaInicio.val()};

        $.post('ajax/iniciar.php',params,function(data){
            
            if(!data.error){
                alert(data.mensaje);
            }else{
                console.log(data.mensaje);
            }

        });

    }


}

$btnIniciarSesion.on('click', btnIniciarSesion_click);
$btnRegistrarUsuario.on('click', btnRegistrarUsuario_click);