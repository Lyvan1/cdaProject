<template>

  <v-card elevation="0" class="remove-background cardHover mt-3" link>
    <v-img :width="auto" :src="game" class="img"></v-img>
    <v-card-title class="title">Jeux</v-card-title>
  </v-card>
  <v-card elevation="0" class="remove-background cardHover mt-3" link>
    <v-img :width="auto" :src="lesson"></v-img>
    <v-card-title class="title">Cours</v-card-title>
  </v-card>

</template>

<style>
.remove-background {
  background-color: transparent !important;
}
.title{
  font-size:3.5em;
  color:white;
}

.cardHover{
  transition:0.8s;
}
.cardHover:hover{
  transform: scale(1.2);
  transition:0.8s;
}
</style>

<script>
import game from '@/assets/img/game.png';
import lesson from '@/assets/img/lesson.png';

export default {
  props:{

  },
  data: ()=>{
    return {
      game:game,
      lesson:lesson
    }
}
}
</script>