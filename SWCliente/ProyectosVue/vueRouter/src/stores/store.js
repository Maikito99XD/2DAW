//Importo las librerias de ref y pinia
import { ref } from 'vue'
import { defineStore } from 'pinia'
export const useCounterStore = defineStore('counter', () => {
const pokemonsFavoritos = ref([]); // Elementos reactivos
//Recogeremos el array de pokemons y en caso de que el array este vacio, nos los creará 
if(localStorage.getItem("pokemonsFavoritos")){
    pokemonsFavoritos.value = JSON.parse(localStorage.getItem("pokemonsFavoritos"));
}

//Metodo para añadir pokemons a la lista de favoritos
function anyadePokemons(pokemon){
    //Se añade a la lista de favoritos el pokemons seleccionado
    pokemonsFavoritos.value.push(pokemon);
    //guardamos el array O lo actualizamos en el localStorage y lo "stringificamos"
    localStorage.setItem("pokemonsFavoritos", JSON.stringify(pokemonsFavoritos.value));
}
//Metodo para eliminar un pokemon de la lista de favoritos
function eliminaPokemon(posi){
    //Le ponemos la posicion del pokemon y lo eliminamos con el splice
    pokemonsFavoritos.value.splice(posi,1);
    //lo actualizamos en el localStorage y lo "stringificamos"
    localStorage.setItem("pokemonsFavoritos", JSON.stringify(pokemonsFavoritos.value));
}
//Metodo para comprobar que un pokemon está o no dentro de la lista de favoritos
function compruebaLista(poke){
    //Includes nos devuelve true o false si el pokemon está incluido dentro de la lista
    if(pokemonsFavoritos.value.includes(poke)){
        //En caso de que esté devolveremos true
        return true;
    }else{
        //En caso contrario devolveremos false
        return false;
    }
}


 // return devuelvo lo que queremos compartir
return { pokemonsFavoritos, anyadePokemons, eliminaPokemon, compruebaLista }
})