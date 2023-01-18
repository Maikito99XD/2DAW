<script setup>
import { ref } from 'vue';
import ButtonCounter from './components/ButtonCounter.vue';
import BlogPost from './components/BlogPost.vue';

const posts = ref([
{ id: 1, titulo: "Post 01", contenido: "Descripcion del post 01" },
{ id: 2, titulo: "Post 02", contenido: "Descripcion del post 02" },
{ id: 3, titulo: "Post 03", contenido: "Descripcion del post 03" },
]);

const miFavorito = ref(""); //Variable donde almaceno mi Favorito
const fijarFavorito = (titulo) => { //recibo el valor del Post favorito con el Boton
  miFavorito.value = titulo;
}
</script>

<template>
  <h1>COMPONENTES</h1><br/>
  
  <ButtonCounter />
  <ButtonCounter />
  <BlogPost
    v-for="post in posts" :key="post.id"
    :id="post.id"
    :titulo="post.titulo"
    :contenido="post.contenido"
    @fijarFavoritoNombre="fijarFavorito"
    /> <!-- 'Sincronizo' componentes con el evento personalizado -->
    <h2>Mi Post Favorito: {{ miFavorito }}</h2>

</template>

<style scoped>

</style>
