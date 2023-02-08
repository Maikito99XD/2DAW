<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import { useRouter } from 'vue-router';

const router = useRouter()
const volver = () => {
    router.push("/galeria"); //Indicamos la ruta
};
const route = useRoute();

const foto=ref({});
const error = ref(false);

const getData = async () => {
    try { //esperamos a obtener los resultados del API
        const { data } = await
        axios.get(`https://picsum.photos/id/${route.params.id}/info`);
        foto.value=data;
    }catch (e) { //si hay algun error lo muestro por consola
        console.log(e);
        error.value = true;
    }
};

getData();
</script>

<template>
    <h1>IMAGENES.</h1>
    <h1> Foto nº{{ $route.params.id }}---Autor: {{ foto.author }}</h1><br/>
    <img :src="foto.download_url" width="300" height="200" /><br/><br/><br/><br/>
    <button @click="volver">Volver</button>

</template>