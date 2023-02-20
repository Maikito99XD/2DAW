<script setup>
import Volver from "../components/Volver.vue";
</script>

<template>
  <div class="about">
    <h1>Examen Vue</h1>
    <h1>Carro de Compra</h1>
    <p>Components + Vue Router +Composables + Pinia</p>
    <p>Autor: Mike Steel Marín</p>
    <Volver></Volver>
  </div>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
