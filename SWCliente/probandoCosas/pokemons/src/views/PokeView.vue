<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import VolverPokemons from './VolverPokemons.vue';
import NotFoundView from './NotFoundView.vue';
const route = useRoute();

const poke=ref({});

const pokemons=ref([]);
const getData = async () => {
try { //esperamos a obtener los resultados del API
const { data } = await
axios.get(`https://pokeapi.co/api/v2/pokemon/${route.params.nombre}`);
pokemons.value = data.results; //Asigno los resultados al array
poke.value=data.sprites.front_default;
}
catch (error) { //si hay algun error lo muestro por consola
console.log(error);
}
};
 getData();

</script>

<template>
<h1 v-if="$route.params.nombre != null">Nombre Pokemon: {{ $route.params.nombre }}</h1>
<NotFoundView v-else></NotFoundView>
<img :src="poke" /><br>
<VolverPokemons></VolverPokemons>
</template>