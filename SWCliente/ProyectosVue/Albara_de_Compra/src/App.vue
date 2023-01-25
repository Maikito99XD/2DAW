<script setup>
import { ref } from 'vue';
import EntradaDatos from './components/EntradaDatos.vue';
import TablaHead from './components/TablaHead.vue';
import LineaAlbaran from './components/LineaAlbaran.vue';
import TablaFoot from './components/TablaFoot.vue';


let matrizProductes = ref([]);


function datosRecividos(producteUsuario,quantitatUsuario,preuUsuario){
    
    let producto = {
      'nombre': producteUsuario,
      'cantidad': quantitatUsuario,
      'precio': preuUsuario,
      'total': preuUsuario*quantitatUsuario
    };
    matrizProductes.value.push(producto);
}

function eliminaDatos(datoElimnar){
  matrizProductes.value.splice(datoElimnar,1);
}


</script>

<template>
 <EntradaDatos @recogeDatos="datosRecividos"></EntradaDatos>
 <TablaHead></TablaHead>
 <LineaAlbaran @elimina-datos="eliminaDatos"  :matrizProductes ="matrizProductes"></LineaAlbaran>
 <TablaFoot :matrizProductes ="matrizProductes"></TablaFoot>
</template>

<style>
div {
  margin-bottom: 15px;
}

label {
  width: 100px;
  display: inline-block;
}

th {
    width:130px;
}

td {
  text-align:right;
}

td:first-child {
  text-align:left;
}

tfoot th {
  text-align:left;
}

tfoot th:last-child {
  text-align:right;
}


tfoot, thead, tbody, #tableHead {
  border: 1px solid black;
}

#theadHead, tfoot {
  background-color: grey;
}

tbody tr:hover {
  background-color:#2897E8;
}
</style>