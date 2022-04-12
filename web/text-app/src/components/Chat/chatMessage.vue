<template>
  <div class="main_box">
    <v-text-field
      class="search-input"
      solo
      hide-details
      rounded
      elevation-12
      placeholder="Message..."
      aria-label="Search"
      append-icon="mdi-arrow-right"
      @click:append="gridView = !gridView"
    />
  </div>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({});
</script>

<style>
.main_box {
  width: 100% !important;
  margin-top: -80px;
}
.v-icon.outlined {
  border: 1px solid #007abe !important;
  background: #007abe !important;
  border-radius: 50%;
  height: 46px !important;
  width: 46px !important;
  position: absolute;
}

.send_box {
  height: 56px !important;
  border-radius: 30px;
  font-size: 20px;
  width: 100% !important;
  background-color: white !important;
}
.main_box .v-input__icon--append .v-icon { 
    color: white !important;
    font-size: 30px !important;
    border-radius: 50%;
    min-width: 46px !important;
    height: 45px !important;
    margin-left: 15px;
    background-color: #007abe !important;
}

@media (max-width: 960px) {
  .main_box {
    position: absolute;
    bottom: 0;
    margin-bottom: 30px;
    width: 90% !important;
  }
}
</style>
