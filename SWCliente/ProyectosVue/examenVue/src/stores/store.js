import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useCounterStore = defineStore('counter', () => {
  
    //Array para guardar todos los articulos
    const carritoCompra = ref([]);
  
    //Metodo para añadir articulo a la lista de favoritos
    function anyadeArticulo(articulo){
        //Se añade a la lista de favoritos el articulo seleccionado
        carritoCompra.value.push(articulo);
    }
    //Metodo para eliminar un articulo de la lista de favoritos
    function eliminaArticulo(posi){
        //Le ponemos la posicion del articulo y lo eliminamos con el splice
        carritoCompra.value.splice(posi,1);
    }
    //Metodo para comprobar que un articulo está o no dentro de la lista de favoritos
    function compruebaLista(arti){
        //Includes nos devuelve true o false si el articulo está incluido dentro de la lista
        if(carritoCompra.value.includes(arti)){
            //En caso de que esté devolveremos true
            return true;
        }else{
            //En caso contrario devolveremos false
            return false;
        }
    }


    // return devuelvo lo que queremos compartir
    return { carritoCompra, anyadeArticulo, eliminaArticulo, compruebaLista }
})