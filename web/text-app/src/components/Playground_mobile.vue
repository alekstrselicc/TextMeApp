<template>
         <div>
            <!-- This is for the playgrounds list -->
            <v-layout class="fill-height justify-center">
              <v-list rounded>
                
                <v-subheader class="white--text playground_title_mobile" fixed>Playgrounds</v-subheader>
                
      
                <div class="group_items">
                  <v-list-group v-for="item in items" :key="item.title" color="white" >
                    <template v-slot:activator>
                      <v-list-item-avatar>
                        <v-img :src="item.avatar"></v-img>
                      </v-list-item-avatar>          
                        
                      <v-list-item-content class="white--text">
                        <v-list-item-title v-text="item.title" class="custom_playground_text"></v-list-item-title>
                      </v-list-item-content>

                    </template>
                    
                    <v-list-item v-for="child in item.items" :key="child.title" dense> 
                    <v-list-item-icon>
                      <v-icon v-text="child.action" color="white"></v-icon>
                    </v-list-item-icon>  
                        <v-list-item-content class="white--text">
                          <v-list-item-title v-text="child.title" class="custom_child" >
                          </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                  </v-list-group>
                </div>



              </v-list>
            </v-layout>

            <!-- Adding playground comes here -->
            <div class="add_playground_btn">
                <v-btn class="white--text custom_btn_add_playground" color="black"><v-icon left>mdi-plus</v-icon>Add playground</v-btn>
            </div>
         </div>
</template>

<script lang="ts">


import Vue from 'vue';
//import NavBar from '@/components/NavBar.vue'; 

export default Vue.extend({
data() {
    return {
         items: [
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
        title: 'Gaming',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]
      },
    
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
        title: 'Summer BBQ',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]
      },
  
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
        title: 'Oui oui',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]

      },
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
        title: 'Birthday gift',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]

      },
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/5.jpg',
        title: 'Recipe to try',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]
      },      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
        title: 'Gaming',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]
      },
    
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
        title: 'Summer BBQ',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]
      },
  
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
        title: 'Oui oui',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]

      },
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
        title: 'Birthday gift',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]

      },
      {
        avatar: 'https://cdn.vuetifyjs.com/images/lists/5.jpg',
        title: 'Recipe to try',
        items: [ { title: "chill channel", action: 'mdi-message-text'},{ title: "Add channel", action: 'mdi-plus'}]
      },
      
      

    ],
    }
}
});
</script>



<style lang="scss">
  .add_playground_btn{
    position: absolute;
    bottom: 0;
  }
@media only screen and (min-width: 960px) {
  .chat{
    margin: 0;
  }
  .playground_title_mobile{
    font-size: 30px !important;
  }
  .custom_playground_text{
    font-size: 21px !important;
  }
  .custom_child{
    font-size: 18px !important;
  } 
  .group_items{
    max-height: 600px !important;
    overflow: auto;
  }
  .custom_btn_add_playground{
    margin-left: 5px;
    font-size: 20px !important;
  }
  .group_title{
    font-size: 20px !important;
  }
  .add_playground_btn{
    height: 50px;
    margin-top: -50px;
    margin-left: 10px;
  } 
 }
  
</style>
