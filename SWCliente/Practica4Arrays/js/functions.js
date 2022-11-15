/**
 * La función clearItems es una función la cual le pasaremos un array de notas separadas por comas que se le haya pasado, después dicha función
 * devolverá un array con todas las notas separadas, validará si están entre el 0 y el 10, validará que solo se computen las primeras 5 notas.
 * @param {*} notas Se el pasarán las notas que queramos separar
 * @returns Devolverá un array de notas que ya están separadas
 */
function clearItems(notas){
    //Este alert es para que el usuario, tras introducir las notas que desee computar, sepa que tiene que mirar la consola para ver el resultado
    alert("Por favor mire la consola con F12 y cierre esta alerta");
    //El array notasSeparadas es un array para separar cada nota mediante una ',' que nos pase el usuario 
    let notasSeparadas = [];
    //El array notasSeparadasComprobadas es un array para introducir todas las notas que se han verificado, 
    //que sean notas y que estén dentro del rango
    let notasSeparadasComprobadas = [];
    //Aquí usamos la función split para separar mediante el separador que le indiquemos, las notas que nos pase el usuario 
    notasSeparadas = notas.split(",");
    /*
    la variable cantidadNotas es para controlar cuantas notas se han verificado y por tanto se han agregado al array de 
    notasSepradasComprobadas, también se usa para poder saber cuantas notas se han computado actualmente.
    */
    let cantidadNotas = 0;
    //Se crea un bucle for para poder verificar las notas que nos ha pasado el usuario
    for (let i = 0; i < notasSeparadas.length; i++){ 
        /*
        Si la nota que se nos pasa es un numero entonces entrará
        IMPORTANTE, por que se le pone el parseInt? Esto es por que prompt nos pasa los datos del usuario mediante un string entonces hay
        que hacer la conversión a Integer para poder comprobar que efectivamente es un numero.
        */
        if(!isNaN(notasSeparadas[i])){
            //Solo pueden haber hasta 5 notas
            if(cantidadNotas <= 4){
                /*
                Este if es muy importante ya que se encarga de validar que tanto al parsear sea mayor o igual a 0 y menor o igual a 10
                SIN EMBARGO, es MUY IMPORTANTE hacer la comprobación final el -0 ya que un usuario nos la puede colar ya que al parsear,
                no se tiene en cuenta el - en el 0 haciendo así que un usuario nos la pueda colar fácilmente y fastidiar todo el programa saltando
                muchos errores.
                */
                if(notasSeparadas[i] >= 0 && notasSeparadas[i] <= 10 && notasSeparadas[i] != ("-0")){
                    notasSeparadasComprobadas[cantidadNotas] = notasSeparadas[i];
                    cantidadNotas++;
                }
            }else{
                break; 
            }
        }
    }
    return notasSeparadasComprobadas;
}

/**
 * La función notaMaxima no servirá para poder saber cual es la nota máxima de todas las que nos pase el usuario
 * @param {*} notas Se nos pasará un array de notas
 * @returns Devolverá la nota maxima de todas las notas que nos hayan pasado
 */

function notaMaxima(notas){
    /*La variable notaMaxima será para saber cual es la nota maxima, la inicializamos a 0 para que por ahora sea la menor de todas e ir 
    comprobando cual es la mayor de todas
    */
    let notaMaxima = 0;
    //El bucle for nos servirá para poder recorrer todas las notas y así saber cual es la mayor de todas
    for (let i = 0; i < notas.length; i++){ 
        //La variable notaActual nos servirá para saber cual es la nota actual, se parsea para cerciorarse de que sea un Integer
        //Nota: Se podría hacer en el if, sin embargo y por alguna razón me da error y me saca un NaN
        let notaActual = parseInt(notas[i]);
        //Se comprueba la nota maxima comparandola con la actual y de ser menor, se almacena
        if(notaMaxima < notaActual){
            //Se almacena la mayor en la variable notaMaxima
            notaMaxima = notaActual;
        }
    }
    
    return notaMaxima;
}
/**
 * La función notaMedia nos permitirá saber la nota media de todas las que nos pase el usuario
 * @param {*} notas Se nos pasará las notas que nos haya indicado el usuario
 * @returns Devolverá la nota media
 */
