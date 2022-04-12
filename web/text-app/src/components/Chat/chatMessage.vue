<template>
  <div class="main_layout">
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
    <ChatBar />
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import ChatBar from "@/components/Chat/chatBar.vue";

export default Vue.extend({
  name: "chatMessage",
  components: { ChatBar },
});
</script>

<style>

.main_layout{
  width: 100% !important;
}
.main_box{
  margin-top: -50px;
}
.v-icon.outlined {
  border: 1px solid #007abe !important;
  background: #007abe !important;
  border-radius: 50%;
  height: 46px !important;
  width: 46px !important;
  position: absolute;
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
.main_layout_buttons{
    width: 150px;
    height: 40px !important;
    margin-top: -100px;
    margin-left: 5px;
}


@media (max-width: 960px) {
  .main_box {
    position: absolute;
    bottom: 0;
    margin-bottom: 30px;
    width: 88% !important;
  }
  .main_layout_buttons{
      width: 150px;
      height: 40px !important;
      margin-top: -160px;
      margin-left: 5px;
  }

}
</style>
