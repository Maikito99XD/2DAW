//Recogemos todas las etiquetas img del html
const imagenes = document.querySelectorAll('img');
//Definimos dos variables para las victorias de cada jugador
let victoriasJugadorA;
let victoriasJugadorB;
//Definimos una variable para saber el turno de cada jugador
let turnoJugador = 0;
//Definimos una variable miWindow que será la ventana emerjente de errores
let miWindow;
//Esta variable se encargará de la configuración de la pantalla emerjente
var configuracion_ventana = "left=100,top=200,width=500,height=200"
//Window onload es para cuando abramos o refresquemos la pagina nos lleve al metodo comenzar
window.onload=() =>{
    comenzar();
}
//Recorremos todas las imagenes y le damos un eventListener de dragstart
imagenes.forEach(imagen => {
    imagen.addEventListener('dragstart',dragStart);
});

function dragStart(e){
    //Este if llama a un metodo llamado compruebaTurnoJugador y le pasaremos el id de la imagen que tengamos
    //A su vez comprobará que si el turno del jugador se corresponde con la imagen hará lo siguiente
    if(compruebaTurnoJugador(e.target.id)){
        e.dataTransfer.setData('text/plain', e.target.id);
    //En caso contrario nos saldrá una ventana que nos dirá Turno incorrecto y se cerrará al segundo
    }else{
        miWindow = window.open("", "", configuracion_ventana);
        miWindow.document.write("<h1>TURNO INCORRECTO</h1>");
        idTimeout=setTimeout(function() {
        miWindow.close();
        }, 1000);
    }
}
//La constante boxes almacenará todas las casillas 
const boxes = document.querySelectorAll('.box');
//Haremos un forEach para darle a cada casilla un eventListener
boxes.forEach(box => {
 box.addEventListener('dragenter', dragEnter)
 box.addEventListener('dragover', dragOver);
 box.addEventListener('dragleave', dragLeave);
 box.addEventListener('drop', drop);
});
//La funcion dragEnter es para saber cuando entraremos en una casilla 
function dragEnter(e) {
    e.preventDefault();
    e.target.classList.add('drag-over');
}
//La función dragOver es para cuando estemos sobre la casilla
function dragOver(e) {
    e.preventDefault();
    e.target.classList.add('drag-over');
}
//La función dragLeave es para cuando nos salgamos de la casilla
function dragLeave(e) {
    e.target.classList.remove('drag-over');
}
//La función drop es para cuando soltemos nuestra imagen
function drop(e) {
    //Este if se encargará de comprobar si la casilla está ocupada 
    if(compruebaCasillaOcupada(e)){
        //En caso de que no este ocupada añadiremos la imagen a la casilla
        e.target.classList.remove('drag-over');
        const id = e.dataTransfer.getData('text/plain');
        const draggable = document.getElementById(id);
        e.target.appendChild(draggable);
        const boxDrop = e.target.appendChild
        //Al añadir la imagen el jugador ha hecho un movimiento así que llamamos a la función comprobar
        comprobar();
        //En caso de que el turno del jugador sea 0 sumaremos 1 o restaremos 1 en caso contrario
        //Así sabemos el turno de cada jugador
        if(turnoJugador == 0){
            turnoJugador++;
        }else{
            turnoJugador--;
        }
        //Llamamos a la función cambiarImagenJugador para cambiar la imagen y así los jugadores
        //saben de quien es el turno.
        cambiarImagenTurnoJugador();
    //En caso de que la casilla esté ocupada crearemos una nueva ventana emerjente que diga a los 
    //jugadores que esa casilla está ocupada 
    }else{
        miWindow = window.open("", "", configuracion_ventana);
        miWindow.document.write("<h1>CASILLA OCUPADA</h1>");
        idTimeout=setTimeout(function() {
        miWindow.close();
        }, 1000);
    }
}
//La función compruebaTurnoJugador será para comprobar el turno de cada jugador pasandole el
//id de la imagen que hayan tratado de coger.
function compruebaTurnoJugador(idImagen){
    //En caso de que el id de la imagen acabe en X (será el jugador 1) hará lo siguiente
    if(idImagen.endsWith("X")){
        //En caso de que el turno del jugador sea 0 (que se referira al jugador 1) devolverá true
        if(turnoJugador == 0){
            return true;
        //En caso de que sea el turno del jugador 2 devolverá false
        }else{
            return false;
        }
    //En caso de que el id no sea X será O (que será el jugador 2)
    }else{
        //En caso de que el turno del jugador sea 1 devolverá true
        if(turnoJugador == 1){
            return true;
        //En caso contrario será false
        }else{
            return false;
        }
    }
}
//En esta función comprobaremos si la casilla seleccionada está ocupada o no
function compruebaCasillaOcupada(e){
    //Con currentTarget o this nos dará la información del div y comprobaremos si tiene nodos hijos
    if(e.currentTarget.hasChildNodes()){
        //Devolverá false si no tiene entonces la casilla está vacia
        return false;
    }else{
        //En caso de que tenga devolverá true
        return true;
    }
}

