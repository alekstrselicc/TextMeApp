<template>
  <div class="main_add_channel" v-if="dialogC"></div>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  data() {
    return {
      dialogC: false,
    };
  },
});
</script>

<style>
.main_add_channel {
  border: 1px solid red;
  position: absolute;
  width: 300px;
  height: 300px;
}
</style>
