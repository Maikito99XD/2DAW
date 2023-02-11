<script setup>
import {ref} from 'vue';
import { RouterLink } from "vue-router";
import { useGetData } from '@/composables/useGetData'
import { useCounterStore } from "@/stores/store";
const useCounter = useCounterStore();
const {compruebaLocalStorage } = useCounter;
const { getData, datos} = useGetData(); //Datos devuel por el composable
//const pokemons=ref([]);
// const getData = async () => {
// try { //intentamos obtener los resultados del API
// //esperamos a recibir los datos
// const { data } = await
// axios.get("https://pokeapi.co/api/v2/pokemon");
//  //asignamos los resultados a nuestro array
// pokemons.value = data.results;
// }
// catch (error) { //si hay algun error lo muestro por consola
// console.log(error);
// }
// };
 getData("https://pokeapi.co/api/v2/pokemon");
 console.log(datos);


</script>

<template>
<h1>Pokemons</h1>
<div v-if="datos"> <!--Si no hay datos no renderizo-->
    <ul>
        <li v-for="poke in datos.results"> <!-- los datos nos los pasa
        el composable-->
            <router-link :to="`/pokemons/${poke.name}`">
                {{ poke.name }}
            </router-link>
        </li>
    </ul>
</div>

</template>