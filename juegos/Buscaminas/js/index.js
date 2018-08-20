var txtCantFilas = document.getElementById('txtCantFilas');
var txtCantCol = document.getElementById('txtCantCol');
var txtCantMinas = document.getElementById('txtCantMinas');
var btnAsignarTablero = document.getElementById('btnAsignarTablero');
var gridJuego = document.getElementById('gridJuego');
var parametros = document.getElementById('parametros');

var $btnGuardarDatos = $('#test');

var marcador = 0;


//arreglos para almacenar la posicion de las minas tanto fila como columna
var filaMina = [];
var colMina = [];

//Variable booleana que controla si es la primera casilla destapada
var primeraVez = true;

//Arreglo en el cual se almacenan los botones correspondientes a cada casilla del tablero
var arrayBotones = [];

//Contador que se encargar de almacenar las casillas destapadas
var casillasDestapadas = 0;

//Funcion que se ejecuta cada vez que una casilla del tablero es clickada
function btn_click(e){

	//Desabilita la casilla para que no pueda darse click otra vez
	this.disabled = true;
	
	//Obtiene la posicion de la casilla clickeada
	var filaBoton = parseInt(this.id.split('_')[1]);
	var colBoton = parseInt(this.id.split('_')[2]);
	var encontroMina = false;	//almacena si se encontro una mina
	
	//Si es la primera vez, se asignan las minas aleatoriamente exceptuando la casilla actual
	//que se manda por paramatero a la funcion para que esta la ignore al momento de tomar las casillas 
	if(primeraVez){
		asignarBombas(filaBoton, colBoton);
		this.value = bombasAlrededor(filaBoton, colBoton); //funcion que retorna las bombas alrededor de la casilla actual
		casillasDestapadas++; //aumenta en uno las caillas destapadas
		primeraVez = false; //se pone false la variable qeu controlaba si era la primera vez
	}else{

		//comapra la casilla actual a ver si no coincide con una posicion de las minas
		for(var i=0; i < txtCantMinas.value; i++){
			if(filaBoton == filaMina[i] && colBoton == colMina[i]){
				encontroMina = true;
				break;	
			}
		}

		//si coincidio la posicion con una de las minas entra en el if
		if(encontroMina){

			//El texto del boton cambia *
			this.value = '💣';
			this.id = 'minaEncontrada'; //se le cambia el id, para desde el css cambiarlo de color rojo
			revelarMinas(); // Revela las otras minas

			//espera 0.5 segundos antes de mandar la alerta de que ha perido el juego
			alert('¡Boom!...Has descubierto una mina, juego terminado');
			alert('Has Perdido, pero has obtenido 10 puntos');

			marcador = 10;

			guardarDatos(marcador);

			

		}else{

			//en el dado caso que no haya coincidido la casilla destapada con una mina entra aqui

			//El texto del boton cambia a lo retornado por la funcion que es un entero representando el total de minas alrededor
			this.value = bombasAlrededor(filaBoton, colBoton);
			casillasDestapadas++; //aumenta en 1 las casillas destapadas

			//si las casillas destapadas son igual al numero de casillas que no son minas, se gana el juego
			if( ((txtCantCol.value * txtCantFilas.value) - txtCantMinas.value) == casillasDestapadas  ){
				setTimeout(function(){alert(' ¡Ganaste!...Has descubierto todas las minas :D')}, 500);
				marcarMinas();

				alert('Has ganado, has obtenido 100 puntos');

				marcador = 100;

				guardarDatos(marcador);

				location.href = "../../GameSocial";
			}

		}

	}	
}

//Marca con una "bandera" las minas que no se descubrieron cuando se gana el juego
function marcarMinas(){
	
	//recorre las posiciones de las minas para que los botones en esas posiciones darles el texto de P
	//sin destaparlas
	for(var i=0; i < txtCantMinas.value; i++){
		arrayBotones[filaMina[i]][colMina[i]].value = '⚑'; 
	}

}

//Revela la posicion de las minas una vez descubierto una de ellas
function revelarMinas(){

	//Reccorre la posicion de las minas y coloca el texto * al boton de esa posicion, ademas lo "destapa"
	for(var i=0; i < txtCantMinas.value; i++){
		arrayBotones[filaMina[i]][colMina[i]].disabled = true;
		arrayBotones[filaMina[i]][colMina[i]].value = '💣'; 
	}

}

