<script setup>
//Hacemos los imports
import Volver from "../components/Volver.vue";
import { useCounterStore } from "@/stores/store";
import { storeToRefs } from "pinia";
import { ref } from "vue";
const useCounter = useCounterStore(); // Asignamos el Store
const { carritoCompra } = storeToRefs(useCounter); //referencia,prop comtutada
const { eliminaArticulo } = useCounter; //metodo

</script>

<template>
    <!--Creamos la tabla y recorremos el carrito de la compra-->
    <table border="1">
        <tr v-for="(articulo,i) in carritoCompra" :key="i">
            <td>{{ articulo.title }}</td>
            <td>{{ articulo.price }}€<br/>Total: {{ articulo.price }} €</td>
            <td><img :src="articulo.image" width="50" height="50" /></td>
            <td><button @click="eliminaArticulo()">Eliminar</button></td>
        </tr>
    </table>
    <Volver></Volver>
</template>