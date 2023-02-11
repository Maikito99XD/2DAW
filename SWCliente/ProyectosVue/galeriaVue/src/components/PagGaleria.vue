<script setup>
    //Le definimos los emits que vamos a necesitar
    const emit = defineEmits(['pasaPagina','retrocedePagina']);
    //recogeremos el numero de pagina
    defineProps(['numPagina']);
</script>

<template>
    <button @click="emit('retrocedePagina')" :disabled="numPagina <= 1">Prev</button>
    <button @click="emit('pasaPagina')" :disabled="numPagina >= 20">Next</button>
</template>