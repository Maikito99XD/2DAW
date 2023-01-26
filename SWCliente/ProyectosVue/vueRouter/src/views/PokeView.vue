<script setup>
const getData = async () => {
try { //esperamos a obtener los resultados del API
const { data } = await
axios.get("https://pokeapi.co/api/v2/pokemon/pikachu");
console.log(data);
}
catch (error) { //si hay algun error lo muestro por consola
console.log(error);
}
};
 getData();

</script>

<template>
<h1>Nombre Pokemon: {{ $route.params.nombre }}</h1>
<h1>{{ $route.params.sprites }}</h1>
</template>