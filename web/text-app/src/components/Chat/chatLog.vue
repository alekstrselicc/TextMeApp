<template>
    <div class="main_chat">

    <!-- Chat log need date, location, text, image of the person -->
        <v-row class="justify-start message_main">
            <div v-for="(item, index) in chat" :key="index" class="main_msg justify-start row">
                <div class="image_user"><v-avatar><v-img :src="item.avatar"></v-img></v-avatar></div>
                <div class="msg_user">{{item.msg}}</div>
            </div>
               
        </v-row>
    </div>
</template>


<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  data() {
      return {
          chat: [
                { user: "Ales", msg: "hello there.", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg" },
                { user: "Ales", msg: "hello, how are you? ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,  ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "hello, how are you? ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "hello, how are you? ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "hello, how are you? ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "hello, how are you? ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "hello, how are you? ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "hello, how are you? ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "hello, how are you? ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "delat ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "delat ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "delat ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "delat ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "delat ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "delat ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "delat ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
                { user: "Ales", msg: "delat ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg"},
        ],

      }
  },
}); 

</script>

<style>

.main_chat{ 
    width: 100% !important;
    height: 80%; 
    max-height: 900px;  
    margin-top: 15px !important;
    overflow: auto;
}
.main_msg{
    margin-left: 20px;
    margin-top: 20px;
}
.row{
    display: table;
    padding-bottom: 10px;
}
.image_user{
    display: table-cell;
    padding-right: 10px;
}
.msg_user{
    display: table-cell;
    max-width: 180px;
    font-size: 18px;
    padding: 7px;
    border: 1px solid white;
    background: white; 
    border-radius: 20px;
}

/* custom scroll bar */
::-webkit-scrollbar{
    background: transparent;
}






/* This is about message */

@media (max-width: 960px) {
    .main_chat{
        height: 65%;
    }
}


</style>
