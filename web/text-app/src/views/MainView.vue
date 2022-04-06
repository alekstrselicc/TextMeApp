<template>
    <v-container class="fill-height justify-center first_main">
      <v-layout class="main_layout">

          <!-- This is for playgrounds -->
          <v-flex lg3 class="hidden-sm-and-down playground" sm3>
            
          </v-flex>

          <!-- Playgrounds drawer -->
          <v-navigation-drawer v-model="drawer1" app class="hidden-md-and-up playground_drawer" color="black">
            
            <!-- This is for the playgrounds list -->
            <!-- Adding images is still missing -->
            <!-- Later this is going to be a component when is working properly--> 
            <v-layout class="fill-height justify-center">
              <v-list rounded>
                
                <v-subheader class="white--text playground_title_mobile" fixed>Playgrounds</v-subheader>
                <div class="group_items">
                <v-list-group v-for="item in items" :key="item.title" v-model="item.active" :prepend-icon="item.action" no-action class="white--text">

                  <template v-slot:activator>
                    <v-list-item-content class="white--text">
                      <v-list-item-title v-text="item.title" class="custom_playground_text"></v-list-item-title>
                    </v-list-item-content>
                  </template>

                  <v-list-item v-for="child in item.items" :key="child.title">
                    <v-list-item-content class="white--text">
                      <v-list-item-title v-text="child.title" class="custom_child"></v-list-item-title>
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
        action: 'mdi-ticket',
        items: [{ title: 'List Item' }],
        title: 'Attractions',
      },
      {
        action: 'mdi-silverware-fork-knife',
        active: true,
        items: [
          { title: 'Breakfast & brunch' },
          { title: 'New American' },
          { title: 'Sushi' },
        ],
        title: 'Dining',
      },
      {
        action: 'mdi-school',
        items: [{ title: 'List Item' }],
        title: 'Education',
      },
      {
        action: 'mdi-human-male-female-child',
        items: [{ title: 'List Item' }],
        title: 'Family',
      },
      {
        action: 'mdi-bottle-tonic-plus',
        items: [{ title: 'List Item' }],
        title: 'Health',
      },
      {
        action: 'mdi-briefcase',
        items: [{ title: 'List Item' }],
        title: 'Office',
      },
      {
        action: 'mdi-tag',
        items: [{ title: 'List Item' }],
        title: 'Promotions',
      },
      {
        action: 'mdi-silverware-fork-knife',
        active: true,
        items: [
          { title: 'Breakfast & brunch' },
          { title: 'New American' },
          { title: 'Sushi' },
        ],
        title: 'Dining',
      },
      {
        action: 'mdi-silverware-fork-knife',
        active: true,
        items: [
          { title: 'Breakfast & brunch' },
          { title: 'New American' },
          { title: 'Sushi' },
        ],
        title: 'Dining',
      },
      {
        action: 'mdi-silverware-fork-knife',
        active: true,
        items: [
          { title: 'Breakfast & brunch' },
          { title: 'New American' },
          { title: 'Sushi' },
        ],
        title: 'Dining',
      },
      {
        action: 'mdi-silverware-fork-knife',
        active: true,
        items: [
          { title: 'Breakfast & brunch' },
          { title: 'New American' },
          { title: 'Sushi' },
        ],
        title: 'Dining',
      },
      {
        action: 'mdi-silverware-fork-knife',
        active: true,
        items: [
          { title: 'Breakfast & brunch' },
          { title: 'New American' },
          { title: 'Sushi' },
        ],
        title: 'Dining',
      },
      {
        action: 'mdi-silverware-fork-knife',
        active: true,
        items: [
          { title: 'Breakfast & brunch' },
          { title: 'New American' },
          { title: 'Sushi' },
        ],
        title: 'Dining',
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
    .add_playground_btn{
      height: 50px;
      margin-top: -50px;
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
        font-size: 20px !important;
      }
      .custom_child{
        font-size: 14px !important;
      } 
      .group_items{
        max-height: 600px !important;
        overflow: auto;
      }
      .custom_btn_add_playground{
        margin-left: 5px;
        font-size: 20px !important;
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