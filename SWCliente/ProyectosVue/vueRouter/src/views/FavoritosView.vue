<script setup>
import { useCounterStore } from "@/stores/store";
const useCounter = useCounterStore();
const { pokemonsFavoritos, eliminaPokemon } = useCounter;


</script>

<template>

<ul>
    <li v-for="(poke, i) in pokemonsFavoritos" :key="i"> <!-- los datos nos los pasa
    el composable-->
    <router-link :to="`/pokemons/${poke}`">{{ poke }} </router-link> <button @click="eliminaPokemon(i)">Eliminar</button>
    </li>
</ul>
</template>