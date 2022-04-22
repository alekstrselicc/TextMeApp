<template>
  <div class="mains">
    <!-- Background title-->
    <v-flex class="titles">
      <h1 class="main_title">{{ title }}</h1>
      <h1 class="sub_title">{{ subtitle }}</h1>
    </v-flex>

    <!-- Channel title-->

    <PlaygroundSettings />
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import PlaygroundSettings from "@/components/Settings/playgroundSettings.vue";

export default Vue.extend({
  name: "chatTitle",
  components: { PlaygroundSettings },
  data() {
    return {
      title: "Gaming",
      subtitle: "Chill channel",
      showSettings: false,
    };
  },
});
</script>

<style>
.mains {
  height: 100px;
  margin-top: -40px !important;
}

.titles {
  height: 50px !important;
  margin-left: 10px;
  margin-top: -20px;
}
.settings_btn {
  position: absolute;
  margin-left: 170px;
  margin-top: -30px;
}

.main_title {
  font-size: 40px;
  color: white;
}
.sub_title {
  font-size: 20px !important;
  color: white;
  margin-left: 4px;
}
@media (max-width: 960px) {
  .mains {
    margin-top: -40px;
  }
}
</style>
