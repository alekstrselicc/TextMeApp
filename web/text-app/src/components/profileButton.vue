<template>
  <v-layout class="btn_layout">
    <!-- Clickable icon -->
    <v-flex class="btn_icon">
      <v-btn icon>
        <v-avatar size="70">
          <img src="https://randomuser.me/api/portraits/men/1.jpg" />
        </v-avatar>
      </v-btn>
    </v-flex>

    <!-- Clickable text -->
    <v-flex class="btn_text">
      <a href="/main" class="btn_text_edit">Monika Bog</a>
    </v-flex>

    <!-- Status menu -->
    <v-flex class="btn_status">
      <v-select :items="items" class="white--text select_status">
        <template v-slot:selection="{ item }">
          <img :src="item.image" class="image_status" />{{ item.name }}
        </template>
        <template v-slot:item="{ item }">
          <img :src="item.image" class="image_status" />{{ item.name }}
        </template>
      </v-select>
    </v-flex>

    <!-- Invites button -->
    <v-flex class="btn_invites">
      <v-badge color="red" content="4" offset-y="10" offset-x="10">
        <v-btn icon>
          <v-icon color="white" large>mdi-account</v-icon>
        </v-btn>
      </v-badge>
    </v-flex>
  </v-layout>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  name: "profileButton",
  data: () => ({
    items: [
      {
        name: "Online",
        image:
          "https://www.gravatar.com/avatar/b17065ea1655f1e3283aac8d8fc16019?s=48&d=identicon&r=PG",
      },
      {
        name: "Away",
        image:
          "https://www.gravatar.com/avatar/b17065ea1655f1e3283aac8d8fc16019?s=48&d=identicon&r=PG",
      },
      {
        name: "Busy",
        image:
          "https://www.gravatar.com/avatar/b17065ea1655f1e3283aac8d8fc16019?s=48&d=identicon&r=PG",
      },
      {
        name: "Offline",
        image:
          "https://www.gravatar.com/avatar/b17065ea1655f1e3283aac8d8fc16019?s=48&d=identicon&r=PG",
      },
    ],
  }),
});
</script>

<style>
/* this is main */
.btn_layout {
  position: absolute;
  bottom: 0;
  border: 1px solid white;
  width: 230px;
  height: 90px;
  margin-right: 60px;
  margin-bottom: 20px;
}
.select_status{
  width: 130px !important;
  margin-bottom: -5px;
  margin-right: 10px;
  color: white !important;
  background-color: transparent !important;
  font-size: 20px !important;
}
.v-text-field{
  color: white !important;
}
.image_status{
  width: 30px !important;
  height: 30px !important;
}
.v-input__slot:before {
  border-style: none !important;
  }
.v-input__slot:after {
  border-style: none !important;
}
.btn_invites {
  position: absolute;
  margin-left: 236px;
  margin-top: 20px;
}

.btn_text_edit {
  font-size: 26px;
  text-decoration: none !important;
  color: white !important;
  margin-left: 25px;
}
.btn_icon {
  margin-left: 20px;
  margin-top: 20px;
}
.btn_image {
  width: 50px !important;
}
.btn_status {
  position: absolute;
  bottom: 0;
  right: 0;
  margin-bottom: 3px;
}

/* this if for the phone */
@media (max-width: 960px) {
}
</style>
