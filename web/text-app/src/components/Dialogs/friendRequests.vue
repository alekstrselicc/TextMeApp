<template>
  <div>
    <v-dialog v-model="dialogF" max-width="500">
      <template v-slot:activator="{ on, attrs }">
        <v-badge
          v-if="check_pendings_count"
          color="red"
          :content="pendings_count"
          offset-y="10"
          offset-x="10"
        >
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
            v-for="(item, index) in friend_selected"
            :key="index"
          >
            <v-list-item-avatar size="50" class="ml-n2">
              <v-img :src="item.img"></v-img>
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title
                color="white"
                class="white--text member_names"
                v-text="item.first_name + ' ' + item.last_name"
                v-value="item.email"
              ></v-list-item-title>
            </v-list-item-content>

            <v-btn @click="accept(item.id)" icon>
              <v-list-item-icon>
                <v-icon color="white" size="30" class="icon_accept">{{
                  svgAccept
                }}</v-icon>
              </v-list-item-icon>
            </v-btn>
            <v-btn @click="decline(item.id)" icon>
              <v-list-item-icon>
                <v-icon color="white" size="30" class="icon_decline">{{
                  svgDecline
                }}</v-icon>
              </v-list-item-icon>
            </v-btn>
          </v-list-item>
        </v-list>
      </v-card>
    </v-dialog>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import { mdiAccountMultiplePlus, mdiAccountMultipleMinus } from "@mdi/js";
import axios from "axios";

let content = [];

export default Vue.extend({
  data(e) {
    return {
      svgAccept: mdiAccountMultiplePlus,
      svgDecline: mdiAccountMultipleMinus,
      friend_requestss: [
        {
          name: "Nejc Mat",
          avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
        },
      ],

      friend_requests: [],

      friend_selected: [],

      pendings_count: null,

      tmp: [],
    };
  },

  methods: {
    async decline(e) {
      await axios
        .get("http://127.0.0.1:8000/api/friend_request_approver/" + e)
        .then((res) => {
          //console.log(res.data[0].id);
          axios
            .delete(
              "http://127.0.0.1:8000/api/friend_request/" + res.data[0].id
            )
            .then((res) => {
              console.log(res);
              console.log("deleted");
            });
        });
    },
    accept(e) {
      axios
        .post("http://127.0.0.1:8000/api/private_chats", {
          user_id: e,
          last_send: "2000-02-02 13:13:13",
        })
        .then((res) => {
          console.log(res.data);
        });
    },
  },

  created() {
    if (this.pendings_count == 0) {
      this.check_pendings_count = false;
    } else {
      this.check_pendings_count = true;
    }

    axios.get("http://127.0.0.1:8000/api/friend_request").then(async (res) => {
      //console.log(res.data[0]);
      this.friend_requests = res.data;
      this.pendings_count = this.friend_requests.length;
      //console.log(this.pendings_count);

      for (let indexx = 0; indexx < this.pendings_count; indexx++) {
        await axios
          .get(
            "http://127.0.0.1:8000/api/user/" +
              this.friend_requests[indexx].sender
          )
          .then((res) => {
            content.push(res.data);
          });
      }
      //console.log("tole je velikost: " + content.length);

      var filterArray = content.reduce((accumalator, current) => {
        if (
          !accumalator.some(
            (item) => item.id === current.id && item.name === current.name
          )
        ) {
          accumalator.push(current);
        }
        return accumalator;
      }, []);

      this.friend_selected = filterArray;

      /*
      for (let index = 0; index < content.length; index++) {
        console.log(content[index]);
        console.log();
      }

    */
    });

    /*

    */
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
.icon_decline {
  margin-left: 20px !important;
}

@media (max-width: 960px) {
  .request_title {
    font-size: 20px;
  }
}
</style>

function decline(e: any) { throw new Error("Function not implemented."); }
