let idTimeout=setTimeout(function(){
    alert('Timeout que se ejecuta al cabo de 1 segundo');
}, 1000);

let i=1;
let idInterval=setInterval(function() {
alert('Interval cada 3 seg. Ejecución nº: '+ i++);
 if (i==5) {
 clearInterval(idInterval);
 alert('Fin de la ejecución del Interval');
}
}, 3000);
