<template>
<div id="login">
  <v-sheet width="300" class="mx-auto">
    <v-form>
      <v-alert
          v-if="error"
          type="error"
          title="Mot de passe incorrect"
          text="Essayez à nouveau"
      ></v-alert>
      <v-text-field
          v-model="form.username"
          label="Entrez votre nom d'utilisateur"
      ></v-text-field>
      <v-text-field
          v-model="form.password"
          label="Entrez votre mot de passe"
      ></v-text-field>

      <v-btn :loading="loading" @click="login()">Connexion</v-btn>
    </v-form>
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
      loading: false
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
    }
  }
}
</script>

<style scoped>

</style>