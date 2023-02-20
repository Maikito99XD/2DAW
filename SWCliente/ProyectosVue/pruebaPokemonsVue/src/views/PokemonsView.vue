<script setup>
    import axios from 'axios';
    import { ref } from 'vue';
    import { RouterLink } from 'vue-router';
    import { useGetData } from '@/composables/useGetData';
    const { getData, datos} = useGetData();

    getData("https://pokeapi.co/api/v2/pokemon");

    console.log(datos);


</script>

<template>
    <div v-if="datos">
        <h1>Pokemons</h1>
        <ul>
            <li v-for="poke in datos.results">
                <RouterLink :to="`/pokemons/${poke.name}`"> {{ poke.name }}</RouterLink>
            </li>
        </ul>
    </div>
</template>