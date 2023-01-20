<script setup>
import { ref } from 'vue';
import ButtonCounter from './components/ButtonCounter.vue';
import BlogPost from './components/BlogPost.vue';
import PogPost from './components/PogPost.vue';
/*
const posts = ref([
{ id: 1, titulo: "Post 01", contenido: "Descripcion del post 01" },
{ id: 2, titulo: "Post 02", contenido: "Descripcion del post 02" },
{ id: 3, titulo: "Post 03", contenido: "Descripcion del post 03" },
]);
*/
const miFavorito = ref(""); //Variable donde almaceno mi Favorito
const fijarFavorito = (titulo) => { //recibo el valor del Post favorito con el Boton
  miFavorito.value = titulo;
}


const selected = ref('');
const inicio = ref(0);
const fin = ref(); 
const postxpag = ref();

function cambiotam(){
  inicio.value = 0;
  fin.value = parseInt(selected.value);
  postxpag.value = parseInt(selected.value);
}

const next=()=>{
inicio.value = parseInt(inicio.value) + parseInt(postxpag);
fin.value = parseInt(fin.value) + parseInt(postxpag);
}

const prev=()=>{
inicio.value = inicio.value - postxpag;
fin.value = fin.value - postxpag;
}

const posts = ref([]); //Posts
fetch("https://jsonplaceholder.typicode.com/posts")
.then((res) => res.json())
.then((data) => (posts.value = data))
</script>

<template>
  <h1>COMPONENTES</h1><br/>
  <h2>Nº Post por Página: {{ selected }}</h2><br/>
  <select v-model="selected" @change="cambiotam">
    <option>10</option>
    <option>15</option>
    <option>20</option>
  </select><br/>
    <!--
  <ButtonCounter />
  <ButtonCounter />
  <BlogPost
    v-for="post in posts" :key="post.id"
    :id="post.id"
    :titulo="post.titulo"
    :contenido="post.contenido"
    @fijarFavoritoNombre="fijarFavorito"
    /> --><!-- 'Sincronizo' componentes con el evento personalizado 
    <h2>Mi Post Favorito: {{ miFavorito }}</h2>
-->
  <PogPost  
  @next="next" 
  @prev ="prev"
  :inicio = "inicio"
  :fin = "fin"
  :tampost="posts.length"
  >
  <h2>Mi Post Favorito: {{ miFavorito }}</h2>
  </PogPost>

  <BlogPost
    v-for="post in posts.slice(inicio,fin)"
    :key="post.id"
    :id="post.id"
    :titulo="post.title"
    :contenido="post.body"

/>

</template>

<style scoped>

</style>