//Funcion para saber el numero de minas aledañas de la posicion pasada en sus parametros
function bombasAlrededor(filaBoton, colBoton){

	//Variables para saber el numero max de columnas y filas
	var maxValorCol = txtCantCol.value - 1;
	var maxValorFila = txtCantFilas.value - 1;

	//Almacena la cantidad de minas que estan alrededor
	var minas = 0;

	//Limita a las posiciones que estan en las esquinas
	if((filaBoton == 0 && colBoton == 0) || (filaBoton == 0 && colBoton == maxValorCol)  || (filaBoton == maxValorFila && colBoton == 0) || (filaBoton == maxValorFila && colBoton == maxValorCol) )
	{

		//Compara si hay minas en la esquina superior izquierda
		if(filaBoton == 0 && colBoton == 0){
			for(var i =0; i < txtCantMinas.value; i++){
				if( (filaBoton + 1 == filaMina[i] && colBoton  == colMina[i]) ||
					(filaBoton + 1 == filaMina[i] && colBoton + 1 == colMina[i]) ||
					(filaBoton == filaMina[i] && colBoton + 1 === colMina[i])

				){
					minas++;
				}
			}
		}

		//Compara si hay minas en la esquina superior derecha
		if(filaBoton == 0 && colBoton == maxValorCol){
			for(var i =0; i < txtCantMinas.value; i++){
				if( (filaBoton + 1 == filaMina[i] && colBoton  == colMina[i]) ||
					(filaBoton + 1 == filaMina[i] && colBoton - 1 == colMina[i]) ||
					(filaBoton == filaMina[i] && colBoton - 1 === colMina[i])

				){
					minas++;
				}
			}
		}

		//Compara si hay minas en la esquina inferior izquierda
		if(filaBoton == maxValorFila && colBoton == 0){
			for(var i =0; i < txtCantMinas.value; i++){
				if( (filaBoton - 1 == filaMina[i] && colBoton  == colMina[i]) ||
					(filaBoton - 1 == filaMina[i] && colBoton + 1 == colMina[i]) ||
					(filaBoton == filaMina[i] && colBoton + 1 === colMina[i])

				){
					minas++;
				}
			}
		}

		//Compara si hay minas en la esquina inferior derecha
		if(filaBoton == maxValorFila && colBoton == maxValorCol){
			for(var i =0; i < txtCantMinas.value; i++){
				if( (filaBoton - 1 == filaMina[i] && colBoton  == colMina[i]) ||
					(filaBoton - 1 == filaMina[i] && colBoton - 1 == colMina[i]) ||
					(filaBoton == filaMina[i] && colBoton - 1 === colMina[i])

				){
					minas++;
				}
			}
		}


	//Limita las posiciones que estan pegadas a los extremos de la tabla
	}else if(	filaBoton == 0 || filaBoton == maxValorFila || colBoton == 0 || colBoton == maxValorCol ){
		
		//Comara si hay minas en el extremo de arriba
		if( filaBoton == 0 ){
			for(var i=0; i < txtCantMinas.value; i++){
				if(	(filaBoton == filaMina[i] && colBoton - 1 == colMina[i]) ||
					(filaBoton + 1 == filaMina[i] && colBoton - 1 == colMina[i]) ||
					(filaBoton + 1 == filaMina[i] && colBoton == colMina[i]) ||
					(filaBoton + 1 == filaMina[i] && colBoton + 1 == colMina[i]) ||
					(filaBoton == filaMina[i] && colBoton + 1 == colMina[i]) 
				){
					minas++;
				}
			}
		}

		//Comara si hay minas en el extremo de aabajo
		if( filaBoton == maxValorFila ){
			for(var i=0; i < txtCantMinas.value; i++){
				if(	(filaBoton == filaMina[i] && colBoton - 1 == colMina[i]) ||
					(filaBoton - 1 == filaMina[i] && colBoton - 1 == colMina[i]) ||
					(filaBoton - 1 == filaMina[i] && colBoton == colMina[i]) ||
					(filaBoton - 1 == filaMina[i] && colBoton + 1 == colMina[i]) ||
					(filaBoton == filaMina[i] && colBoton + 1 == colMina[i]) 
				){
					minas++;
				}
			}
		}

		//Compara si hay minas en el extremo de la derecha
		if( colBoton == 0 ){
			for(var i=0; i < txtCantMinas.value; i++){
				if(	(filaBoton - 1 == filaMina[i] && colBoton == colMina[i]) ||
					(filaBoton - 1 == filaMina[i] && colBoton + 1 == colMina[i]) ||
					(filaBoton == filaMina[i] && colBoton + 1 == colMina[i]) ||
					(filaBoton + 1 == filaMina[i] && colBoton + 1 == colMina[i]) ||
					(filaBoton + 1 == filaMina[i] && colBoton == colMina[i]) 
				){
					minas++;
				}
			}
		}
		
		//Compara si hay minas en el extremo de la izquierda
		if( colBoton == maxValorCol ){
			for(var i=0; i < txtCantMinas.value; i++){
				if(	(filaBoton - 1 == filaMina[i] && colBoton == colMina[i]) ||
					(filaBoton - 1 == filaMina[i] && colBoton - 1 == colMina[i]) ||
					(filaBoton == filaMina[i] && colBoton - 1 == colMina[i]) ||
					(filaBoton + 1 == filaMina[i] && colBoton - 1 == colMina[i]) ||
					(filaBoton + 1 == filaMina[i] && colBoton == colMina[i]) 
				){
					minas++;
				}
			}
		}

	}else{
		//El resto de las posiciones en este caso las que estan en el centro del grid
		
		//Compara si hay minas que no esten en la esquinas, ni en las orillas, es decir en el centro
		for(var i=0; i < txtCantMinas.value; i++){
			if(	(filaBoton - 1 == filaMina[i] && colBoton - 1 == colMina[i]) ||
				(filaBoton - 1 == filaMina[i] && colBoton == colMina[i]) ||
				(filaBoton - 1 == filaMina[i] && colBoton + 1 == colMina[i]) ||
				(filaBoton == filaMina[i] && colBoton + 1 == colMina[i]) ||
				(filaBoton + 1 == filaMina[i] && colBoton + 1 == colMina[i]) ||
				(filaBoton + 1 == filaMina[i] && colBoton == colMina[i]) ||
				(filaBoton + 1 == filaMina[i] && colBoton - 1 == colMina[i]) ||
				(filaBoton == filaMina[i] && colBoton - 1 == colMina[i]) 
			){
				minas++;
			}
		}
	
	}
	
	//Regresa las minas encontradas al rededor
	return minas;
}

