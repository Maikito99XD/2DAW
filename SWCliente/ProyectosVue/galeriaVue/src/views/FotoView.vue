<script setup>
//Hacemos los imports
import axios from 'axios';
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import { useRouter } from 'vue-router';
//Definimos el router
const router = useRouter();
//Hacemos la constante para el botón que devuelva a la página principal de las fotos
const volver = () => {
    router.push("/galeria"); //Indicamos la ruta
};
//Definimos el route
const route = useRoute();
//Definimos el array de fotos
const foto=ref({});
//Definimos el error como false
const error = ref(false);
//Creamos la constante getData y la hacemos asyncrona
const getData = async () => {
    try { //esperamos a obtener los resultados del API
        //De decimos a data que espere
        const { data } = await
        //Recogemos la informaciónd e la api de las fotos
        axios.get(`https://picsum.photos/id/${route.params.id}/info`);
        //Le damos los datos de las fotos al array de fotos
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