//El resultado de la operación
let resultado;
//El primer operando que nos indique el usuario
let operandoUno;
//El segundo operando que nos indique el usuario
let operandoDos;
//La operación que nos indique el usuario
let operacion;
//Recogemos todos los botones de la calculadora y hacemos un array con el
let botones = document.querySelectorAll("button");
//Ubicamos la pantalla
let pantalla = document.getElementById("resultado");
//Creamos un forEach para cada recorrer cada botón y así añadirle a cada uno su eventListener
botones.forEach((boton) => {
    //Creamos el eventListener del boton, con click
    boton.addEventListener("click", function(){
        //Comprobamos que el valor del botón sea un número
        if(!isNaN(boton.value)){
            //Comprobamos que el id del boton sea igual al id del boton en el html
            //Esto se hace ya que en el html no tenemos un valor, lo comprobamos con su id
            if(document.getElementById("igual") == boton){
                //Recogemos el segundo operando de la pantalla
                operandoDos = pantalla.innerHTML;
                //Borramos la pantalla
                borrarPantalla();
                //Comprobamos que tipo de operación va a realizar el usuario,
                //En cualquier operación, se realizará la operación de los dos operandos 
                //y guadaremos el resultado
                switch(operacion){
                    case "+":
                        resultado = parseInt(operandoUno) + parseInt(operandoDos);
                        break;
                    case "-":
                        resultado = parseInt(operandoUno) - parseInt(operandoDos);
                        break;
                    case "*":
                        resultado = parseInt(operandoUno) * parseInt(operandoDos);
                        break;
                    case "/":
                        resultado = parseInt(operandoUno) / parseInt(operandoDos);
                        break;
                }
                //Mostraremos el resultado por pantalla
                pantalla.innerHTML = parseInt(resultado);
                //Ponemos ambos operandos a null para realizar las comprobaciones en la siguiente operación
                operandoUno = null;
                operandoDos = null;
            //Comprobamos que el id del boton sea igual al id del boton en el html
            }else if(document.getElementById("reset") == boton){
                //Borramos la pantalla
                borrarPantalla();
                //Reseteamos todos los valores a null
                operandoUno = null;
                operacion = null;
                operandoDos = null;
                resultado = null;
            }else{
                //Cada vez que el usuario añada numeros se añadirá el valor del boton a la pantalla
                pantalla.innerHTML = pantalla.innerHTML + boton.value;
            }
        //En caso de que no sea un número, se realizará lo siguiente
        }else{
            //En caso de que el primer operando no sea null, se guardará el resultado anterior,
            //dentro del primer operando
            if(operandoUno != null){
                operandoUno = resultado;
            //En caso de que esté vacio, se guardará el valor de la pantalla
            }else{
                operandoUno = pantalla.innerHTML;
            }
            //Cogeremos la operación y la guardaremos
            operacion = boton.value;
            //borraremos la pantalla
            borrarPantalla();
            //Crearemos una ventana nueva que nos indicará la operación que realizaremos
            ventanaOperacion(operacion);
        }

    })
});
/**
 * La función borrarPantalla pondrá el valor de la pantalla vacio, para dar la sensación de que la 
 * pantalla se ha borrado
 */
function borrarPantalla(){
    pantalla.innerHTML = "";
}
/**
 * La función ventanaOperacion, se usará para que al pulsar una operación, se mostrará el tipo de 
 * operación que se realizará en una ventana nueva que crearemos
 * @param {*} operacion La operación que se realizará
 */
