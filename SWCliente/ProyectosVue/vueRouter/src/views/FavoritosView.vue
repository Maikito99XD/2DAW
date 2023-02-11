<script setup>
//Importamos el useCounterStore que es una constante la cual podemos exportar
import { useCounterStore } from "@/stores/store";
//La fragmentamos
const useCounter = useCounterStore();
//Recogeremos de useCounter los pokemonsFavoritos y los pokemon a eliminar
const { pokemonsFavoritos, eliminaPokemon } = useCounter;


</script>

<template>

<ul>
    <li v-for="(poke, i) in pokemonsFavoritos" :key="i"> <!-- los datos nos los pasa
    el composable-->
    <!-- Aquí sacaremos los pokemons que tengamos en el array, sacaremos el nombre, además
    si el usuario da click, mandaremos al usuario a la pagina de dicho pokemon -->
    <router-link :to="`/pokemons/${poke}`">{{ poke }} </router-link> <button @click="eliminaPokemon(i)">Eliminar</button>
    </li>
</ul>
</template>