<template>
  <div class="mains">
    <!-- Background title-->
    <v-flex class="titles">
      <h1 class="main_title">{{ title }}</h1>
      <h1 class="sub_title">{{ subtitle }}</h1>
    </v-flex>

    <!-- Channel title-->
  </div>
</template>

<script lang="ts">
import Vue from "vue";

import axios from "axios";

export default Vue.extend({
  name: "chatTitle",
  components: {},

  data() {
    return {
      ids: null,
      title: "",
      subtitle: "",
      showSettings: false,
    };
  },
  /*
  methods: {
    checkPath(e){
      if(e == "")
    }
  }
  */
  created() {
    //this.$http.get('')
    if (this.$route.path.length < 9) {
      axios
        .get("http://127.0.0.1:8000/api/channels/" + this.$route.params.id)
        .then(async (res) => {
          this.subtitle = res.data[0].title;
          await axios
            .get(
              "http://127.0.0.1:8000/api/playgrounds/" +
                res.data[0].playground_id
            )
            .then((res) => {
              this.title = res.data.title;
            });
        });
    } else {
      //console.log("What is this: " + this.$route.params.id);
      axios
        .get("http://127.0.0.1:8000/api/user/" + this.$route.params.id)
        .then((res) => {
          console.log("what is this");
          console.log(res.data);
        });
    }
  },
  watch: {
    "$route.params.search": {
      handler: function (search) {
        if (this.$route.path.length < 9) {
          axios
            .get("http://127.0.0.1:8000/api/channels/" + this.$route.params.id)
            .then(async (res) => {
              this.subtitle = res.data[0].title;
              await axios
                .get(
                  "http://127.0.0.1:8000/api/playgrounds/" +
                    res.data[0].playground_id
                )
                .then((res) => {
                  this.title = res.data.title;
                });
            });
        } else {
          //console.log("What is this: " + this.$route.params.id);
          axios
            .get("http://127.0.0.1:8000/api/user/" + this.$route.params.id)
            .then((res) => {
              (this.title = ""),
                (this.subtitle = ""),
                console.log("what is this");
              console.log(res.data);
              this.title = res.data.first_name + " " + res.data.last_name;
            });
        }
      },
      deep: true,
      immediate: true,
    },
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