function ventanaOperacion(operacion){
    //Variable para guardar la ventana que creemos
    let miWindow;
    //La configuración de la ventana, el ancho, alto, etc...
    var configuracion_ventana = "left=50,top=50,width=200,height=100";
    //Se abrirá una ventana nueva con la configuración que le hemos puesto y la guardaremos en miWindow
    miWindow = window.open("", "", configuracion_ventana);
    //Crearemos un h1 en la nueva ventana e indicaremos la operación que se va a realizar
    miWindow.document.write("<h1>Operación: "+operacion+"</h1>");
    //Pondremos un setTimeout para indicar cuanto tiempo estará la ventana abierta
    let idTimeout=setTimeout(function() {
        //Cerraremos la ventana cuando pase el tiempo
        miWindow.close();
        //Pondremos el tiempo que queramos tener la ventana abierta
        }, 1000);
}
//Crearemos un eventListener en todo el documento osea la página, de tipo keydown
document.addEventListener("keydown",(event)=>{
    //Esto es para que el enter y el suprimir no hagan su función por defecto, 
    //el cual es repetir la ultima tecla que hemos pulsado
    event.preventDefault();
    //Comprobaremos que la tecla pulsada sea un numero
    if(!isNaN(event.key)){
        //Mostraremos el o los numeros al usuario
        pantalla.innerHTML = pantalla.innerHTML + event.key;
    //En caso de que no sea un número, haremos lo siguiente
    }else{
        //Comprobaremos el tipo de tecla que se ha pulsado
        switch(event.key){
            //En caso de que sea suprimir, que será el reset
            case "Delete":
                //Borraremos la pantalla
                borrarPantalla();
                //Resetearemos todos los operandos y la operacion
                operandoUno = null;
                operacion = null;
                operandoDos = null;
                resultado = null;
                break;
            //En caso de enter que será la tecla enter
            case "Enter":
                //Recogeremos de la pantalla el segundo operando
                operandoDos = pantalla.innerHTML;
                //Borraremos la pantalla
                borrarPantalla();
                //Comprobamos que tipo de operación va a realizar el usuario,
                //En cualquier operación, se realizará la operación de los dos operandos 
                //y guadaremos el resultado
                switch(operacion){
                    case "+":
                        resultado = parseInt(operandoUno) + parseInt(operandoDos);
                        break;
                    case "-":
                        resultado = parseInt(operandoUno) - parseInt(operandoDos);
                        break;
                    case "*":
                        resultado = parseInt(operandoUno) * parseInt(operandoDos);
                        break;
                    case "/":
                        resultado = parseInt(operandoUno) / parseInt(operandoDos);
                        break;
                }
                //Mostraremos el resultado por pantalla
                pantalla.innerHTML = parseInt(resultado);
                //Resetearemos los operadores
                operandoUno = null;
                operandoDos = null;
                break;
            //En caso de que se pulse la tecla suma ya sea del numerico o del teclado normal
            case "+":
                //Se recogerá la operación
                operacion = event.key;
                //Se mostrará el tipo de operación a realizar
                ventanaOperacion(operacion);
                //En caso de que el primer operando no sea null, se guardará el resultado anterior,
                //dentro del primer operando
                if(operandoUno != null){
                    operandoUno = resultado;
                }else{
                    operandoUno = pantalla.innerHTML;
                }
                //Borramos la pantalla
                borrarPantalla();
                break;
            //En caso de que se pulse la tecla resta ya sea del numerico o del teclado normal
            case "-":
                //Se recogerá la operación
                operacion = event.key;
                if(operandoUno != null){
                    operandoUno = resultado;
                }else{
                    operandoUno = pantalla.innerHTML;
                }
                //Se mostrará el tipo de operación a realizar
                ventanaOperacion(operacion);
                //Borramos la pantalla
                borrarPantalla();
                break;
            //En caso de que se pulse la tecla asterisco ya sea del numerico o del teclado normal
            case "*":
                //Se recogerá la operación
                operacion = event.key;
                if(operandoUno != null){
                    operandoUno = resultado;
                }else{
                    operandoUno = pantalla.innerHTML;
                }
                //Se mostrará el tipo de operación a realizar
                ventanaOperacion(operacion);
                //Borramos la pantalla
                borrarPantalla();
                break;
            //En caso de que se pulse la tecla barra ya sea del numerico o del teclado normal
            case "/":
                //Se recogerá la operación
                operacion = event.key;
                if(operandoUno != null){
                    operandoUno = resultado;
                }else{
                    operandoUno = pantalla.innerHTML;
                }
                //Se mostrará el tipo de operación a realizar
                ventanaOperacion(operacion);
                //Borramos la pantalla
                borrarPantalla();
                break;
        }
    } 
});