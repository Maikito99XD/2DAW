import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useCounterStore = defineStore('counter', () => {
  
  //Matriz para almacenar todos los productos que el usuario nos diga
  let matrizProductes = ref([]);
  //Variables de baseImposable, iva y totalFactura para poder calcular el total
  let baseImposable = ref(0);
  let iva = ref(0);
  let totalFactura = ref(0);
  //La función datosRecividos recibirá todos los datos introducidos por el usuario del componente
  function recogeDatos(producteUsuario,quantitatUsuario,preuUsuario){
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
  return { matrizProductes, baseImposable, iva, totalFactura, recogeDatos, eliminaDatos }
})
