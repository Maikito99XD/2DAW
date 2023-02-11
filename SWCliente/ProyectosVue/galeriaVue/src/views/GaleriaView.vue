<script setup>
//Hacemos los imports
import { RouterLink } from "vue-router";
import { useGetData } from '@/composables/useGetData'
import { ref } from "vue";
import PagGaleria from "../components/PagGaleria.vue";
//Cogemos lo que pasamos de useGetData
const { getData, datos, error, cargando} = useGetData(); //Datos devuel por el composable
//Definimos el numero de pagina inicial
const numPagina = ref(1);
//Esta función será para poder pasar de pagina
function pasaPagina(){
    //incrementamos el numero de pagina
    numPagina.value++;
    //le definimos el numero de pagina a la cual vamos a ir
    getData(`https://picsum.photos/v2/list?page=${numPagina.value}`);
}
//Esta función será para poder volver a la pagina anterior
function retrocedePagina(){
    //decremantos el numero de pagina
    numPagina.value--;
    //le definimos el numero de pagina a la cual vamos a ir
    getData(`https://picsum.photos/v2/list?page=${numPagina.value}`);
}
//le definimos el numero de pagina a la cual vamos a ir
getData(`https://picsum.photos/v2/list?page=${numPagina.value}`);
</script>

<template>
    <h2 v-if="cargando">Cargando Datos.</h2>
    <h2 v-if="error">Error Cargando Datos.</h2>
    <div v-else-if="datos">
        <h1>Galeria de Fotos</h1>
        <PagGaleria 
            @pasaPagina = "pasaPagina"
            @retrocedePagina = "retrocedePagina"
            :numPagina = "numPagina" />
        <ul v-for="foto in datos">
            <li><router-link :to="`/galeria/${foto.id}`">{{ foto.id }} --- {{ foto.author }} <img :src="foto.download_url" width="30" height="20" /></router-link></li>
        </ul>
    </div>
</template>