<template>
  <v-layout class="btn_layout">

    <!-- Clickable icon -->
    <v-flex class="btn_icon">
      <v-btn icon>
        <v-avatar size="70">
          <img src="https://randomuser.me/api/portraits/men/1.jpg"/>
        </v-avatar>
      </v-btn>
    </v-flex>

    

    <!-- Clickable text -->
    <v-flex class="btn_text">
        <a href="/main" class="btn_text_edit">Monika Bog</a>
    </v-flex>


    <!-- Status menu -->
    <v-flex class="btn_status">
              <v-menu
        top
        
      >
         <template v-slot:activator="{ on, attrs }">
          <v-btn
            dark
            v-bind="attrs"
            v-on="on" 
            color="transparent"
          >
            Online
          </v-btn>
        </template>
  
        <v-list>
          <v-list-item
            v-for="(item, index) in items"
            :key="index"
          >
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item>
        </v-list>
        </v-menu>
    </v-flex>


    <!-- Invites button -->
    <v-flex class="btn_invites">

    </v-flex>



  </v-layout>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
    data: () => ({
        items: [
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me 2' },
        ],
    }),
});
</script>

<style>
/* this is main */
.btn_layout{
    position: absolute;
    bottom: 0;
    border: 1px solid white; 
    width: 230px;
    height: 90px; 
    margin-right: 60px;
    margin-bottom: 20px;
}

.btn_text_edit{
    font-size: 26px;
    text-decoration: none !important;
    color: white !important;
    margin-left: 25px;
}
.btn_icon{
    margin-left: 20px;
    margin-top: 20px;
}
.btn_image{
    width: 50px !important;
}
.btn_status{
    position: absolute;
    bottom: 0;
    right: 0;
    margin-bottom: 3px ;
}




/* this if for the phone */
@media (max-width: 960px) {

}

</style>
