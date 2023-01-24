<script setup>
import { ref } from 'vue';
import ButtonCounter from './components/ButtonCounter.vue';
import BlogPost from './components/BlogPost.vue';
import PogPost from './components/PogPost.vue';
import NumPost from './components/NumPost.vue';
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


let inicio = ref(0);
let fin = ref(); 
let postxpag = 10;
let error = ref();
let cargando = ref();

function cambiotam(postxpags){
  postxpag = postxpags;
  inicio.value = 0;
  fin.value = postxpag;

}

const next=()=>{
inicio.value = parseInt(inicio.value) + parseInt(postxpag);
fin.value = parseInt(fin.value) + parseInt(postxpag);
}

const prev=()=>{
inicio.value = parseInt(inicio.value) - parseInt(postxpag);
fin.value = parseInt(fin.value) - parseInt(postxpag);
}

const posts = ref([]); //Posts
fetch("https://jsonplaceholder.typicode.com/posts")
.then((res) => res.json())
.then((data) => (posts.value = data))
.catch((err)=> error.value= err) //Si error lo guardamos en ‘error’
.finally(()=>cargando.value=false); //Al terminar cargando=false
</script>

<template>
  <h2 v-if="cargando">Cargando Datos.</h2>
  <h2 v-else-if="error">Error Cargando Datos.</h2>
  <div v-else>
    <h1>COMPONENTES</h1><br/>
    <h2>Nº Post por Página: {{ postxpag }}</h2><br/>
    <NumPost
    @cambiotam = cambiotam>
      
    </NumPost><br/>
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
</div>
</template>

<style scoped>

</style>
