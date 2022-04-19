<template>
  <div>
    <v-dialog v-model="dialog" max-width="500">
      <template v-slot:activator="{ on, attrs }">
        <div class="custom_button_bigger">
          <v-btn
            class="white--text custom_btn_add_playground_bigger"
            color="white"
            text
            v-bind="attrs"
            v-on="on"
            ><v-icon left class="icon_add">mdi-plus</v-icon>Add
            playground</v-btn
          >
        </div>
      </template>
      <!-- Here is going to be the data -->
      <v-card class="card_add_playground"></v-card>
    </v-dialog>
  </div>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  data() {
    return {
      dialog: false,
    };
  },
});
</script>

<style>
.card_add_playground {
  width: 500px;
  border: 1px solid black !important;
  height: 500px;
  background-color: black !important;
  border-radius: 30px !important;
}
</style>
