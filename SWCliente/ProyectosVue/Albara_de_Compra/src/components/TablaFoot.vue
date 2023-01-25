<script setup>
    import { ref, computed} from "vue";

    let productos = defineProps(['matrizProductes']);
    let baseImposable = ref(0);
    let iva = ref(0);
    let totalFactura = ref(0);
    
    function calcularLaBaseImposable(baseImposable,total){

        const calculo = computed(() => {
            if(total != null){
                baseImposable += total;
                console.log(baseImposable);
                console.log(total);
                return baseImposable;
            }else{
                return 0;
            }
        })

        return calculo;
    }
    
    

    
    
</script>

<template>
<table>
    <tfoot>
        <tr>
        <th colspan="4">Base imposable</th>
        <th v-for="(producto,i) in productos.matrizProductes" :key="i">{{  calcularLaBaseImposable(baseImposable,producto.total)  }}€</th>
        </tr>
        <tr>
        <th colspan="4" data-iva="0.21">IVA 21%</th>
        <th>{{iva}}€</th>
        </tr>
        <tr>
        <th colspan="4">Total factura</th>
        <th>{{totalFactura}}€</th>
        </tr>
    </tfoot>
    <tbody>
    </tbody>
</table>
</template>