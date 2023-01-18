const imagenes = document.querySelectorAll('img');
let victoriasJugadorA;
let victoriasJugadorB;
let turnoJugador = 0;
let miWindow;
var configuracion_ventana = "left=100,top=200,width=500,height=200"

window.onload=() =>{
    comenzar();
}

imagenes.forEach(imagen => {
    imagen.addEventListener('dragstart',dragStart);
});

function dragStart(e){
    if(compruebaTurnoJugador(e.target.id)){
        e.dataTransfer.setData('text/plain', e.target.id);
    }else{
        miWindow = window.open("", "", configuracion_ventana);
        miWindow.document.write("<h1>TURNO INCORRECTO</h1>");
        idTimeout=setTimeout(function() {
        miWindow.close();
        }, 1000);
    }
}

const boxes = document.querySelectorAll('.box');
boxes.forEach(box => {
 box.addEventListener('dragenter', dragEnter)
 box.addEventListener('dragover', dragOver);
 box.addEventListener('dragleave', dragLeave);
 box.addEventListener('drop', drop);
});

function dragEnter(e) {
    e.preventDefault();
    e.target.classList.add('drag-over');
}
function dragOver(e) {
    e.preventDefault();
    e.target.classList.add('drag-over');
}
function dragLeave(e) {
    e.target.classList.remove('drag-over');
}
function drop(e) {

    if(compruebaCasillaOcupada(e)){
        e.target.classList.remove('drag-over');
        const id = e.dataTransfer.getData('text/plain');
        const draggable = document.getElementById(id);
        e.target.appendChild(draggable);
        const boxDrop = e.target.appendChild
        comprobar();
        if(turnoJugador == 0){
            turnoJugador++;
        }else{
            turnoJugador--;
        }
        
        cambiarImagenTurnoJugador();
    }else{
        miWindow = window.open("", "", configuracion_ventana);
        miWindow.document.write("<h1>CASILLA OCUPADA</h1>");
        idTimeout=setTimeout(function() {
        miWindow.close();
        }, 1000);
    }
}

function compruebaTurnoJugador(idImagen){
    if(idImagen.endsWith("X")){
        if(turnoJugador == 0){
            return true;
        }else{
            return false;
        }
    }else{
        if(turnoJugador == 1){
            return true;
        }else{
            return false;
        }
    }
}

function compruebaCasillaOcupada(e){
    if(e.currentTarget.hasChildNodes()){
        return false;
    }else{
        return true;
    }
}


function comenzar(){
    if(localStorage.getItem("victoriasJugadorA") == null ){
        localStorage.setItem("victoriasJugadorA",0);
        victoriasJugadorA = localStorage.getItem("victoriasJugadorA");
    }else{
        victoriasJugadorA = localStorage.getItem("victoriasJugadorA");
    }

    if(localStorage.getItem("victoriasJugadorB") == null ){
        localStorage.setItem("victoriasJugadorB",0);
        victoriasJugadorB = localStorage.getItem('victoriasJugadorB');
    }else{
        victoriasJugadorB = localStorage.getItem('victoriasJugadorB');
    }

    turnoJugador = 0;

    cambiarImagenTurnoJugador();
    calculaVictoriasJugadores();
}

function calculaVictoriasJugadores(){
    let victoriasA = document.getElementById("victoriasA");
    let victoriasB = document.getElementById("victoriasB");

    victoriasA.innerHTML = "Victorias A: "+victoriasJugadorA;

    victoriasB.innerHTML = "Victorias B: "+victoriasJugadorB;

}
//En el metodo comprobar he puesto otras 2 funciones, para que así no quede todo engorroso 
//y se vea mejor
function comprobar(){


    if(turnoJugador == 0){
        comprobarVictoriaJugadorA();
    }else{
        comprobarVictoriaJugadorB();
    }
}

function comprobarVictoriaJugadorB(){
    if(boxes[0].hasChildNodes() && boxes[0].firstElementChild.id.endsWith("O") &&
    boxes[1].hasChildNodes() && boxes[1].firstElementChild.id.endsWith("O") &&
    boxes[2].hasChildNodes() && boxes[2].firstElementChild.id.endsWith("O")){
        victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB++);
        mensajeVictoriaJugador("B");
        calculaVictoriasJugadores();
    }else if(
        boxes[3].hasChildNodes() && boxes[3].firstElementChild.id.endsWith("O") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("O") &&
        boxes[5].hasChildNodes() && boxes[5].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB++);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[6].hasChildNodes() && boxes[6].firstElementChild.id.endsWith("O") &&
        boxes[7].hasChildNodes() && boxes[7].firstElementChild.id.endsWith("O") &&
        boxes[8].hasChildNodes() && boxes[8].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB++);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[0].hasChildNodes() && boxes[0].firstElementChild.id.endsWith("O") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("O") &&
        boxes[8].hasChildNodes() && boxes[8].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB++);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[2].hasChildNodes() && boxes[2].firstElementChild.id.endsWith("O") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("O") &&
        boxes[6].hasChildNodes() && boxes[6].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB++);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[0].hasChildNodes() && boxes[0].firstElementChild.id.endsWith("O") &&
        boxes[3].hasChildNodes() && boxes[3].firstElementChild.id.endsWith("O") &&
        boxes[6].hasChildNodes() && boxes[6].firstElementChild.id.endsWith("O")){
            victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB++);
            mensajeVictoriaJugador("B");
            calculaVictoriasJugadores();
    }else if(
        boxes[1].hasChildNodes() && boxes[1].firstElementChild.id.endsWith("O") &&
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("O") &&
        boxes[7].hasChildNodes() && boxes[7].firstElementChild.id.endsWith("O")
    ){
        victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB++);
        mensajeVictoriaJugador("B");
        calculaVictoriasJugadores();
    }else if(
        boxes[2].hasChildNodes() && boxes[2].firstElementChild.id.endsWith("O") &&
        boxes[5].hasChildNodes() && boxes[5].firstElementChild.id.endsWith("O") &&
        boxes[8].hasChildNodes() && boxes[8].firstElementChild.id.endsWith("O")
    ){
        victoriasJugadorB++;
        localStorage.setItem("victoriasJugadorB",victoriasJugadorB++);
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
        localStorage.setItem("victoriasJugadorA",victoriasJugadorA++);
        mensajeVictoriaJugador("A");
        calculaVictoriasJugadores();
    }else if(
        boxes[3].hasChildNodes() && boxes[3].firstElementChild.id.endsWith("X") && 
        boxes[4].hasChildNodes() && boxes[4].firstElementChild.id.endsWith("X") &&
        boxes[5].hasChildNodes() && boxes[5].firstElementChild.id.endsWith("X")){
            victoriasJugadorA++;
            localStorage.setItem("victoriasJugadorA",victoriasJugadorA++);
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