<template>
    <v-layout class="main_layout">
        <!-- Background title--> 
        <v-flex class="titles">
            <h1 class="main_title">{{ title }}</h1>
            <h1 class="sub_title">{{ subtitle }}</h1>
        </v-flex>

        <!-- Channel title-->
        <v-flex class="settings_btn">
            <v-btn icon><v-icon color="blue" large>mdi-wrench</v-icon></v-btn>
        </v-flex>

        <v-flex class="search_box">
            <v-text-field
              outlined
              label="Search"
              prepend-inner-icon="mdi-magnify"
              color="black"
              class="white--text search_bar text-input-white"
            ></v-text-field>
        </v-flex>

    </v-layout>
</template>


<script lang="ts">

import Vue from "vue";

export default Vue.extend({
   name: "chatTitle", 
   data() {
       return {
           title: "Gaming",
           subtitle: "Chill channel"
       }
   }
}); 

</script>

<style>

.main_layout{
    min-width: 500px !important;
}
.search_box{
    margin-left: 100%;
    margin-top: 25px;
}

.search_bar input::placeholder{
    color: white !important;
}
.v-text-field--outlined > .v-input__control > .v-input__slot{
    background: white;
    border-radius: 20px;
    width: 250px !important;
}
.theme--light.v-application{
    color: white !important;
}

.titles{
    height: 50px !important;
    margin-left: 10px;
    margin-top: 20px;
}
.settings_btn{
    position: absolute;
    margin-left: 170px;
    margin-top: 36px;
}

.main_title{
    font-size: 40px;
    color: white;
}
.sub_title{
    font-size: 20px !important;
    color: white;
    margin-left: 4px;
}
</style>
