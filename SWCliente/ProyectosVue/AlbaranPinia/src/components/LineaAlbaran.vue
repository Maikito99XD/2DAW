<script setup>
    //Definimos el albaran de pinia
    import { useCounterStore } from "@/stores/albaran";
    //importamos el storeToRefs de la biblioteca de pinia
    import { storeToRefs } from "pinia";
    //Hacemos el useCounterSotre
    const useCounter = useCounterStore();
    //Recogemos la matriz de productos del albaran
    const { matrizProductes } = storeToRefs(useCounter);
    //Recogemos el metodo eliminaDatos del albaran
    const { eliminaDatos } = useCounter;
    
</script>

<template>

<table rules="groups" id="tableHead">
    <!--Hacemos un v-for para recorrer la matriz de productos-->
    <tr v-for="(producto, i) in matrizProductes" :key="i">
        <!--Por cada uno, añadimos el nombre del producto, cantidad, precio y total-->
        <th><b>{{ producto.nombre }}</b></th>
        <th><b>{{ producto.cantidad }}</b></th>
        <th><b>{{ producto.precio }}</b></th>
        <!--El total lo parseamos a float para que no de problemas luego-->
        <th><b>{{ parseFloat(producto.total).toFixed(1) }}</b></th>
        <!--En el boton,le definimos eliminaDatos para ir a la funcion que tiene App.vue para eliminar
        el producto seleccinado y le pasamos la posicion del producto en la matriz-->
        <button @click="eliminaDatos(i)">Eliminar</button>
    </tr>
</table>
</template>
