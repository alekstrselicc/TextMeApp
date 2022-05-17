<template>
  <div class="contents">
    <div class="main_chat" id="chat_id">
      <!-- Chat log need date, location, text, image of the person -->
      <v-row class="justify-start message_main">
        <div
          v-for="(item, index) in test"
          :key="index"
          class="main_msg justify-start rows"
        >
          <v-row>
            <div class="showing_name">{{ item.name }}</div>
          </v-row>
          <v-row>
            <div class="image_user">
              <v-avatar><v-img :src="item.img"></v-img></v-avatar>
            </div>

            <div class="msg_user">
              {{ item.message }}
              <!--<v-img :src="item.avatar"></v-img> -->
            </div>
          </v-row>
        </div>
      </v-row>
    </div>
    <div class="main_send">
      <ChatBar />
      <div class="main_box">
        <v-text-field
          class="search-input"
          solo
          hide-details
          rounded
          elevation-12
          placeholder="Message..."
          aria-label="Search"
          append-icon="mdi-arrow-right"
          @click:append="sendMessage()"
          v-model="message"
        ></v-text-field>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import ChatBar from "@/components/Chat/chatBar.vue";
import axios from "axios";
import Echo from "laravel-echo";
import { Console } from "console";

Vue.prototype.$msg = null;

export default Vue.extend({
  name: "chatMessage",
  components: { ChatBar },
  data() {
    return {
      message: "",
      user_name: "",
      test: [],
      tmp: { img: null, name: null, message: null },
    };
  },
  methods: {
    filterData(data, users) {
      //console.log(data);
      this.test = [];
      for (let i = 0; i < data.length; i++) {
        this.tmp = { img: null, name: null, message: null };
        for (let j = 0; j < users.length; j++) {
          if (users[j].id == data[i].user_id) {
            this.tmp = {
              img: users[j].img,
              name: users[j].first_name,
              message: data[i].messages,
            };
            this.test.push(this.tmp);
            break;
          }
        }
      }
    },

    sendMessage() {
      Vue.prototype.$msg = this.message;
      if (this.$route.path.length < 9) {
        console.log("kr poslji");
        axios.post("http://127.0.0.1:8000/api/sendMessages", {
          messages: this.message,
          channel_id: this.$route.params.id,
          created_at: "2002-02-02 13:13:13",
          user_id: Vue.prototype.$userId,
        });
      } else {
        console.log("h" + Vue.prototype.$msg);
        axios
          .get(
            "http://127.0.0.1:8000/api/getPrivateChatId/" +
              this.$route.params.id
          )
          .then(async (res) => {
            await axios.post("http://127.0.0.1:8000/api/sendPrivateMessage", {
              messages: this.message,
              created_at: "2002-02-02 13:13:13",
              user_id: Vue.prototype.$userId,
              private_chat_id: res.data,
            });
            this.message = "";
          });
      }
    },
    fetchMessages() {
      this.test = [];
      if (this.$route.path.length < 9) {
        axios
          .get(
            "http://127.0.0.1:8000/api/fetchMessage/" + this.$route.params.id
          )
          .then(async (res) => {
            //here is all the data
            await axios
              .get("http://127.0.0.1:8000/api/getAll")
              .then((response) => {
                this.filterData(res.data, response.data);
              });
          });
      } else {
        axios
          .get(
            "http://127.0.0.1:8000/api/getPrivateMesagesChat/" +
              this.$route.params.id
          )
          .then(async (res) => {
            await axios
              .get("http://127.0.0.1:8000/api/getAll")
              .then((response) => {
                this.filterData(res.data, response.data);
              });
          });
      }
    },
  },
  created() {
    axios.get("http://127.0.0.1:8000/api/user").then((res) => {
      this.user_name = res.data.first_name;
    });

    this.fetchMessages();
    if (this.$route.path.length < 9) {
      window.Echo.channel("chat").listen("MessageSent", (e) => {
        if (e.channel_id == this.$route.params.id) {
          axios
            .get("http://127.0.0.1:8000/api/user/" + e.user_id)
            .then((res) => {
              this.test.push({
                message: e.messages,
                name: res.data.first_name,
                img: res.data.img,
              });
            });
        }
      });
    } else {
      window.Echo.channel("privateChat").listen("PrivateMessages", (e) => {
        axios.get("http://127.0.0.1:8000/api/user/" + e.user_id).then((res) => {
          this.test.push({
            message: e.messages,
            name: res.data.first_name,
            img: res.data.img,
          });
        });
      });
    }
  },
  /*
  watch: {
    "$route.params.search": {
      handler: function (search) {
        this.fetchMessages();
        if (this.$route.path.length < 9) {
          window.Echo.channel("chat").listen("MessageSent", (e) => {
            if (e.channel_id == this.$route.params.id) {
              axios
                .get("http://127.0.0.1:8000/api/user/" + e.user_id)
                .then((res) => {
                  this.test.push({
                    message: e.messages,
                    name: res.data.first_name,
                    img: res.data.img,
                  });
                });
            }
          });
        } else {
          window.Echo.channel("privateChat").listen("PrivateMessages", (e) => {
            axios
              .get("http://127.0.0.1:8000/api/user/" + e.user_id)
              .then((res) => {
                this.test.push({
                  message: e.messages,
                  name: res.data.first_name,
                  img: res.data.img,
                });
              });
          });
        }
      },
      deep: true,
      immediate: true,
    },
  },
  */
});
</script>

<style>
.contents {
  width: 100% !important;
}
.main_send {
  width: 98% !important;
  height: 100px;
  position: absolute;
  bottom: 0;
}

.main_send .main_box .v-text-field.v-text-field--solo .v-input__control {
  min-height: 50px !important;
}

.main_box .v-input__icon--append .v-icon {
  color: white !important;
  font-size: 30px !important;
  border-radius: 50%;
  min-width: 46px !important;
  height: 45px !important;
  margin-left: 15px;
  background-color: #007abe !important;
}
.main_layout_buttons {
  width: 150px;
  height: 40px !important;
  margin-left: 5px;
}

@media (max-width: 960px) {
  .main_layout_buttons {
    width: 150px;
    height: 40px !important;
    margin-left: 5px;
  }
  .main_send {
    margin-bottom: 60px;
    width: 95% !important;
  }
}

.main_chat {
  width: 100% !important;
  height: calc(100vh - 340px) !important;
  max-height: 900px;
  overflow-y: scroll;
  overflow-x: hidden;
  margin-top: 50px;
}
.showing_name {
  color: white;
  margin-left: 70px;
}
.main_msg {
  margin-left: 30px;
  margin-top: 20px;
}
.rows,
.message_main {
  display: table;
  padding-bottom: 5px;
}
.image_user {
  display: table-cell;
  padding-right: 10px;
}
.msg_user {
  display: table-cell;
  max-width: 80%;
  font-size: 18px;
  padding: 7px;
  padding-bottom: -5px !important;
  border: 1px solid white;
  background: white;
  border-radius: 20px;
}

/* custom scroll bar */
::-webkit-scrollbar {
  background: transparent;
}

/* This is about message */

@media (max-width: 960px) {
  .main_chat {
    margin-bottom: 100px;
  }
}
</style>
