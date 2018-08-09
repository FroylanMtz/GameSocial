var $divContentIndex = $('#content_index');
var $btnCargarNoticias = $('#cargarNoticias');
var $btnCargarNotificaciones = $('#cargarNotificaciones');
var $btnCargarJuegos = $('#cargarJuegos');

function btnCargarNoticias_click(e){
    $divContentIndex.empty();
    $divContentIndex.text('Loading...');
    $divContentIndex.load('ajax/noticias.php');

}

function btnCargarNotificaciones_click(e){

    $divContentIndex.empty();
    $divContentIndex.text('Loading...');
    $divContentIndex.load('ajax/notificaciones.php');

}

function btnCargarJuegos_click(e){
    $divContentIndex.empty();
    $divContentIndex.text('Loading...');
    $divContentIndex.load('ajax/juegos.php');
}

$btnCargarNoticias.on('click', btnCargarNoticias_click);
$btnCargarNotificaciones.on('click', btnCargarNotificaciones_click);
$btnCargarJuegos.on('click', btnCargarJuegos_click);