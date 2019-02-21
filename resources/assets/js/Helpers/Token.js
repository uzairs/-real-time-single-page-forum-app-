class Token {


    isValid(token) {

   const payload = this.payload(token); 
//console.log(payload.iss)
   if(payload)
   {
      return payload.iss == "http://localhost:8000/api/auth/login"  || "http://localhost:8000/api/auth/signup" ? true :
      false 

  }

  return false;


    }

   payload(token) {
  
          const payload = token.split('.') [1]
   
          
            return this.decode(payload);
            
            
   }

    decode(payload) {
// atob Method base 64decoded
       return  JSON.parse(atob(payload)); 

    }






}


export default Token = new Token();