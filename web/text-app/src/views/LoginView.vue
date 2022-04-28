<template>
  <v-container class="fill-height justify-center">
    <v-card class="login_card rounded-xl" color="rgb(41, 41, 41, 0.6)">
      <v-card-title class="title_login">Login</v-card-title>
      <v-card-text>
        <input
          type="text"
          class="form_inputs"
          name="email"
          v-model="email"
          placeholder="Enter email..."
        />
        <span v-if="msg.email" class="email_error">{{ msg.email }}</span>
        <input
          type="password"
          class="form_inputs"
          name="password"
          v-model="password"
          placeholder="Password..."
        />
        <span v-if="msg.password" class="email_error">{{ msg.password }}</span>

        <v-checkbox
          label="Remember me"
          class="check_box_login"
          color="white"
        ></v-checkbox>
        <v-btn type="submit" class="submit_login_btn" v-on:click="loginFunc()"
          >Login</v-btn
        >
        <div class="member_text">
          <p>Not a member yet? <a href="/register">Register</a></p>
        </div>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script lang="ts">
import axios from "axios";
import Vue from "vue";
export default Vue.extend({
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      msg: [],
    };
  },
  watch: {
    email(value) {
      this.email = value;
      this.validateEmail(value);
    },
    password(value) {
      this.password = value;
      this.validPassword(value);
    },
  },
  methods: {
    loginFunc() {
      //getting data
      console.log(this.email, this.password);
      axios
        .post("http://127.0.0.1:8000/api/login", {
          email: this.email,
          password: this.password,
        })
        .then((res) => {
          console.log("logged in");
          console.log("This is the new token: " + res.data.token);
          localStorage.setItem("authToken", res.data.token);
        });
    },
    validateEmail(value) {
      /* eslint-disable no-useless-escape */
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
        this.msg["email"] = "";
      } else {
        this.msg["email"] = "Invalid Email Address";
      }
    },
    validPassword(value) {
      let difference = 8 - value.length;
      if (value.length < 8) {
        this.msg["password"] =
          "Must be 8 characters! " + difference + " characters left";
      } else {
        this.msg["password"] = "";
      }
    },
  },
});
</script>

<style>
.theme--light.v-label {
  color: white !important;
}
.login_card {
  width: 550px;
  height: 733px;
}
.email_error {
  color: red !important;
  font-size: 18px;
  margin-left: 45px;
}
.title_login {
  color: white;
  font-size: 50px !important;
  font-family: Arial;
  margin-top: 70px;
  margin-left: 40px;
}

.form_inputs {
  color: white;
  background-color: rgb(29, 29, 29);
  width: 90% !important;
  height: 66px;
  border-radius: 10px;
  margin-left: 40px;
  font-size: 18px;
  padding: 10px;
  margin-top: 10px;
}
.form_inputs::placeholder {
  color: rgba(0, 0, 0, 0, 5);
}
.check_box_login {
  margin-left: 40px;
  font-size: 18px !important;
  color: white !important;
}
.submit_login_btn {
  width: 90% !important;
  height: 68px !important;
  text-transform: capitalize !important;
  font-size: 28px !important;
  margin-left: 40px;
  color: white !important;
  background-color: #007abe !important;
  font-family: Arial;
}
.member_text {
  color: white;
  margin-left: 40px;
  margin-top: 20px;
  font-size: 20px;
}
@media (max-width: 780px) {
  .login_card {
    width: 395px;
    height: 493px;
  }
  .title_login {
    color: white;
    font-size: 40px !important;
    font-family: Arial;
    margin-left: 10px;
    margin-top: 30px;
  }
  .form_inputs {
    color: white;
    background-color: rgba(58, 58, 58, 1);
    width: 326px;
    height: 59px;
    border-radius: 10px;
    margin-left: 10px;
    font-size: 24px;
    padding: 10px;
    margin-top: 10px !important;
  }
  .email_error {
    color: red !important;
    font-size: 18px;
    margin-left: 25px;
  }
  .form_inputs::placeholder {
    color: rgba(0, 0, 0, 0, 5);
  }
  .check_box_login {
    margin-left: 10px;
    font-size: 18px !important;
    color: white !important;
  }
  .submit_login_btn {
    height: 59px !important;
    text-transform: capitalize !important;
    font-size: 28px !important;
    margin-left: 10px;
    color: white !important;
    background-color: #007abe !important;
    font-family: Arial;
  }
  .member_text {
    color: white;
    margin-left: 10px;
    margin-top: 20px;
    font-size: 20px;
  }
}
</style>
