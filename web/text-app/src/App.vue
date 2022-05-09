<template>
  <v-app>
    <!--<NavBar class="hidden-sm-and-down" />-->

    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script lang="ts">
import Vue from "vue";
import axios from "axios";
//import NavBar from '@/components/NavBar.vue';

export default Vue.extend({
  name: "App",
  components: {
    /*NavBar*/
  },
  data: () => ({}),

  created() {
    console.log("this is the name");
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("authTokenAccess");

    axios.get("http://127.0.0.1:8000/api/user").then((res) => {
      console.log("this is id: " + res.data.id);
      Vue.prototype.$userId = res.data.id;
    });
  },
});
</script>

<style lang="scss">
main {
  background-image: url("./assets/ozadje.jpg");
  background-size: cover;
}
</style>
