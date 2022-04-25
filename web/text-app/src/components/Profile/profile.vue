<template>
  <v-card outlined color="transparent" class="main_profile_layout">
    <!-- here is going to be the image, name, settings btn  -->
    <div class="header_profile">
      <v-avatar class="avatar_image">
        <v-img :src="avatar"></v-img>
      </v-avatar>

      <p class="name_title">{{ name }}</p>

      <v-btn class="btn_settings" rounded :to="{ name: 'settings' }"
        >Settings</v-btn
      >
    </div>

    <!-- here is going to be a table of information -->
    <v-card-text>
      <div class="main_info">
        <v-row>
          <v-col class="first_col">
            <div class="about_info">
              <div class="about_title">
                <h1 class="titles_h1">About me</h1>
              </div>

              <!-- Here is going to be a list -->
              <v-list color="transparent" dense class="list_of_info">
                <v-list-item v-for="(item, index) in about_info" :key="index">
                  <v-list-item-content>
                    <v-list-item-title
                      v-text="item.name"
                      class="info_changer_class"
                    ></v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list>
            </div>
          </v-col>

          <v-col class="sec_col">
            <div class="dis_info">
              <div class="desc_title">
                <h1 class="titles_h1">Description</h1>
              </div>
              <p class="class_dis">{{ description }}</p>
            </div>
          </v-col>
          <v-col></v-col>
        </v-row>
      </div>
    </v-card-text>
    <div class="show_disc_button">
      <v-btn
        @click="showD = !showD"
        style="background-color: #007abe !important"
        class="white--text"
        >Description</v-btn
      >
    </div>

    <v-expand-transition>
      <v-card
        v-if="showD"
        class="transition-fast-in-fast-out v-card--desc"
        style="height: 50%"
      >
        <v-card-text>
          <div class="dis_info">
            <div class="desc_title">
              <h1 class="titles_h1">Description</h1>
            </div>

            <p class="class_dis">{{ description }}</p>
          </div>
        </v-card-text>
      </v-card>
    </v-expand-transition>
  </v-card>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  data() {
    return {
      avatar: "https://picsum.photos/350/165?random",
      name: "Monika Bog",
      showD: false,

      about_info: [
        { name: "Birth:", info: "" },
        { name: "Gender:", info: "" },
        { name: "Relationship:", info: "" },
        { name: "Country:", info: "" },
        { name: "Town:", info: "" },
        { name: "Phone:", info: "" },
      ],
      description:
        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when.",
    };
  },
});
</script>

<style>
.main_profile_layout {
  width: 100%;
  height: 100%;
  background-color: transparent;
}

/* css for header */
.header_profile {
  width: 100%;
  height: 20%;
  position: relative;
  padding-left: 10px;
  padding-top: 10px;
}
.avatar_image {
  width: 20% !important;
  height: 90% !important;
  max-height: 170px !important;
  max-width: 150px;
  min-width: 150px !important;
}

.main_info {
  width: 100%;
  height: 80%;
  margin-top: -100px;
}

.v-card--desc {
  bottom: 0;
  opacity: 1 !important;
  position: absolute;
  width: 100%;
  margin-bottom: 130px;
  background-color: black !important;
  border-radius: 10px 10px 20px 20px !important;
}

.name_title {
  font-size: 40px;
  color: white;
  margin-left: 160px;
  top: 0;
  position: absolute;
  padding-top: 10px;
}

.btn_settings {
  background-color: #007abe !important;
  color: white !important;
  margin-left: 10px;
  margin-top: 100px;
  position: absolute;
}

.divider_class {
  border-color: rgba(255, 255, 255, 1) !important;
  max-width: 180px;
  margin-left: 27px;
}
.divider_class_about {
  border-color: rgba(255, 255, 255, 1) !important;
  max-width: 150px;
  margin-left: 30px;
}

/* Here is the css for about me */

.about_title {
  min-width: 180px;
  padding-left: 35px;
  color: white;
}

/* Here is the css for dsc info */
.desc_title {
  min-width: 180px;
  color: white;
  padding-left: 35px;
}

/* This is the css for list */

.list_of_info {
  padding: 0;
  margin-left: 20px;
}

.info_changer_class {
  color: white;
  font-size: 20px !important;
}

/* This is the css for columns */

.first_col {
  min-width: 300px !important;
}
.sec_col {
  min-width: 300px !important;
}

/* desc */
.class_dis {
  padding-top: 5px;
  margin-left: 35px;
  font-size: 20px;
  color: white;
}
.show_disc_button {
  display: none;
}

@media (max-width: 960px) {
  .avatar_image {
    margin: 0;
    min-width: 120px !important;
    height: 120px !important;
  }
  .btn_settings {
    margin-left: 130px;
    margin-top: 80px;
  }
  .name_title {
    margin-top: 10px;
    font-size: 22px;
    margin-left: 130px;
  }
  .first_col {
    margin-left: -25px;
  }
  .sec_col {
    margin-left: -25px;
  }
  .main_info {
    width: 100%;
    height: 80%;
    margin-top: 0px;
  }
}

@media (max-height: 870px) {
  .sec_col {
    display: none;
  }
  .first_col {
    margin-top: 30px;
  }
  .show_disc_button {
    position: absolute;
    bottom: 0;
    margin-bottom: 70px;
    margin-left: 20px;
    background-color: #007abe !important;
    display: block;
  }
}
</style>
