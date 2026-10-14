import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import MahasiswaView from '../views/MahasiswaView.vue'

// Hash history: refresh di /#/mahasiswa tidak 404 walau di GitHub Pages
export default createRouter({
  history: createWebHashHistory(),
  routes: [
    { path: '/', name: 'home', component: HomeView },
    { path: '/mahasiswa', name: 'mahasiswa', component: MahasiswaView },
  ],
})
