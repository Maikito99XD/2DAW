<script setup>
    import axios from 'axios';
    import { ref } from 'vue';
    import { RouterLink } from 'vue-router';
    import { useRoute } from 'vue-router';
    import { useGetData } from '@/composables/useGetData';
    const { getData, datos} = useGetData();
    const route = useRoute();

    getData(`https://pokeapi.co/api/v2/pokemon/${route.params.nombre}`);

    console.log(datos);


</script>

<template>
    <div v-if="datos">
        <h1>Nombre Pokemon: {{ datos.name }}</h1>
        <img :src="datos.sprites.front_default" /><br>

    </div>
</template>