//La función comenzar es una función que inicializará todo y recogerá todos los datos del localStorage
function comenzar(){
    //En caso de que no haya en localStorage una clave llamada victoriasJugadorA
    if(localStorage.getItem("victoriasJugadorA") == null ){
        //Crearemos la clave y valor
        localStorage.setItem("victoriasJugadorA",0);
        //Se lo asignaremos a la variable victoriasJugadorA
        victoriasJugadorA = localStorage.getItem("victoriasJugadorA");
    }else{
        //En caso de que exista simplemente recogeremos los datos almacenados y se los asignaremos
        victoriasJugadorA = localStorage.getItem("victoriasJugadorA");
    }
    //En caso de que no haya en localStorage una clave llamada victoriasJugadorB
    if(localStorage.getItem("victoriasJugadorB") == null ){
        //Crearemos la clave y valor
        localStorage.setItem("victoriasJugadorB",0);
        //Se lo asignaremos a la variable victoriasJugadorB
        victoriasJugadorB = localStorage.getItem('victoriasJugadorB');
    }else{
        //En caso de que exista simplemente recogeremos los datos almacenados y se los asignaremos
        victoriasJugadorB = localStorage.getItem('victoriasJugadorB');
    }
    //resetearemos el turno del jugador a 0, osea que será el turno del jugador 1
    turnoJugador = 0;
    //Resetearemos la imagen del turno de los jugadores
    cambiarImagenTurnoJugador();
    //Pondremos el valor de las victorias de cada jugador para que se vean usando la 
    //funcion calculaVictoriasJugadores
    calculaVictoriasJugadores();
}

function calculaVictoriasJugadores(){
    //Recogemos el h2 que será el marcador de las victorias de cada jugador
    let victoriasA = document.getElementById("victoriasA");
    let victoriasB = document.getElementById("victoriasB");
    //Les cambiamos el texto para que salga el puntuaje de cada jugador
    victoriasA.innerHTML = "Victorias A: "+victoriasJugadorA;

    victoriasB.innerHTML = "Victorias B: "+victoriasJugadorB;

}
//En el metodo comprobar he puesto otras 2 funciones, para que así no quede todo engorroso 
//y se vea mejor
function comprobar(){
    //En caso de que sea el turno del jugador 1 se comprobará si ha ganado
    if(turnoJugador == 0){
        comprobarVictoriaJugadorA();
    //En caso de que sea el turno del jugador 2 se comprobará si ha ganado
    }else{
        comprobarVictoriaJugadorB();
    }
}

function comprobarVictoriaJugadorB(){
    if(boxes[0].hasChildNodes() && boxes[0].firstElementChild.id.endsWith("O") &&
    boxes[1].hasChildNodes() && boxes[1].firstElementChild.id.endsWith("O") &&
    boxes[2].hasChildNodes() && boxes[2].firstElementChild.id.endsWith("O")){
        victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB);
        mensajeVictoriaJugador("B");
        calculaVictoriasJugadores();
    }else if(
        boxes[3].hasChildNodes() && boxes[3].firstElementChild.id.endsWith("O") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("O") &&
        boxes[5].hasChildNodes() && boxes[5].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[6].hasChildNodes() && boxes[6].firstElementChild.id.endsWith("O") &&
        boxes[7].hasChildNodes() && boxes[7].firstElementChild.id.endsWith("O") &&
        boxes[8].hasChildNodes() && boxes[8].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[0].hasChildNodes() && boxes[0].firstElementChild.id.endsWith("O") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("O") &&
        boxes[8].hasChildNodes() && boxes[8].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[2].hasChildNodes() && boxes[2].firstElementChild.id.endsWith("O") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("O") &&
        boxes[6].hasChildNodes() && boxes[6].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[0].hasChildNodes() && boxes[0].firstElementChild.id.endsWith("O") &&
        boxes[3].hasChildNodes() && boxes[3].firstElementChild.id.endsWith("O") &&
        boxes[6].hasChildNodes() && boxes[6].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[1].hasChildNodes() && boxes[1].firstElementChild.id.endsWith("O") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("O") &&
        boxes[7].hasChildNodes() && boxes[7].firstElementChild.id.endsWith("O")
    ){
        victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB);
        mensajeVictoriaJugador("B");
        calculaVictoriasJugadores();
    }else if(
        boxes[2].hasChildNodes() && boxes[2].firstElementChild.id.endsWith("O") &&
        boxes[5].hasChildNodes() && boxes[5].firstElementChild.id.endsWith("O") &&
        boxes[8].hasChildNodes() && boxes[8].firstElementChild.id.endsWith("O")
    ){
        victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB);
        mensajeVictoriaJugador("B");
        calculaVictoriasJugadores();
    }
}

