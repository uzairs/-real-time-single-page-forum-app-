<template>
  <v-form @submit.prevent="signup">
    <v-container>
      
     <v-flex
          xs12
          md13
        >
        <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>
          <v-text-field
            v-model="form.name"
           type="text"
            label="Name"
            required
          ></v-text-field>
          
      </v-flex>
      
      
         <v-flex
          xs12
          md13
        >
        <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>
          <v-text-field
            v-model="form.email"
           type="email"
            label="E-email"
            required
          >
          
          </v-text-field>
        </v-flex>

        <v-flex
          xs12
          md13
        >
          <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>
          <v-text-field
            v-model="form.password"
          type="password"
            label="Password"
            required
          >
          </v-text-field>
          
        </v-flex>


        
        <v-flex
          xs12
          md13
        >
          
          <v-text-field
            v-model="form.password_confirmation"
          type="password"
            label="Confirm Password"
            required
          >
          </v-text-field> 
          
        </v-flex>
      
    <v-btn
      color="blue"
      type="submit"
    >Sign-up</v-btn>

      <router-link to="/login">
       <v-btn 
       color="blue"
       >Login</v-btn>
      
      </router-link>

    </v-container>
    
  </v-form>
</template>


<script>
export default {

data(){
  return {
 
 form: {
      name: null,
      email : null,
      password: null,
      password_confirmation: null, 
       

 },
     
     errors: {}

  }
   
},

created() {
 if( User.loggedIn()) {
    this.$router.push({name: 'forum'})
 }
},

    methods: {
   
   signup() {
    axios.post('/api/auth/signup', this.form)
   .then(res => {User.responseAfterLogin(res)
   
          this.$router.push({ path: 'forum' })
   })
   .catch(error=> this.errors = error.response.data.errors);
  
  }

    }

}
</script>

<style>

</style>
