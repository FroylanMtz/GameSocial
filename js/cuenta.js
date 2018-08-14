var $btnCargarHistorial = $('#cargarHistorial');
var $btnCargarRecords = $('#cargarRecords');
var $btnCargarSiguiendo = $('#cargarSiguiendo');
var $btnCargarSeguidores = $('#cargarSeguidores');
var $divContentCuenta = $('#content_cuenta');


function cargarHistorial(e){

    $divContentCuenta.empty();
    $divContentCuenta.text('Loading...');

    $btnCargarHistorial.css('background-color', 'rgb(73, 132, 199)');
    $btnCargarRecords.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarSiguiendo.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarSeguidores.css('background-color', 'rgb(23, 92, 172)');

    $divContentCuenta.load('ajax/historial.php');
}

function cargarRecords(e){

    $divContentCuenta.empty();
    $divContentCuenta.text('Loading...');

    $btnCargarHistorial.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarRecords.css('background-color', 'rgb(73, 132, 199)');
    $btnCargarSiguiendo.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarSeguidores.css('background-color', 'rgb(23, 92, 172)');


    $divContentCuenta.load('ajax/records.php');
}

function cargarSiguiendo(e){

    $divContentCuenta.empty();
    $divContentCuenta.text('Loading...');

    $btnCargarHistorial.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarRecords.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarSiguiendo.css('background-color', 'rgb(73, 132, 199)');
    $btnCargarSeguidores.css('background-color', 'rgb(23, 92, 172)');

    $divContentCuenta.load('ajax/siguiendo.php?usuario="froylan"');

}

function cargarSeguidores(e){

    $divContentCuenta.empty();
    $divContentCuenta.text('Loading...');

    $btnCargarHistorial.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarRecords.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarSiguiendo.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarSeguidores.css('background-color', 'rgb(73, 132, 199)');

    $divContentCuenta.load('ajax/seguidores.php');
}

$btnCargarHistorial.on('click', cargarHistorial);
$btnCargarRecords.on('click', cargarRecords);
$btnCargarSiguiendo.on('click', cargarSiguiendo);
$btnCargarSeguidores.on('click', cargarSeguidores);