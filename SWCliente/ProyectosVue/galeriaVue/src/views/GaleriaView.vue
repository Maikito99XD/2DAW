<script setup>
import { RouterLink } from "vue-router";
import { useGetData } from '@/composables/useGetData'
import { ref } from "vue";
import PagGaleria from "../components/PagGaleria.vue";
const { getData, datos} = useGetData(); //Datos devuel por el composable
const numPagina = ref(1);

function pasaPagina(){
    numPagina.value++;
    getData(`https://picsum.photos/v2/list?page=${numPagina.value}`);
}

function retrocedePagina(){
    numPagina.value--;
    getData(`https://picsum.photos/v2/list?page=${numPagina.value}`);
}

getData(`https://picsum.photos/v2/list?page=${numPagina.value}`);
</script>

<template>
    <h1>Galeria de Fotos</h1>
    <PagGaleria 
        @pasaPagina = "pasaPagina"
        @retrocedePagina = "retrocedePagina"
        :numPagina = "numPagina" />
    <ul v-for="pokemon in datos">
        <li><router-link :to="`/galeria/${pokemon.id}`">{{ pokemon.id }} --- {{ pokemon.author }} <img :src="pokemon.download_url" width="30" height="20" /></router-link></li>
    </ul>
</template>