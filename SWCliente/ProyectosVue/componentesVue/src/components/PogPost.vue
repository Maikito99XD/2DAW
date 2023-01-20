<script setup>
    const emit = defineEmits(["prev", "next"]);
    //Es una funcion para recoger los elementos como si fueran una función
    defineProps(['inicio','fin','tampost']);
</script>
<template>
    <button @click="emit('prev')" type="button" :disabled="inicio <= 0" >Prev</button>
    <button @click="emit('next')" type="button" :disabled="fin >= tampost">Next</button>
</template>