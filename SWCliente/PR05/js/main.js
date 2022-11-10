let arrayTareasPendientes = [];
let lista = [];
let texto = [];

function crearTareas(){
    let numeroTarea = 1;
    if(arrayTareasPendientes.length < 1){
        for(let i = 0;i<5;i++){
            arrayTareasPendientes[i] = prompt("Dime la "+numeroTarea+" tarea que quieras introducir...");
            numeroTarea++;
        }
        crearLista();
    }else{
        alert("Tienes que borrar la lista antes de añadir una nueva!");
    }
}

function crearLista(){
    let ol = document.createElement("ol");
    for(let i = 0;i<arrayTareasPendientes.length;i++){
        lista[i] = document.createElement('li');
        texto[i] = document.createTextNode(arrayTareasPendientes[i]);
        lista[i].appendChild(texto[i]);
        ol.appendChild(lista[i]);
    }
    var parentDiv = document.getElementById("lista").parentNode;
    var sp2 = document.getElementById("lista");
    parentDiv.insertBefore(ol, sp2);
}

function borrarTareas(){
    for(let i = 0;i<arrayTareasPendientes.length;i++){
        elemento.remove();
    }
}

function cambiarTareaPos(){

}