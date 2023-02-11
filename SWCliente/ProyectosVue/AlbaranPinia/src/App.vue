<script setup>
//Importamos los componentes que necesitamos
import EntradaDatos from './components/EntradaDatos.vue';
import TablaHead from './components/TablaHead.vue';
import LineaAlbaran from './components/LineaAlbaran.vue';
import TablaFoot from './components/TablaFoot.vue';

</script>

<template>
  <!--En entrada datos definiremos recogedatos y le pasaremos la funcion datosRecividos-->
 <EntradaDatos></EntradaDatos>
 <!--TablaHead enseñará al usuario una fila donde verá el nombre del producto, etc...-->
 <TablaHead></TablaHead>
 <!--En LineaAlbaran le definiremos "elimina-datos" y le pasaremos la funcion eliminaDatos
  además le daremos y definiremos a LineaAlbaran nuestra matriz de productos-->
 <LineaAlbaran></LineaAlbaran>
 <!--TablaFoot se encargará de calcular tanto el iva como el totalFactura y mostrarlo-->
 <TablaFoot ></TablaFoot>
</template>
<!--Y aquí tenemos la etiqueta style que definirá el estilo de la página
no se usa mucho pero ahí está-->
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