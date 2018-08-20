var tablaJuego = document.getElementById('tablaJuego');
var gridJuego = document.getElementById('gridJuego');
var tablaBotones = document.getElementById('tablaBotones');
var gridBotones = document.getElementById('gridBotones');
var cont = document.getElementById('cont');

var turno = document.getElementById('turno'); //Texto que esta en la parte inferior
var circulo = document.getElementById('circulo'); //Representa el circulo que representa el color de la ficha de turno actual

var arrayBotones = []; //Arreglo para almacenar los botones que hacen que la ficha caiga en el tablero
var arrayTablero = []; //Arreglo para almacenar los botones que representan cada ficha del tablero
var turno1 = true; //El jugador 1 (fichas rojas) empieza el juego

//Longitud del tablero 6 x 7
var filas = 6;
var columnas = 7;

//Funcion para simular que pone la ficha en la columna elegida por los botones
function colocarFicha(e){

    var colBoton = parseInt(this.id.split('_')[1]); //Toma la columna del boton presionado

    //For que recorre toda la fila en determinada columna, para poner la ficha en donde no haya ninguna y que tenga de limita el total de filas
    for(var i=filas-1; i >= 0; i--){

        //Compara si no hay una ficha en esa posicion, si no hay ninguna pone la ficha
        if( arrayTablero[i][colBoton].id != 'rojas' && arrayTablero[i][colBoton].id != 'amarillas'){

            //if(turno1){
                arrayTablero[i][colBoton].style.backgroundColor = 'red'; //Cambia el color del fondo del boton de la ficha del tablero simulando que hay una ficha roja
                circulo.style.color = 'yellow'; //El circulo que indica el turno cambia a amarillo porque es turno de las fichas amarillas
                arrayTablero[i][colBoton].id = 'rojas';   //Al boton en esta posicion se le da el id del turno para que no se repita
                turno.innerText = "Turno: "; //Cambia el texto a turno, debido a que la primera vez es 'empieza'
                turno1 = false;
            /*}else{

                arrayTablero[i][colBoton].style.backgroundColor = 'yellow'; //Cambia el color del fondo del boton de la ficha del tablero simulando que hay una ficha amarilla
                circulo.style.color = 'red';
                arrayTablero[i][colBoton].id = 'amarillas';
                turno.innerText = "Turno: ";
                turno1 = true;
            }*/

            if( !verificarSiGano(arrayTablero[i][colBoton].id, i, colBoton ) ){
                turnoPC();
            }

            break;
        }
    }

    
}

function turnoPC(){

    //var colBoton = parseInt(this.id.split('_')[1]); //Toma la columna del boton presionado

    var colBoton = Math.floor(Math.random() * (columnas - 0)) + 0;

    //For que recorre toda la fila en determinada columna, para poner la ficha en donde no haya ninguna y que tenga de limita el total de filas
    for(var i=filas-1; i >= 0; i--){

        //Compara si no hay una ficha en esa posicion, si no hay ninguna pone la ficha
        if( arrayTablero[i][colBoton].id != 'rojas' && arrayTablero[i][colBoton].id != 'amarillas'){

            /*if(turno1){
                arrayTablero[i][colBoton].style.backgroundColor = 'red'; //Cambia el color del fondo del boton de la ficha del tablero simulando que hay una ficha roja
                circulo.style.color = 'yellow'; //El circulo que indica el turno cambia a amarillo porque es turno de las fichas amarillas
                arrayTablero[i][colBoton].id = 'rojas';   //Al boton en esta posicion se le da el id del turno para que no se repita
                turno.innerText = "Turno: "; //Cambia el texto a turno, debido a que la primera vez es 'empieza'
                turno1 = false;
            }else{*/

                arrayTablero[i][colBoton].style.backgroundColor = 'yellow'; //Cambia el color del fondo del boton de la ficha del tablero simulando que hay una ficha amarilla
                circulo.style.color = 'red';
                arrayTablero[i][colBoton].id = 'amarillas';
                turno.innerText = "Turno: ";
                turno1 = true;
            //}

            verificarSiGano(arrayTablero[i][colBoton].id, i, colBoton );

            break;
        }
    }

}

//Funcion que se despliega al terminar el juego, cuando ya hay un ganador
//deshabilita los botones accionadores y ademas pregunta si se quiere jugar de nuevo
function terminarJuego(turno){

    /*for(var i=0; i < columnas; i++){
        arrayBotones[i].disabled = true;
    }*/

    if(turno == 'rojas'){
        alert('Felicidades le has ganado a la computadora');
        alert('Has obtenido 100 puntos');

        marcador = 100;

        guardarDatos(marcador);

    }else{
        alert('La computadora te ha ganado');
        alert('Has obtenido 10 puntos');
    
        marcador = 10;
        guardarDatos(marcador);
    }

    location.href = "../../GameSocial";
    
    
}

