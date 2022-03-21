<template>
    <div class="container" >
      <div v-if="errors.length>0">
        <div v-for="error in errors">
         <h6 v-text="'***'+error[0]" style="color: red"></h6>
        </div>
      </div>
      <div v-if="validPostalCode">
          <h5 v-text="validPostalCode" style="color: red"></h5>
      </div>
      <form @submit.prevent="handleSubmit">
        <label>Email :</label>
        <input type="email" v-model="email" required>

        <label>Name :</label>
        <input type="text" v-model="name" required>


        <label>Password :</label>
        <input type="password" v-model="password" required>

        <label>Post Code :</label>
        <input type="text" v-model="postcode" required>

        <div style="margin-top: 3vh; margin-left: 30vw;" class="button">
          <button class="submit" type="submit">Sign up here</button>
        </div>
      </form>

    </div>
</template>

<script>
import useVuelidate from '@vuelidate/core'

    export default {
      setup () {
        return { v$: useVuelidate() }
      },
      data() {
        return {
          email: '',
          password: '',
          name: '',
          postcode: '',
          errors: [],
          validPostalCode: '',
        }
      },
      methods:{
        handleSubmit() {
          axios.post('/register',
            {
              email: this.email,
              name: this.name,
              postcode: this.postcode,
              password: this.password
            }).then((response) => {
            let data = response.data;
            if(data === 'Not a valid postal code'){
              this.validPostalCode = 'Not a valid postal code';
            }
            else if(data['errors']){
              this.validPostalCode = '';
              this.errors = Object.values(data['errors']);
            }
            else{
              this.openPopup(this.name);
            }
          });
        },
        openPopup: function (name) {
          alert('Registered Successfully, Welcome ' + name);
        }
      }
    }
</script>

<style scoped>

form {
  max-width: 600px;
  margin: 30px auto;
  background: #fff;
  text-align: left;
  padding: 20px;
  border-radius: 10px;
}

label {
  color: #aaa;
  display:inline-block;
  margin: 25px 0 15px;
  text-transform: uppercase;
}

input, select {
  display: block;
  padding: 10px 6px;
  width: 100%;
  box-sizing: bordre-box;
  border: none;
  border-bottom: 1px solid #ddd;
  color: #555;
}

input[type="checkbox"] {
  display: inline-block;
  width:16px;
  margin: 0 10px 0;
  position: relative;
  top: 2px;
}

.pill {
  display: inline-block;
  margin: 20px 10px 0 0 ;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 12px;
  cursor: pointer;
  background: #eee;
}

button {
  background: rgb(7, 24, 7);
  border: 0;
  padding: 10px 20px;
  color: white;
  border-radius: 20px;
}

.submit {
  text-align: center;
}

.error {
  color: #ff0000;
  margin-top: 10px;
  font-size: 0.8em;
  font-weight: bold;
}
</style>
