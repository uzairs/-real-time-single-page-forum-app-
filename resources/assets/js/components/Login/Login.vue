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
   methods: {

     login(){
       
     User.login(this.form)
     
     },
     

   }
 
}
</script>

<style>

</style>