//Funcion que verifica si hay un ganador, se manda llamar cada que se coloca una ficha
function verificarSiGano(turno, fila, columna){

    var vecesFichaHorizontal = 0;
    var vecesFichaVertical = 0;

    /* Horizontalmente */
    for(var i = 0; i<columnas; i++){
        if(arrayTablero[fila][i].id == turno ){
            vecesFichaHorizontal++;
            if(vecesFichaHorizontal == 4){

                //alert('Han ganado las fichas ' + turno);
                terminarJuego(turno);
                return true;
            } 
        }else{
            vecesFichaHorizontal = 0;
        }
    }

    /* Verticalmente */
    for(var i = 0; i<filas; i++){
        if(arrayTablero[i][columna].id == turno ){
            vecesFichaVertical++;
            if(vecesFichaVertical == 4){
                //alert('Han ganado las fichas ' + turno);
                terminarJuego(turno);
                return true;
            } 
        }else{
            vecesFichaVertical = 0;
        }
    }

    /* Diagonal hacia arriba*/
    for (var i = 3; i < filas; i++) {
        for (var c = 0; c < columnas - 3; c++) {
            if((arrayTablero[i][c].id == arrayTablero[i - 1][c + 1].id)
            && (arrayTablero[i][c].id == arrayTablero[i - 2][c + 2].id)
            && (arrayTablero[i][c].id == arrayTablero[i - 3][c + 3].id) ){
                alert("Han ganado las fichas " + turno);
                terminarJuego();
                return true;
            }
        }
    }

    /* Diagonal hacia abajo */
    for (var i = 0; i < filas - 3; i++) {
        for (var j = 0; j < columnas - 3; j++) {
            if((arrayTablero[i][j].id == arrayTablero[i + 1][j + 1].id)
            && (arrayTablero[i][j].id == arrayTablero[i + 2][j + 2].id)
            && (arrayTablero[i][j].id == arrayTablero[i + 3][j + 3].id)){
                alert("Han ganado las fichas " + turno);
                terminarJuego();
                return true;
            }
        }
    }

    return false;

}

/* Funcion que crea el tablero del juego dinamicamente */
function crearTablero(){

    circulo.style.color = 'red';

    for(var i = 0; i < filas; i++){
        //Se crea un elemento de tipo tr, para la filas de la tabla
        var filaBotones = [];
        var tr = document.createElement('tr');
        tr.id = 'tr_'+ i;

        for(var j = 0; j < columnas; j++){

            //Se crea elementos tipo  td para las casillas de la tabla
            var td = document.createElement('td');
            td.id = 'td_'+i+'_'+j;

            //y ademas un boton el cual representa la misma casilla y se le agrega a dicho elemento td
            var btn = document.createElement('input');
            btn.id = 'b_'+i+'_'+j;
            btn.type = 'button';
            btn.value = ' ';

            //Los botones se almacenana en un arreglo, los botones de cada fila
            filaBotones.push(btn);

            //se agrega el btn al td y a su vez el td al tr
            td.appendChild(btn);
            tr.appendChild(td);

        }

        //y al final cada td al cuerpo de la tabla del tablero
        gridJuego.appendChild(tr);

        tablaJuego.appendChild(gridJuego);

        //y la fila de los botones en una arreglo de todos los botones que representan las casillas
        arrayTablero.push(filaBotones);
    }
}

/* Funcion que se encarga de crear los botones dinamicamente para colocar las fichas  */
function crearBotones(){

    var columnas = 7;

    var tr = document.createElement('tr');

    for(var i = 0; i < columnas; i++){

        //Se crea elementos tipo  td para las casillas de la tabla
        var td = document.createElement('td');

        //y ademas un boton el cual representa la misma casilla y se le agrega a dicho elemento td
        var btn = document.createElement('input');
        btn.id = 'b_'+i;
        btn.type = 'button';
        btn.value = '▼';

        //A todas las casillas se les agrega un listener para cuando sean clickeadas llamen a la funcion btn:click
        btn.addEventListener('click', colocarFicha);

        //Los botones se almacenana en un arreglo, los botones de cada fila
        arrayBotones.push(btn);

        //se agrega el btn a td y asu vez el td al tr
        td.appendChild(btn);
        tr.appendChild(td);

    }

    //y al final cada tr al cuerpo de la tabla
    gridBotones.appendChild(tr);
}

function guardarDatos(marcador){

	var params = {usuario: idUsuario, juego: idJuego, marcador: marcador};

	$.post('ajax/puntaje_buscaminas.php',params,function(data){

		//console.log('asdfasdf ' + data.mensaje);
		location.href = "../../GameSocial";

	});

}


/* Se manda llamar las funciones que crean el tablero y los botones accionadores por defecto */
crearTablero();
crearBotones();