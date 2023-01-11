<script setup>
const name = "Mundo";
const estiloColor = "color: red";
const arrayColores= ["red","green","gray","black","white"];
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
</ul>

</template>
<style>
h1 {
color: blue;
}
</style>
