<template>
    <v-layout class="main_layout_buttons">
        <v-btn class="gif_btn">GIF</v-btn>
         <v-btn
          class="image_btn"
          dark
        >
          <v-icon dark large>
            mdi-plus
          </v-icon>
        </v-btn>
    </v-layout>
</template>


<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  
}); 

</script>

<style>


.main_layout_buttons{
    width: 150px;
    height: 40px !important;
    padding-left: 10px;
}

.gif_btn{
    font-size: 20px !important;
    max-width: 15px !important;
    background-color: #007abe !important;
    color: white !important;
}
.image_btn{
    background-color: #007abe !important;
    color: white !important;
    margin-left: 10px;
}


</style>
