<template>
    <v-container class="fill-height justify-center">
        <v-card class="login_card rounded-xl" color="rgb(41, 41, 41, 0.6)" >
                <v-card-title class="title_login">Login</v-card-title>
                <v-card-text>
                    <form ref="form" @submit.prevent="loginFunc()">
                        <input type="text" class="form_inputs mt-10" id="email" placeholder="Enter email...">
                        <input type="text" class="form_inputs mt-10" id="password" placeholder="Password...">

                        <v-checkbox label="Remember me" class="check_box_login" color="white" ></v-checkbox>
                        <v-btn class="submit_login_btn">Login</v-btn>
                        <div class="member_text">
                        <p>Not a member yet?      <a href="#">Register</a></p>
                        </div>
                    </form>
                </v-card-text>
        </v-card>
    </v-container>
</template>



<script lang="ts">
  import Vue from 'vue'
  export default Vue.extend({
      name:"Login", 
      data() {
          return {
              username: "", 
              password: "",
          };
      },
      methods: {
          loginFunc(){
              const { username } = this; 
          }
      }
  })
</script>


<style>
    .login_card{
        width:550px;  
        height: 733px; 
    }
    .title_login{
        color: white;
        font-size: 50px !important;
        font-family: Arial;
        margin-top: 70px;
        margin-left: 40px;
    }

    .form_inputs{
        color: white;
        background-color: rgba(58, 58, 58, 1);
        width: 460px;
        height: 66px;
        border-radius: 10px;
        margin-left: 40px;
        font-size: 28px;
        padding: 10px;
    }
    .form_inputs::placeholder{
        color: rgba(0, 0, 0, 0,5);
    }
    .check_box_login{
        margin-left: 40px;
        font-size: 18px !important;
        color: white !important;
    }
    .submit_login_btn{
        min-width: 460px!important;
        height: 68px !important;
        text-transform: capitalize !important;
        font-size: 28px !important;
        margin-left: 40px;
        color: white !important;
        background-color: #007ABE !important;
        font-family: Arial;
    }
    .member_text{
        color: white;
        margin-left: 40px;
        margin-top: 20px;
        font-size: 20px;
    }
    @media (max-width: 780px) {
        .login_card{
            width:395px;  
            height: 493px; 
        }
        .title_login{
            color: white;
            font-size: 40px !important;
            font-family: Arial;
            margin-left: 10px;
            margin-top: 30px;
        }
        .form_inputs{
            color: white;
            background-color: rgba(58, 58, 58, 1);
            width: 326px;
            height: 59px;
            border-radius: 10px;
            margin-left: 10px;
            font-size: 24px;
            padding: 10px;
        }
        .form_inputs::placeholder{
            color: rgba(0, 0, 0, 0,5);
        }
        .check_box_login{
            margin-left: 10px;
            font-size: 18px !important;
            color: white !important;
        }
        .submit_login_btn{
            min-width: 326px!important;
            height: 59px !important;
            text-transform: capitalize !important;
            font-size: 28px !important;
            margin-left: 10px;
            color: white !important;
            background-color: #007ABE !important;
            font-family: Arial;
        }
        .member_text{
            color: white;
            margin-left: 10px;
            margin-top: 20px;
            font-size: 20px;
        }
    }
    



</style>