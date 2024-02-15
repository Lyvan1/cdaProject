import axios from './plugins/axios'
import { createApp } from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import auth from './service/auth'

const app = createApp(App)

loadFonts()

app.config.globalProperties.$axios = axios
app.config.globalProperties.$token = auth.getToken()

app
  .use(vuetify)
  .mount('#app')
