<template>

  <board-child type="lecture">
    <template v-slot:before >
      <h2 class="backToSchool text-h4 text-md-h2 text-sm-h4"> Apprendre à lire</h2>
    </template>
    <LessonOrGames/>
  </board-child>

</template>


<script>

import BoardChild from '@/components/BoardChild/BoardChild.vue';
import LessonOrGames from '@/components/Choices/LessonOrGames.vue';

export default {
  components: {
    LessonOrGames,BoardChild
  }
}
</script>