function comprobarVictoriaJugadorA(){
    if(
        boxes[0].hasChildNodes()&& boxes[0].firstElementChild.id.endsWith("X") && 
        boxes[1].hasChildNodes() && boxes[1].firstElementChild.id.endsWith("X") &&
        boxes[2].hasChildNodes() && boxes[2].firstElementChild.id.endsWith("X")){
        victoriasJugadorA++;
        localStorage.setItem("victoriasJugadorA",victoriasJugadorA);
        mensajeVictoriaJugador("A");
        calculaVictoriasJugadores();
    }else if(
        boxes[3].hasChildNodes() && boxes[3].firstElementChild.id.endsWith("X") && 
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("X") &&
        boxes[5].hasChildNodes() && boxes[5].firstElementChild.id.endsWith("X")){
            victoriasJugadorA++;
            localStorage.setItem("victoriasJugadorA",victoriasJugadorA);
            mensajeVictoriaJugador("A");
            calculaVictoriasJugadores();
    }else if(
        boxes[6].hasChildNodes() && boxes[6].firstElementChild.id.endsWith("X") && 
        boxes[7].hasChildNodes() && boxes[7].firstElementChild.id.endsWith("X") &&
        boxes[8].hasChildNodes() && boxes[8].firstElementChild.id.endsWith("X")){
            victoriasJugadorA++;
            localStorage.setItem("victoriasJugadorA",victoriasJugadorA);
            mensajeVictoriaJugador("A");
            calculaVictoriasJugadores();
    }else if(
        boxes[0].hasChildNodes() && boxes[0].firstElementChild.id.endsWith("X") && 
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("X") &&
        boxes[8].hasChildNodes() && boxes[8].firstElementChild.id.endsWith("X")){
            victoriasJugadorA++;
            localStorage.setItem("victoriasJugadorA",victoriasJugadorA);
            mensajeVictoriaJugador("A");
            calculaVictoriasJugadores();
    }else if(
        boxes[2].hasChildNodes() && boxes[2].firstElementChild.id.endsWith("X") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("X") &&
        boxes[6].hasChildNodes() && boxes[6].firstElementChild.id.endsWith("X")){
            victoriasJugadorA++;
            localStorage.setItem("victoriasJugadorA",victoriasJugadorA);
            mensajeVictoriaJugador("A");
            calculaVictoriasJugadores();
    }else if(
        boxes[0].hasChildNodes() && boxes[0].firstElementChild.id.endsWith("X") &&
        boxes[3].hasChildNodes() && boxes[3].firstElementChild.id.endsWith("X") &&
        boxes[6].hasChildNodes() && boxes[6].firstElementChild.id.endsWith("X")){
            victoriasJugadorA++;
            localStorage.setItem("victoriasJugadorA",victoriasJugadorA);
        mensajeVictoriaJugador("A");
        calculaVictoriasJugadores();
    }else if(
        boxes[1].hasChildNodes() && boxes[1].firstElementChild.id.endsWith("X") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("X") &&
        boxes[7].hasChildNodes() && boxes[7].firstElementChild.id.endsWith("X")
    ){
        victoriasJugadorA++;
        localStorage.setItem("victoriasJugadorA",victoriasJugadorA);
        mensajeVictoriaJugador("A");
        calculaVictoriasJugadores();
    }else if(
        boxes[2].hasChildNodes() && boxes[2].firstElementChild.id.endsWith("X") &&
        boxes[5].hasChildNodes() && boxes[5].firstElementChild.id.endsWith("X") &&
        boxes[8].hasChildNodes() && boxes[8].firstElementChild.id.endsWith("X")
    ){
        victoriasJugadorA++;
        localStorage.setItem("victoriasJugadorA",victoriasJugadorA);
        mensajeVictoriaJugador("A");
        calculaVictoriasJugadores();
    }
}

function mensajeVictoriaJugador(jugador){
    miWindow = window.open("", "", configuracion_ventana);
    miWindow.document.write("<h1>GANADOR JUGADOR "+jugador+"</h1>");
    idTimeout=setTimeout(function() {
    miWindow.close();
    }, 1000);
}

function cambiarImagenTurnoJugador(){
    if(turnoJugador == 0){
        document.getElementById("turnoJugadorImg").src="imagenes/x.jpg";
    }else{
        document.getElementById("turnoJugadorImg").src="imagenes/o.jpg";
    }
}