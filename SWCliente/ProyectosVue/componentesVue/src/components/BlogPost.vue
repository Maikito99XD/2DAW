<script setup> //BlogPost.vue
defineProps(['id','titulo','contenido']); //definimos un array con los parámetros que vamos a recibir
</script>
<template>
<h2>{{id}} -- {{ titulo }}</h2>
<h3>{{ contenido }}</h3>
<button @click="$emit('fijarFavoritoNombre', titulo)">Favorito</button>
</template>