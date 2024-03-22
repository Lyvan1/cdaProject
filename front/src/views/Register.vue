
<template >
  <v-sheet width="90%" elevation="6" class="mx-auto pb-3">
    <v-form>
      <v-container justify="center">
        <v-select
            v-model="form.status"
            label="Vous êtes"
            :items="['Etudiant', 'Parent', 'Professeur', 'Formateur']"
        ></v-select>
        <v-row>
          <v-col cols="12" sm="12" md="4">
            <v-text-field v-model="form.lastname" type="text" label="Entrez Votre Nom"></v-text-field>
          </v-col>
          <v-col cols="12" sm="12"  md="4">
            <v-text-field v-model="form.firstname" type="text" label="Entrez votre Prénom"></v-text-field>
          </v-col>
          <v-col cols="12" sm="12"  md="4">
            <v-text-field v-model="form.birthdate" type="date" label="Date de naissance"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col  cols="12" sm="12" md="6">
            <v-text-field v-model="form.username" type="text" label="Entrez un pseudo"></v-text-field>
          </v-col>
          <v-col  cols="12" sm="12" md="6">
            <v-text-field v-model="form.password" type="password" label="Entrez un mot de passe"></v-text-field>
          </v-col>
        </v-row>
      </v-container>

      <!--Display content's form for Parent case-->
      <v-container v-if="form.status == 'Parent' ">
        <v-row>
          <v-col   cols="12" sm="12" md="6">
            <v-text-field v-model="form.username" type="email" label="Entrez une adresse mail"></v-text-field>
          </v-col>
          <v-col   cols="12" sm="12" md="6">
            <v-text-field v-model="form.phone" type="number" label="Entrez un numéro de téléphone"></v-text-field>
          </v-col>
        </v-row>
      </v-container >

      <!--Display content's form for Student case-->
      <v-container v-if="form.status == 'Etudiant'">
        <v-row>
          <v-col   cols="12" sm="12" md="6">
            <v-text-field v-model="form.username" type="email" label="Entrez une adresse mail"></v-text-field>
          </v-col>
          <v-col   cols="12" sm="12" md="6">
            <v-text-field v-model="form.phone" type="number" label="Entrez un numéro de téléphone"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col   cols="12" sm="12" md="6">
            <v-text-field v-model="form.level" type="text" label="Entrez votre niveau"></v-text-field>
          </v-col>
          <v-col   cols="12" sm="12" md="6">
            <v-text-field v-model="form.classroom" type="text" label="Entrez votre classe"></v-text-field>
          </v-col>
        </v-row>
      </v-container>

      <!--Display content's form for Professor case-->
      <v-container v-if="form.status == 'Professeur'">
        <v-row>
          <v-col   cols="12" sm="12"  md="4">
            <v-text-field v-model="form.email" type="email" label="Entrez une adresse mail"></v-text-field>
          </v-col>
          <v-col   cols="12" sm="12"  md="4">
            <v-text-field v-model="form.phone" type="number" label="Entrez un numéro de téléphone"></v-text-field>
          </v-col>
          <v-col cols="12" sm="12"  md="4">
            <v-text-field v-model="form.numen" type="number" label="Identifiant Numen"></v-text-field>
          </v-col>
        </v-row>
      </v-container>

      <!--Display content's form for Formateur case-->
      <v-container v-if="form.status == 'Formateur'">
        <v-row>
          <v-col   cols="12" sm="12"  md="6">
            <v-text-field v-model="form.email" type="email" label="Entrez une adresse mail"></v-text-field>
          </v-col>
          <v-col   cols="12" sm="12"  md="6">
            <v-text-field v-model="form.phone" type="number" label="Entrez un numéro de téléphone"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" sm="12"  md="6">
            <v-text-field v-model="form.siret" type="number" label="Numéro entreprise"></v-text-field>
          </v-col>
          <v-col cols="12" sm="12"  md="6">
            <v-select
                v-model="form.subject"
                label="Matière(s) enseignée(s)"
                multiple
                :items="['Math', 'Français', 'Sciences','Physique']"
            ></v-select>
          </v-col>
        </v-row>
      </v-container>

      <v-btn  class="my-5"  @click="logForm">Inscription</v-btn>
    </v-form>

    <span>Déjà inscrit? <RouterLink to="/login">Connectez-vous</RouterLink></span>
  </v-sheet>


</template>

<script>
  export default{
    name:'Register',
    data(){
      return{
        form: {
          username: null,
          email: null,
          firstname: null,
          lastname: null,
          password: null,
          confirmPassword: null,
          phone:null,
          numen:null,
          birthdate:null,
          status:null,
          classroom:null,
          subject:null,
          siret:null
        }
      }
    },
    methods: {
      logForm() {
        console.log(this.form.status);
      }
    }
  }
</script>