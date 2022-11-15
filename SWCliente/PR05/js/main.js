//Almacen de las tareas pendientes del usuario
let arrayTareasPendientes = [];
//La lista html que contendrá las tareas pendientes del usuario
let lista = [];
//Inicio de la etiqueta ol para tener la lista ordenada
let ol = "";
//La cantidad máxima de tareas pendientes que podrá introducir el usuario 
let cantidadMaxTareas = 5;
//El cambio de una tarea por otra que nos indique el usuario
let modificarTarea = "";

/**
 * La función pedirá al usuario que nos indicque la tarea que quiera introducir hasta que llegue al máximo de tareas que pueda introducir,
 * se añadiran al array de tareas pendientes y se creará la lista
 */
function crearTareas(){
    //El numero de tareas que hay guardadas actualmente
    let numeroTarea = 0;
    //Comprueba que el array de tareas pendientes este vacio para poder crear más tareas
    if(arrayTareasPendientes.length < 1){
        for(let i = 0;i<cantidadMaxTareas;i++){
            //Se guarda la tarea pendiente indicada por el usuario además de hacerle saber cuantas tareas hay guardadas actualmente
            arrayTareasPendientes[i] = prompt("Que tarea quieres introducir?\nTareas actuales: "+numeroTarea);
            //Al guardarse se sumara 1 para indicar que ahora hay una tarea pendiente más.
            numeroTarea++;
        }
        crearLista();
    //En caso de que hayan tareas pendientes, se le indicará al usuario que tiene que borrar la lista para crear una nueva.
    }else{
        alert("Tienes que borrar la lista antes de añadir una nueva!");
    }
}
/**
 * Crearemos la lista para que el usuario pueda verla y así pueda modificarla, borrarla, etc...
 */
function crearLista(){
    //Crearemos el elemento ol que es una lista ordenada
    ol = document.createElement("ol");
    //Crearemos la variable li para poder definir la etiqueta li en html
    let li;
    for(let i = 0;i<arrayTareasPendientes.length;i++){
        //Le declaramos el elemento li
        li = document.createElement('li');
        //Le agregamos texto mediante innerHTML, el cual será una de las tareas pendientes del usuario
        li.innerHTML = arrayTareasPendientes[i];
        //Se añadirá el li a la lista
        lista[i] = li;
        //Insertaremos cada nodo li en el listado ol
        ol.appendChild(lista[i]);
    }
    //Aquí recogeremos nodo que tenga el id "lista"
    var parentDiv = document.getElementById("lista").parentNode;
    var sp2 = document.getElementById("lista");
    //Insertaremos la lista antes del elemento que le pasemos.
    parentDiv.insertBefore(ol, sp2);
}
/**
 * Metodo para borrar todas las tareas del usuario
 */
function borrarTareas(){
    //En caso de que el arrayTareasPendientes tenga una tarea, 
    //pasaremos en caso de que este vacia se le indicará al usuario que debe crear una
    if(arrayTareasPendientes.length > 0){
        //Quitamos la etiqueta ol
        ol.remove();
        for(let i = 0;i<lista.length;i++){
            //Eliminamos cada etiqueta li que tengamos en el array lista
            lista[i].remove();
        }
        //Dejamos el array de tareas pendientes vacio para que así podamos coger nuevas tareas.
        arrayTareasPendientes = [];
    }else{
        alert("Tienes que crear una lista para poder borrarla!");
    }
}
/**
 * cambiarTareaPos, nos cambiará la tarea por otra nueva que el usuario nos indique
 */
