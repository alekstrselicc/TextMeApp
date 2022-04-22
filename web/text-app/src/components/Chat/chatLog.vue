<template>
  <div class="main_chat" id="chat_id">
    <!-- Chat log need date, location, text, image of the person -->
    <v-row class="justify-start message_main">
      <div
        v-for="(item, index) in chat"
        :key="index"
        class="main_msg justify-start rows"
      >
        <v-row>
          <div class="showing_name">{{ item.user }}</div>
        </v-row>
        <v-row>
          <div class="image_user">
            <v-avatar><v-img :src="item.avatar"></v-img></v-avatar>
          </div>

          <div class="msg_user">
            {{ item.msg }} <v-img :src="item.img"></v-img>
          </div>
        </v-row>
      </div>
    </v-row>
  </div>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  data: () => ({
    chat: [
      {
        user: "Ales",
        msg: "hello there.",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,  ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "delat ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "delat ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "delat ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "delat ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "delat ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "delat ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "delat ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "delat ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "Tole je nov msg ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "Dober dan ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
        img: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
      {
        user: "Ales",
        msg: "hello, how are you? ",
        subtitle: "13/02/2022 From maribor",
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
        img: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      },
    ],
  }),
  methods: {
    scrollToEnd() {
      var cont = document.querySelector(".main_chat");
      var scrolls = cont.scrollHeight;
      cont.scrollTop = scrolls;
    },
  },

  mounted() {
    this.scrollToEnd();
  },
});
</script>

<style>
.main_chat {
  width: 100% !important;
  height: calc(100vh - 340px);
  max-height: 900px;
  overflow-y: scroll;
  overflow-x: hidden;
  margin-top: -150px;
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
