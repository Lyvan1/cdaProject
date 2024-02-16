import axios from './plugins/axios'
import { createApp } from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import auth from './service/auth'
import router from './router'

const app = createApp(App)

loadFonts()

app.config.globalProperties.$axios = axios
app.config.globalProperties.$token = auth.getToken()

app
  .use(vuetify)
  .use(router)
  .mount('#app')
