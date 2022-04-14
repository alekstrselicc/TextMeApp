<template>
    <div class="main_profile_layout">

        <!-- here is going to be the image, name, settings btn  --> 
        <div class="header_profile">
            <v-avatar class="avatar_image">
                <v-img :src="avatar"></v-img>
            </v-avatar>
            
            <p class="name_title">{{name}}</p>

            <v-btn class="btn_settings" rounded>Settings</v-btn>

        </div>

        <!-- here is going to be a table of information --> 
        <div class="main_info">

            <v-row>
                <v-col class="first_col">
                    <div class="about_info">
                        <div class="about_title">
                            <h1>About me</h1>
                        </div>
                        <v-divider class="divider_class_about" ></v-divider>

                        <!-- Here is going to be a list --> 
                        <v-list color="transparent" dense class="list_of_info">
                            <v-list-item v-for="(item, index) in about_info" :key="index">

                                <v-list-item-content>
                                    <v-list-item-title v-text="item.name" class="info_changer_class"></v-list-item-title>

                                </v-list-item-content>

                            </v-list-item>
                        </v-list>

                    </div>
                </v-col>


                <v-col class="sec_col">
                    <div class="dis_info">
                        <div class="desc_title">
                            <h1>Description</h1>
                        </div>
                        <v-divider class="divider_class" ></v-divider>

                        <p class="class_dis">{{description}}</p>
                    </div>                
                </v-col>
                <v-col></v-col>
            </v-row>
        </div>

    </div>
</template>

<script lang="ts">
import Vue from 'vue'
export default Vue.extend({
    data(){
        return {
            avatar: "https://picsum.photos/350/165?random", 
            name: "Monika Bog", 

            about_info: [
                { name: "Birth:", info: ""},
                { name: "Gender:", info: ""},
                { name: "Relationship:", info: ""},
                { name: "Country:", info: ""},
                { name: "Town:", info: ""},
                { name: "Phone:", info: ""},
            ], 
            description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when.", 
        }

    }
})
</script>

<style>

.main_profile_layout{
    width: 100%;
    height: 100%;
    
}

/* css for header */
.header_profile{ 
    width: 100%;
    height: 20%; 
    position: relative;
    padding-left: 10px;
    padding-top: 10px;
}
.avatar_image{
    width: 20% !important;
    height: 90% !important; 
    max-height: 170px !important; 
    max-width: 150px;
    min-width: 150px !important;
}

.main_info{
    width: 100%;
    height: 80%;
}

.name_title{
    font-size: 40px;
    color: white;
    margin-left: 160px;
    top: 0; 
    position: absolute;
    padding-top: 10px;
}

.btn_settings{
    background-color: #007ABE !important;
    color: white !important;
    margin-left: 10px;
    margin-top: 100px;
    position: absolute;
}

.divider_class{
      border-color: rgba(255, 255, 255, 1) !important;   
      max-width: 180px;
      margin-left: 27px;
}
.divider_class_about{
    border-color: rgba(255, 255, 255, 1) !important; 
    max-width: 150px;
    margin-left: 30px;
}

/* Here is the css for about me */

.about_title{
    min-width: 180px; 
    padding-left: 35px;
    color: white;
}

/* Here is the css for dsc info */
.desc_title{
    min-width: 180px; 
    color: white;
    padding-left: 35px;
}

/* This is the css for list */

.list_of_info{
    padding: 0;
    margin-left: 15px; 
}

.info_changer_class{
    color: white;
    font-size: 20px !important;
}

/* This is the css for columns */

.first_col{
    min-width: 300px !important;
}
.sec_col{
    min-width: 300px !important;
}


/* desc */
.class_dis{
    padding-top: 5px;
    margin-left: 30px;
    font-size: 20px ;
    color: white;
}


/* Moblie fixes */

@media (max-width: 960px) {
    .avatar_image{
        margin: 0;
    }
    .btn_settings{
        margin-left: 160px;
    }
    .name_title{
        margin-top: 10px;
        font-size: 30px;
    }

}


</style>