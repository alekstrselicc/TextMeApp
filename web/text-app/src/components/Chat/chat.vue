<template>
  <v-container class="fill-height chat_main">
    <!-- Here is going to show the title -->
    <ChatTitle />

    <!-- Here is going to be the send message -->
    <ChatSend />

    <PlaygroundSettings v-if="playgroundsettingsif" />
    <ShowMember v-if="membersif" />
  </v-container>
</template>

<script lang="ts">
import ChatTitle from "@/components/Chat/chatTitle.vue";
import ChatSend from "@/components/Chat/chatMessage.vue";

import ShowMember from "@/components/Dialogs/showMembers.vue";
import Vue from "vue";
import PlaygroundSettings from "@/components/Settings/playgroundSettings.vue";
export default Vue.extend({
  name: "chat",
  components: {
    ChatTitle,
    ChatSend,
    ShowMember,
    PlaygroundSettings,
  },
  data() {
    return {
      playgroundsettingsif: true,
      membersif: true,
    };
  },
  watch: {
    "$route.params.search": {
      handler: function (search) {
        if (this.$route.path.length < 9) {
          this.playgroundsettingsif = true;
          this.membersif = true;
        } else {
          this.playgroundsettingsif = false;
          this.membersif = false;
        }
      },
      deep: true,
      immediate: true,
    },
  },
});
</script>

<style>
.chat_main {
  position: relative;
}
</style>
