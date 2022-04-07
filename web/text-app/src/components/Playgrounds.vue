<template>
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
                    <v-list-item-icon >
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
           
            <div class="custom_button_bigger">
              <v-btn class="white--text custom_btn_add_playground_bigger" color="white" text><v-icon left style="font-size: 40px;">mdi-plus</v-icon>Add playground</v-btn>
            </div>
            </v-flex>
</template>


<script lang="ts">
import Vue from 'vue'

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
    
})
</script>

<style lang="scss">

</style>