function notaMedia(notas){
    //La variable totalNotas nos servirá para sumar todas las notas de los usuarios
    let totalNotas = 0;
    //Recorremos todas las notas y las sumamos al total de las notas
    for(let i = 0;i < notas.length; i++){
        totalNotas = totalNotas + parseInt(notas[i]);
    }
    //Devolveremos el total de las notas dividido por la cantidad de notas que nos hayan pasado
    return totalNotas / notas.length;

}
/**
 * La función cambiaNotas, incrementará en un porcentaje el cual le pasaremos las notas que sean mayores o igual a 8
 * @param {*} notas Las notas que nos pasará el usuario
 * @param {*} incremento El incremento que le daremos a las notas 
 * @returns Devolveremos las notas mayores o igual a 8 incrementadas
 */
function cambiaNotas(notas, incremento){
    //Creamos el array notasIncrementadas el cual almacenará todas las notas incrementadas
    let notasIncrementadas = [];
    //La variable notasQueSeHanIncrementado es para controlar en el array y así ir añadiendo solo las que sean mayores a 8
    let notasQueSeHanIncrementado = 0;
    
    for(let i = 0; i < notas.length; i++){
        //La notaActual es para saber la nota actual
        //Al igual que antes, al no dejarme parsear en el if, he tenido que crear una variable auxiliar para poder parsear
        let notaActual = parseInt(notas[i])
        //Este if comprobará si la notaActual es mayor o igual a 8
        if(notaActual >= 8){
            //Se añadirá al array notasIncrementadas la nota incrementada, la cual se parsea a Float para así que tenga decimales
            notasIncrementadas[notasQueSeHanIncrementado] = parseFloat(notaActual + (notaActual * incremento / 100));
            //Se suman las notas que se han incrementado
            notasQueSeHanIncrementado++;
        }
    }
    
    return notasIncrementadas;
}
/**
 * La función eliminarRepetidos nos permitirá eliminar todas las notas que el usuario ha puesto repetidas haciendo 
 * así que no salga ninguna reptida
 * @param {*} notas Las notas que nos pase el usuario 
 * @returns Devolverá un array de notas que no están repetidas.
 */
function eliminarRepetidos(notas){
    //El array notasSinRepetir será un array el cual almacenaremos todas las notas que no estén repetidas
    let notasSinRepetir = [];
    //La variable booleana repetida es para saber si dicha nota está repetida o no
    let repetida = false;
    //La variable cantidadNotasSinRepetir nos servirá para saber la cantidad de notas que no se han repetido y así controlar el array
    let cantidadNotasSinRepetir = 0;

    //Creamos el primer bucle for para recorrer todas las notas que nos ha pasado el usuario
    for(let i = 0; i < notas.length; i++){
        /*
        El segundo bucle es para comprobar si alguna de las notas está repetida recorriendo el bucle con las notas que no están repetidas
        */
        for(let j = 0; j < notasSinRepetir.length; j++){
            //En este if comprobaremos que las notas sean repetidas o no
            if(notasSinRepetir[j] == notas[i]){
                //De serlo ponemos repetida a true
                repetida = true;
                //Hacemos un break para salir del segundo for
                break;
            //En caso contrario siempre tendremos repetida en false
            }else{
                repetida = false;
            }
        }
        /*
        Este if se encarga de que si repetida es falso, añada la nota al array notasSinRepetir en la posicion 
        que le diga cantidadNotasSinRepetir.
        Sin embargo, por que no se hace dentro del primer if que está dentro del segundo for, esto es debido a que necesitamos siempre 
        1 posicion en el array notasSinRepetir, entonces la primera vez no entrará en el segundo for debido a que está vacio, 
        entonces como repetida está por defecto false, siempre se añadirá la primera nota al array.
        */
        if(repetida == false){
            //Se añade la nota al array notasSinRepetir
            notasSinRepetir[cantidadNotasSinRepetir] = notas[i];
            //Se suma +1 a la variable cantidadNotasSinRepetir
            cantidadNotasSinRepetir++;
        }
    }
    //Se devolverá el array
    return notasSinRepetir;
}