<template>
  <v-form @submit.prevent="login">
    <v-container>
      
         <v-flex
          xs12
          md13
        >
        
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
          
          <v-text-field
            v-model="form.password"
          type="password"
            label="Password"
            required
          ></v-text-field>
          
        </v-flex>
      
    <v-btn
      color="blue"
      type="submit"
    >Login</v-btn>

      <router-link to="/signup">
      
      <v-btn 
       color="blue"

      >Sign-up</v-btn>
      
      </router-link>
 
    </v-container>
    
  </v-form>
</template>

<script>
export default {
   data() {

  return {
 
    form: {
      email: null,
      password: null
    } 
  }
   },

  created(){
   
   if(User.loggedIn()){
   this.$router.push({name:'forum'})
}
  },

   methods: {

     login(){
      User.login(this.form)
//      this.$router.push({ path: 'forum' })
   
     
     },
     

   }
 
}
</script>

<style>

</style>
