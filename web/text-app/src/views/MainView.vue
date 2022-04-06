<template>
    <v-container class="fill-height justify-center first_main">
      <v-layout class="main_layout">

          <!-- This is for playgrounds -->
          <v-flex lg3 class="hidden-sm-and-down playground" sm3>

          </v-flex>


          <v-navigation-drawer v-model="drawer1" app class="hidden-md-and-up playground_drawer" color="black">
            playgrounds

          </v-navigation-drawer>


          <!-- This is for chat -->
          <v-flex lg7 class="chat" sm7>
          
          <!-- toolbar with burger menu and friends icon -->
          <v-app-bar color="transparent" class="hidden-md-and-up small_bar" flat>

            <v-app-bar-nav-icon @click="drawer1 = true" x-large color="white"></v-app-bar-nav-icon>

            <v-spacer></v-spacer>

            <v-app-bar-nav-icon @click="drawer2 = true" x-large color="white"></v-app-bar-nav-icon>

          </v-app-bar>


          </v-flex>


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
      }
    }
  })


</script>

<style>

  /* Main stuff for good looks */



    .first_main{
      max-width: 2500px !important;
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