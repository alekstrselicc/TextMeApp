<template>
  <v-container class="fill-height justify-center">
    <v-card class="register_card rounded-xl" color="rgb(41, 41, 41, 0.6)">
      <v-card-title class="title_regiser">Sign up</v-card-title>

      <v-layout row wrap class="main_layout ml-6">
        <v-flex lg6>
          <input
            type="text"
            v-model="first_name"
            class="form_inputss"
            id="first_name"
            placeholder="First name..."
            v-bind="attrs"
            v-on="on"
          />
        </v-flex>

        <v-flex lg6
          ><input
            type="text"
            v-model="last_name"
            class="form_inputss"
            id="last_name"
            placeholder="Last name..."
        /></v-flex>
      </v-layout>

      <v-layout row wrap class="main_layout ml-6">
        <v-flex lg6
          ><input
            type="text"
            v-model="email"
            class="form_inputss"
            id="email"
            placeholder="Email..."
        /></v-flex>
        <v-flex lg6
          ><input
            type="text"
            v-model="email_conf"
            class="form_inputss"
            id="confirm_mail"
            placeholder="Confirm email..."
        /></v-flex>
      </v-layout>
      <v-layout row wrap class="main_layout ml-6">
        <v-flex lg6
          ><input
            type="password"
            v-model="password"
            class="form_inputss"
            id="password"
            placeholder="Password..."
        /></v-flex>
        <v-flex lg6
          ><input
            type="password"
            v-model="password_conf"
            class="form_inputss"
            id="confirm_password"
            placeholder="Confirm password..."
        /></v-flex>
      </v-layout>
      <v-layout row wrap class="main_layout ml-6">
        <v-flex sm2 xs2><p class="birth_date">Birth</p></v-flex>
        <v-flex sm2 xs2
          ><v-select
            :items="days"
            solo
            class="day_selector theme--dark"
            placeholder="D"
            v-model="dayS"
            @change="select_day"
          ></v-select
        ></v-flex>
        <v-flex sm2 xs2 offset-1
          ><v-select
            :items="months"
            solo
            class="month_selector theme--dark"
            placeholder="M"
            v-model="monS"
            @change="select_mon"
          ></v-select
        ></v-flex>
        <v-flex sm4 xs4 offset-1
          ><v-select
            :items="years"
            solo
            class="year_selector theme--dark"
            placeholder="Y"
            v-model="yearS"
            @change="select_year"
          ></v-select
        ></v-flex>
      </v-layout>

      <v-layout row wrap class="main_layout ml-6 mt-n5">
        <v-flex lg6 md6
          ><v-select
            :items="countrys"
            solo
            class="country_selector theme--dark"
            placeholder="Select country..."
            @change="select_country"
          ></v-select
        ></v-flex>
        <v-flex lg6 md6
          ><input
            type="text"
            class="form_inputss custom_phone"
            id="phone"
            v-model="phone"
            placeholder="Phone..."
        /></v-flex>
      </v-layout>

      <div class="main_layout_terms">
        <v-checkbox
          label="I agree to the Terms of Use, Privacy Policy"
          class="check_box_login theme--light ml-2"
          >deas</v-checkbox
        >
      </div>

      <v-layout row wrap class="main_layout">
        <v-flex
          ><v-btn
            type="submit"
            class="register_submit_class justify-center"
            @click="sendFrom()"
            >Sign up</v-btn
          ></v-flex
        >
      </v-layout>
    </v-card>
  </v-container>
</template>

