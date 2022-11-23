//Los productos que tendremos como el nombre, precio...
let productos = [];
//Los precios de cada producto
let precios = [];
//El producto que nos indique el usuario
let productoUsuario;
//La cantidad del producto que nos indique el usuario
let cantidadProducto;
//El precio del producto
let precioProducto;
//La cantidad de iva que tendremos
let cantidadIva = 21;
//El total del iva 
let IVA;
//La base imposable que tendremos
let baseImposable;
//El total de la factura
let totalFactura;
//El coste total de los productos multiplicado por la cantidad de los mismos
let totalFila;
//La cantidad de precios que tenemos dentro del array
let cantidadPrecios = 0;
//Los elementos de la tabla que tenemos
let elementosTabla = [];
//El total de facturas que habrá
let totalFacturaFinal = [];
//La cantidad de facturas que hay actualmente
let cantidadFacturas = 0;

/* Esta funcio obtindra els valors del nom del producte, quantitat, preu i calculara el total de la linea
a continuacio passara els parametres a la funcio afegirFilaTaula(), recalculara el Total y posara tots els valor a 0
*/
function afegirLinia() {  // 2 punts
  //Se recogen los valores del producto, cantidad, precio y el total 
  productoUsuario = document.getElementById("producte").value;
  cantidadProducto = document.getElementById("quantitat").value;
  precioProducto = document.getElementById("preu").value;
  totalFila = Number.parseFloat(cantidadProducto * precioProducto).toFixed(2);
  //Se añade los precios al array
  precios[cantidadPrecios] = totalFila;
  //Sumaremos que tenemos un precio nuevo
  cantidadPrecios++;


  afegirFilaTaula();  //crida a la funcio que crea els nodes
  recalcularTotal();  //crida a la funcio que mostra el Total de (Base imposable, IVA, Total Factura).
  netejarLinia();     //crida a la funcio que neteja els valors de Producte, Quantitat y Preu
}

/* En els parametres que ens han passat crearem els nodes i els anyadirem a la fila de la llista de la compra
*/
function afegirFilaTaula() { // 2,5 punts
  //Se crean los elementos tr y th
    let tr = document.createElement("tr");
    let thProducto = document.createElement("th");
    let thCantidad = document.createElement("th");
    let thPrecio = document.createElement("th");
    let thTotal = document.createElement("th");
    //Se añaden al hijo
    tr.appendChild(thProducto);
    tr.appendChild(thCantidad);
    tr.appendChild(thPrecio);
    tr.appendChild(thTotal);
    //Se les indica el texto que tiene que tener cada uno
    thProducto.innerHTML = productoUsuario;
    thCantidad.innerHTML = cantidadProducto;
    thPrecio.innerHTML = precioProducto;
    thTotal.innerHTML = totalFila;
    //Se añaden los elementos que tiene la tabla como el producto, cantidad...
    elementosTabla[0] = thProducto;
    elementosTabla[1] = thCantidad;
    elementosTabla[2] = thPrecio;
    elementosTabla[3] = thTotal;
    //Se recoge el thead que será para saber donde lo tiene que poner después
    var parentThead = document.getElementById("theadParent").parentNode;
    var tfoot = document.getElementById("childElement");
    //Le indicaremos donde lo tiene que poner
    parentThead.insertBefore(tr,tfoot);
  /*

  Esto es algo que he intentado 
  
    let tr = document.createElement("tr");
    let thProducto = document.createElement("th");
    let thCantidad = document.createElement("th");
    let thPrecio = document.createElement("th");
    let thTotal = document.createElement("th");

    elementosTabla[0] = thProducto;
    elementosTabla[1] = thCantidad;
    elementosTabla[2] = thPrecio;
    elementosTabla[3] = thTotal;

    let elementosVisuales = [productoUsuario,cantidadProducto,precioProducto,totalFila];
    let cantidadProductos = 0;
    productos[cantidadProductos] = tr;
    cantidadProductos++;

    //Agregaremos los productos al array de productos
    for(let i = 0;i<productos.length;i++){
      for(let j = 0;j<productos[i].length;j++){
        //Añadiremos los elementos de la tabla
        productos[i][j] = elementosTabla[j];
        productos[i].appendChild(productos[i][j]);
        productos[i][j].innerHTML = elementosVisuales[j];
      }
    }
    var parentThead = document.getElementById("theadParent").parentNode;
    var tfoot = document.getElementById("childElement");
    parentThead.insertBefore(tr,tfoot);
    */

}


/*
En esta funcio calcularem el total de totes les linies, IVA i Total de la Factura i ho mostrarem en l'apartat de color gris.
*/
function recalcularTotal() { //  2,5 punts 
  //La base total será el calculo total
  let baseImposableTotal = 0;
  //El ivaTotal será el calculo total del iva
  let ivaTotal;
  //Recorreremos el array de precios para calcular cuanto tendremos de base imposable
  for(let i = 0;i<precios.length;i++){
    baseImposableTotal = Number.parseFloat(baseImposableTotal) + Number.parseFloat(precios[i]);
  }
  //Le indicaremos que queremos hasta 2 decimales
  baseImposableTotal = Number.parseFloat(baseImposableTotal).toFixed(2);
  //Recogeremso los elementos
  baseImposable = document.getElementById("base-imposable");
  IVA = document.getElementById("iva");
  totalFactura = document.getElementById("total");
  //Mostraremos el calculo al usuario
  baseImposable.innerHTML = baseImposableTotal;
  //Hacemos el calculo y lo almacenamos en ivaTotal
  ivaTotal = Number.parseFloat((baseImposableTotal * 21)/100).toFixed(2);
  IVA.innerHTML = ivaTotal;
  //Calculamos el total de la factura
  let totalFacturaCalculo = Number.parseFloat(baseImposableTotal) + Number.parseFloat(ivaTotal);
  //Lo añadiremos al array de total facturas
  totalFacturaFinal[cantidadFacturas] = Number.parseFloat(totalFacturaCalculo).toFixed(2);
  //Le indicaremos que hay 1 factura nueva
  cantidadFacturas++;
  //FacturaTotal es para saber el total de la factura
  let facturaTotal = 0;
  //Recorreremos el array para calcular la facturaTotal
  for(let j = 0;j<totalFacturaFinal.length;j++){
    facturaTotal = Number.parseFloat(facturaTotal) + Number.parseFloat(totalFacturaFinal[j]);
  }
  //Se lo mostraremos al usuario
  totalFactura.innerHTML = Number.parseFloat(facturaTotal).toFixed(2);
}

/* Posarem el producte, la quantitat i el preu a '' o a 0 */
function netejarLinia() {  // 1 punt
  //Recogeremos el id de cada uno
  productoUsuario = document.getElementById("producte");
  cantidadProducto = document.getElementById("quantitat");
  precioProducto = document.getElementById("preu");
  //Y le indicaremos el valor que queremos a la hora de que limpie la linea
  productoUsuario.value = "";
  cantidadProducto.value = 0;
  precioProducto.value = 0;
}


/*Preguntem quina fila anem a esborrar i la eliminarem de la llista de la compra. Finalment Recalcularem la compra
*/
function eliminarFila() {  // 2 punts
  
  let filaAEliminar = prompt("Que linea deseas borrar?");

  for(let i = 0;i<productos.length;i++){
    if(i == (filaAEliminar-1)){
      productos[i].remove();
      for(let j = 0;j<productos[i].length;j++){
        productos[i][j].remove();
      }
    }
  }
  
  recalcularTotal();  //Quan esborrem un producte tornem a recalcular els totals
}

