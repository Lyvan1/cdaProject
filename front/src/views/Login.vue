<template>
<div id="login">

  <v-sheet width="90%" class="mx-auto my-5 pb-3" elevation="6">
    <v-container>
      <v-form>
        <v-alert
            v-if="error"
            type="error"
            title="Mot de passe incorrect"
            text="Essayez à nouveau"
        ></v-alert>
        <v-row>
          <v-col>
            <v-text-field
                v-model="form.username"
                label="Entrez votre nom d'utilisateur"
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col>
            <v-text-field
                type="password"
                v-model="form.password"
                label="Entrez votre mot de passe"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-btn  class="my-5" :loading="loading" @click="login()">Connexion</v-btn>
      </v-form>
    </v-container>

      <v-divider class="mx-4 mb-1"></v-divider>
      <span>Pas de compte? <RouterLink to="/register">Inscrivez-vous</RouterLink></span>

  </v-sheet>
</div>
</template>

<script>
import auth from '@/service/auth';

export default {
  name: "Login",
  data() {
    return {
      form: {
        username: null,
        password: null
      },
      error: false,
      loading: false,
    }
  },
  methods: {
    login() {
      this.loading = true;

      this.$axios.post(
          '/login_check',
          {username: this.form.username, password: this.form.password}
      ).then(response => {
        auth.login(response.data.token)
        this.loading = false;
        window.location.replace('/');
      }).catch(() => {
        this.error = true;
        this.loading = false;
      })
    },

    loginOrRegister(){
      this.login = !this.login;
      console.log(this.login());
    }
  }
}
</script>

<style scoped>

</style>