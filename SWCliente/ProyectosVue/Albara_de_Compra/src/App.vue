<script setup>
//Importamos ref de vue
import { ref } from 'vue';
//Importamos los componentes que necesitamos
import EntradaDatos from './components/EntradaDatos.vue';
import TablaHead from './components/TablaHead.vue';
import LineaAlbaran from './components/LineaAlbaran.vue';
import TablaFoot from './components/TablaFoot.vue';

//Matriz para almacenar todos los productos que el usuario nos diga
let matrizProductes = ref([]);
//Variables de baseImposable, iva y totalFactura para poder calcular el total
let baseImposable = ref(0);
let iva = ref(0);
let totalFactura = ref(0);
//La función datosRecividos recibirá todos los datos introducidos por el usuario del componente
function datosRecividos(producteUsuario,quantitatUsuario,preuUsuario){
    //Creamos un array llamado producto
    let producto = {
      //Le definimos tanto el nombre,cantidad,precio como el total del producto
      'nombre': producteUsuario,
      'cantidad': quantitatUsuario,
      'precio': preuUsuario,
      //Calculamos el total del producto
      'total': preuUsuario*quantitatUsuario
    };
    //Calculamos la baseImposable del producto que es lo mismo que el total (solo que es el subtotal de la factura)
    baseImposable.value += preuUsuario*quantitatUsuario;
    //Calculamos el iva
    iva.value = (baseImposable.value *21) /100;
    //Calculamos el total de la factura sumando el iva y la base imposable
    totalFactura.value = baseImposable.value + iva.value;
    //Añadimos el producto a nuestra matriz
    matrizProductes.value.push(producto);
}
//La funcion eliminaDatos como su nombre indica, eliminará un producto de nuestra matriz de productos
//le pasamos el producto que el usuario quiera eliminar
function eliminaDatos(datoElimnar){
  //Restamos el total del producto a la baseImposable
  baseImposable.value -= matrizProductes.value[datoElimnar].total;
  //Con splice le decimos la posicion del producto en la matriz y cuantos queremos borrar
  matrizProductes.value.splice(datoElimnar,1);
}

</script>

<template>
  <!--En entrada datos definiremos recogedatos y le pasaremos la funcion datosRecividos-->
 <EntradaDatos @recogeDatos="datosRecividos"></EntradaDatos>
 <!--TablaHead enseñará al usuario una fila donde verá el nombre del producto, etc...-->
 <TablaHead></TablaHead>
 <!--En LineaAlbaran le definiremos "elimina-datos" y le pasaremos la funcion eliminaDatos
  además le daremos y definiremos a LineaAlbaran nuestra matriz de productos-->
 <LineaAlbaran @elimina-datos="eliminaDatos"  :matrizProductes ="matrizProductes"></LineaAlbaran>
 <!--TablaFoot se encargará de calcular tanto el iva como el totalFactura y mostrarlo-->
 <TablaFoot 
 :baseImposable = "baseImposable"
  ></TablaFoot>
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