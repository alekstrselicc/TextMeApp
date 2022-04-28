<template>
  <v-layout class="btn_layout">
    <!-- Clickable icon -->
    <v-flex class="btn_icon">
      <v-btn icon>
        <v-avatar class="custom_avatar">
          <img src="https://randomuser.me/api/portraits/men/1.jpg" />
        </v-avatar>
      </v-btn>
    </v-flex>

    <!-- Clickable text -->
    <v-flex class="btn_text">
      <a href="profile" class="btn_text_edit">{{ name }}</a>
    </v-flex>

    <!-- Status menu -->
    <v-flex class="btn_status">
      <v-select
        v-model="select"
        :items="items"
        class="white--text select_status"
      >
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
      <PendingInvites />
    </v-flex>
  </v-layout>
</template>

<script lang="ts">
import Vue from "vue";
import PendingInvites from "@/components/Dialogs/friendRequests.vue";
export default Vue.extend({
  name: "profileButton",
  components: { PendingInvites },
  data: () => ({
    name: "",
    select: { name: "Online", image: require("../assets/online.png") },
    items: [
      {
        name: "Online",
        image: require("../assets/online.png"),
      },
      {
        name: "Away",
        image: require("../assets/away.png"),
      },
      {
        name: "Busy",
        image: require("../assets/busy.png"),
      },
      {
        name: "Offline",
        image: require("../assets/offline.png"),
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
  width: 230px;
  height: 90px;
  margin-right: 60px;
  margin-bottom: 20px;
}
.select_status {
  width: 130px !important;
  margin-bottom: -5px;
  margin-right: 10px;
  color: white !important;
  background-color: transparent !important;
  font-size: 20px !important;
}
.v-text-field {
  color: white !important;
}
.image_status {
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

.custom_avatar {
  width: 70px !important;
  height: 70px !important;
}

.v-application .primary--text {
  color: black !important;
}
.v-select__selections {
  color: white !important;
}

/* this if for the phone */
@media (max-width: 960px) {
  .btn_icon {
    margin-left: 40px;
    margin-top: 20px;
    max-width: 70px !important;
    height: 50px !important;
  }
  .btn_text_edit {
    position: absolute;
    margin-top: 50px;
    margin-left: 40px;
    font-size: 20px !important;
    width: 150px !important;
  }
  .custom_avatar {
    width: 50px !important;
    height: 50px !important;
  }
  /* This is all for status */
  .btn_status {
    position: absolute;
    bottom: 0;
    right: 0;
    margin-bottom: 4px;
  }
  .select_status {
    color: white !important;
    width: 125px !important;
    font-size: 18px !important;
  }

  .image_status {
    width: 20px !important;
    height: 20px !important;
  }
  .v-application .primary--text {
    color: white !important;
  }
  .v-select__selections {
    color: white !important;
  }

  /* This if for invites */
  .btn_invites {
    position: absolute;
    margin-left: 220px;
    margin-top: 24px;
  }
}
</style>
