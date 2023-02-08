<script setup>
    const emit = defineEmits(['pasaPagina','retrocedePagina']);
    defineProps(['numPagina']);
</script>

<template>
    <button @click="emit('retrocedePagina')" :disabled="numPagina <= 1">Prev</button>
    <button @click="emit('pasaPagina')" :disabled="numPagina >= 20">Next</button>
</template>