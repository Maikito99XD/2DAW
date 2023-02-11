<script setup>
    //Importamos el ref y el computed de vue
    import { ref, computed} from "vue";
    //Definimos el albaran de pinia
    import { useCounterStore } from "@/stores/albaran";
    //Hacemos el useCounterSotre
    const useCounter = useCounterStore();
    //Recogemos el metodo recogeDatos del albaran
    const { recogeDatos } = useCounter;
    //Definimos las variables producte, quantitat y preu que serán las encargadas
    //de recoger lo que el usuario introduzca en las casillas de input
    let producte = ref();
    let quantitat = ref();
    let preu = ref();
    //blockBoton comprobará en todo momento que el boton esté bloqueado o activo
    const blockBoton = computed(() => {
        //En caso de que tanto la variable producte, quantitat y no preu estén vacias
        if(producte.value != null && quantitat.value != null && preu.value != null){
            //En caso de que estén reseteadas y no tengan valor solo ""
            if(producte.value == "" || quantitat.value == "" || preu.value == ""){
                //bloquearmos el boton
                return true;
            //En caso de que no estén reseteadas
            }else{
                //Desbloquearemos el boton
                return false;
            }
        //En caso de que estén vacias
        }else{
            //Bloquearemos el boton
            return true;
        }
    });
    //La funcion reset resteará todos los valores de producte,quantitat y preu
    function reset(){
        producte.value = "";
        quantitat.value = "";
        preu.value = "";
    }

</script>

<template>
<div>
    <h1>Albaran de Compra</h1>
    <table>
        <thead>
            <tr>
                <th id="texto">
                    <label for="producte">Producte</label>
                </th>
                <th id="texto">
                    <label for="quantitat">Quantitat</label>
                </th>
                <th id="texto">
                    <label for="preu-unitari">Preu</label>
                </th>
            </tr>
            <tr>
                <th>
                    <!--Definimos un v-model para que nos recoga lo que el usuario escriba
                    dentro del input, tanto para el producte, quantitat como el preu-->
                    <input type="text" id="producte" placeholder="Producte" v-model="producte"/>
                </th>
                <th>
                    <input type="number" id="quantitat" placeholder="Quantitat" v-model="quantitat" />
                </th>
                <th>
                    <input type="number" id="preu" placeholder="Preu" v-model="preu"/>
                </th>
                <th>
                    <!--Cuando se le de al boton, iremos a la constante blockBoton, en caso de que 
                    el boton este activo y se enviaran los datos, donde le definiremos la funcion
                    junto con los argumentos que necesita, llamaremos a la función reset para que nos limpie
                    todos los valores de los input-->
                    <button :disabled="blockBoton" @click="recogeDatos(producte,quantitat,preu);reset();">Añadir</button>
                </th>
            </tr>
        </thead>
    </table>
</div>
</template>

<style>
#texto{
    background-color: #90b6eb;
    text-align: left;
}
h1{
    color:blue;
}
</style>