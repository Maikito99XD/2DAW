

/* Esta funcio obtindra els valors del nom del producte, quantitat, preu i calculara el total de la linea
a continuacio passara els parametres a la funcio afegirFilaTaula(), recalculara el Total y posara tots els valor a 0
*/
function afegirLinia() {  // 2 punts
 

  afegirFilaTaula();  //crida a la funcio que crea els nodes
  recalcularTotal();  //crida a la funcio que mostra el Total de (Base imposable, IVA, Total Factura).
  netejarLinia();     //crida a la funcio que neteja els valors de Producte, Quantitat y Preu
}

/* En els parametres que ens han passat crearem els nodes i els anyadirem a la fila de la llista de la compra
*/
function afegirFilaTaula() { // 2,5 punts
  
}


/*
En esta funcio calcularem el total de totes les linies, IVA i Total de la Factura i ho mostrarem en l'apartat de color gris.
*/
function recalcularTotal() { //  2,5 punts 
  
}

/* Posarem el producte, la quantitat i el preu a '' o a 0 */
function netejarLinia() {  // 1 punt
  
}


/*Preguntem quina fila anem a esborrar i la eliminarem de la llista de la compra. Finalment Recalcularem la compra
*/
function eliminarFila() {  // 2 punts
   
  
  recalcularTotal();  //Quan esborrem un producte tornem a recalcular els totals
}

