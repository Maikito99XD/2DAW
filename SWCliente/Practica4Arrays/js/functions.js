function clearItems(notas){
    alert("Por favor mire la consola con F12 y cierre esta alerta");
    let notasSeparadas = [];
    let notasSeparadasComprobadas = [];
    notasSeparadas = notas.split(",");
    let cantidadNotas = 0;
    for (let i = 0; i < notasSeparadas.length; i++){ 
        if(Number.isInteger(parseInt(notasSeparadas[i]))){
            //Solo pueden haber hasta 5 notas
            if(cantidadNotas <= 4){
                /*
                Este if es muy importante ya que se encarga de validar que tanto al parsear sea mayor o igual a 0 y menor o igual a 10
                SIN EMBARGO, es MUY IMPORTANTE hacer la comprobación final el -0 ya que un usuario nos la puede colar ya que al parsear,
                no se tiene en cuenta el - en el 0 haciendo así que un usuario nos la pueda colar fácilmente y fastidiar todo el programa saltando
                muchos errores.
                */
                if(parseInt(notasSeparadas[i]) >= 0 && parseInt(notasSeparadas[i]) <= 10 && notasSeparadas[i] != ("-0")){
                    notasSeparadasComprobadas[cantidadNotas] = parseInt(notasSeparadas[i]);
                    cantidadNotas++;
                }
            }else{
                break; 
            }
        }
    }
    return notasSeparadasComprobadas;
}

function notaMaxima(notas){
    let notaMaxima = 0;
    for (let i = 0; i < notas.length; i++){ 
        let notaActual = parseInt(notas[i])
        if(notaMaxima < notaActual){
            notaMaxima = notaActual;
        }
    }
    
    return notaMaxima;
}

function notaMedia(notas){
    let totalNotas = 0;

    for(let i = 0;i < notas.length; i++){
        totalNotas = totalNotas + parseInt(notas[i]);
    }

    return totalNotas / notas.length;

}

function cambiaNotas(notas, incremento){
    let notasIncrementadas = [];
    let notasQueSeHanIncrementado = 0;

    for(let i = 0; i < notas.length; i++){
        let notaActual = parseInt(notas[i])
        if(notaActual >= 8){
            notasIncrementadas[notasQueSeHanIncrementado] = parseFloat(notaActual + (notaActual * incremento / 100));
            notasQueSeHanIncrementado++;
        }
    }
    
    return notasIncrementadas;
}

function eliminarRepetidos(notas){
    let notasSinRepetir = [];
    let repetida = false;
    let cantidadNotasSinRepetir = 0;

    for(let i = 0; i < notas.length; i++){
        if(notasSinRepetir != null){
            for(let j = 0; j < notasSinRepetir.length; j++){
                if(notasSinRepetir[j] == notas[i]){
                    repetida = true;
                    break;
                }else{
                    repetida = false;
                }
            }
            if(repetida == false){
                notasSinRepetir[cantidadNotasSinRepetir] = notas[i];
                cantidadNotasSinRepetir++;
            }
        }
    }

    return notasSinRepetir;
}