<script lang="ts">
import axios from "axios";
import Vue from "vue";
export default Vue.extend({
  name: "Register",
  data() {
    return {
      days: [],
      months: [],
      years: [],

      countrys: ["Slovenia", "Germany", "UK", "United states"],
      showFirstName: false,

      day: "",
      mon: "",
      year: "",

      first_name: "",
      last_name: "",
      email: "",
      password: "",
      country: "",
      phone: "",
      gender: "",
      birth: "",
      img: "https://picsum.photos/350/165?random",

      errors: [],
    };
  },
  created() {
    for (let index = 1; index < 32; index++) {
      this.days[index - 1] = index;
    }
    var i = 2022;
    for (let index = 0; index < 123; index++) {
      this.years[index] = i;
      i--;
    }
    for (let index = 1; index < 13; index++) {
      this.months[index - 1] = index;
    }
  },
  methods: {
    select_day(e) {
      this.day = e;
    },
    select_mon(e) {
      this.mon = e;
    },
    select_year(e) {
      this.year = e;
    },
    select_country(e) {
      this.country = e;
    },
    select_gender(e) {
      this.gender = e;
    },

    sendFrom() {
      axios
        .post("http://127.0.0.1:8000/api/register", {
          first_name: this.first_name,
          last_name: this.last_name,
          email: this.email,
          password: this.password,
          country: this.country,
          mobile: this.phone,
          birth: this.year + "-" + this.mon + "-" + this.day,
          img: this.img,
          gender: this.gender,
        })
        .then((response) => {
          console.log("saved");
        })
        .catch((error) => {
          this.error = error.response.data.errors;
          console.log(error);
        });
    },
  },
});
</script>

<style>
/* better layout */
.register_card {
  width: 650px;
  height: 733px;
}
.title_regiser {
  color: white;
  font-size: 50px !important;
  font-family: Arial;
  margin-left: 10px;
  margin-top: 40px;
}
.main_layout {
  margin: 0;
  padding: 0;
}
.main_layout_terms {
  margin-left: 15px;
  margin-top: -20px;
}

.form_inputss {
  color: white;
  background-color: rgb(29, 29, 29);
  width: 283px;
  height: 55px;
  border-radius: 10px;
  font-size: 18px;
  padding: 10px;
}

.birth_date {
  color: white;
  font-family: Arial;
  font-size: 36px;
}
.day_selector {
  width: 120px;
  height: 57px;
}
.month_selector {
  width: 133px;
  height: 57px;
}
.year_selector {
  width: 130px;
  height: 57px;
}
.country_selector {
  width: 90% !important;
}

.register_submit_class {
  width: 90% !important;
  height: 68px !important;
  text-transform: capitalize !important;
  font-size: 28px !important;
  margin-left: 25px;
  color: white !important;
  background-color: #007abe !important;
  font-family: Arial;
}

@media (max-width: 780px) {
  .register_card {
    width: 395px;
    height: 100% !important;
  }
  .register_submit_class {
    width: 90% !important;
    height: 60px !important;
    text-transform: capitalize !important;
    font-size: 28px !important;
    margin-left: 25px;
    margin-top: -10px;
    color: white !important;
    background-color: #007abe !important;
    font-family: Arial;
  }
  .main_layout_terms {
    margin-top: -10px;
  }
  .title_regiser {
    font-size: 40px !important;
  }
  .form_inputss {
    margin-top: 10px;
    width: 90%;
  }
  .birth_date {
    color: white;
    font-family: Arial;
    font-size: 24px;
  }
  .day_selector {
    width: 80px;
  }
  .day_selector::placeholder {
    color: rgb(250, 215, 215);
  }
  .month_selector {
    width: 80px;
    margin-left: 10px;
  }
  .year_selector {
    width: 95px;
  }
  .country_selector {
    width: 340px !important;
    height: 57px;
  }
  .custom_phone {
    margin-right: 110px;
    margin-top: -3px;
  }
  .country_selector {
    width: 90% !important;
  }
}

@media (max-height: 850px) {
  .title_regiser {
    font-size: 30px !important;
    margin-top: 0px;
  }
  .form_inputss {
    height: 40px !important;
  }
  .v-text-field.v-text-field--solo .v-input__control {
    width: 120px;
    min-height: 30px !important;
  }
  .register_submit_class {
    height: 50px !important;
    width: 80% !important;
    margin-left: 30px;
    margin-bottom: 5px;
  }
  .birth_date {
    font-size: 18px;
  }
  .day_selector {
    min-width: 70px;
  }
  .month_selector {
    min-width: 70px !important;
  }
}
</style>
