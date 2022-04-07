<template>
    <v-container class="fill-height justify-center first_main">
      <v-layout class="main_layout">
          <!-- This is for playgrounds -->
            <Playground />
            
          <!-- Playgrounds drawer -->
          <v-navigation-drawer v-model="drawer1" app class="hidden-md-and-up playground_drawer" color="black" width="300px">
           <PlaygroundMobile />
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
              <FriendMobile />
          </v-navigation-drawer>



          <!-- This is for friends -->
          <Friend />



      </v-layout>
    </v-container>
</template>

<script lang="ts">
  import Vue from 'vue'; 
  import Playground from "@/components/Playgrounds.vue"; 
  import PlaygroundMobile from "@/components/Playground_mobile.vue"; 
  import Friend from "@/components/Friends.vue"; 
  import FriendMobile from "@/components/Friends_mobile.vue"; 


  export default Vue.extend({
    name: 'main', 
    components: { Playground, PlaygroundMobile, Friend, FriendMobile },
    data(){
      return {
        drawer1: false,
        drawer2: false,  
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
    .custom_button_bigger{
      position: absolute;
      bottom: 0;
      margin-bottom: 40px;
      margin-left: 20px;
    }
    .icon_plus {
      font-size: 50px !important;
    }

    .custom_btn_add_playground_bigger{
      font-size: 30px !important;
      height: 50px !important;
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