function cambiarTareaPos(){
    //Comprobamos que el array de tareas pendientes esté lleno, en caso contrarío le indicaremos al usuario que cree una lista
    if(arrayTareasPendientes.length > 0){
        //Le preguntaremos al usuario que tarea quiere cambiar
        let tareaAmodificar = prompt("Que tarea deseas cambiar? Indicame su número por favor...");
        //Comprobamos que nos pase el numero de la tarea, en caso contrario le diremos que nos ponga un numero
        if(!isNaN(tareaAmodificar)){
            //Comprobamos que el numero de la tarea a modificar esté en el rango,
            //en caso contrario le diremos que nos indique un numero del 1 a la cantidad máxima de tareas
            if(tareaAmodificar > 0 && tareaAmodificar <= cantidadMaxTareas){
                //Le preguntaremos que tarea quiere añadir en lugar de la anterior
                modificarTarea = prompt("Que nueva tarea quieres añadir en lugar de la anterior?");
                //Le restaremos -1 a tareaAmodificar para que así lo podamos comparar con la posición en el array de lista
                tareaAmodificar -= 1;
                for(let i = 0;i<lista.length;i++){
                    //Comprobamos que tareaAmodificar sea igual a i para saber que esa tarea es la que necesitamos
                    if(tareaAmodificar == i){
                        //Le modificamos el texto con innerHTML por el nuevo que nos pasa el usuario
                        lista[i].innerHTML = modificarTarea;
                    }
                }
            }else{
                alert("No se ha encontrado la posición en la lista, por favor ponga un numero entre el 1 y el "+cantidadMaxTareas);
            }
        }else{
            alert("Tienes que introducir un número! No se ha cambiado ninguna tarea...");
        }
    }else{
        alert("Tienes que crear una lista para poder modificarla!");
    }
}
/**
 * prioridadTarea definirá la prioridad de las tareas, mediante el usuario, el usuario indicará la tarea a la cual asignarle prioridad
 * y le indicará si desea subirle la prioridad, bajarla o eliminarla mediante numeros.
 */
function prioridadTarea(){
    //Comprobamos que el usuario tenga tareas pendientes, en caso contrario le pediremos que cree una lista nueva
    if(arrayTareasPendientes.length > 0){
        //Se le pregunta al usuario que tarea desea cambiarle la prioridad
        let tareaCambiarPrioridad = prompt("Que tarea deseas cambiar la prioridad? Indicame su número por favor...");
        //Comprobamos que sea un numero en caso contrario le diremos que nos tiene que indicar un numero y no una letra
        if(!isNaN(tareaCambiarPrioridad)){
            //Comprobamos que la tarea que nos ha pasado el usuario esté en el rango de 1 y la cantidad máxima de tareas, 
            //en caso contrario le indicaremos el rango al usuario
            if(tareaCambiarPrioridad > 0 && tareaCambiarPrioridad <= cantidadMaxTareas){
                //Le preguntamos al usuario que tipo de prioridad quiere
                let tipoPrioridadTarea = prompt("Que nueva prioridad quieres añadir o eliminar a la tarea?\n1-Rojo,2-Naranja,3,Verde,4-Elimina Prioridad");
                //Comprobamos que esa prioridad sea un numero, en caso contrario le diremos que tiene que introducir un numero
                if(!isNaN(tipoPrioridadTarea)){
                    //Le restaremos -1 a tareaCambiarPrioridad para que así lo podamos comparar con la posición en el array de lista
                    tareaCambiarPrioridad -= 1;
                    //Comprobamos cual es la prioridad que quiere el usuario y se le añadirá un color o se le eliminará la prioridad
                    switch(tipoPrioridadTarea){
                        case "1":
                            lista[tareaCambiarPrioridad].style.backgroundColor = 'red';
                            break;
                        case "2":
                            lista[tareaCambiarPrioridad].style.backgroundColor = 'orange';
                            break;
                        case "3":
                            lista[tareaCambiarPrioridad].style.backgroundColor = 'green';
                            break;
                        case "4":
                            lista[tareaCambiarPrioridad].style.backgroundColor = null;
                            break;
                    }
                }else{
                    alert("Tienes que introducir solamente los numeros entre el [1-4]");
                }
            }else{
                alert("No se ha encontrado la posición en la lista, por favor ponga un numero entre el 1 y el "+cantidadMaxTareas);
            }
        }else{
            alert("Tienes que introducir un número! No se ha cambiado la prioridad a ninguna tarea...");
        }
    }else{
        alert("Tienes que crear una lista para poder modificarla!");
    }
}