<template>
    <v-flex class="main_chat">

    <!-- Chat log need date, location, text, image of the person -->
        <v-row class="justify-start message_main">
            
                <v-list color="transparent" class="chat_list">
                    <v-list-item v-for="(item, index) in chat" :key="index" width="30" >
                        
                        <v-list-item-avatar size="60">
                            <v-img :src="item.avatar"></v-img>
                        </v-list-item-avatar>
                        
                        <v-card color="transparent" flat :width="item.textWidth" class="title_card" max-width="300">
                            <v-list-item-content>
                                <div class="chat_item_title">
                                <v-list-item-title
                                    v-text="item.msg"
                                    :style="titleStyle"
                                ></v-list-item-title>
                                </div>
                            </v-list-item-content>
                        </v-card>
                    </v-list-item>
                </v-list>
        </v-row>
    </v-flex>
</template>


<script lang="ts">

import Vue from "vue";
import { getTextWidth } from 'get-text-width';



export default Vue.extend({
  data() {
      return {
          chat: [
                { msg: "hello there.", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg", textWidth: getTextWidth("hello there.") },
                { msg: "hello, how are you? ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg", textWidth: getTextWidth("hello, how are you?") },
                { msg: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,  ", subtitle: "13/02/2022 From maribor", avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg", textWidth: getTextWidth("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ") },
        ],

      }
  },
}); 

</script>

<style>

.main_chat{
    border: 1px solid black; 
    width: 100% !important;
    height: 80%;  
    margin-top: 15px !important;
}
.message_main{
    margin-bottom: 130px;
}

.chat_item_title{
    border: 1px solid white;
    background-color: white;
    padding: 3px;
    padding-left: 10px;
    border-radius: 30px;
    font-size: 20px; 
}


/* This is about message */

@media (max-width: 960px) {
    .main_chat{
        height: 65%;
    }
}


</style>
