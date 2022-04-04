<template>
  <v-app>
    <NavBar class="hidden-sm-and-down" />
    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script lang="ts">


import Vue from 'vue';
import NavBar from '@/components/NavBar.vue'; 

export default Vue.extend({
  name: 'App',
  components: { NavBar },
  data: () => ({
    //
  }),
});
</script>



<style lang="scss">
  main{
    background-image: url('./assets/ozadje.jpg');
    background-size: cover;
  }

</style>
