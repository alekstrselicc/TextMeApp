<template>
  <div class="main_settings_div">
    <!-- Title and back btn -->
    <div class="settings_header">
      <v-btn icon class="back_button" :to="{ name: 'profile' }">
        <v-icon large color="white">mdi-arrow-left</v-icon></v-btn
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
              ><v-icon class="arr_hiden">mdi-arrow-left</v-icon></v-btn
            >
            <div class="title_settings_changer">
              <h1>User profile</h1>
            </div>
            <!-- Here is the image changer -->
            <v-row class="info_row">
              <v-col class="image_changer">
                <v-avatar class="image_changer_img"
                  ><v-img :src="profile.img"></v-img
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
                  <v-col class="info_col_class_first">Country: </v-col>
                  <v-col class="info_col_class">
                    <v-select
                      :items="countries"
                      item-text="country"
                      item-value="id"
                      solo
                      @change="select_country"
                      v-model="country"
                      class="relatin_class"
                    ></v-select
                  ></v-col>
                </v-row>
                <v-row class="rows_class">
                  <v-col class="info_col_class_first">Town: </v-col>
                  <v-col class="info_col_class">
                    <v-select
                      :items="towns"
                      item-text="town"
                      item-value="id"
                      solo
                      @change="selectTown"
                      v-model="town"
                      class="relatin_class"
                    ></v-select
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

                <v-row class="rows_class">
                  <v-col class="info_col_class_first">RelationShip</v-col>
                  <v-col class="info_col_class">
                    <v-select
                      :items="relations"
                      item-text="relationship"
                      solo
                      @change="selectRelation"
                      v-model="relation"
                      class="relatin_class"
                    ></v-select>
                    ></v-col
                  >
                </v-row>

                <v-row class="rows_class">
                  <v-col class="info_col_class_first">Gender</v-col>
                  <v-col class="info_col_class">
                    <v-select
                      :items="genders"
                      solo
                      color="black"
                      @change="selectGender"
                      class="selections"
                      v-model="gender"
                    ></v-select>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>

            <v-row class="btn_row">
              <v-btn
                class="btn_save justify-center"
                rounded
                @click="savaUserData()"
                >save</v-btn
              >
            </v-row>
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
import axios from "axios";

export default Vue.extend({
  name: "settings",

  data: () => ({
    svgPath: mdiCog,
    settings: [
      { name: "User profile", action: "user_profile" },
      { name: "Logout", action: "logout_profile" },
    ],
    profile: {
      username: "",
      relation: null,
      countryid: null,
      town: "",
      phone: "",
      gender: null,
      img: "",
      id: "",
    },
    relation: "",
    gender: "",
    genders: ["Male", "Female", "Other"],
    relations: [],

    countries: [],

    towns: [],

    visible: false,
    visible_btn: true,
  }),
  methods: {
    actions(action) {
      if (action === "user_profile") {
        this.showCart();
      } else if (action === "logout_profile") {
        axios.put("http://127.0.0.1:8000/api/user/" + this.profile.id, {
          status_id: 2,
        });

        axios.get("http://127.0.0.1:8000/api/logout").then((res) => {
          console.log("logged out ");
        });
        axios.defaults.headers.common["Authorization"] = "";
        localStorage.removeItem("authTokenAccess");
        localStorage.removeItem("refreshToken");

        this.$router.push("login");
      }
    },
    showCart() {
      this.visible = true;
    },
    hideCart() {
      this.visible = false;
    },

    selectGender(e) {
      if (e === "Male") {
        this.profile.gender = 1;
      } else {
        this.profile.gender = 2;
      }
    },
    selectRelation(e) {
      if (e === "single") {
        this.profile.relation = 1;
      } else {
        this.profile.relation = 2;
      }
    },
    select_country(e) {
      this.profile.countryid = e;
      axios
        .get("http://127.0.0.1:8000/api/towns/" + this.profile.countryid)
        .then((res) => {
          this.towns = res.data;
        });
    },
    selectTown(e) {
      this.profile.town = e;
    },

    //getTown(){},

    savaUserData() {
      //First save the gender, then save the id of the gender to user
      axios
        .put("http://127.0.0.1:8000/api/user/" + this.profile.id, {
          gender_id: this.profile.gender,
          relationship_id: this.profile.relation,
          country_id: this.profile.countryid,
          town_id: this.profile.town,
          mobile: this.profile.phone,
        })
        .then(() => {
          console.log("saveds");
        });
    },
  },
  created() {
    axios.get("http://127.0.0.1:8000/api/user").then(async (res) => {
      this.profile.username = res.data.first_name + " " + res.data.last_name;
      this.profile.phone = res.data.mobile;
      this.profile.img = res.data.img;
      this.profile.id = res.data.id;
      this.profile.gender = res.data.gender_id;
      this.profile.relation = res.data.relationship_id;
      this.profile.countryid = res.data.country_id;
      this.profile.town = res.data.town_id;

      if (this.profile.gender == 1) {
        this.gender = "Male";
      } else {
        this.gender = "Female";
      }
      if (this.profile.relation == 1) {
        this.relation = "single";
      } else {
        this.relation = "in-relationship";
      }

      await axios
        .get("http://127.0.0.1:8000/api/GetCountryByTown/" + res.data.town_id)
        .then((ress) => {
          this.country = { id: ress.data[0].id };
          this.town = { id: res.data.town_id };
        });
    });

    axios.get("http://127.0.0.1:8000/api/relationship").then((res) => {
      this.relations = res.data;
    });
    axios.get("http://127.0.0.1:8000/api/country").then((res) => {
      this.countries = res.data;
    });
    axios.get("http://127.0.0.1:8000/api/towns").then((res) => {
      this.towns = res.data;
    });
  },
});
</script>

