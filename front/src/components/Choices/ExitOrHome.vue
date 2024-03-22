<template>
  <BoardChild>
    <v-card elevation="0" class="remove-background cardHover" link>
      <v-img :width="300" :src="exit" class="img"></v-img>
      <v-card-title class="title">Quitter</v-card-title>
    </v-card>
    <v-card elevation="0" class="remove-background cardHover" link>
      <v-img :width="300" :src="home" class="img"></v-img>
      <v-card-title class="title">Accueil</v-card-title>
    </v-card>
  </BoardChild>

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
import exit from '@/assets/img/exit.png';
import home from '@/assets/img/home.png';
import LessonOrGames from '@/components/Choices/LessonOrGames.vue';
import BoardChild from '@/components/BoardChild/BoardChild.vue';


export default {
  components: {
    BoardChild
  },
  data: ()=>{
    return {
      exit: exit,
      home: home
    }
  }
}
</script>