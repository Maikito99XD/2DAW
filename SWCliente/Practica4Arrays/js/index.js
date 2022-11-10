//ArrayNotas es un array para poder añadir todas las notas que nos pase el usuario
let arrayNotas = [];
//El array notasIncrementadas es un array el cual se almacenarán todas las notas que sean mayores o iguales a 8 
let notasIncrementadas = [];
//Numeros que nos pasará el usuario separado por comas
let numerosUsuario = prompt("Dime todos los numeros que quieras, separados por comas y que estén entre el 0 y el 10");
//Se le pasaran los numeros que nos ha dado el usuario por la funcion clearItems y el resultado se lo pasaremos al array.
arrayNotas = clearItems(numerosUsuario);
/*
Este if se hace para comprobar que el arrayNotas tenga notas validas que han sido verificadas y no venga vacio o que venga null,
se pone arrayNotas.lenght por que es la longitud del array, de tener 1 elemento o más pasaría el if, sin embargo si no tiene elementos dentro
significa que no ha pasado ninguna nota y por lo tanto no se han verificado
*/
if(arrayNotas != null && arrayNotas.length > 0){
    //Todos los mensajes que saldrán por la consola al pulsar el boton F12
    console.log("Todas la notas separadas y comprobadas de que sean numeros y que no sean numeros negativos: "+arrayNotas);

    console.log("La nota máxima de todas las notas es un: "+notaMaxima(arrayNotas));

    console.log("La nota media de la clase es de un: "+notaMedia(arrayNotas));
    //La variable notasIncrementadas recogerá el array que recibiremos del metodo cambiaNotas
    let notasIncrementadas = cambiaNotas(arrayNotas,10);
    //En el if comprobaremos que haya al menos 1 nota incrementada para saber si hay una nota con un 8 o mayor
    if(notasIncrementadas.length > 0){
        console.log("Las siguientes notas se han incrementado un 10% : "+ notasIncrementadas);
    //De lo contrario sacaremos el siguiente mensaje
    }else{
        console.log("No se ha podido incrementar ninguna de las notas por que ninguna llega al 8 o mayor...");
    }

    console.log("Se han eliminado las notas repetidas, estás son las notas restantes: "+eliminarRepetidos(arrayNotas));
//De no verificarse saltaría el siguiente mensaje y el usuario tendría que recargar la pagina
}else{
    console.log("No se han añadido ninguna nota, debido a que no se ha introducido ninguna nota valida pon notas entre el [0-10]");
}