<style>
@media (max-width: 1700px) {
  .col_settings {
    position: absolute;
  }
}

.v-select__selections {
  color: black !important;
}
.selections {
  min-height: 30px !important;
}
.selections,
.v-text-field.v-text-field--solo .v-input__control {
  min-height: 30px !important;
}
.theme--light.v-select .v-select__selections {
  color: black !important;
}

.image_changer {
  min-width: 270px !important;
}
.info_changer {
  min-width: 270px !important;
}

.image_changer_img {
  width: 100px !important;
  height: 100px !important;
  margin: 0 auto !important;
}

.btn_changer_img {
  background-color: #007abe !important;
  color: white !important;
  font-size: 12px !important;
  font-weight: bold !important;
  margin-left: 10px;
}

@media (max-width: 960px) {
  .settings_header {
    display: none;
  }
  .settings_div {
    margin-top: -15px !important;
    height: calc(100vh - 100px);
    min-height: 400px !important;
  }
  .info_row {
    height: calc(100vh - 200px) !important;
  }

  .image_changer_img {
    width: 90px !important;
    height: 90px !important;
    margin: auto !important;
  }
  .btn_changer_img {
    background-color: #007abe !important;
    color: white !important;
    margin-top: 15px;
    margin-left: 10px;
    display: inline-block;
    font-size: 12px !important;
    font-weight: bold !important;
    position: absolute;
  }
  .image_changer {
    min-width: 200px !important;
    height: 100px;
  }
  .info_changer {
    bottom: top;
    position: absolute;
    margin-top: 100px;
  }
  .btn_save {
    background-color: #007abe !important;
    color: white !important;
    width: 150px !important;
    margin: 0 auto;
  }
  .btn_row {
    position: absolute;
    bottom: 0;
  }
}

.btn_row {
  width: 100%;
  height: 50px;
  margin: 0;
}

.image_changer {
  min-height: 100px !important;
}

.back_btn_mobile {
  border: 1px solid #007abe !important;
  background-color: #007abe !important;
  margin-left: 15px;
  margin-top: -15px;
}

.info_row {
  margin: 0;
}

.btn_save {
  background-color: #007abe !important;
  color: white !important;
  width: 150px;
  margin: 0 auto;
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

.info_col_class_first {
  color: white;
  font-size: 20px;
}

.main_settings_div {
  height: 100%;
  width: 100%;
  position: relative;
}

.settings_div {
  width: 100% !important;
  background-color: rgba(0, 0, 0, 1) !important;
  border-radius: 30px;
  margin: 0;
  position: relative;
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
