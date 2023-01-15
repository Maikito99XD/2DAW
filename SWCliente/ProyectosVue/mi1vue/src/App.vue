<script setup>
import { ref, computed} from "vue"; //Importamos de Vue la funcion ref()
const name = "Mundo";
const estiloColor = "color: red";
const arrayColores= ["red","green","gray","black","white"];
let arrayNumeros = ref([]);
const cantNum = 0;
const valor=true;
const arrayFrutas=[
{
 nombre: "pera",
 precio: "1,5€",
 descripcion: "Esto es una pera.",
 stock: 10,
},
{
 nombre: "manzana",
 precio: "2,5€",
 descripcion: "Esto es una manzana.",
 stock: 15,
},
{
 nombre: "kiwi",
 precio: "3,5€",
 descripcion: "Esto es una kiwi.",
 stock: 8,
},
];

let counter = ref(0); //Le indicamos a Vue que counter es una
//variable reactiva. ref() nos devuelve un objeto.
const increment = () => {
counter.value++; //al ser ahora un objeto para acceder al valor
console.log(counter.value); //tenemos que utilizar .value
};

const decrement = () => {
  counter.value--;
};

const reset = () => {
  counter.value = 0;
  arrayNumeros.value=[];
};

const add = () => {
  arrayNumeros.value.push(counter.value);
  
};

const blockBoton = computed(() => {
  let encontrado = arrayNumeros.value.find((num) => num == counter.value);
  if(encontrado){
    return true;
  }else{
    return false;
  }
});

</script>
<template>
<h1>Hola {{ name.toUpperCase() }}.</h1>
<h2 :style="estiloColor">Esto es ROJO.</h2>
<h2>{{ arrayColores }}</h2>
<h2 :style="`color: ${arrayColores[1]}`">VERDE</h2>
<h2 v-show="valor==false">Valor es TRUE v-show</h2>
<h2>
  {{ valor ? 'SI' : 'NO' }}
</h2>

<ul>
<li v-for="(color,posi) in arrayColores" :key="posi">
{{posi}}--{{ color }}
</li>
</ul>

<ul>
  <li v-for="fruta in arrayFrutas">
    {{ fruta.nombre }}--{{ fruta.precio }}--{{ fruta.descripcion }}--{{ fruta.stock }}
  </li>
</ul><br/>

<h2 v-if="counter == 0" :style="'color:grey'">{{ counter }}</h2>
<h2 v-else-if="counter < 0" :style="'color:red'">{{ counter }}</h2>
<h2 v-else-if="counter > 0" :style="'color:blue'">{{ counter }}</h2><br/>
<button @click="increment">Incremetar</button>
<button @click="decrement">Decrementar</button>
<button @click="reset">Resetear</button>
<button @click="add" :disabled="blockBoton">Añadir</button>
<ul>
  <li v-for="(item, index) in arrayNumeros" :key="index">
    {{ item }}
  </li>
</ul>

</template>
<style>
h1 {
color: blue;
}

mayorCero{
  color: blue;
}

menorCero{
  color: red;
}

igualCero{
  color: grey;
}
</style>
