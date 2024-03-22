<template>
  <div id="app">

      <v-layout style="height:100vh;" class="d-flex flex-row align-center">
        <Navbar></Navbar>
        <router-view/>
      </v-layout>

  </div>
</template>

<style>
@font-face {
  font-family: 'cinnamon-cake';
  src: url('@/assets/fonts/cinnamon-cake.ttf');
}

@font-face {
  font-family: 'back-to-school';
  src: url('@/assets/fonts/CFBacktoSchool-Regular.ttf');
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.cinnamonCakeBold{
  font-family: "cinnamon-cake",sans-serif;
  font-weight:bold !important;
}

.cinnamonCake{
  font-family: "cinnamon-cake",sans-serif;
}
.backToSchool{
  font-family: "back-to-school", sans-serif !important;
}
body{
  background-color: #52B1C8;
}
nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
<script setup>
import BoardChild from '@/components/BoardChild/BoardChild.vue';
import Navbar from '@/components/Navbar/Navbar.vue';
</script>