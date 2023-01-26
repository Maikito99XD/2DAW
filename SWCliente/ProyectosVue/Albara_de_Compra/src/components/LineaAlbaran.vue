<script setup>
    //Le enviamos a App.vue eliminaDatos
    const emit = defineEmits(["eliminaDatos"]);
    //Recogemos la matriz de productos que nos da App.vue
    let productos = defineProps(['matrizProductes']);
    
</script>

<template>

<table rules="groups" id="tableHead">
    <!--Hacemos un v-for para recorrer la matriz de productos-->
    <tr v-for="(producto, i) in productos.matrizProductes" :key="i">
        <!--Por cada uno, añadimos el nombre del producto, cantidad, precio y total-->
        <th><b>{{ producto.nombre }}</b></th>
        <th><b>{{ producto.cantidad }}</b></th>
        <th><b>{{ producto.precio }}</b></th>
        <!--El total lo parseamos a float para que no de problemas luego-->
        <th><b>{{ parseFloat(producto.total).toFixed(1) }}</b></th>
        <!--En el boton,le definimos eliminaDatos para ir a la funcion que tiene App.vue para eliminar
        el producto seleccinado y le pasamos la posicion del producto en la matriz-->
        <button @click="emit('eliminaDatos',i)">Eliminar</button>
    </tr>
</table>
</template>
