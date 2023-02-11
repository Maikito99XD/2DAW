<script setup>
    //Definimos el albaran de pinia
    import { useCounterStore } from "@/stores/albaran";
    //importamos el storeToRefs de la biblioteca de pinia
    import { storeToRefs } from "pinia";
    //Hacemos el useCounterSotre
    const useCounter = useCounterStore();
    //Recogemos la baseImposable de productos del albaran
    const { baseImposable } = storeToRefs(useCounter);

</script>

<template>
<table>
    <tfoot>
        <tr>
        <th colspan="4">Base imposable</th>
        <!--Se hace un v-if debido a que si se añaden varios productos con decimales
        dichos productos en el iva y el totalFactura tendrán muchos decimales
        Ej: 3.2000000001 entonces a la hora de restar la baseImposable se quedará un valor de -0 
        Entonces cuando sea mayor, saldrá el calculo y cuando hayan varios decimales haciendo
        el valor negativo como anteriormente dicho, saltará el else y se pondrá 0.00€-->
        <th v-if="baseImposable >= 0">{{  parseFloat(baseImposable).toFixed(2)  }}€</th>
        <th v-else>0.00€</th>
        </tr>
        <tr>
        <th colspan="4" data-iva="0.21">IVA 21%</th>
        <th v-if="baseImposable >= 0">{{parseFloat(baseImposable*0.21).toFixed(2)}}€</th>
        <th v-else>0.00€</th>
        </tr>
        <tr>
        <th colspan="4">Total factura</th>
        <th v-if="baseImposable >= 0">{{parseFloat(baseImposable+(baseImposable*0.21)).toFixed(2)}}€</th>
        <th v-else>0.00€</th>
        </tr>
    </tfoot>
    <tbody>
    </tbody>
</table>
</template>