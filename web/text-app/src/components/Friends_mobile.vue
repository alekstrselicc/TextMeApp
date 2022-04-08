<template>
    <div>
        <v-layout class="fill-height justify-center">
            
            
            <v-list rounded>
                <v-subheader class="white--text friends_title_mobile" fixed>Friends</v-subheader>
                <div class="group_items_friends">
                    <v-list-item-group v-model="selectedItem" color="white" class="item_group">
                        <v-list-item v-for="(item, i) in items" :key="i">
                            <v-badge bordered bottom :color="item.color" offset-x="25" offset-y="25">
                                <v-list-item-avatar size="50" class="ml-n2">
                                    <v-img :src="item.avatar"></v-img>
                                </v-list-item-avatar>  
                            </v-badge>
                            <v-list-item-content>
                                <v-list-item-title v-text="item.title" color="white" class="white--text"></v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-item-group>
                </div>
            </v-list>

            <div class="user_profile_menu">
                <v-btn icon>
                    <v-avatar>
                        <img src="https://randomuser.me/api/portraits/men/1.jpg">
                    </v-avatar>
                </v-btn> 
                <p class="white--text btn_text"><a href="">Monika Bog</a></p>   
                

            </div>


        
        </v-layout>
    </div>
</template>


<script lang="ts">

import Vue from 'vue'; 

export default Vue.extend({
    data(){
        return {
            selectedItem: 1, 
            items: [
                {
                    avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
                    title: 'Janez_Novak',
                    color: "red",
                    
                },
                {
                    avatar: 'https://picsum.photos/350/165?random',
                    title: 'Mojca Mastnak',
                    color: "yellow",
                },
            ],
            states: [ "delat", "treba"],
        }        
    }


})
</script>

<style>
    .friends_title_mobile{
        font-size: 30px !important;
        margin-left: 60px;
    }
    .item_group{
        width: 250px !important;
    }
    .user_profile_menu{
        position: absolute;
        bottom: 0;
        left: 0;
        margin-left: 30px;
        margin-bottom: 20px;
    }
    .user_btn{
        background-color: transparent !important;
        width: 170px;
        height: 50px !important;
        margin-top: -50px !important;
        margin-left: -20px !important;
    }
    .user_image_btn{
        margin-left: -40px;
    }
    .avatar_image{
        position: absolute;
        margin-left: -60px;
        min-width: 130px !important;
    }
    .btn_text{
        position: absolute;
        margin-left: 55px;
        text-transform: capitalize !important;
        font-size: 18px;
        margin-top: -40px;
        width: 100px;
    }
    .btn_text a{
        text-decoration: none;
        color: white;
    }

</style>