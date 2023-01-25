<script setup>
    import { ref, computed} from "vue";
    const emit = defineEmits(["recogeDatos"]);
    let producte = ref();
    let quantitat = ref();
    let preu = ref();

    const blockBoton = computed(() => {
        if(producte.value != null && quantitat.value != null && preu.value != null){
            if(producte.value == "" || quantitat.value == "" || preu.value == ""){
                return true;
                
            }else{
                return false;
            }
                
        }else{
            return true;
        }
    });

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
                    <input type="text" id="producte" placeholder="Producte" v-model="producte"/>
                </th>
                <th>
                    <input type="number" id="quantitat" placeholder="Quantitat" v-model="quantitat" />
                </th>
                <th>
                    <input type="number" id="preu" placeholder="Preu" v-model="preu"/>
                </th>
                <th>
                    <button :disabled="blockBoton" @click="emit('recogeDatos',producte,quantitat,preu);reset();">Añadir</button>
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