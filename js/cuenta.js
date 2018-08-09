var $btnCargarHistorial = $('#cargarHistorial');
var $btnCargarRecords = $('#cargarRecords');
var $btnCargarSiguiendo = $('#cargarSiguiendo');
var $btnCargarSeguidores = $('#cargarSeguidores');
var $divContentCuenta = $('#content_cuenta');


function cargarHistorial(e){

    $divContentCuenta.empty();
    $divContentCuenta.text('Loading...');
    $divContentCuenta.load('ajax/historial.php');
}

function cargarRecords(e){

    $divContentCuenta.empty();
    $divContentCuenta.text('Loading...');
    $divContentCuenta.load('ajax/records.php');
}

function cargarSiguiendo(e){

    $divContentCuenta.empty();
    $divContentCuenta.text('Loading...');
    $divContentCuenta.load('ajax/siguiendo.php');

}

function cargarSeguidores(e){

    $divContentCuenta.empty();
    $divContentCuenta.text('Loading...');
    $divContentCuenta.load('ajax/seguidores.php');
}

$btnCargarHistorial.on('click', cargarHistorial);
$btnCargarRecords.on('click', cargarRecords);
$btnCargarSiguiendo.on('click', cargarSiguiendo);
$btnCargarSeguidores.on('click', cargarSeguidores);