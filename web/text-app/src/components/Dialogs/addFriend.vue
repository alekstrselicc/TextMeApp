<template>
  <div>
    <v-dialog v-model="dialogF" max-width="500">
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          v-bind="attrs"
          v-on="on"
          class="white--text custom_add_friend_button"
          color="white"
          text
          ><v-icon left class="icon_add">mdi-plus</v-icon>Add friend</v-btn
        >
      </template>
      <!-- Here is going to be the data -->
      <v-card class="card_add_friend">
        <div class="title_div"><h1 class="title_h1">Adding friend</h1></div>
        <div class="subtitle_div"><h2>Searh by mail</h2></div>
        <div class="search_email_div">
          <v-text-field v-model="email" label="Enter mail" solo></v-text-field>
        </div>

        <v-divider color="white" class="divider_add"></v-divider>
        <div class="subtitle_div"><h2>Searh by id</h2></div>
        <div class="search_email_div">
          <v-text-field label="Enter id" solo></v-text-field>
        </div>
        <div class="btn_add_friende">
          <v-btn class="add_friend_button" @click="search()">Add</v-btn>
        </div>
      </v-card>
    </v-dialog>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import axios from "axios";

export default Vue.extend({
  data() {
    return {
      dialogF: false,
      email: "",
    };
  },

  watch: {
    searchEmail(value) {
      this.email = value;
    },
  },
  methods: {
    search() {
      axios
        .get("http://127.0.0.1:8000/api/search_by_email/" + this.email)
        .then((res) => {
          axios
            .post("http://127.0.0.1:8000/api/friend_request", {
              status: "pending",
              created_at: "9999-12-31 23:59:59",
              sender: res.data.auth_id,
              approver: res.data.user_id,
            })
            .then((res) => {
              console.log("friend_requests sent");
            });
        });
    },
  },
});
</script>

<style>
.divider_add {
  border: 1px solid white !important;
  width: 80%;
  margin-left: 50px;
}

.card_add_friend {
  width: 500px;
  border: 1px solid black !important;
  height: 400px;
  background-color: black !important;
  border-radius: 30px !important;
}
.add_friend_button {
  color: white !important;
  background-color: #007abe !important;
  margin-top: 10px;
}
.btn_add_friende {
  width: 100% !important;
  height: 50px !important;
  text-align: center !important;
}
.subtitle_div {
  margin-top: 20px;
  color: white !important;
  text-align: center;
}
.search_email_div {
  width: 60% !important;
  margin-left: 20%;
  margin-top: 10px;
}
.search_email_div .v-text-field.v-text-field--solo .v-input__control {
  min-height: 40px !important;
  border-radius: 15px !important;
}
</style>
