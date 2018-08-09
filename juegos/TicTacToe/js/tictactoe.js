var b_0_0 = document.getElementById('b_0_0');
var b_0_1 = document.getElementById('b_0_1');
var b_0_2 = document.getElementById('b_0_2');

var b_1_0 = document.getElementById('b_1_0');
var b_1_1 = document.getElementById('b_1_1');
var b_1_2 = document.getElementById('b_1_2');

var b_2_0 = document.getElementById('b_2_0');
var b_2_1 = document.getElementById('b_2_1');
var b_2_2 = document.getElementById('b_2_2');

//Se declara una funcion para almacenar el turno del usuario actual
var turno = 'X';
var totalTurnos = 0

//Arreglo que guarda las posiciones actuales del juego
var posiciones = [
    [' ', ' ', ' '],
    [' ', ' ', ' '],
    [' ', ' ', ' ']
];

//Funcion que verifica las posibles combinaciones ganadoras en el momento actual
function verificarGanador (){

    //Validacion de las posibles combinaciones para ganar
    if( posiciones[0][0] == turno && posiciones[0][1] == turno && posiciones[0][2] == turno ){
        return turno;
    }

    if( posiciones[1][0] == turno && posiciones[1][1] == turno && posiciones[1][2] == turno ){
        return turno;
    }

    if( posiciones[2][0] == turno && posiciones[2][1] == turno && posiciones[2][2] == turno ){
        return turno;
    }

    if( posiciones[0][0] == turno && posiciones[1][0] == turno && posiciones[2][0] == turno ){
        return turno;
    }

    if( posiciones[0][1] == turno && posiciones[1][1] == turno && posiciones[2][1] == turno ){
        return turno;
    }

    if( posiciones[0][2] == turno && posiciones[1][2] == turno && posiciones[2][2] == turno ){
        return turno;
    }

    if( posiciones[0][0] == turno && posiciones[1][1] == turno && posiciones[2][2] == turno ){
        return turno;
    }

    if( posiciones[2][0] == turno && posiciones[1][1] == turno && posiciones[0][2] == turno ){
        return turno;
    }

    //Si el total de turnos se completa se declara empate
    if(totalTurnos == 9){
        return '#';
    }else{
        return '_';
    }
    
}

//Funcion reinicia el juego ponienedo todas las varibles en su estado original
function reiniciarJuego(){
    
    //Recorre todos los elementos de tipo boton
    for(var r=0; r<3; r++){
        for(var c=0; c<3; c++){
            document.getElementById('b_'+r+'_'+c).disabled = false;
            document.getElementById('b_'+r+'_'+c).value = ' ';
        }
    }

    //Reinicia las posiciones del tablero actual
    posiciones = [
        [' ', ' ', ' '],
        [' ', ' ', ' '],
        [' ', ' ', ' ']
    ];

    totalTurnos = 0;
}

function b_click(e) {
    
    //aumenta los turnos totales realiados al momento
    totalTurnos++;

    var b_id = this.id;  // Obtenemos el id del button presionado.
    var b_id_info = b_id.split('_');  // split function.

    var r = parseInt(b_id_info[1]);
    var c = parseInt(b_id_info[2]);

    //Cambia el texto del boton en la casilla clickeada por la marca del turno actual
    this.value = turno;
    
    console.log('r = %d  |  c = %d', r, c);

    //Se almacena la marca del turno en la casilla clickeada
    posiciones[r][c] = turno;

    //Desactiva el boton para que no se pueda dar clic dos veces seguidas o el otro turno pueda elegirlo
    document.getElementById('b_'+r+'_'+c).disabled = true;
    
    //Comparaciones en todos los turnos para saber si hay un ganador en el actual movimiento
    if( verificarGanador() == 'X'){
        alert('El ganador es: X');
        reiniciarJuego();
    }

    if( verificarGanador() == 'O'){
        alert('El ganador es: O');
        reiniciarJuego();
    }

    if( verificarGanador() == '#'){
        alert('El ganador es: # (gato, empate)');
        reiniciarJuego();
    }

    console.log(posiciones);

    //Cambia de turno
    turno = turno === 'X' ? 'O' : 'X';
}

//Elementos oyentes al evento click, que son todos los botones
b_0_0.addEventListener('click', b_click);
b_0_1.addEventListener('click', b_click);
b_0_2.addEventListener('click', b_click);

b_1_0.addEventListener('click', b_click);
b_1_1.addEventListener('click', b_click);
b_1_2.addEventListener('click', b_click);

b_2_0.addEventListener('click', b_click);
b_2_1.addEventListener('click', b_click);
b_2_2.addEventListener('click', b_click);
