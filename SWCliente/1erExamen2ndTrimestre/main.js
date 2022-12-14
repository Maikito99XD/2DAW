
/****  Aqui declaramos si utilizamos alguna variable global.    **********************************
**************************************************************************************************/
//Guardaremos todos los botones
let objetos = document.querySelectorAll('input[type="button"]');
//Variable para comprobar el turno del jugador
let turnoJugador = false;
//Variable para controlar si vamos a empezar la partida
let empiezaPartida = 0;


/***********************    AQUI AÑADIMOS TODOS LOS LISTENERS    **********************************  
**************************************************************************************************/
//Listener para cargar la pantalla
window.addEventListener('load',resetear);
//Para detectar la tecla pulsada
window.addEventListener("keydown",teclaF12);
//Las que se van a pulsar
window.addEventListener("keypress",numeroTecla);
//Un for para cada boton
for(let i = 0;i<objetos.length;i++){
  //Liseners para saber cuando se hace click o se entra y sale del boton
  objetos[i].addEventListener("click", jugar);
  objetos[i].addEventListener("mouseenter",entraRaton);
  objetos[i].addEventListener("mouseleave",saleRaton);
}


/* En esta funcion controlamos si se ha pulsado la tecla F12 para Iniciar el juego.  
**************************************************************************************   (1,5ptos)*/ 
function teclaF12(){
  //Prevenimos que se pueda pulsar el F12 para sacar la consola o el enter
  event.preventDefault();
  //Comprobamos que la tecla pulsada sea el f12
	if(event.key == "F12"){
    //Sumamos 1 para empezar la partida
    empiezaPartida++;
  }
}



/*Controlamos cuando esta el raton en la casilla.                      (1,25pto)
  Si no esta utilizada la casilla cambiamos el color de fondo a azul
********************************************************************/
function entraRaton(){
  this.classList.add("fondoAzul");
}



/*Controlamos cuando sale el raton de la casilla.                       (1,25ptos)
  Si no esta utilizada la casilla cambio el color de fondo a blanco
*********************************************************************/
function saleRaton(){
  this.classList.remove(this.className);
}
 
 
 
/* Esta funcion resetea todo los valores.										(No puntua)
*****************************************************************************/ 
function resetear() {
		turnoPc = 0;
    
}

/* Abrimos una nueva ventana 1 segundo y nos indica que la casilla esta ocupada   (1pto)
******************************************************************************/
function casillaOcupada(valor) {

  //Variable para guardar la ventana que creemos
  let miWindow;
  //La configuración de la ventana, el ancho, alto, etc...
  var configuracion_ventana = "left=50,top=50,width=200,height=100";
  //Se abrirá una ventana nueva con la configuración que le hemos puesto y la guardaremos en miWindow
  miWindow = window.open("", "", configuracion_ventana);
  //Crearemos un h1 en la nueva ventana e indicaremos la operación que se va a realizar
  miWindow.document.write("<h1>Casilla ocupada, use otra</h1>");
  //Pondremos un setTimeout para indicar cuanto tiempo estará la ventana abierta
  let idTimeout=setTimeout(function() {
      //Cerraremos la ventana cuando pase el tiempo
      miWindow.close();
      //Pondremos el tiempo que queramos tener la ventana abierta
      }, 1000);
} 



/*Controlamos la tecla pulsada  y llamamos a la funcion jugar								(2ptos)
***************************************************************************************/
function numeroTecla(){
   
	jugar();  //llamamos a funcion jugar en modo teclado
}



/*Esta funcion controla si la casilla esta utilizada. Si es asi no hara nada.       (3ptos=1,25 teclas + 1,25 raton + 0,5 GAME OVER)
  Si la casilla no esta utilizada mirara a que jugador le toca y pintara el fondo  
  de ROJO o VERDE segun a quien le toque. Cuando pulsemos la ultima casilla 
  saldra un mensaje que ponga 'GAME OVER'
***************************************************************************************/
function jugar(){
  //Comprobamos el turno del jugador correspondiente
  if(turnoJugador){
    //Ponemos el boton rojo
    this.classList.add("fondoRojo");
  }else{
    //Ponemos el boton verde
    this.classList.add("fondoVerde");
  }
}