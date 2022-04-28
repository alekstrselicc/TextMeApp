<template>
  <div>
    <v-dialog v-model="dialogF" max-width="500">
      <template v-slot:activator="{ on, attrs }">
        <v-badge color="red" content="4" offset-y="10" offset-x="10">
          <v-btn v-bind="attrs" v-on="on" icon>
            <v-icon color="white" large>mdi-account</v-icon>
          </v-btn>
        </v-badge>
      </template>

      <v-card class="main_request_layout">
        <h1 class="request_title">Pending requests</h1>
        <v-list color="transparent" class="whole_list">
          <v-list-item
            class="item_friend_re"
            v-for="(item, index) in friend_requests"
            :key="index"
          >
            <v-list-item-avatar size="50" class="ml-n2">
              <v-img :src="item.avatar"></v-img>
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title
                color="white"
                class="white--text member_names"
                v-text="item.name"
              ></v-list-item-title>
            </v-list-item-content>
            <v-list-item-icon>
              <v-icon color="white" size="30">{{ svgAccept }}</v-icon>
            </v-list-item-icon>
            <v-list-item-icon>
              <v-icon color="white" size="30">{{ svgDecline }}</v-icon>
            </v-list-item-icon>
          </v-list-item>
        </v-list>
      </v-card>
    </v-dialog>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import { mdiAccountMultiplePlus, mdiAccountMultipleMinus } from "@mdi/js";
export default Vue.extend({
  data() {
    return {
      svgAccept: mdiAccountMultiplePlus,
      svgDecline: mdiAccountMultipleMinus,
      friend_requests: [
        {
          name: "Nejc Mat",
          avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
        },
      ],
    };
  },
});
</script>

<style>
.whole_list {
  margin-left: 20px;
}
.main_request_layout {
  width: 500px;
  border: 1px solid black !important;
  height: 700px;
  background-color: black !important;
  border-radius: 30px !important;
}
.request_title {
  color: white;
  margin-left: 20px;
  margin-top: 10px;
}
.item_friend_re {
  max-width: 400px !important;
}
@media (max-width: 960px) {
  .request_title {
    font-size: 20px;
  }
}
</style>
