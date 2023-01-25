<script setup>
    const emit = defineEmits(["eliminaDatos"]);
    let productos = defineProps(['matrizProductes']);
    
</script>

<template>

<table rules="groups" id="tableHead">
    <tr v-for="(producto, i) in productos.matrizProductes" :key="i">
        <th><b>{{ producto.nombre }}</b></th>
        <th><b>{{ producto.cantidad }}</b></th>
        <th><b>{{ producto.precio }}</b></th>
        <th><b>{{ producto.total }}</b></th>
        <button @click="emit('eliminaDatos',i)">Eliminar</button>
    </tr>
</table>
</template>
