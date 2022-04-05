<template>
    <v-main>
      <v-container class="fill-height justify-center">
        <v-row>
          <!-- playgrounds -->
          <v-col sm="3">
            <v-sheet rounded="lg" min-height="100%" class="playground_sheet sheet_color">
            </v-sheet>
          </v-col>


          <!-- chat -->
          <v-col sm="7">
            <v-sheet min-height="92vh" rounded="lg" class="chat_sheet sheet_color">   
            </v-sheet>
          </v-col>


          <!-- friends -->
          <v-col sm="2">
            <v-sheet rounded="lg" min-height="100%" class="friends_sheet sheet_color">

            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
</template>

<script>

</script>

<style>


  .sheet_color{
    background-color: rgba(0, 0, 0, 0.4) !important;
  }




</style>