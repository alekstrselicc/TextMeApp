<template>
  <v-container>
    <v-layout column align-center class="mt-10">
      <h1 class="white--text custom_title">Welcome</h1>
      <div class="text_edit">
      <p class="mt-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem</p>
      </div>

      <v-btn class="hidden-md-and-up custom_button mt-8" rounded to="/login">Login</v-btn>

    </v-layout>

    <v-layout column align-center>
      <div class="register_mobile hidden-md-and-up">
        <p>Not a memeber yet?</p>
        <p>What are you waiting for? Register now</p>
      </div>
        <v-btn class="hidden-md-and-up custom_button mt-8" rounded to="/register">Register</v-btn>
    </v-layout>

  </v-container>  
</template>

<script lang="ts">
  import Vue from 'vue'
  export default Vue.extend({
  })
</script>

<style lang="scss">
  .text_edit{
    color: white !important;
    width: 600px !important;
    text-align: center;
  }
  .custom_title{
    font-size: 200px;
    font-weight: lighter;
  }
  @media only screen and (max-width: 960px){
    .text_edit{
      color: white !important;
      width: 350px !important;
      text-align: center;
      font-size: 24px;
    }
    .custom_title{
      font-size: 64px !important;
      font-weight: bold;
      font-family: Arial;
    }
    .custom_button{
      width: 205px !important;
      height: 65px !important; 
      text-align: center !important;
      font-size: 32px !important;
      text-transform: capitalize !important;
      font-family: Arial !important;  
      background-color: #007ABE !important;
      color: white !important;
    }

    .register_mobile{
      margin-top: 100px;
      font-size: 32px;
      width: 300px;
    }
  }




</style>
