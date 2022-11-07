let arrayNotas = [];
let notasIncrementadas = [];
let numerosUsuario = prompt("Dime todos los numeros que quieras, separados por comas y que estén entre el 0 y el 10");

arrayNotas = clearItems(numerosUsuario);

console.log("Todas la notas separadas y comprobadas de que sean numeros y que no sean numeros negativos: "+arrayNotas);

console.log("La nota máxima de todas las notas es un: "+notaMaxima(arrayNotas));

console.log("La nota media de la clase es de un: "+notaMedia(arrayNotas));

console.log("Las siguientes notas se han incrementado un 10% : "+cambiaNotas(arrayNotas,10));

console.log("Se han eliminado las notas repetidas, estás son las notas restantes: "+eliminarRepetidos(arrayNotas));
