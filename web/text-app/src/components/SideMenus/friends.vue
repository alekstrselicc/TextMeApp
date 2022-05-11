<template>
  <div>
    <v-layout class="fill-height justify-center friends_layout">
      <v-list rounded color="transparent">
        <v-subheader class="white--text friends_title_mobile"
          >Friends</v-subheader
        >
        <v-divider color="white" class="divider_friends"></v-divider>
        <div class="group_items_friends">
          <v-list-item-group
            v-model="selectedItem"
            color="white"
            class="item_group"
          >
            <v-list-item
              v-for="(item, i) in items"
              :key="i"
              class="list_item"
              @click="getChat(item.id)"
            >
              <v-badge
                bordered
                bottom
                :color="check_color(item.status_id)"
                offset-x="25"
                offset-y="25"
              >
                <v-list-item-avatar size="50" class="ml-n2">
                  <v-img :src="item.img"></v-img>
                </v-list-item-avatar>
              </v-badge>
              <v-list-item-content>
                <v-list-item-title
                  v-text="item.first_name + item.last_name"
                  color="white"
                  class="white--text item_title"
                ></v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
        </div>
      </v-list>

      <!-- Here comes the profile linker -->
      <ProfileButton />
    </v-layout>
    <AddFriend />
  </div>
</template>

<script lang="ts">
import Vue from "vue";

import ProfileButton from "@/components/profileButton.vue";
import AddFriend from "@/components/Dialogs/addFriend.vue";
import axios from "axios";

export default Vue.extend({
  components: { ProfileButton, AddFriend },
  data() {
    return {
      selectedItem: 1,
      items: [],
      states: ["delat", "treba"],
    };
  },
  methods: {
    check_color(e) {
      if (e == 1) {
        return "green";
      } else if (e == 2) {
        return "grey";
      } else if (e == 3) {
        return "red";
      } else {
        return "yellow";
      }
    },
    getChat(e) {
      this.$router.push({ path: "/chat/user/" + e });
    },
  },

  created() {
    axios.get("http://127.0.0.1:8000/api/get_friends").then((res) => {
      console.log(res.data);
      this.items = res.data;
    });
  },
});
</script>

<style>
/* destkop css */

.friends_title_mobile {
  font-size: 50px !important;
  margin-left: 40px;
  margin-top: 25px;
}
.friends {
  border-radius: 30px;
  margin-left: 10px;
  background-color: rgba(0, 0, 0, 0.4) !important;
  min-width: 300px;
  max-width: 200px !important;
}

.item_title {
  font-size: 28px;
}
.list_item {
  margin-top: 5px;
}
.group_items_friends {
  margin-top: 10px;
}
.divider_friends {
  margin-top: 10px;
  border: 1px solid white !important;
}
.custom_add_friend_button {
  font-size: 28px !important;
  text-transform: capitalize !important;
  margin-top: 20px;
  margin-left: 35px;
  height: 50px !important;
}
.icon_add {
  font-size: 40px !important;
}

@media (max-width: 960px) {
  .friends_title_mobile {
    font-size: 30px !important;
    margin-left: 60px;
  }
  .divider_friends {
    margin-top: 0px;
  }
  .item_group {
    width: 250px !important;
  }
  .user_profile_menu {
    position: absolute;
    bottom: 0;
    left: 0;
    margin-left: 30px;
    margin-bottom: 20px;
  }
  .user_btn {
    background-color: transparent !important;
    width: 170px;
    height: 50px !important;
    margin-top: -50px !important;
    margin-left: -20px !important;
  }
  .user_image_btn {
    margin-left: -40px;
  }
  .avatar_image {
    position: absolute;
    margin-left: -60px;
    min-width: 130px !important;
  }
  .btn_text {
    position: absolute;
    margin-left: 55px;
    text-transform: capitalize !important;
    font-size: 18px;
    margin-top: -40px;
    width: 100px;
  }
  .btn_text a {
    text-decoration: none;
    color: white;
  }
  .item_title {
    font-size: 18px;
  }
  .list_item {
    margin-top: -5px;
  }
  .group_items_friends {
    margin-top: 5px;
  }
  .custom_add_friend_button {
    font-size: 24px !important;
    text-transform: capitalize !important;
    margin-top: 20px;
    margin-left: 25px !important;
    height: 50px !important;
  }
}
</style>
