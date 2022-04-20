<template>
  <v-container class="fill-height chat_main">
    <!-- Here is going to show the title -->
    <ChatTitle />

    <!-- Chat log -->
    <ChatLog />

    <!-- Here is going to be the send message -->
    <ChatSend />

    <ShowMember />
  </v-container>
</template>

<script lang="ts">
import ChatTitle from "@/components/Chat/chatTitle.vue";
import ChatSend from "@/components/Chat/chatMessage.vue";
import ChatLog from "@/components/Chat/chatLog.vue";
import ShowMember from "@/components/Dialogs/showMembers.vue";
import Vue from "vue";
export default Vue.extend({
  name: "chat",
  components: { ChatTitle, ChatLog, ChatSend, ShowMember },
});
</script>

<style>
.chat_main {
  position: relative;
}
</style>
