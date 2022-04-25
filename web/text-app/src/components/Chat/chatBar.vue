<template>
  <v-layout class="main_layout_buttonss">
    <v-btn class="gif_btn">GIF</v-btn>
    <v-file-input class="file_chooser" color="white"></v-file-input>
  </v-layout>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  data() {
    return {
      isSelecting: false,
      selectedFile: null,
    };
  },
  methods: {},
});
</script>

<style>
.main_layout_buttonss {
  width: 270px !important;
  height: 40px !important;
  padding-left: 10px;
}
.file_chooser {
  margin-top: -10px;
  margin-left: 15px;
}
.file_chooser .theme--light.v-icon {
  color: white !important;
  background-color: #007abe !important;
  min-width: 40px !important;
  height: 35px !important;
  border-radius: 5px;
}
.theme--light.v-file-input .v-file-input__text {
  color: white !important;
}
.gif_btn {
  font-size: 20px !important;
  max-width: 15px !important;
  background-color: #007abe !important;
  color: white !important;
}
.image_btn {
  background-color: #007abe !important;
  color: white !important;
  margin-left: 10px;
  width: 60px;
  height: 35px;
  border-radius: 5px;
  color: white !important;
}
</style>
