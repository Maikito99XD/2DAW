/****  Aqui declaramos si utilizamos alguna variable global.    **********************************
 **************************************************************************************************/
let botones = document.querySelectorAll("input");
/** Si color es true es rojo, si es false es verde*/
let color = true;
/**Variable para controlar si la partida esta iniciada o no, util para el modo de juego de teclado */
let iniciada = false;

let casillasMarcadas = 0;

/***********************    AQUI AÑADIMOS TODOS LOS LISTENERS    **********************************
 **************************************************************************************************/
//Listener para comprobar la tecla F12
document.addEventListener("keydown", teclaF12.bind(event));

function click() {
    //Comprobamos que la casilla no tiene niguna clase
    if (this.classList.contains("fondoRojo") || this.classList.contains("fondoVerde")) {
        casillaOcupada();
    } else {
        if (color) {
            this.classList.add("fondoRojo");
        } else {
            this.classList.add("fondoVerde");
        }
        //Con esto cambiamos el booleano
        color ^= 1;
        casillasMarcadas++;
    }

    if (casillasMarcadas == 9) {
        alert("GAME OVER");
    }
}

/* En esta funcion controlamos si se ha pulsado la tecla F12 para Iniciar el juego.
 **************************************************************************************   (1,5ptos)*/
function teclaF12(event) {
    //Evitamos que se abran las herramientas de desarrollador
    event.preventDefault();
    if (event.key === "F12") {
        resetear();
        jugar();
        iniciada = true;
    } else {
        //En caso de que no sea F12 comprobamos si la tecla que hemos pulsado este entre los botones
        numeroTecla(event.key);
    }
}

/*Controlamos cuando esta el raton en la casilla.                      (1,25pto)
  Si no esta utilizada la casilla cambiamos el color de fondo a azul
********************************************************************/
function entraRaton() {
    //Comprobamos que no tenga otra clase, con esto nos evitamos que se ponga en azul cuando ya esta marcado
    if (!this.classList.length > 0) {
        this.classList.add("fondoAzul");
    }
}

/*Controlamos cuando sale el raton de la casilla.                       (1,25ptos)
  Si no esta utilizada la casilla cambio el color de fondo a blanco
*********************************************************************/
function saleRaton() {
    this.classList.remove("fondoAzul");
}

/* Esta funcion resetea todo los valores.										(No puntua)
 *****************************************************************************/
function resetear() {
    //Pasamos por todos los botones y eliminamos todas las clases
    botones.forEach((boton) => {
        boton.classList.remove(...boton.classList);
    });
}

/* Abrimos una nueva ventana 1 segundo y nos indica que la casilla esta ocupada   (1pto)
 ******************************************************************************/
function casillaOcupada() {
    let miWindow = window.open("", "", "width=300,height=100");
    miWindow.moveTo(50, 50);
    miWindow.document.write("<strong>La casilla ya esta seleccionada</strong>");
    setTimeout(() => {
        miWindow.close();
    }, 1000);
}

/*Controlamos la tecla pulsada  y llamamos a la funcion jugar								(2ptos)
 ***************************************************************************************/
function numeroTecla(tecla) {
    if (iniciada)
        botones.forEach((boton) => {
            //Pasamos por todos los botones y cogemos el boton con el valor de la tecla que hemos pulsado
            if (tecla == parseInt(boton.value)) {
                if (boton.classList.contains("fondoRojo") || boton.classList.contains("fondoVerde")) {
                    casillaOcupada();
                } else {
                    if (color) {
                        boton.classList.add("fondoRojo");
                    } else {
                        boton.classList.add("fondoVerde");
                    }
                    //Esto lo hacemos para cambiar el valor del boleano
                    color ^= 1;
                    casillasMarcadas++;
                }
            }
            //Comprobamos que hemos llenado todas las casillas
            if (casillasMarcadas == 9) {
                alert("GAME OVER");
            }
        });
}

/*Esta funcion controla si la casilla esta utilizada. Si es asi no hara nada.       (3ptos=1,25 teclas + 1,25 raton + 0,5 GAME OVER)
  Si la casilla no esta utilizada mirara a que jugador le toca y pintara el fondo  
  de ROJO o VERDE segun a quien le toque. Cuando pulsemos la ultima casilla 
  saldra un mensaje que ponga 'GAME OVER'
***************************************************************************************/
function jugar() {
    //Asignamos los listeners a los botones
    botones.forEach((boton) => {
        //Listener por si el raton entra
        boton.addEventListener("mouseenter", entraRaton);
        //Listener por si el raton sale
        boton.addEventListener("mouseleave", saleRaton);
        //Listener de cuando pulsamos
        boton.addEventListener("mousedown", click);
    });
}
