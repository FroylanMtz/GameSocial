var $btnJugarBuscaminas = $('#jugarBuscaminas');
var $divContentIndex = $('#content_index');
var $btnJugarConecta = $('#jugarConecta');
var $btnJugarGato = $('#jugarGato');
var $btnJugarAhorcado = $('#jugarAhorcado');

function btnJugarAhorcado_click(e){

    $divContentIndex.empty();
    $divContentIndex.load('juegos/Ahorcado/Ahorcado.php');

}

function btnJugarConecta_click(e){

    $divContentIndex.empty();
    $divContentIndex.load('juegos/Conecta4/index.php');
    
}

function btnJugarBuscaminas_click(e){

    $divContentIndex.empty();
    $divContentIndex.text('Loading...');
    $divContentIndex.load('juegos/Buscaminas/index.php?');

}

function btnJugarGato_click(e){
    $divContentIndex.empty();
    $divContentIndex.load('juegos/TicTacToe/tictactoe.php');
}

$btnJugarConecta.on('click', btnJugarConecta_click);
$btnJugarBuscaminas.on('click', btnJugarBuscaminas_click);
$btnJugarGato.on('click', btnJugarGato_click);
$btnJugarAhorcado.on('click', btnJugarAhorcado_click);