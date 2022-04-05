<template>
    <nav>
        <v-toolbar flat class="navbar_image">
            <v-toolbar-title class=" ml-10 display-1 white--text hidden-sm-and-down">TextMe</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn class="white--text custom_login_button" rounded to="/login">Login</v-btn>
        </v-toolbar>
    </nav>    
</template>


<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
 
    
})
</script>

<style lang="scss">
    .navbar_image{
        background-image: url('@/assets/navbar.png');
        background-size: cover;
    }
    .custom_login_button{
        width: 135px !important;
        height: 45px !important; 
        text-align: center !important;
        font-size: 28px !important;
        text-transform: capitalize !important;
        font-family: Arial !important;  
        background-color: #007ABE !important;
    }
</style>