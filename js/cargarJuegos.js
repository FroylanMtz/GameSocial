var $btnJugarBuscaminas = $('#jugarBuscaminas');
var $divContentIndex = $('#content_index');

function btnJugarBuscaminas_click(e){

    $divContentIndex.empty();
    $divContentIndex.text('Loading...');
    $divContentIndex.load('juegos/Buscaminas/index.html');

}

$btnJugarBuscaminas.on('click', btnJugarBuscaminas_click);