//Funcion que asigna aleatoriamente las minas en el tablero exceptuando la posicion inicial
function asignarBombas(filaInicial, colInicial){

	var filaAleatoria = 0;
	var colAleatoria = 0;
	var repetido = false;


	//Repite el ciclo dependiendo del total de minas especificadas por el usuario
	for(var i=0; i < txtCantMinas.value; i++){

		//Genera una fila y columna aleatorias dentro del rango de las filas y columnas del grid
		filaAleatoria = Math.round(Math.random()*(txtCantFilas.value-1) );
		colAleatoria = Math.round(Math.random()*(txtCantCol.value-1) );
		

		//Comapra todas las minas que se tienen actualmente, con los valores aleatorios que salieron y con la posicion inicial
		for(var j = 0; j < filaMina.length; j++){
			if( (filaMina[j] == filaAleatoria && colMina[j] == colAleatoria) || (filaAleatoria == filaInicial && colAleatoria == colInicial) ){
				
				//En el caso de que si haya un repetido esta variable lo alamcenara y se rompera el ciclo
				repetido = true;
				break;
			}
		}
		
		//Si hubo una posicion repetida, la i que controla el for se resta en uno, con lo cual la vuelta anterior se repetira
		if(repetido){
			i = i - 1;
			repetido = false;
		}else{
			//Si la poscion no es reptida la almacena en el arreglo correspondiente
			filaMina.push(filaAleatoria);
			colMina.push(colAleatoria);

			//imprime la poscion de las minas en la consola
			console.log(filaAleatoria + ' ' + colAleatoria);
		}

	}
}	

//Funcion que crea el tablero del juego dinamicamente con los datos elegido por el usuario
function crearTablero(e){

	//Se hacen validaciones para que las columnas, y filas sean mayores a 2 y las minas mayotes a 1
	//Ademas que el total de minas sea menor del 80 % de las casillas totales
	if(txtCantMinas.value < parseInt( ((txtCantCol.value * txtCantFilas.value) * 0.80 ) ) && (txtCantCol.value > 1 && txtCantFilas.value > 1 && txtCantMinas.value > 0) ){

		this.disabled = true;

		for(var i = 0; i < txtCantFilas.value; i++){
			//Se crea un elemento de tipo tr, para la filas de la tabla
			var filaBotones = [];
			var tr = document.createElement('tr');
			tr.id = 'tr_'+ i;

			for(var j = 0; j < txtCantCol.value; j++){

				//Se crea elementos tipo  td para las casillas de la tabla
				var td = document.createElement('td');
				td.id = 'td_'+i+'_'+j;

				//y ademas un boton el cual representa la misma casilla y se le agrega a dicho elemento td
				var btn = document.createElement('input');
				btn.id = 'b_'+i+'_'+j;
				btn.type = 'button';
				btn.value = ' ';

				//A todas las casillas se les agrega un listener para cuando sean clickeadas llamen a la funcion btn:click
				btn.addEventListener('click', btn_click);

				//Los botones se almacenana en un arreglo, los botones de cada fila
				filaBotones.push(btn);

				//se agrega el btn a td y asu vez el td al tr
				td.appendChild(btn);
				tr.appendChild(td);

			}

			//y al final cada td al cuerpo de la tabla del tablero
			gridJuego.appendChild(tr);

			//y la fila de los botones en una arreglo de todos los botones que representan las casillas
			arrayBotones.push(filaBotones);
		}


	}else{

		//Validaciones y notificacioenes al usuario
		if(txtCantCol.value < 2 || txtCantFilas.value < 2 || txtCantMinas.value < 1){
			alert('La cantidad de filas y columnas debe ser mayor a 1, y la de minas mayor a 0');
		}else{
			alert('La cantidad de minas no puede ser mayor del 80 % de posiciones');
			document.getElementById('txtCantMinas').focus();
		}
	}
}

function guardarDatos(marcador){

	var params = {usuario: idUsuario, juego: idJuego, marcador: marcador};

	$.post('ajax/puntaje_buscaminas.php',params,function(data){

		//console.log('asdfasdf ' + data.mensaje);
		location.href = "../../GameSocial";

	});

}


//Listener para el boton que crea el tablero, para que lo cree 
btnAsignarTablero.addEventListener('click', crearTablero);