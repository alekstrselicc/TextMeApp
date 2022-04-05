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

            <v-row class="row_register">
              <v-col class="custom_cols">
                  <input type="password" class="form_inputs" id="password" placeholder="Password...">
              </v-col>
               <v-col class="custom_cols">
                  <input type="password" class="form_inputs " id="confirm_password" placeholder="Confirm password...">
              </v-col>
            </v-row>
            
            <v-row class="row_register_date">
              <v-col class="birth_date" ><p>Birth:</p></v-col>
              <v-col><v-select :items="days" solo class="day_selector theme--dark" placeholder="Days"></v-select></v-col>
              <v-col><v-select :items="months" solo class="month_selector theme--dark" placeholder="Months"></v-select></v-col>
              <v-col><v-select :items="years" solo class="year_selector theme--dark" placeholder="Years"></v-select></v-col>
            </v-row>

            <v-row class="row_register_country">
              <v-col><v-select :items="days" solo class="country_selector theme--dark" placeholder="Select country..."></v-select></v-col>
              <v-col><input type="text" class="form_inputs custom_phone" id="phone" placeholder="Phone..."></v-col>
            </v-row> 

            <v-row class="row_register">
              <v-checkbox label="I agree to the Terms of Use, Privacy Policy" class="check_box_login theme--light ml-2"  >deas</v-checkbox>
            </v-row>

            <v-row class="row_register">
              <v-btn type="submit" class="register_submit_class justify-center" to="/login">Sign up</v-btn>
            </v-row>


        </v-card>
    </v-container>
</template>


<script lang="ts">
  import Vue from 'vue'
  export default Vue.extend({
      name:"Register",

      data() {
        return {
          days: ["1", "2", "3", "4", "5", "6"],
          months: ["jan", "feb", "mar"],
          years: ["1200", "2000"],
        }
      }
  })
</script>


<style>
    .register_card{
      width:703px;  
      height: 733px; 
    }
    .register_submit_class{
      min-width: 460px!important;
      height: 68px !important;
      text-transform: capitalize !important;
      font-size: 28px !important;
      margin-left: 100px;
      color: white !important;
      background-color: #007ABE !important;
      font-family: Arial;
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
    .row_register_date{
      margin-left: 10px;
      max-width: 600px; 
    }
    .row_register_country{
      margin-left: 10px; 
    }
    .form_inputs{
      color: white;
      background-color: rgb(29, 29, 29);
      width: 283px;
      height: 55px;
      border-radius: 10px;
      font-size: 28px;
      padding: 10px;
    }
    .custom_cols{
      max-width: 290px;
    }
    .birth_date{
      color: white;
      font-family: Arial;
      font-size: 36px;
      margin-left: 10px;
    }
    .day_selector{
      width: 107px;
      height: 57;
    }
    .month_selector{
      width: 133px;
      height: 57;
    }
    .year_selector{
      width: 137px;
      height: 57;
    }
    .country_selector{
      width: 248px; 
      height: 57px;
    }
    .country_selector::placeholder{
      color: black !important;
    }
    .custom_phone{
      margin-right: 110px;
      margin-top: -3px;
    }
   v-select::placeholder{
     
   }

</style>
