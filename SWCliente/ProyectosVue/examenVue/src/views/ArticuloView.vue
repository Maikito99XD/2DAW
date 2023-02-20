<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import { useGetData } from '@/composables/useGetData';
import Volver from "../components/Volver.vue";
import Paginacion from '../components/Paginacion.vue';
import NotFoundView from './NotFoundView.vue';
import ArticuloNotFoundView from './ArticuloNotFoundView.vue';
import { useCounterStore } from "@/stores/store";
const useCounter = useCounterStore(); // Asignamos el Store
const { anyadeArticulo } = useCounter; //metodo
const { getData, datos,error,cargando} = useGetData(); //Datos devuel por el composable
const route = useRoute();

//Definimos el numero de pagina inicial
const numPagina = ref(1);

numPagina.value = route.params.id;
//Esta función será para poder pasar de pagina
function pasaPagina(){
    //incrementamos el numero de pagina
    numPagina.value++;
    //le definimos el numero de pagina a la cual vamos a ir
    getData(`https://fakestoreapi.com/products/${numPagina.value}`);
}
//Esta función será para poder volver a la pagina anterior
function retrocedePagina(){
    //decremantos el numero de pagina
    numPagina.value--;
    //le definimos el numero de pagina a la cual vamos a ir
    getData(`https://fakestoreapi.com/products/${numPagina.value}`);
}

getData(`https://fakestoreapi.com/products/${numPagina.value}`);

console.log(datos);


</script>

<template>
    <h1 v-if="cargando">Cargando datos</h1>
    <h1 v-if="!datos">Articulo no encontrado </h1>
    <div v-if="datos"> <!--Si no hay datos no renderizo-->
        <h1>Articulo: {{ datos.title }}</h1>
        <p>Descripción: {{ datos.description }}</p>
        <p>Precio: {{ datos.price }}</p>
        <img :src="datos.image" width="250" height="250" />
        <Paginacion
            @pasaPagina = "pasaPagina"
            @retrocedePagina = "retrocedePagina"
            :numPagina = "numPagina"></Paginacion>
        <button @click="anyadeArticulo(datos)">Comprar</button>
    </div>
    <Volver></Volver>
</template>