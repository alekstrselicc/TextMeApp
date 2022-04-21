<template>
  <v-container class="fill-height chat_main">
    <!-- Here is going to show the title -->
    <ChatTitle />

    <!-- Chat log -->
    <ChatLog />

    <!-- Here is going to be the send message -->
    <ChatSend />

    <ShowMember />
    <PlaygroundSettings />
  </v-container>
</template>

<script lang="ts">
import ChatTitle from "@/components/Chat/chatTitle.vue";
import ChatSend from "@/components/Chat/chatMessage.vue";
import ChatLog from "@/components/Chat/chatLog.vue";
import ShowMember from "@/components/Dialogs/showMembers.vue";
import AddChannel from "@/components/Dialogs/addChannel.vue";
import PlaygroundSettings from "@/components/Settings/playgroundSettings.vue";

import Vue from "vue";
export default Vue.extend({
  name: "chat",
  components: {
    ChatTitle,
    ChatLog,
    ChatSend,
    ShowMember,
    PlaygroundSettings,
  },
});
</script>

<style>
.chat_main {
  position: relative;
}
</style>
