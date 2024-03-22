<template >

<!--  @click.stop="drawer = !drawer"-->

    <div class="ma-2 pa-2">
      <v-app-bar id="appNavbar" color="primary">
        <v-app-bar-nav-icon variant="text" @click="dislayNavBar()"></v-app-bar-nav-icon>

        <v-toolbar-title>My files</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon="mdi-magnify" variant="text"></v-btn>

        <v-btn icon="mdi-filter" variant="text"></v-btn>

        <v-btn icon="mdi-dots-vertical" variant="text"></v-btn>
      </v-app-bar>

      <v-navigation-drawer
          expand-on-hover
          rail
          :rail-width="130"
          style="height:95vh; border-radius:60px; top:50%; transform:translateY(-50%);"
          id="appDrawer"
      >
        <v-list>
          <v-list-item value="quitter" :to="{name:'exit'}">
            <template v-slot:prepend>
              <v-img :width="50" :src="exit"></v-img>
            </template>
            <v-list-item-title class="cinnamonCakeBold titre">Quitter</v-list-item-title>
          </v-list-item>
        </v-list>

        <v-divider></v-divider>

        <v-list density="comfortable" nav>
          <v-list-item value="grammaire" class="my-5" :to="{name:'grammaire'}">
            <template v-slot:prepend class="mx-5">
              <v-img :width="50" :src="grammaire"></v-img>
            </template>
            <v-list-item-title class="cinnamonCakeBold titre">Grammaire</v-list-item-title>
          </v-list-item>

          <v-list-item value="conjugaison" class="my-5" :to="{name:'conjugaison'}">
            <template v-slot:prepend class="mx-5">
              <v-img :width="50" :src="conjugaison"></v-img>
            </template>
            <v-list-item-title class="cinnamonCakeBold titre">Conjugaison</v-list-item-title>
          </v-list-item>

          <v-list-item value="dessin" class="my-5" :to="{name:'dessin'}">
            <template v-slot:prepend class="mx-5">
              <v-img :width="50" :src="dessin"></v-img>
            </template>
            <v-list-item-title class="cinnamonCakeBold titre">Dessin</v-list-item-title>
          </v-list-item>

          <v-list-item value="calcul" class="my-5" :to="{name:'calcul'}">
            <template v-slot:prepend class="mx-5">
              <v-img :width="50" :src="calcul"></v-img>
            </template>
            <v-list-item-title class="cinnamonCakeBold titre">Calcul</v-list-item-title>
          </v-list-item>

          <v-list-item value="mesure" class="my-5" :to="{name:'mesure'}">
            <template v-slot:prepend class="mx-5">
              <v-img :width="50" :src="mesure"></v-img>
            </template>
            <v-list-item-title class="cinnamonCakeBold titre">Mesure</v-list-item-title>
          </v-list-item>

          <v-list-item value="lecture" class="my-5" :to="{name:'lecture'}">
            <template v-slot:prepend class="mx-5">
              <v-img :width="50" :src="lecture"></v-img>
            </template>
            <v-list-item-title class="cinnamonCakeBold titre">Lecture</v-list-item-title>
          </v-list-item>

          <v-list-item value="lemonde" class="my-5" :to="{name:'leMonde'}">
            <template v-slot:prepend class="mx-5">
              <v-img :width="50" :src="lemonde"></v-img>
            </template>
            <v-list-item-title class="cinnamonCakeBold titre">Le Monde</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>

      <v-main style="height: 250px"></v-main>
    </div>

</template>

<style scoped>
.titre{
  font-size:18px !important;
}

@media (max-width:600px){
  #appDrawer{ display:none}
}

@media (min-width:600px){
  #appNavbar{ display:none}
}
</style>



<script>
import grammaire from '@/assets/img/grammaire.png';
import conjugaison from '@/assets/img/conjugaison.png';
import mesure from '@/assets/img/mesure.png';
import calcul from '@/assets/img/calcul.png';
import lecture from '@/assets/img/lecture.png';
import dessin from '@/assets/img/dessin.png';
import lemonde from '@/assets/img/leMonde.png';
import exit from '@/assets/img/exit.png';
import {computed} from 'vue';
  export default {
    name: 'Navbar',
    data:  () => {
      return {
        grammaire: grammaire,
        conjugaison: conjugaison,
        mesure: mesure,
        calcul: calcul,
        lecture: lecture,
        dessin: dessin,
        lemonde: lemonde,
        exit: exit,
        showNavbar:false
      };
    },

    methods: {
      dislayNavBar(){
        this.showNavbar = !this.showNavbar;
        if(this.showNavbar === false){
          document.getElementById('app-navbar').style.display = 'block';
        } else {
          document.getElementById('app-navbar').style.display = 'none';
        }

      }
    },

  }
</script>

