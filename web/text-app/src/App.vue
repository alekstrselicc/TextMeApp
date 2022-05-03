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
    //axios.defaults.headers.common["Authorization"] =
    //  "Bearer " + localStorage.getItem("authToken");
    console.log("this is the name");
    //console.log(process.env.CLIENT_ID);
  },
});
</script>

<style lang="scss">
main {
  background-image: url("./assets/ozadje.jpg");
  background-size: cover;
}
</style>
