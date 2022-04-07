<template>
    <v-container class="fill-height justify-center first_main">
      <v-layout class="main_layout">

          <!-- This is for playgrounds -->
          <v-flex lg3 class="hidden-sm-and-down playground" sm3>

             
              <v-list rounded color="transparent" class="mt-8 list_class">
                <v-subheader class="white--text subheader_desktop" fixed>Playgrounds</v-subheader>
    
                <div class="group_items_bigger">
                  <v-list-group v-for="item in items" :key="item.title" color="white" class="">
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
                          <v-list-item-title v-text="child.title" class="custom_child_bigger" >
                          </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                  </v-list-group>
                </div>
              </v-list>
           
            <div class="add_playground_btn">
                <v-btn class="white--text custom_btn_add_playground" color="black"><v-icon left>mdi-plus</v-icon>Add playground</v-btn>
            </div>
          </v-flex>




          <!-- Playgrounds drawer -->
          <v-navigation-drawer v-model="drawer1" app class="hidden-md-and-up playground_drawer" color="black" width="300px">
            
            <!-- This is for the playgrounds list -->
            <!-- Adding images is still missing -->
            <!-- Later this is going to be a component when is working properly--> 
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
          </v-navigation-drawer>


          <!-- This is for chat -->
          <v-flex lg7 class="chat" sm7>
          <!-- toolbar with burger menu and friends icon -->
          <v-app-bar color="transparent" class="hidden-md-and-up small_bar" flat>
            <v-app-bar-nav-icon @click="drawer1 = true" x-large color="white"></v-app-bar-nav-icon>
            <v-spacer></v-spacer>
            <v-app-bar-nav-icon @click="drawer2 = true" x-large color="white"><v-icon>mdi-account</v-icon></v-app-bar-nav-icon>
          </v-app-bar>

          <!-- Here is going to be the chat for mobile and desktop -->
          
          


          </v-flex>

          <!-- Friends drawer -->
          <v-navigation-drawer v-model="drawer2" app right class="hidden-md-and-up friends_drawer" color="black">
              friends
          </v-navigation-drawer>



          <!-- This is for friends -->
          <v-flex lg2 class="hidden-sm-and-down friends" sm2>
            

          </v-flex>



      </v-layout>
    </v-container>
</template>

<script lang="ts">
  import Vue from 'vue'
  export default Vue.extend({
    data(){
      return {
        drawer1: false,
        drawer2: false,  
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
  })


</script>

<style>

  /* Main stuff for good looks */
    .first_main{
      max-width: 2500px !important;
    }

    .subheader_desktop{
      font-size: 40px !important;
      font-weight: bold !important;
    }
    .group_items_bigger{
      margin-top: 25px !important;
      max-height: 1200px;

    }
    .list_class{
      max-width: 600px;
    }
    .custom_child_bigger{
      font-size: 20px !important;
    }
    .custom_playground_text{
       font-size: 32px !important;
    }

    .playground{
      border-radius: 30px;
      background-color: rgba(0, 0, 0, 0.4) !important;
    }
    .chat{
      border-radius: 30px;
      margin-left: 10px;
      background-color: rgba(0, 0, 0, 0.4) !important;
    }
    .friends{
      border-radius: 30px;
      margin-left: 10px;
      background-color: rgba(0, 0, 0, 0.4) !important;
    }
    .small_bar{
      display: none;
    }

    

    /* This is the small navbar in mobile mode */
    @media (max-width: 960px) {
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

    /* These are the drawers */
    .playground_drawer{
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
    }
    .friends_drawer{
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }








  /*
  .sheet_color{
    background-color: rgba(0, 0, 0, 0.4) !important;
  }
  */



 

  
  
  




</style>