<template>
  <v-dialog v-model="dialogS" max-width="500">
    <template v-slot:activator="{ on, attrs }">
      <v-flex class="settings_btn">
        <v-btn icon
          ><v-icon color="blue" v-bind="attrs" v-on="on" large
            >mdi-wrench</v-icon
          ></v-btn
        >
      </v-flex>
    </template>

    <v-card class="main_settings_playground">
      <v-card-text>
        <v-row>
          <div class="playground_settings_title">
            <h1>Playground settings</h1>
          </div>
        </v-row>

        <v-row class="first_one">
          <v-col class="first_cols">
            <v-row>
              <v-avatar class="playground_avatar_change">
                <v-img :src="playground_avatar"> </v-img>
              </v-avatar>
            </v-row>

            <v-row>
              <v-btn class="btn_find_img" rounded>Change image</v-btn>
            </v-row>

            <div class="hidden-md-and-up">
              <v-btn class="toggle_btns fir" rounded @click="change_name = true"
                >Change Name</v-btn
              >
              <v-btn class="toggle_btns sec" rounded @click="add_channel = true"
                >Channel</v-btn
              >
            </div>

            <div class="hidden-sm-and-down">
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
            </div>
          </v-col>
          <v-col class="second_col hidden-sm-and-down">
            <div class="channel_list_title">
              <h1>Channel list:</h1>
            </div>
            <div class="list_of_channels">
              <v-list color="transparent">
                <v-list-item
                  v-for="(item, index) in playground_channels"
                  :key="index"
                >
                  <v-list-item-icon>
                    <v-icon v-text="item.icon_img" color="white"></v-icon>
                  </v-list-item-icon>
                  <v-list-item-content>
                    <v-list-item-title
                      class="white--text channel_list_items"
                      v-text="item.name"
                    >
                    </v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list>
              <AddChannel />
            </div>
          </v-col>
        </v-row>
      </v-card-text>

      <v-expand-transition>
        <v-card
          v-if="add_channel"
          class="transition-fast-in-fast-out add_cha_exp"
          style="height: 100%"
        >
          <v-card-text class="">
            <h1 class="title_pedning">Channel list</h1>
            <v-list color="transparent">
              <v-list-item
                v-for="(item, index) in playground_channels"
                :key="index"
              >
                <v-list-item-icon>
                  <v-icon v-text="item.icon_img" color="white"></v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title
                    class="white--text channel_list_items"
                    v-text="item.name"
                  >
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
            <AddChannel />
          </v-card-text>

          <v-card-actions class="pt-0">
            <v-btn text color="white accent-4" @click="add_channel = false">
              Close
            </v-btn>
          </v-card-actions>
        </v-card>

        <v-card
          v-if="change_name"
          class="transition-fast-in-fast-out add_cha_exp"
          style="height: 100%"
        >
          <v-card-text class="">
            <h1 class="title_pedning">Change name</h1>
            <v-row>
              <v-text-field
                class="playground_name_change"
                solo
                v-model="playground_name"
              ></v-text-field>
            </v-row>
          </v-card-text>
          <v-card-actions class="pt-0">
            <v-btn text color="white accent-4" @click="change_name = false">
              Close
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-expand-transition>
    </v-card>
  </v-dialog>
</template>

<script lang="ts">
import Vue from "vue";
import AddChannel from "@/components/Dialogs/addChannel.vue";
export default Vue.extend({
  components: { AddChannel },
  data() {
    return {
      playground_name: "Summer BBQ",
      playground_avatar: "https://cdn.vuetifyjs.com/images/lists/2.jpg",
      playground_channels: [
        { name: "Chill channel", icon_img: "mdi-message-text" },
      ],
      add_channel: false,
      change_name: false,
      dialogS: false,
    };
  },
});
</script>

<style>
.add_cha_exp {
  bottom: 0;
  opacity: 1 !important;
  position: absolute;
  width: 100%;
  background-color: black !important;
}

@media (max-width: 960px) {
  .main_settings_playground {
    margin-top: -50px;
  }
  .exit_btn_settings_playground {
    margin-top: -10px !important;
  }
  .playground_settings_title {
    font-size: 10px;
    margin-left: 10px;
    margin-top: 23px !important;
  }

  .first_cols {
    min-width: 30px !important;
  }
  .toggle_btns {
    background-color: #007abe !important;
    color: white !important;
    font-size: 10px !important;
    position: absolute;
    bottom: 0;
    margin-bottom: 10px;
  }
  .sec {
    right: 0;
    margin-right: 20px;
  }
  .fir {
    left: 0;
    margin-left: 20px;
  }
  .exit_btn {
    margin-top: -10px !important;
  }

  .playground_name_change {
    margin-top: 30px !important;
    margin-left: -50px !important;
  }
}

.change_name_div_exp {
  border: 1px solid blue;
  display: fixed;
  margin-top: -310px;
  background-color: black;
}

.change_name_texts {
  color: white !important;
}

.first_cols {
  min-width: 300px;
}
.channel_list_title {
  color: white;
}

.channel_list_items {
  font-size: 20px;
}

.change_name_div {
  color: white !important;
  margin: 0 auto;
  margin-top: 30px;
}
.playground_name_change .v-input__slot {
  max-width: 50% !important;
  margin: 0 auto;
  margin-top: 20px;
}

.first_one {
  margin: 0;
  height: 80%;
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
  border: 1px solid black !important;
  position: absolute;
  width: 80%;
  height: 60%;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto !important;
  background-color: black !important;
  border-radius: 30px;
  z-index: 10;
}
.playground_settings_title {
  color: white !important;
  margin-left: 10px;
  margin-top: 33px;
}

.exit_btn {
  border: 1px solid #007abe;
  background-color: #007abe !important;
  margin-top: 25px !important;
  margin-left: 10px;
}
</style>
