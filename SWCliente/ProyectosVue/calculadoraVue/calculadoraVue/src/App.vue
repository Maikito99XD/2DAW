<script setup>
//importamos ref de vue para que sean reactivas y así verlo en tiempo real
import { ref } from 'vue';
//El valorA representará el primer operando
const valorA = ref('');
//El valorB representará el segundo operando
const valorB = ref('');
//La operación represntará el operador que se usará
const operacion = ref('');
//Operando es una variable para saber cuando se está introduciendo el primer o segundo operando
let operando = 0;
//El resultado representará el resultado final de la operación que se ha realizado
const resultado = ref('');

//La función operando añadirá los numeros introducido por el usuario de cada operando
function operandos(num){
  //En caso de que la variable operando sea 0 significa que se está introduciendo el primer operando
  if(operando==0) valorA.value+=num;
  //En caso contrario se estará introduciendo el segundo operando
  else valorB.value+=num;
}
//La constante cambiaOperando será para saber con que operador se va a realizar la operación
const cambiaOperando = (operadorUsuario) => {
  //En caso de que el operando sea 0 se le sumará 1 para que pase a introducir el siguiente operando
  if(operando == 0)operando++;
  //En caso contrario se le restará
  else operando--;
  //Se le pondrá el valor del operando proporcionado por el usuario a la variable operacion
  operacion.value =operadorUsuario;
}
//La función reset será para resetear los valores a 0
function reset(){
  //Se resetean todos los valores con .value
  valorA.value = '';
  valorB.value = '';
  operacion.value = '';
  operando = 0;
  resultado.value = '';
}
//La funcion total es para calcular el total de la operación
function total(){
  //Se comprueba la operación a realizar
  switch(operacion.value){
    //En caso de que sea suma
    case '+':
      //Se sumará, se parseará a float y se pondrá en la variable resultado
      resultado.value = parseFloat(valorA.value + valorB.value);
      break;
    //En caso de que sea una resta
    case '-':
      //Se le restará el valor, se parseará a float y se pondrá en la variable resultado
      resultado.value = parseFloat(valorA.value - valorB.value);
      break;
    //En caso de que sea una multiplicación
    case '*':
      //Se le multiplicará el valor, se parseará a float y se pondrá en la variable resultado
      resultado.value = parseFloat(valorA.value * valorB.value);
      break;
    //En caso de que sea una división
    case '/':
      //Se le dividirá el valor, se parseará a float y se pondrá en la variable resultado
      resultado.value = parseFloat(valorA.value / valorB.value);
      break;
  }
}

</script>

<template>
 <table class="calculadora">
<tr>
  <td colspan="4">
    <span id="valor">Operacion: {{ valorA }} {{ operacion }} {{ valorB }} </span>
    <span id="resultado">{{ resultado }}</span>
  </td>
</tr>
<tr>
  <td><button @click="operandos(7)">7</button></td>
  <td><button @click="operandos(8)">8</button></td>
  <td><button @click="operandos(9)">9</button></td>
  <td><button @click="cambiaOperando('/')">/</button></td>
</tr>
<tr>
  <td><button @click="operandos(4)">4</button></td>
  <td><button @click="operandos(5)">5</button></td>
  <td><button @click="operandos(6)">6</button></td>
  <td><button @click="cambiaOperando('*')">*</button></td>
</tr>
<tr>
  <td><button @click="operandos(1)">1</button></td>
  <td><button @click="operandos(2)">2</button></td>
  <td><button @click="operandos(3)">3</button></td>
  <td><button @click="cambiaOperando('-')">-</button></td>
</tr>
<tr>
  <td><button @click="total">=</button></td>
  <td><button @click="reset">C</button></td>
  <td><button @click="operandos(0)">0</button></td>
  <td><button @click="cambiaOperando('+')">+</button></td>
</tr>

</table>
</template>

<style scoped>
.calculadora{
  display:block;
  margin:0 auto;
  padding:20px;
  background-color:red;
  width:345px;
  height:500px;
  border-radius: 25px;
}
.calculadora td button{
  display:block;
  width:70px;
  height: 70px;
  font-size: 25px;
}
#creditos{
  display:block;
  padding-top:20px;
  color:#fff;
  text-align: center;
  width:300px;
}
#resultado{
  display:block;
  text-align: center;
  font-size: 40px;
  margin-bottom: 40px;
  width:300px;
  color: black;
  height: 100px;
  line-height: 100px;
  background-color:#fff;
  border-radius: 25px;
}
#valor{
  display:block;
  text-align: right;
  font-size: 15px;
  margin-bottom: 5px;
  color: black;
  width:300px;
  height: 20px;
  line-height: 20px;
  background-color:#fff;
  border-radius: 25px;
}
</style>