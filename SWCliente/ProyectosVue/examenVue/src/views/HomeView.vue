<script setup>
import { useGetData } from '@/composables/useGetData';
import { RouterLink } from "vue-router";
import NotFoundView from './NotFoundView.vue';
//Recogemos todo del useGetData
const { getData, datos,error,cargando} = useGetData();
//Indicamos la url
getData("https://fakestoreapi.com/products");

console.log(datos);

</script>

<template>
  <main>
    <h1 v-if="cargando">Cargando datos</h1>
    <h1 v-if="error">Error al cargar los datos</h1>
    <div v-if="datos"> <!--Compruebo que se cargen los datos-->
      <ul>
        <li v-for="producto in datos">
          Articulo: {{ producto.id }} <br/> <router-link :to="`/articulo/${producto.id}`"><img :src="producto.image" width="200" height="200" /></router-link>
        </li>
      </ul>
    </div>
  </main>
</template>
