<template>
    <div>
        <v-layout class="fill-height justify-center">
            
            
            <v-list rounded>

                <v-subheader class="white--text friends_title_mobile" fixed>Friends</v-subheader>

                <div class="group_items_friends">
                    <v-list-item-group v-model="selectedItem" color="white">
                        <v-list-item v-for="(item, i) in items" :key="i">

                            <v-badge bordered bottom color="green" offset-x="25" offset-y="25">
                                <v-list-item-avatar size="50">
                                    <v-img :src="item.avatar"></v-img>
                                </v-list-item-avatar>  
                            </v-badge>
                            <v-list-item-content >
                                <v-list-item-title v-text="item.title" color="white" class="white--text"></v-list-item-title>
                            </v-list-item-content>


                        </v-list-item>

                    </v-list-item-group>
                        

                    
                </div>

            </v-list>
        
        
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
                    title: 'Gaming',
                    items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]
                },
                {
                    avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
                    title: 'Gaming',
                    items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]
                },
            ],
        }        
    }


})
</script>

<style>
    .friends_title_mobile{
        font-size: 30px !important;
    }


</style>