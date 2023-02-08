<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import VolverPokemons from '../components/VolverPokemons.vue';
//import NotFoundView from './NotFoundView.vue';
import NoPokeView from './NoPokeView.vue';
import { useCounterStore } from "@/stores/store";
const useCounter = useCounterStore();
const { anyadePokemons, compruebaLista } = useCounter;
const route = useRoute();

const poke=ref({});
const error = ref(false);

const pokemons=ref([]);
const getData = async () => {
    try { //esperamos a obtener los resultados del API
        const { data } = await
        axios.get(`https://pokeapi.co/api/v2/pokemon/${route.params.nombre}`);
        pokemons.value = data.results; //Asigno los resultados al array
        poke.value=data.sprites.front_default;
    }catch (e) { //si hay algun error lo muestro por consola
        console.log(e);
        error.value = true;
    }
};

getData();



</script>

<template>
<h1 v-if="!error">Nombre Pokemon: {{ $route.params.nombre }}</h1>
<NoPokeView v-else></NoPokeView>
<img :src="poke" /><br>
<VolverPokemons></VolverPokemons>
<button @click="anyadePokemons($route.params.nombre)" :disabled="compruebaLista($route.params.nombre)">Favorito</button>
</template>