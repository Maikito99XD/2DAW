<script setup>
  import { useCounterStore } from "@/stores/useCounterStore.js";
  import { ref, computed } from "vue";

  const useCounter = useCounterStore();

</script>

<template>
  <main>
    <h1>Tamaño Fuente: {{ useCounter.count }}</h1>
    <button @click="useCounter.increment">Incrementar Tamaño</button>
    <button @click="useCounter.decrement">Decrementar Tamaño</button>
    <button @click="useCounter.reset" :disabled="useCounter.compruebaReset">Resetea Tamaño</button><br/>
    <span :style="{fontSize: `${useCounter.count}`+ 'px'}">Hola Mundo</span>
  </main>
</template>
