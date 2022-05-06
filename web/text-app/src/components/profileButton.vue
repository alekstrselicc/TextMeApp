<template>
  <v-layout class="btn_layout">
    <!-- Clickable icon -->
    <v-flex class="btn_icon">
      <v-btn icon>
        <v-badge
          bordered
          bottom
          :color="status_color"
          offset-x="15"
          offset-y="25"
        >
          <v-avatar class="custom_avatar">
            <img :src="avatar" />
          </v-avatar>
        </v-badge>
      </v-btn>
    </v-flex>

    <!-- Clickable text -->
    <v-flex class="btn_text">
      <a href="profile" class="btn_text_edit">{{ name }}</a>
    </v-flex>

    <!-- Status menu -->
    <v-flex class="btn_status">
      <v-select
        v-model="status_name"
        :items="status_items"
        item-text="status"
        class="white--text select_status"
        @change="onSelect"
        top
      >
      </v-select>
    </v-flex>

    <!-- Invites button -->
    <v-flex class="btn_invites">
      <PendingInvites />
    </v-flex>
  </v-layout>
</template>

<script lang="ts">
import Vue from "vue";
import PendingInvites from "@/components/Dialogs/friendRequests.vue";
import axios from "axios";
export default Vue.extend({
  name: "profileButton",
  components: { PendingInvites },
  data: () => ({
    name: "",

    status_id: null,
    status_name: "",
    status_items: [],
    statuss: { status: "" },

    status_color: "",
  }),

  watch: {},

  methods: {
    check(e) {
      if (e == "away") {
        this.id_status = 4;
        this.status_color = "yellow";
      } else if (e == "online") {
        this.id_status = 1;
        this.status_color = "green";
      } else if (e == "busy") {
        this.id_status = 3;
        this.status_color = "red";
      } else {
        this.id_status = 2;
        this.status_color = "grey";
      }
    },
    onSelect(e) {
      //console.log("Kaj je to: " + e);

      this.check(e);
      axios.put("http://127.0.0.1:8000/api/user/" + 35, {
        //here we need to get the id of the selected
        status_id: this.id_status,
      });
    },
  },
  created() {
    axios.get("http://127.0.0.1:8000/api/user").then(async (res) => {
      console.log(res.data.last_name);
      this.name = res.data.first_name + " " + res.data.last_name;
      this.avatar = res.data.img;
      this.status_id = res.data.status_id;
      //console.log("tole je pa zgori: " + res.data.status_id);
      await axios
        .get("http://127.0.0.1:8000/api/status/" + this.status_id)
        .then((res) => {
          // console.log("skos se nalaga: " + res.data.status);
          this.status_name = res.data.status;
          this.status_id = res.data.id;
          this.check(res.data.status);
          //this.status.name =
        });
    });

    //this is for getting all the data
    axios.get("http://127.0.0.1:8000/api/status").then((res) => {
      this.status_items = res.data;
    });
  },
});
</script>

<style>
/* this is main */
.btn_layout {
  position: absolute;
  bottom: 0;
  width: 230px;
  height: 90px;
  margin-right: 60px;
  margin-bottom: 20px;
}
.select_status {
  width: 130px !important;
  margin-bottom: -5px;
  margin-right: 10px;
  color: white !important;
  background-color: transparent !important;
  font-size: 20px !important;
}
.v-text-field {
  color: white !important;
}
.image_status {
  width: 30px !important;
  height: 30px !important;
}
.v-input__slot:before {
  border-style: none !important;
}
.theme--light.v-select .v-select__selections {
  color: white !important;
}

.v-input__slot:after {
  border-style: none !important;
}
.btn_invites {
  position: absolute;
  margin-left: 236px;
  margin-top: 20px;
}

.btn_text_edit {
  font-size: 26px;
  text-decoration: none !important;
  color: white !important;
  margin-left: 25px;
}
.btn_icon {
  margin-left: 20px;
  margin-top: 20px;
}
.btn_image {
  width: 50px !important;
}
.btn_status {
  position: absolute;
  bottom: 0;
  right: 0;
  margin-bottom: 3px;
}

.custom_avatar {
  width: 70px !important;
  height: 70px !important;
}

.v-application .primary--text {
  color: black !important;
}
.v-select__selections {
  color: white !important;
}

/* this if for the phone */
@media (max-width: 960px) {
  .btn_icon {
    margin-left: 40px;
    margin-top: 20px;
    max-width: 70px !important;
    height: 50px !important;
  }
  .btn_text_edit {
    position: absolute;
    margin-top: 50px;
    margin-left: 40px;
    font-size: 20px !important;
    width: 150px !important;
  }
  .custom_avatar {
    width: 50px !important;
    height: 50px !important;
  }
  /* This is all for status */
  .btn_status {
    position: absolute;
    bottom: 0;
    right: 0;
    margin-bottom: 4px;
  }
  .select_status {
    color: white !important;
    width: 125px !important;
    font-size: 18px !important;
  }

  .image_status {
    width: 20px !important;
    height: 20px !important;
  }
  .v-application .primary--text {
    color: white !important;
  }
  .v-select__selections {
    color: white !important;
  }

  /* This if for invites */
  .btn_invites {
    position: absolute;
    margin-left: 220px;
    margin-top: 24px;
  }
}
</style>
