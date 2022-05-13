<template>
  <div class="show_members_main">
    <div class="members_main_div">
      <v-btn v-bind="attrs" v-on="on" icon @click="show = !show">
        <v-icon size="35" color="white" class="icon_people">{{
          svgPath
        }}</v-icon>
      </v-btn>
    </div>

    <v-card class="show_menu" v-if="show">
      <v-card-actions>
        <v-badge color="red" :content="count_pen" offset-y="12" offset-x="12">
          <v-btn
            text
            color="white"
            @click="reveal = true"
            class="pending_btn"
            rounded
          >
            Pending requests
          </v-btn>
        </v-badge>
      </v-card-actions>

      <v-card-text>
        <v-list rounded color="transparent" class="main_list_members">
          <div class="members_list">
            <v-list-item
              v-for="(item, index) in members"
              :key="index"
              class="list_item_members"
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
                  class="white--text member_names"
                >
                </v-list-item-title>
              </v-list-item-content>

              <v-list-item-icon>
                <v-btn icon>
                  <v-icon class="white--text" large>{{ svgPath1 }}</v-icon>
                </v-btn>
              </v-list-item-icon>
            </v-list-item>
          </div>
        </v-list>
        <!-- Here is the button for adding members -->
        <AddMember />
      </v-card-text>

      <v-expand-transition>
        <v-card
          v-if="reveal"
          class="transition-fast-in-fast-out v-card--reveal"
          style="height: 100%"
        >
          <v-card-text class="pb-0">
            <h1 class="title_pedning">Pending requests</h1>
            <v-list color="transparent" class="pending_request_list_div">
              <v-list-item
                v-for="(item, index) in pending_members"
                :key="index"
                class="item_pending"
              >
                <v-list-item-avatar size="50" class="ml-n2">
                  <v-img :src="item.img"></v-img>
                </v-list-item-avatar>

                <v-list-item-content>
                  <v-list-item-title
                    v-text="item.first_name"
                    color="white"
                    class="white--text member_names"
                  >
                  </v-list-item-title>
                </v-list-item-content>
                <v-btn icon @click="accept(item.id)">
                  <v-list-item-icon>
                    <v-icon color="white" size="30">{{ svgAccept }}</v-icon>
                  </v-list-item-icon>
                </v-btn>

                <v-btn icon @click="decline(item.id)">
                  <v-list-item-icon>
                    <v-icon color="white" size="30">{{ svgDecline }}</v-icon>
                  </v-list-item-icon>
                </v-btn>
              </v-list-item>
            </v-list>
          </v-card-text>
          <v-card-actions class="pt-0">
            <v-btn text color="white accent-4" @click="reveal = false">
              Close
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-expand-transition>
    </v-card>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import {
  mdiAccountGroup,
  mdiMinus,
  mdiAccountMultiplePlus,
  mdiAccountMultipleMinus,
} from "@mdi/js";

import AddMember from "@/components/Dialogs/addMember.vue";
import axios from "axios";

