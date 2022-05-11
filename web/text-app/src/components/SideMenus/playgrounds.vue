<template>
  <div>
    <v-list rounded color="transparent" class="mt-8 list_class">
      <v-subheader class="white--text desktop_header mobile_header" fixed
        >Playgrounds</v-subheader
      >

      <div class="group_items_bigger">
        <v-list-group
          v-for="item in items"
          :key="item.title"
          color="white"
          class=""
          @click="showSettings(item.id)"
        >
          <template v-slot:activator>
            <v-list-item-avatar>
              <v-img :src="item.img"></v-img>
            </v-list-item-avatar>

            <v-list-item-content class="white--text">
              <v-list-item-title
                v-text="item.title"
                class="custom_playground_text"
              ></v-list-item-title>
            </v-list-item-content>
          </template>

          <v-list-item
            v-for="child in item.channels"
            :key="child.title"
            dense
            link
            @click="menuActionClick(child.id)"
          >
            <v-list-item-icon>
              <v-icon v-text="child.icon_img" color="white"></v-icon>
            </v-list-item-icon>
            <v-list-item-content class="white--text">
              <v-list-item-title
                v-text="child.title"
                class="custom_child_bigger"
              >
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>
      </div>
    </v-list>
    <AddPlayground />
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import AddPlayground from "@/components/Dialogs/addPlayground.vue";
import axios from "axios";

export default Vue.extend({
  components: { AddPlayground },
  data() {
    return {
      items: [],
    };
  },
  created() {
    axios
      .get("http://127.0.0.1:8000/api/getPlaygroundsWithChannels")
      .then((res) => {
        console.log(res.data);
        this.items = res.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
  methods: {
    menuActionClick(e) {
      this.$router.push({ path: "/chat/" + e });
    },
    showSettings(e) {
      console.log("delat");
      this.$router.push({ path: "/chat" });
    },
  },
});
</script>

<style lang="scss">
/* new style */
/* this is for the big screen */
.desktop_header {
  font-size: 50px !important;
}
.list_class {
  max-width: 600px;
}

.group_items_bigger {
  margin-top: 15px !important;
  max-height: 1200px;
}
.playground {
  border-radius: 30px;
  background-color: rgba(0, 0, 0, 0.4) !important;
  min-width: 400px;
}
.custom_child_bigger {
  font-size: 20px !important;
}
.custom_playground_text {
  font-size: 32px !important;
}
.custom_button_bigger {
  position: absolute;
  bottom: 0;
  margin-bottom: 40px;
  margin-left: 20px;
}
.icon_add {
  font-size: 30px !important;
}
.icon_plus {
  font-size: 50px !important;
}

.custom_btn_add_playground_bigger {
  font-size: 30px !important;
  height: 50px !important;
}

/* This if for mobile */
@media (max-width: 960px) {
  .mobile_header {
    font-size: 30px !important;
  }
  .group_items_bigger {
    max-height: 400px !important;
    overflow: auto;
  }
  .custom_button_bigger {
    font-size: 10px !important;
    margin-left: 20px;
    margin-bottom: 10px;
  }
  .icon_add {
    font-size: 20px !important;
  }
  .custom_btn_add_playground_bigger {
    font-size: 20px !important;
  }

  .custom_playground_text {
    font-size: 20px !important;
  }
}
@media (min-height: 800px) {
  .group_items_bigger {
    max-height: 600px !important;
  }
}
</style>
