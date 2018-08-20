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

var marcador = 0;

//Arreglo que guarda las posiciones actuales del juego
var posiciones = [
    [' ', ' ', ' '],
    [' ', ' ', ' '],
    [' ', ' ', ' ']
];

//Funcion que verifica las posibles combinaciones ganadoras en el momento actual
function verificarGanador (){

    var gano = false;

    //Validacion de las posibles combinaciones para ganar
    if( posiciones[0][0] == turno && posiciones[0][1] == turno && posiciones[0][2] == turno ) gano = true;
    if( posiciones[1][0] == turno && posiciones[1][1] == turno && posiciones[1][2] == turno ) gano = true;
    if( posiciones[2][0] == turno && posiciones[2][1] == turno && posiciones[2][2] == turno ) gano = true;
    if( posiciones[0][0] == turno && posiciones[1][0] == turno && posiciones[2][0] == turno ) gano = true;
    if( posiciones[0][1] == turno && posiciones[1][1] == turno && posiciones[2][1] == turno ) gano = true;
    if( posiciones[0][2] == turno && posiciones[1][2] == turno && posiciones[2][2] == turno ) gano = true;
    if( posiciones[0][0] == turno && posiciones[1][1] == turno && posiciones[2][2] == turno ) gano = true;
    if( posiciones[2][0] == turno && posiciones[1][1] == turno && posiciones[0][2] == turno ) gano = true;
    
    //Si el total de turnos se completa se declara empate
    if(totalTurnos == 9 && gano == false){
        alert('Empate');
        alert('Has obtenido 50 puntos ');
        alert('Adios!');

        marcador = 50;
        guardarDatos(marcador);

        return true;
    }

    if(gano){
        if(turno === 'X'){
            alert('Felicidades, has ganado!');
            alert('Has obtenido 100 puntos');

            marcador = 100;
            guardarDatos(marcador);
            return true;
        }else{
            alert('Has perdido contra la pc');
            alert('Pero has conseguido 10 puntos');

            marcador = 10;
            guardarDatos(marcador);
            return true;
        }

        
    }

    turno = turno === 'X' ? 'O' : 'X';
    return false;
    
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
    turno = 'X';
}

function b_click(e) {

    var c;
    var r;
    //aumenta los turnos totales realiados al momento
    totalTurnos++;

    var b_id = this.id;  // Obtenemos el id del button presionado.
    var b_id_info = b_id.split('_');  // split function.
    r = parseInt(b_id_info[1]);
    c = parseInt(b_id_info[2]);
    //Cambia el texto del boton en la casilla clickeada por la marca del turno actual
    //this.value = turno;
    document.getElementById('b_'+r+'_'+c).value = turno;
    //Se almacena la marca del turno en la casilla clickeada
    posiciones[r][c] = turno;
    //Desactiva el boton para que no se pueda dar clic dos veces seguidas o el otro turno pueda elegirlo
    document.getElementById('b_'+r+'_'+c).disabled = true;
    
    if( !verificarGanador() ){
        do{
            c = Math.floor(Math.random() * (3 - 0)) + 0;
            r = Math.floor(Math.random() * (3 - 0)) + 0;
            console.log('Fila: ' + r + ' Columna: ' + c);
            if(posiciones[r][c] === ' '){
                break;
            }
        }while(true);
        totalTurnos++;
        document.getElementById('b_'+r+'_'+c).value = turno;
        posiciones[r][c] = turno;
        document.getElementById('b_'+r+'_'+c).disabled = true;

        if(verificarGanador()){
            location.href = "../../GameSocial";
        }
    }else{
        location.href = "../../GameSocial";
    }

}

function guardarDatos(marcador){

	var params = {usuario: idUsuario, juego: idJuego, marcador: marcador};

	$.post('ajax/puntaje_buscaminas.php',params,function(data){

		//console.log('asdfasdf ' + data.mensaje);
		location.href = "../../GameSocial";

	});

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
