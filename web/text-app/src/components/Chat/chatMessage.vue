<template>
    <div class="main_box">
    <v-text-field outlined class="send_box" label="Message...">
      <v-btn icon>
      <v-icon
        color="white"
        class="outlined"
        large
      >
        mdi-arrow-right
      </v-icon>
        </v-btn>
    </v-text-field>
    </div>
</template>


<script lang="ts">

import Vue from "vue";

export default Vue.extend({
  
}); 

</script>

<style>
.main_box{
    width: 100% !important;
    margin-top: -100px;
}

.v-icon.outlined {
    border: 1px solid blue;
    background: blue; 
    border-radius:50%;
    height: 46px;
    width: 46px;
}
.send_box{
    height: 20px !important; 
    border-radius: 30px; 
    font-size: 20px;
    width: 100% !important;
}
@media (max-width: 960px) {

.main_box{
    margin-bottom: 140px !important;
}

}



</style>
