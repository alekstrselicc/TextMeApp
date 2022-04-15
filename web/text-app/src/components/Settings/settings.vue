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

    <div class="settings_main">
      <v-row class="first_row">
        <v-col class="col_buttons">
          <v-list color="transparent" rounded>
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
        <v-col class="col_settings"
          ><div class="settings_div" v-if="this.visible">delat</div></v-col
        >
      </v-row>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import { mdiCog } from "@mdi/js";

export default Vue.extend({
  name: "settings",
  data: () => ({
    svgPath: mdiCog,
    settings: [
      { name: "User profile", action: "user_profile" },
      { name: "Logout", action: "logout_profile" },
    ],
    visible: false,
  }),
  methods: {
    actions(action) {
      if (action === "user_profile") {
        this.showCart();
      } else {
        alert("bye bye");
      }
    },
    showCart() {
      this.visible = true;
    },
  },
});
</script>

<style>
.main_settings_div {
  height: 100%;
  width: 100%;
}

.settings_div {
  height: 50%;
  background-color: rgba(0, 0, 0, 0.4) !important;
  border-radius: 30px;
}

.settings_header {
  border: 1px solid white;
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
  border: 1px solid red;
  max-width: 35% !important;
  min-width: 300px !important;
}

.col_settings {
  border: 1px solid blue;
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
.group_class {
  padding-top: 5px;
}

.item_class {
  background-color: rgba(0, 0, 0, 0.4) !important;
}

.title_class {
  font-size: 24px;
  color: white;
  padding: 5px;
}
</style>
