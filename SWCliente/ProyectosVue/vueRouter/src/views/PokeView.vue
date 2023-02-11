<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import VolverPokemons from '../components/VolverPokemons.vue';
//import NotFoundView from './NotFoundView.vue';
import NoPokeView from './NoPokeView.vue';
import { useCounterStore } from "@/stores/store";
import { useGetData } from '@/composables/useGetData'
const { getData, datos} = useGetData(); //Datos devuel por el composable
const useCounter = useCounterStore();
const { anyadePokemons, compruebaLista } = useCounter;
const route = useRoute();


//const poke=ref({});
const error = ref(false);

// const pokemons=ref([]);
// const getData = async () => {
//     try { //esperamos a obtener los resultados del API
//         const { data } = await
//         axios.get(`https://pokeapi.co/api/v2/pokemon/${route.params.nombre}`);
//         pokemons.value = data.results; //Asigno los resultados al array
//         poke.value=data.sprites.front_default;
//     }catch (e) { //si hay algun error lo muestro por consola
//         console.log(e);
//         error.value = true;
//     }
// };
//Con el getData le doy una dirección para que coja el nombre del pokemon
getData(`https://pokeapi.co/api/v2/pokemon/${route.params.nombre}`);



</script>

<template>
    <div v-if="datos"> <!--Si no hay datos no renderizo-->
        <h1 v-if="!error">Nombre Pokemon: {{ datos.name }}</h1> <!--En caso de que no haya un error muestro el pokemon-->
        <NoPokeView v-else></NoPokeView> <!--En caso de que haya un error le digo que el pokemon no existe-->
        <img :src="datos.sprites.front_default" /><br> <!--Muestro la imagen-->
        <VolverPokemons></VolverPokemons><!--Le doy el boton para volver a la lista de pokemons-->
        <!--El boton de favoritos añadiremos el nombre del pokemon al array de favoritos y en caso de que
        dicho pokemon esté en el array el botón de favorito estará desactivado-->
        <button @click="anyadePokemons(datos.name);" :disabled="compruebaLista(datos.name)">Favorito</button>
    </div>
</template>