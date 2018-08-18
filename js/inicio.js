var $divContentIndex = $('#content_index');
var $btnCargarNoticias = $('#cargarNoticias');
var $btnCargarNotificaciones = $('#cargarNotificaciones');
var $btnCargarJuegos = $('#cargarJuegos');

function btnCargarNoticias_click(e){
    $divContentIndex.empty();
    $divContentIndex.text('Loading...');


    $btnCargarNoticias.css('background-color', 'rgb(73, 132, 199)');
    $btnCargarNotificaciones.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarJuegos.css('background-color', 'rgb(23, 92, 172)');

    
    $divContentIndex.load('ajax/noticias.php');

}

function btnCargarNotificaciones_click(e){

    $divContentIndex.empty();
    $divContentIndex.text('Loading...');

    $btnCargarNoticias.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarNotificaciones.css('background-color', 'rgb(73, 132, 199)');
    $btnCargarJuegos.css('background-color', 'rgb(23, 92, 172)');

    $divContentIndex.load('ajax/notificaciones.php');

}

function btnCargarJuegos_click(e){
    $divContentIndex.empty();
    $divContentIndex.text('Loading...');


    $btnCargarNoticias.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarNotificaciones.css('background-color', 'rgb(23, 92, 172)');
    $btnCargarJuegos.css('background-color', 'rgb(73, 132, 199)');

    $divContentIndex.load('ajax/juegos.php');
}


$btnCargarNoticias.on('click', btnCargarNoticias_click);
$btnCargarNotificaciones.on('click', btnCargarNotificaciones_click);
$btnCargarJuegos.on('click', btnCargarJuegos_click);


//Para que salga algo
$divContentIndex.empty();
$divContentIndex.text('Loading...');


$btnCargarNoticias.css('background-color', 'rgb(23, 92, 172)');
$btnCargarNotificaciones.css('background-color', 'rgb(23, 92, 172)');
$btnCargarJuegos.css('background-color', 'rgb(73, 132, 199)');

$divContentIndex.load('ajax/juegos.php');