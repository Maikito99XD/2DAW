<script setup>
import { ref } from "vue";
const count = ref(0);
 const contador=()=>{
count.value++;
}
</script>
<template>
<button @click="contador">Contador {{ count }}</button>
</template>