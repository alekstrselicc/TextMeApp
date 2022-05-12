<template>
  <div class="main_send">
    <ChatBar />
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
      ></v-text-field>
    </div>
    <!-- Here is the bar of button  -->
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import ChatBar from "@/components/Chat/chatBar.vue";

import io from "socket.io-client";

export default Vue.extend({
  name: "chatMessage",
  components: { ChatBar },
});
</script>

<style>
.main_send {
  width: 98% !important;
  height: 100px;
  position: absolute;
  bottom: 0;
}

.main_send .main_box .v-text-field.v-text-field--solo .v-input__control {
  min-height: 50px !important;
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
.main_layout_buttons {
  width: 150px;
  height: 40px !important;
  margin-left: 5px;
}

@media (max-width: 960px) {
  .main_layout_buttons {
    width: 150px;
    height: 40px !important;
    margin-left: 5px;
  }
  .main_send {
    margin-bottom: 60px;
    width: 95% !important;
  }
}
</style>
