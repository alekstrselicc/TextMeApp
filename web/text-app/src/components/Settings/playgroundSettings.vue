<template>
  <div class="main_settings_playground">
    <v-row>
      <div class="exit_btn_settings_playground">
        <v-btn class="exit_btn" icon>
          <v-icon color="white">mdi-arrow-left</v-icon>
        </v-btn>
      </div>
      <div class="playground_settings_title"><h1>Playground settings</h1></div>
    </v-row>

    <v-row class="first_one">
      <v-col class="first_col">
        <v-row>
          <v-avatar class="playground_avatar_change">
            <v-img :src="playground_avatar"> </v-img>
          </v-avatar>
        </v-row>

        <v-row>
          <v-btn class="btn_find_img" rounded>Change image</v-btn>
        </v-row>
        <v-row>
          <div class="change_name_div"><h1>Change name</h1></div>
        </v-row>
        <v-row>
          <v-text-field
            class="playground_name_change"
            solo
            v-model="playground_name"
          ></v-text-field>
        </v-row>
      </v-col>
      <v-col class="second_col">
        <div class="channel_list_title">
          <h1>Channel list:</h1>
        </div>
        <div class="list_of_channels">
          <v-list color="transparent">
            <v-list-item
              v-for="(item, index) in playground_channels"
              :key="index"
            >
              <v-list-item-content>
                <v-list-item-title class="white--text" v-text="item.name">
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </div>
      </v-col>
    </v-row>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  data() {
    return {
      playground_name: "Summer BBQ",
      playground_avatar: "https://cdn.vuetifyjs.com/images/lists/2.jpg",
      playground_channels: [{ name: "Chill channel" }],
    };
  },
});
</script>

<style>
.channel_list_title {
  color: white;
}

.change_name_div {
  color: white !important;
  margin: 0 auto;
  margin-top: 30px;
}
.playground_name_change .v-input__slot {
  max-width: 50% !important;
  margin: 0 auto;
}

.first_one {
  border: 1px solid white;
  margin: 0;
  height: 80%;
}
.first_col {
  border: 1px solid red;
}
.second_col {
  border: 1px solid blue;
}
.playground_avatar_change {
  margin: 0 auto;
  width: 30% !important;
  height: 30% !important;
  margin-top: 10px;
}
.btn_find_img {
  margin: 0 auto;
  margin-top: 10px;
  background-color: #007abe !important;
  color: white !important;
}

.playground_name_change .v-text-field.v-text-field--solo .v-input__control {
  margin: 0 auto;
  width: 70% !important;
}

.main_settings_playground {
  border: 1px solid black;
  position: absolute;
  width: 90%;
  height: 60%;
  left: 0;
  right: 0;
  margin-left: auto;
  margin-right: auto;
  background-color: black;
  border-radius: 30px;
}
.playground_settings_title {
  color: white !important;
  margin-left: 10px;
  margin-top: 20px;
}
.exit_btn_settings_playground {
  margin-left: 10px;
}
.exit_btn {
  border: 1px solid #007abe;
  background-color: #007abe !important;
  margin-top: 25px !important;
  margin-left: 10px;
}
@media (max-width: 960px) {
  .main_settings_playground {
    margin-top: -50px;
  }
  .playground_settings_title {
    font-size: 11px;
    margin-left: 10px;
    margin-top: 27px;
  }
}
</style>
