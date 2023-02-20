<script setup>
//importamos el useRouter
import { useRouter } from 'vue-router';

const router = useRouter()
const volver = () => {
    router.push("/"); //Indicamos la ruta
};

</script>

<template>
<button @click="volver">Volver</button>
</template>