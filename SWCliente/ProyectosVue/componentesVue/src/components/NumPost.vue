<script setup>
    const emit = defineEmits(['cambiotam']);
    let postxpag;
</script>

<template>
<select v-model="postxpag" @change='emit("cambiotam", postxpag)'>
    <option>10</option>
    <option>15</option>
    <option>20</option>
  </select>
</template>
<!--
<button 
    v-if="props.producto"
    @click="emit('eliminarLinea',posicion)">Eliminar</button>-->