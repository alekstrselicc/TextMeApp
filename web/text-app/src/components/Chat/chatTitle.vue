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
import axios from "axios";

export default Vue.extend({
  name: "chatTitle",
  components: { PlaygroundSettings },

  data() {
    return {
      ids: null,
      title: "",
      subtitle: "",
      showSettings: false,
    };
  },
  created() {
    //this.$http.get('')
    console.log("What is this: " + this.$route.params.id);
    axios
      .get("http://127.0.0.1:8000/api/channels/" + this.$route.params.id)
      .then(async (res) => {
        this.subtitle = res.data[0].title;
        await axios
          .get(
            "http://127.0.0.1:8000/api/playgrounds/" + res.data[0].playground_id
          )
          .then((res) => {
            this.title = res.data.title;
          });
      });
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
