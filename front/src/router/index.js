import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Login from "@/views/Login.vue";
import Register from '@/views/Register.vue';
import HomeChild from '@/components/HomeChild/HomeChild.vue';
import Grammaire from '@/components/subjectPages/Grammaire.vue';
import Conjugaison from '@/components/subjectPages/Conjugaison.vue';
import Dessin from '@/components/subjectPages/Dessin.vue';
import Lecture from '@/components/subjectPages/Lecture.vue';
import LeMonde from '@/components/subjectPages/LeMonde.vue';
import Mesure from '@/components/subjectPages/Mesure.vue';
import Calcul from '@/components/subjectPages/Calcul.vue';
import BoardChild from '@/components/BoardChild/BoardChild.vue';
import ExitOrHome from '@/components/Choices/ExitOrHome.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path:'/register',
    name:'register',
    component:Register
  },
  {
    path:'/home-child',
    name:'HomeChild',
    component: HomeChild
  },
  {
    path:'/grammaire',
    name:'grammaire',
    component: Grammaire
  },
  {
    path:'/conjugaison',
    name:'conjugaison',
    component: Conjugaison
  },
  {
    path:'/dessin',
    name:'dessin',
    component: Dessin
  },
  {
    path:'/lecture',
    name:'lecture',
    component: Lecture
  },
  {
    path:'/le-monde',
    name:'leMonde',
    component: LeMonde
  },
  {
    path:'/mesure',
    name:'mesure',
    component: Mesure
  },
  {
    path:'/calcul',
    name:'calcul',
    component: Calcul
  },
  {
    path:'/exit',
    name:'exit',
    component: ExitOrHome
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
