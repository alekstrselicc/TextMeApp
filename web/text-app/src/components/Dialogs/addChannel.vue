<template>
  <div>
    <v-dialog v-model="dialogC" max-width="500">
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          v-bind="attrs"
          v-on="on"
          class="white--text custom_add_channel_button"
          color="white"
          text
          ><v-icon left class="icon_add">mdi-plus</v-icon>Add channel</v-btn
        >
      </template>
      <!-- Here is going to be the data -->
      <v-card class="card_add_channel">
        <div class="title_div"><h1 class="title_h1">Add channel</h1></div>
        <div class="search_email_div">
          <v-text-field label="Enter name" solo v-model="title"></v-text-field>
        </div>

        <div class="choose_btns">
          <v-btn-toggle v-model="text" tile group>
            <v-btn class="white--text btns" value="public">Public</v-btn>
            <v-divider vertical></v-divider>
            <v-btn class="white--text btns" value="private">Private</v-btn>
          </v-btn-toggle>
        </div>

        <div class="btn_add_friende">
          <v-btn class="add_friend_button" rounded @click="sendChannel()"
            >Add</v-btn
          >
        </div>
      </v-card>
    </v-dialog>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import axios from "axios";
import { mapActions, mapGetters } from "vuex";

export default Vue.extend({
  data() {
    return {
      dialogC: false,
      toggle_none: null,
      toggle_one: 0,
      toggle_exclusive: 2,
      toggle_multiple: [0, 1, 2],
      title: "",
      text: "",
    };
  },

  methods: {
    ...mapActions(["addingChannel"]),
    sendChannel() {
      this.addingChannel(this.title);
    },
  },
});
</script>

<style>
.main_add_channel {
  position: absolute;
  width: 300px;
  height: 300px;
}
.btns {
  font-size: 20px !important;
}
.custom_add_channel_button {
  margin-left: 20px;
}

.choose_btns {
  text-align: center;
}
.card_add_channel {
  width: 500px;
  border: 1px solid black !important;
  height: 300px;
  background-color: black !important;
  border-radius: 30px !important;
}
</style>
