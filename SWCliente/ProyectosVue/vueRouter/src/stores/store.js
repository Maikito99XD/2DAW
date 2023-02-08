import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
export const useCounterStore = defineStore('counter', () => {
const pokemonsFavoritos = ref([]); // Elementos reactivos


if(JSON.parse(localStorage.getItem("pokemonsFavoritos")) != null){
    pokemonsFavoritos.value = JSON.parse(localStorage.getItem("pokemonsFavoritos"));
}


function anyadePokemons(pokemon){
    pokemonsFavoritos.value.push(pokemon);
    localStorage.setItem("pokemonsFavoritos", pokemonsFavoritos.value);
}

function eliminaPokemon(posi){
    pokemonsFavoritos.value.splice(posi,1);
    localStorage.setItem("pokemonsFavoritos", pokemonsFavoritos.value);
}

function compruebaLista(poke){
    if(pokemonsFavoritos.value.includes(poke)){
        return true;
    }else{
        return false;
    }
}

 // return devuelvo lo que queremos compartir
return { pokemonsFavoritos, anyadePokemons, eliminaPokemon, compruebaLista }
})