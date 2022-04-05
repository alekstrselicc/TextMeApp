<template>
  <v-container class="fill-height justify-center">
        <v-card class="register_card rounded-xl" color="rgb(41, 41, 41, 0.6)" >
            <v-card-title class="title_regiser">Sign up</v-card-title>
            
            <v-layout row wrap class="main_layout ml-6">
              <v-flex lg6><input type="text" class="form_inputs" id="first_name" placeholder="First name..."></v-flex>
              <v-flex lg6><input type="text" class="form_inputs" id="last_name" placeholder="Last name..."></v-flex>
            </v-layout>

            <v-layout row wrap class="main_layout ml-6">
              <v-flex lg6><input type="text" class="form_inputs" id="email" placeholder="Email..."></v-flex>
              <v-flex lg6><input type="text" class="form_inputs" id="confirm_mail" placeholder="Confirm email..."></v-flex>
            </v-layout>
            <v-layout row wrap class="main_layout ml-6">
              <v-flex lg6><input type="password" class="form_inputs" id="password" placeholder="Password..."></v-flex>
              <v-flex lg6><input type="password" class="form_inputs" id="confirm_password" placeholder="Confirm password..."></v-flex>
            </v-layout>
            <v-layout row wrap class="main_layout ml-6">
              <v-flex sm2 xs2 ><p class="birth_date">Birth:</p></v-flex>
              <v-flex sm2 xs2 ><v-select :items="days" solo class="day_selector theme--dark" placeholder="D"></v-select></v-flex>
              <v-flex sm2 xs2 offset-1><v-select :items="months" solo class="month_selector theme--dark" placeholder="M"></v-select></v-flex>
              <v-flex sm4 xs4 offset-1><v-select :items="years" solo class="year_selector theme--dark" placeholder="Y"></v-select></v-flex>
            </v-layout>

            <v-layout row wrap class="main_layout ml-6 mt-n5">
              <v-flex lg6 md6><v-select :items="days" solo class="country_selector theme--dark" placeholder="Select country..."></v-select></v-flex>
              <v-flex lg6 md6><input type="text" class="form_inputs custom_phone" id="phone" placeholder="Phone..."></v-flex>
            </v-layout>
            <div class="main_layout_terms">
              <v-checkbox label="I agree to the Terms of Use, Privacy Policy" class="check_box_login theme--light ml-2"  >deas</v-checkbox>
            </div>

            <v-layout row wrap class="main_layout ml-3">
              <v-flex><v-btn type="submit" class="register_submit_class justify-center" to="/login">Sign up</v-btn></v-flex>
            </v-layout>

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

    /* better layout */
    .register_card{
      width:703px;  
      height: 600px; 
    }
    .title_regiser{
      color: white;
      font-size: 50px !important;
      font-family: Arial;
      margin-left: 10px;
      margin-top: 40px;
    }
    .main_layout{
      max-width: 650px;
      margin: 0;
      padding: 0;    
    }
    .main_layout_terms{
      margin-left: 15px;
      margin-top: -20px;
    }

    .form_inputs{
      color: white;
      background-color: rgb(29, 29, 29);
      width: 283px;
      height: 55px;
      border-radius: 10px;
      font-size: 18px;
      padding: 10px;
    }

    .birth_date{
      color: white;
      font-family: Arial;
      font-size: 36px;
    }
    .day_selector{
      width: 120px;
      height: 57;
    }
    .month_selector{
      width: 133px;
      height: 57;
    }
    .year_selector{
      width: 130px;
      height: 57;
    }
    .country_selector{
      width: 280px; 
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


    @media (max-width: 780px) {
      .register_card{
        width:395px;  
        height: 813px; 
      }
    .register_submit_class{
      min-width: 300px!important;
      height: 60px !important;
      text-transform: capitalize !important;
      font-size: 28px !important;
      margin-left: 35px;
      margin-top: -10px;
      color: white !important;
      background-color: #007ABE !important;
      font-family: Arial;
    }
      .main_layout_terms{
        margin-top: -10px;
      }
      .title_regiser{
        font-size: 40px !important;
      }
      .form_inputs{
        margin-top: 10px;
        width:340px;
      }
      .birth_date{
        color: white;
        font-family: Arial;
        font-size: 24px;
      }
      .day_selector{
        width: 80px;
      }
      .day_selector::placeholder{
        color: rgb(250, 215, 215);
      }
      .month_selector{
        width: 80px;
        margin-left: 10px;
      }
      .year_selector{
        width: 95px;
      }
      .country_selector{
        width: 340px !important; 
        height: 57px;
      }
      .custom_phone{
        margin-right: 110px;
        margin-top: -3px;
      }


    }






</style>
