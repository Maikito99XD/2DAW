<script setup>
import axios from 'axios';
import {ref} from 'vue';
import { RouterLink } from "vue-router";
const pokemons=ref([]);
const getData = async () => {
try { //intentamos obtener los resultados del API
//esperamos a recibir los datos
const { data } = await
axios.get("https://pokeapi.co/api/v2/pokemon");
 //asignamos los resultados a nuestro array
pokemons.value = data.results;
}
catch (error) { //si hay algun error lo muestro por consola
console.log(error);
}
};
 getData();

</script>

<template>
    <h1 v-for="pokemon in pokemons">
        <router-link :to="`/pokemons/${ pokemon.name }`">{{ pokemon.name }}</router-link>
    </h1>
</template>