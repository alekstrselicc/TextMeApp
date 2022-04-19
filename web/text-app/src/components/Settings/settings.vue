<template>
  <div class="main_settings_div">
    <!-- Title and back btn -->
    <div class="settings_header">
      <v-btn icon class="back_button"
        ><v-icon large color="white">mdi-arrow-left</v-icon></v-btn
      >
      <v-icon large color="white" class="settings_icon">{{ svgPath }}</v-icon>
      <h1 class="title_settings">Settings</h1>
    </div>

    <div class="settings_main" v-if="this.visible_btn">
      <!--<div class="mobile_settings" v-if="this.visible"></div>-->
      <v-row class="first_row">
        <v-col class="col_buttons">
          <v-list color="transparent" rounded class="list_settings_buttons">
            <v-list-item-group class="group_class">
              <v-list-item
                v-for="(item, index) in settings"
                :key="index"
                class="item_class"
                @click="actions(item.action)"
              >
                <v-list-item-content class="content_class">
                  <v-list-item-title
                    v-text="item.name"
                    class="title_class"
                  ></v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list-item-group>
          </v-list>
        </v-col>

        <v-col class="col_settings">
          <div class="settings_div" v-if="this.visible">
            <v-btn
              color="white"
              class="back_btn_mobile"
              icon
              @click="hideCart()"
              ><v-icon>mdi-arrow-left</v-icon></v-btn
            >
            <div class="title_settings_changer">
              <h1>User profile</h1>
            </div>
            <!-- Here is the image changer -->
            <v-row class="info_row">
              <v-col class="image_changer">
                <v-avatar class="image_changer_img"
                  ><v-img
                    src="https://randomuser.me/api/portraits/men/1.jpg"
                  ></v-img
                ></v-avatar>
                <v-btn class="btn_changer_img" rounded>change image</v-btn>
              </v-col>
              <!-- Here is the info changer -->
              <v-col class="info_changer" xs12>
                <v-row class="rows_class">
                  <v-col class="info_col_class_first">Username:</v-col>
                  <v-col class="info_col_class">
                    <v-text-field
                      v-model="profile.username"
                      class="info_text_field"
                      outlined
                      rounded
                    ></v-text-field>
                  </v-col>
                </v-row>

                <v-row class="rows_class">
                  <v-col class="info_col_class_first">RelationShip:</v-col>
                  <v-col class="info_col_class">
                    <v-text-field
                      v-model="profile.relation"
                      class="info_text_field"
                      outlined
                      rounded
                    ></v-text-field
                  ></v-col>
                </v-row>
                <v-row class="rows_class">
                  <v-col class="info_col_class_first">Country: </v-col>
                  <v-col class="info_col_class">
                    <v-text-field
                      v-model="profile.country"
                      class="info_text_field"
                      outlined
                      rounded
                    ></v-text-field
                  ></v-col>
                </v-row>
                <v-row class="rows_class">
                  <v-col class="info_col_class_first">Town: </v-col>
                  <v-col class="info_col_class">
                    <v-text-field
                      v-model="profile.town"
                      class="info_text_field"
                      outlined
                      rounded
                    ></v-text-field
                  ></v-col>
                </v-row>
                <v-row class="rows_class">
                  <v-col class="info_col_class_first">Phone</v-col>
                  <v-col class="info_col_class">
                    <v-text-field
                      v-model="profile.phone"
                      class="info_text_field"
                      outlined
                      rounded
                    ></v-text-field
                  ></v-col>
                </v-row>
              </v-col>
            </v-row>
            <v-btn class="btn_save">save</v-btn>
          </div>
        </v-col>
      </v-row>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import { mdiCog } from "@mdi/js";
import VueScreenSize from "vue-screen-size";

export default Vue.extend({
  name: "settings",
  data: () => ({
    svgPath: mdiCog,
    settings: [
      { name: "User profile", action: "user_profile" },
      { name: "Logout", action: "logout_profile" },
    ],
    profile: {
      username: "Monika Bog",
      relation: "Single",
      country: "Slovenia",
      town: "Maribor",
      phone: "0654321321",
    },
    visible: false,
    visible_btn: true,
  }),
  methods: {
    actions(action) {
      if (action === "user_profile") {
        this.showCart();
        console.log(VueScreenSize.vssWidth);
      }
    },
    showCart() {
      this.visible = true;
    },
    hideCart() {
      this.visible = false;
    },
  },
});
</script>

<style>
@media (max-width: 1700px) {
  .col_settings {
    position: absolute;
  }
  .mobile_settings {
    display: none;
    border: 1px solid black;
    width: 100%;
    position: absolute;
    height: 80%;
  }
  .back_btn_mobile {
    border: 1px solid #007abe !important;
    background-color: #007abe !important;
    margin-left: 15px;
    margin-top: -15px;
  }

  .image_changer {
    width: 100%;
  }
}
@media (max-width: 960px) {
  .settings_header {
    display: none;
  }
  .settings_div {
    min-height: 600px !important;
  }
}
.btn_save {
  position: absolute;
  bottom: 0;
}

.back_btn_mobile {
  display: hidden;
}
.info_text_field {
  height: 50px;
}
.v-text-field--outlined > .v-input__control > .v-input__slot {
  min-height: 30px;
  background-color: white;
  border-color: white;
}
.rows_class {
  height: 50px;
}
.image_changer {
  min-width: 200px !important;
}

.image_changer_img {
  min-width: 150px !important;
  height: 150px !important;
  margin-left: 25%;
}
.btn_changer_img {
  background-color: #007abe !important;
  color: white !important;
  margin-top: 10px;
  margin-left: 25%;
}
.info_col_class_first {
  color: white;
  font-size: 20px;
}

.info_changer {
  min-width: 300px !important;
}

.main_settings_div {
  height: 100%;
  width: 100%;
  position: relative;
}

.info_row {
  margin: 0;
  height: 400px !important;
}
.image_changer {
  max-width: 45% !important;
}

.settings_div {
  width: 100% !important;
  min-height: 500px;
  background-color: rgba(0, 0, 0, 1) !important;
  border-radius: 30px;
  margin: 0;
}
.title_settings_changer {
  height: 10%;
  color: white;
  padding-left: 20px;
  padding-top: 5px;
  display: inline-block;
}
.settings_header {
  height: 10%;
  width: 100%;
}
.settings_main {
  height: 90%;
}

.first_row {
  width: 100%;
  height: 100%;
  margin: 0;
}
.col_buttons {
  max-width: 35% !important;
  min-width: 300px !important;
}

.back_button {
  border: 1px solid #007abe !important;
  background-color: #007abe !important;
  margin-left: 20px;
  margin-top: -15px;
}
.settings_icon {
  margin-left: 10px;
  margin-top: -15px;
}

.title_settings {
  display: inline-block;
  margin-left: 10px;
  margin-top: 40px;
  color: white;
}

.item_class {
  background-color: rgba(0, 0, 0, 1) !important;
}

.title_class {
  font-size: 24px;
  color: white;
  padding: 5px;
}
</style>
