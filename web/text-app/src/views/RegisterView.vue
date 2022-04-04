<template>
  <v-container class="fill-height justify-center">
        <v-card class="register_card rounded-xl" color="rgb(41, 41, 41, 0.6)" >
            <v-card-title class="title_regiser">Sign up</v-card-title>
            <v-row class="row_register">
              <v-col class="custom_cols">
                  <input type="text" class="form_inputs mt-5" id="first_name" placeholder="First name...">
              </v-col>
               <v-col class="custom_cols">
                  <input type="text" class="form_inputs mt-5" id="last_name" placeholder="Last name...">
              </v-col>
            </v-row>
            <v-row class="row_register">
              <v-col class="custom_cols">
                  <input type="text" class="form_inputs" id="email" placeholder="Email...">
              </v-col>
               <v-col class="custom_cols">
                  <input type="text" class="form_inputs" id="confirm_mail" placeholder="Confirm email...">
              </v-col>
            </v-row>
        </v-card>
    </v-container>
</template>


<script lang="ts">
  import Vue from 'vue'
  export default Vue.extend({
      name:"Register"
  })
</script>


<style>
    .register_card{
      width:703px;  
      height: 733px; 
    }
    .title_regiser{
      color: white;
      font-size: 50px !important;
      font-family: Arial;
      margin-left: 10px;
      margin-top: 40px;
    }
    .row_register{
      margin-left: 10px;
    }
    .form_inputs{
      color: white;
      background-color: rgba(58, 58, 58, 1);
      width: 283px;
      height: 57px;
      border-radius: 10px;
      font-size: 28px;
      padding: 10px;
    }
    .custom_cols{
      max-width: 290px;
    }



</style>