export default Vue.extend({
  name: "showMember",
  components: { AddMember },
  data() {
    return {
      svgPath: mdiAccountGroup,
      svgPath1: mdiMinus,

      svgAccept: mdiAccountMultiplePlus,
      svgDecline: mdiAccountMultipleMinus,

      show: false,
      reveal: false,

      pending_members: [],

      count_pen: null,
      members: [],
      memberss: [
        {
          name: "Janez_Novak123",
          status: "green",
          avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
        },
        {
          name: "Mojca Mastnak",
          status: "red",
          avatar: "https://picsum.photos/350/165?random",
        },
        {
          name: "Mojca Mastnak",
          status: "red",
          avatar: "https://picsum.photos/350/165?random",
        },
        {
          name: "Mojca Mastnak",
          status: "red",
          avatar: "https://picsum.photos/350/165?random",
        },
      ],
    };
  },
  methods: {
    accept(e) {
      console.log("sprejel" + e);

      axios
        .get("http://127.0.0.1:8000/api/findByChannel/" + this.$route.params.id)
        .then(async (res) => {
          console.log(res.data[0].playground_id);
          await axios.post("http://127.0.0.1:8000/api/playground_members", {
            user_id: e,
            playground_id: res.data[0].playground_id,
            //sender: Vue.prototype.$userId,
            joined: "2002-02-02 13:13:13",
            left: "2002-02-02 13:13:13",
          });
        });
    },
    decline(e) {
      console.log("zavrnil" + e);

      axios
        .get("http://127.0.0.1:8000/api/findByChannel/" + this.$route.params.id)
        .then(async (res) => {
          await axios
            .post("http://127.0.0.1:8000/api/getPlaygroundRequestsId", {
              playground_id: res.data[0].playground_id,
              sender: e,
            })
            .then(async (res) => {
              console.log("id: " + res.data);
              await axios.delete(
                "http://127.0.0.1:8000/api/playground_request/" + res.data
              );
            });
          //await axios.delete("http://127.0.0.1:8000/api/playground_request/" + )
        });
    },
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
  },

  created() {
    //getting the playground members
    //axios.get("http://127.0.0.1:8000/api/").then((res) => {});
    //gettings the requests
    //console.log("novi");
    this.members = [];
    axios
      .get("http://127.0.0.1:8000/api/findByChannel/" + this.$route.params.id)
      .then(async (res) => {
        console.log(res.data[0].playground_id);

        await axios
          .get(
            "http://127.0.0.1:8000/api/GetAllUsersFromPlayground/" +
              res.data[0].playground_id
          )
          .then((res) => {
            this.members = res.data;
          });
        await axios
          .get(
            "http://127.0.0.1:8000/api/playground_request/" +
              res.data[0].playground_id
          )
          .then((res) => {
            this.pending_members = res.data[0];
            this.count_pen = res.data[0].length;
          });
      });
  },

  watch: {
    "$route.params.search": {
      handler: function (search) {
        console.log("novi1:" + this.$route.params.id);
        this.members = [];
        axios
          .get(
            "http://127.0.0.1:8000/api/findByChannel/" + this.$route.params.id
          )
          .then(async (res) => {
            console.log(res.data[0].playground_id);

            await axios
              .get(
                "http://127.0.0.1:8000/api/GetAllUsersFromPlayground/" +
                  res.data[0].playground_id
              )
              .then((res) => {
                this.members = res.data;
              });
            await axios
              .get(
                "http://127.0.0.1:8000/api/playground_request/" +
                  res.data[0].playground_id
              )
              .then((res) => {
                this.pending_members = res.data[0];
                this.count_pen = res.data[0].length;
              });
          });
      },
      deep: true,
      immediate: true,
    },
  },
});
</script>

<style>
.title_pedning {
  color: white !important;
}

.main_list_members {
  margin-left: -15px !important;
  margin-top: -10px;
  overflow-y: scroll;
  overflow-x: hidden;
  height: 280px;
  width: 290px;
}

.add_member_btns {
  font-size: 20px !important;
}
.add_member_btns_div {
  margin-top: 10px;
  text-align: center;
}

.show_members_main {
  position: absolute;
  right: 0;
  top: 0;
  margin-top: 130px;
}
.pending_btn {
  background-color: #007abe !important;
}
.member_names {
  font-size: 20px;
}

.list_item_members {
  width: 290px !important;
}

.v-card--reveal {
  top: 0;
  opacity: 1 !important;
  position: absolute;
  width: 100%;
  background-color: black !important;
  border-radius: 10px 10px 20px 20px !important;
}

.members_main_div {
  position: absolute;
  right: 0;
  margin-top: -35px;
  margin-right: 20px;
}
.icon_people {
  border: 1px solid white;
  border-radius: 50%;
  width: 50px !important;
  height: 50px !important;
  padding-bottom: 7px;
}
.show_menu {
  border: 1px solid black !important;
  border-radius: 10px 10px 20px 20px !important;
  background-color: black !important;
  width: 300px;
  height: 400px;
  margin-top: 10px;
}

@media (max-width: 960px) {
  .show_members_main {
    margin-top: 80px !important;
  }
}
</style>
