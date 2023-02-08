<script setup>
import { useRouter } from 'vue-router';

const router = useRouter()
const volver = () => {
    router.push("/pokemons"); //Indicamos la ruta
};

</script>

<template>
<button @click="volver">Volver</button>
</template>