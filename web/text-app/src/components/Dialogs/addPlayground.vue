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
      <v-card class="card_add_playground">
        <div class="title_div"><h1 class="title_h1">Adding playground</h1></div>
        <div class="enter_name_div">
          <v-text-field label="Enter name" v-model="title" solo></v-text-field>
        </div>

        <div class="choose_image_div">
          <v-avatar size="80" color="grey" class="image_avatar"></v-avatar>
          <v-btn class="image_btn">Choose image</v-btn>
        </div>
        <div class="center_btn">
          <v-btn class="add_btn_div" rounded @click="addPlayground()"
            >Add</v-btn
          >
        </div>

        <v-divider color="white" class="divider_add_play"></v-divider>

        <div class="title_find_div"><h1>Find playground</h1></div>
        <div class="link_find">
          <v-text-field label="Link..." v-model="name" solo></v-text-field>
        </div>
        <div class="center_btn">
          <v-btn class="add_btn_div" rounded @click="findPlayground()"
            >Add</v-btn
          >
        </div>
      </v-card>
    </v-dialog>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import axios from "axios";

export default Vue.extend({
  data() {
    return {
      dialog: false,
      title: "",
      name: "",
    };
  },

  methods: {
    addPlayground() {
      this.dialog = false;
      axios.post("http://127.0.0.1:8000/api/playgrounds", {
        title: this.title,
        img: "https://picsum.photos/350/165?random",
      });
    },
    findPlayground() {
      this.dialog = false;
      axios
        .get("http://127.0.0.1:8000/api/findByName/" + this.name)
        .then(async (res) => {
          console.log(res.data);
          await axios.post("http://127.0.0.1:8000/api/playground_request", {
            sender: Vue.prototype.$userId,
            playground_id: res.data[0].id,
          });
        });
    },
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
.title_div {
  width: 100%;
  text-align: center;
}
.title_h1 {
  color: white !important;
}
.enter_name_div {
  width: 60% !important;
  margin-left: 20%;
  margin-top: 10px;
}
.divider_add_play {
  border: 1px solid white !important;
  width: 80%;
  margin-left: 50px;
  margin-top: 20px;
}
.enter_name_div .v-text-field.v-text-field--solo .v-input__control {
  min-height: 40px !important;
  border-radius: 15px !important;
}
.title_find_div {
  color: white !important;
  text-align: center;
}
.link_find {
  width: 60% !important;
  margin-left: 20%;
  margin-top: 10px;
}
.link_find .v-text-field.v-text-field--solo .v-input__control {
  min-height: 40px !important;
  border-radius: 15px !important;
}

.image_avatar {
  margin-left: 120px;
}
.image_btn {
  min-width: 120px !important;
}

.center_btn {
  width: 100% !important;
  height: 50px !important;
  text-align: center;
}
.add_btn_div {
  color: white !important;
  background-color: #007abe !important;
  margin-top: 10px;
}

.title_find_div {
  margin-top: 20px;
}

@media (max-width: 960px) {
  .title_h1 {
    font-size: 28px;
  }
  .image_avatar {
    margin-left: 10px;
    margin-top: -10px;
  }
  .title_find_div {
    margin-top: 20px;
  }
}
</style>
